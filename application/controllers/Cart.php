<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('product_model', 'product');
    }

    /**
     * @return void
     */
    public function index(): void
    {
        if (empty($this->session->cart->items)) {
            Notify::error('O carrinho está vazio.', 'produtos');
        }

        $this->template->load('cart/index', [
            'title'  => 'Carrinho',
            'action' => 'Gerenciar carrinho',
        ]);
    }

    /**
     * @return CI_Output
     */
    public function addItem(): CI_Output
    {
        $productId = $this->input->post('id', true);

        if (!$productId) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Product ID is required',
                ]));
        }

        $product = $this->product->find($productId);

        if (!$product) {
            $this->session->set_flashdata('error', 'Produto não encontrado');

            return $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Product not found',
                ]));
        }

        $found = false;

        foreach ($this->session->cart->items as $key => $item) {
            if ($item->id == $productId) {
                $this->session->cart->items[$key]->qtd += 1;

                $this->session->cart->items[$key]->priceTotal = (
                    $this->session->cart->items[$key]->price
                    * $this->session->cart->items[$key]->qtd
                );

                $found = true;

                break;
            }
        }

        if (!$found) {
            $this->session->cart->items[] = (object) [
                'id'         => $productId,
                'name'       => $product->name,
                'price'      => $product->price,
                'qtd'        => 1,
                'priceTotal' => $product->price,
            ];
        }

        $this->session->cart->total += $product->price;
        $this->session->cart->totalItems += 1;

        $this->product->update($productId, [
            'name'  => $product->name,
            'price' => $product->price,
            'stock' => $product->stock - 1,
        ]);

        $this->calculateShipping();

        Notify::success('Produto adicionado ao carrinho');

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => true,
                'message' => 'Item added to cart',
            ]));
    }

    /**
     * @return CI_Output
     */
    public function removeItem(): CI_Output
    {
        $index = $this->input->post('index', true);

        if (!$index) {
            Notify::error('ID do item é obrigatório');

            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'O ID do item é obrigatório',
                ]));
        }

        $index = $index - 1;

        if (!isset($this->session->cart->items[$index])) {
            Notify::error('Item não encontrado no carrinho');

            return $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Item não encontrado no carrinho',
                ]));
        }

        $item = $this->session->cart->items[$index];

        $product = $this->product->find($item->id);

        $productUpdated = $this->product->update($item->id, [
            'name'  => $product->name,
            'price' => $product->price,
            'stock' => $product->stock + $item->qtd,
        ]);

        if (!$productUpdated) {
            Notify::error('Erro ao atualizar o estoque do produto');

            return $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Erro ao atualizar o estoque do produto',
                ]));
        }

        $this->session->cart->totalItems -= $item->qtd;
        $this->session->cart->total -= $item->priceTotal;

        unset($this->session->cart->items[$index]);

        $this->calculateShipping();

        Notify::success('Produto removido do carrinho');

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => true,
                'message' => 'Item removido do carrinho',
            ]));
    }

    /**
     * @return CI_Output
     */
    public function clean(): CI_Output
    {
        if (empty($this->session->cart->items)) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Carrinho já está vazio',
                ]));
        }

        foreach ($this->session->cart->items as $item) {
            $product = $this->product->find($item->id);

            $this->product->update($item->id, [
                'name'  => $product->name,
                'price' => $product->price,
                'stock' => $product->stock + $item->qtd,
            ]);
        }

        $this->calculateShipping();

        $this->resetCart();

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => true,
                'message' => 'Carrinho limpo com sucesso',
            ]));
    }

    private function resetCart(): void
    {
        $this->session->unset_userdata('cart');

        $this->session->set_userdata('cart', (object) [
            'items'      => [],
            'totalItems' => 0,
            'total'      => 0,
        ]);

        Notify::success('Carrinho limpo com sucesso');
    }

    private function calculateShipping(): void
    {
        $total = $this->session->cart->total;

        switch ($total) {
            case $total >= 52 && $total <= 166.59:
                $this->session->cart->shipping = 15.00;

                break;
            case $total > 166.59 && $total <= 200:
                $this->session->cart->shipping = 10.00;

                break;
            case $total > 200:
                $this->session->cart->shipping = 0.00;

                break;
            default:
                $this->session->cart->shipping = 20.00;

                break;
        }
    }
}

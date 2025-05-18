<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('product_model');
    }

    /**
     * @return void
     */
    public function index()
    {
        $this->template->load('product/index', [
            'title'    => 'Produtos',
            'action'   => 'Gerenciar produtos',
            'products' => $this->product_model->findAll(),
        ]);
    }

    /**
     * @param int $id
     * @return CI_Output
     */
    public function show(int $id): CI_Output
    {
        $product = $this->product_model->find($id);

        if (!$product) {
            return $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Produto não encontrado',
                ]));
        }

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => true,
                'data'    => $product,
            ]));
    }

    /**
     * @return void
     */
    public function store(): void
    {
        $price = $this->input->post('price', true);
        $price = format_currency_to_float($price);

        $productCreated = $this->product_model->store([
            'name'  => $this->input->post('name', true),
            'price' => $price,
            'stock' => $this->input->post('stock', true),
        ]);

        $productCreated
            ? Notify::success(message: 'Produto cadastrado com sucesso', redirect: 'produtos')
            : Notify::error(message: 'Erro ao cadastrar produto', redirect: 'produtos');
    }

    /**
     * @param int $id
     * @return void
     */
    public function update(int $id): void
    {
        $product = $this->product_model->find($id);

        if (!$product) {
            $this->session->set_flashdata('error', 'Product not found');

            redirect(base_url('produtos'));
        }

        $price = $this->input->post('price', true);
        $price = format_currency_to_float($price);

        $productUpdated = $this->product_model->update($id, [
            'name'  => $this->input->post('name', true),
            'price' => $price,
            'stock' => $this->input->post('stock', true),
        ]);

        $productUpdated
            ? Notify::success('Produto atualizado com sucesso', 'produtos')
            : Notify::error('error', 'Erro ao atualizar produto', 'produtos');
    }

    /**
     * @param int $id
     * @return CI_Output
     */
    public function delete(int $id): CI_Output
    {
        $product = $this->product_model->find($id);

        if (empty($product)) {
            return $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->output(json_encode([
                    'success' => false,
                    'message' => 'Product not found',
                ]));
        }

        $productDeleted = $this->product_model->delete($id);

        $productDeleted
            ? Notify::success('Produto excluído com sucesso')
            : Notify::error('Erro ao excluir produto');

        return $this->output
            ->set_status_header($productDeleted ? 200 : 500)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => $productDeleted,
                'message' => $message,
            ]));
    }
}

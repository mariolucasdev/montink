<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('order_model', 'order');
    }

    /**
     * Display the list of orders
     *
     * @return void
     */
    public function index()
    {
        $this->template->load('order/index', [
            'title' => 'Pedidos',
            'action' => 'Lista de pedidos',
            'orders' => $this->order->findAll(),
        ]);
    }

    /**
     * Store a new order
     *
     * @return void
     */
    public function store()
    {
        $client = $this->input->post('client', true);
        $email = $this->input->post('email', true);
        $cep = $this->input->post('cep', true);
        $address = $this->input->post('address', true);

        $orderId = $this->order->store([
            'client' => $client,
            'email' => $email,
            'email' => $this->input->post('email'),
            'discount' => 0,
            'amount' => $this->session->cart->total,
            'shipping' => $this->session->cart->shipping,
            'total' => $this->session->cart->total + $this->session->cart->shipping,
            'cep' => $cep,
            'address' => $address,
        ]);

        if(! $orderId) {
            Notify::error('Erro ao criar o pedido', 'carrinho');
        }

        $itemsCreated = $this->storeItems($this->session->cart->items, $orderId);

        if(! $itemsCreated) {
            Notify::error('Erro ao criar os itens do pedido');
            return $this->output->set_status_header(500);
        }

        $this->session->unset_userdata('cart');

        Notify::success("Pedido <strong>#{$orderId}</strong> criado com sucesso", 'produtos');
    }

    /**
     * Store items in the order
     *
     * @param array $items
     * @param int $orderId
     * @return bool
     */
    private function storeItems(array $items, int $orderId): bool
    {
        $itemsToDatabase = array_map(function ($item) use ($orderId) {
            return [
                'order_id' => $orderId,
                'product_id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->qtd,
                'total' => $item->priceTotal,
            ];
        }, $items);

        return $this->order->storeItems($itemsToDatabase);
    }
}
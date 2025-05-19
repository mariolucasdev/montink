<?php

defined('BASEPATH') or exit('No direct script access allowed');

class OrderWebhook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return CI_Output
     */
    public function index(): CI_Output
    {
        $data = json_decode(file_get_contents("php://input"));

        /* TODO: validate credentials*/
        /* ... */

        /* TODO: validate origins */
        /* ... */

        if (!isset($data->orderId) || !isset($data->status)) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status'  => 'error',
                    'message' => 'Campos obrigatórios não informados. orderId e status são obrigatórios.',
                ]));
        }

        $this->load->model('order_model', 'order');

        $order = $this->order->find($data->orderId);

        if (!$order) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status'  => 'error',
                    'message' => 'Pedido não encontrado.',
                ]));
        }

        $status = strtolower($data->status);

        if ($order->status == $status) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status'  => 'success',
                    'message' => 'Status do pedido já está atualizado.',
                ]));
        }

        if ($status == 'cancelled') {
            $this->order->delete($data->orderId);

            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status'  => 'success',
                    'message' => 'Pedido cancelado com sucesso.',
                ]));
        }

        $updated = $this->order->update($data->orderId, [
            'status' => $status,
        ]);

        if (!$updated) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status'  => 'error',
                    'message' => 'Erro ao atualizar o status do pedido.',
                ]));
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status'  => 'success',
                'message' => 'Status do pedido atualizado com sucesso.',
            ]));
    }
}

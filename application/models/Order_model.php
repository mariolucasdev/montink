<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all orders
     *
     * @return array
     */
    public function findAll(): array
    {
        return $this->db
            ->from('orders')
            ->get()
            ->result();
    }

    /**
     * @param array $order
     * @return ?int
     */
    public function store(array $order): ?int
    {
        $this->db->insert('orders', $order);

        return $this->db->insert_id();
    }

    /**
     * @param array $items
     * @return boolean
     */
    public function storeItems(array $items): bool
    {
        $this->db->insert_batch('order_items', $items);

        return $this->db->affected_rows() > 0;
    }
}
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
     * Get order by id
     *
     * @param int $id
     * @return ?object
     */
    public function find(int $id): ?object
    {
        return $this->db
            ->from('orders')
            ->where('id', $id)
            ->get()
            ->row();
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
     * @param int $id
     * @param array $order
     * @return boolean
     */
    public function update(int $id, array $order): bool
    {
        return $this->db
            ->where('id', $id)
            ->update('orders', $order);
    }

    /**
     * @param int $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        return $this->db
            ->where('id', $id)
            ->delete('orders');
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
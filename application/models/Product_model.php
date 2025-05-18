<?php

defined('BASEPATH') || exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->db
            ->select([
                'products.id',
                'products.name',
                'products.price',
                'stock.quantity as stock',
                '(stock.quantity > 0) as available',
            ])
            ->from('products')
            ->join('stock', 'products.id = stock.product_id')
            ->get()
            ->result();
    }
    
    /**
     * @return ?object
     */
    public function find(int $id): ?object
    {
        return $this->db
            ->select([
                'products.id',
                'products.name',
                'products.price',
                'stock.quantity as stock',
                '(stock.quantity > 0) as available',
            ])
            ->from('products')
            ->join('stock', 'products.id = stock.product_id')
            ->where('products.id', $id)
            ->get()
            ->row();
    }

    /**
     * @param array $product
     * @return boolean
     */
    public function store(array $product): bool
    {
        $this->db->trans_start();

        $this->db->insert('products', [
            'name' => $product['name'],
            'price' => $product['price']
        ]);

        $productId = $this->db->insert_id();

        $this->db->insert('stock', [
            'product_id' => $productId,
            'quantity' => $product['stock']
        ]);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * @param int $id
     * @param array $product
     * @return boolean
     */
    public function update(int $id, array $product): bool
    {
        $this->db->trans_start();

        $this->db
            ->where('id', $id)
            ->update('products', [
                'name' => $product['name'],
                'price' => $product['price']
            ]);

        $this->db
            ->where('product_id', $id)
            ->update('stock', [
                'quantity' => $product['stock']
            ]);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $this->db->trans_start();

        $this->db
            ->where('id', $id)
            ->delete('products');
    
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }
}
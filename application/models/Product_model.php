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
                'stock.quantity',
            ])
            ->from('products')
            ->join('stock', 'products.id = stock.product_id')
            ->get()
            ->result();
    }

    /**
     * @param array $product
     * @return boolean
     */
    public function store(array $product): bool
    {
        return $this->db->insert('products', $product);
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
            ->update('products', $product);

        $this->db
            ->where('product_id', $id)
            ->update('stock', [
                'quantity' => $product['quantity']
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
    
        $this->db
            ->where('product_id', $id)
            ->delete('stock');

        $this->db->trans_complete();
        
        return $this->db->trans_complete();
    }
}
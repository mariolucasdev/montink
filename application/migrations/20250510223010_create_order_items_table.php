<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Order_Items_Table extends CI_Migration
{
    private string $table = 'order_items';

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('migration_message');
    }

    public function up(): void
    {
        $query = "
			CREATE TABLE IF NOT EXISTS {$this->table} (
                `id` INT NOT NULL AUTO_INCREMENT,
                `order_id` INT NOT NULL,
                `product_id` INT NOT NULL,
                `price` DECIMAL(10, 2) NOT NULL,
                `quantity` INT NOT NULL,
                `total` DECIMAL(10, 2) NOT NULL,
                FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,            
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
		";

        $this->db->query($query);

        render_migration_message(
            $this->table,
            $this->db->last_query(),
            $this->db->error()
        );
    }

    public function down(): void
    {
        $query = "
            DROP TABLE IF EXISTS {$this->table};    
        ";

        $this->db->query($query);

        render_migration_message(
            $this->table,
            $this->db->last_query(),
            $this->db->error()
        );
    }
}

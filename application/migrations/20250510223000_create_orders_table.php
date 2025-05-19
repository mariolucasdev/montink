<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Orders_Table extends CI_Migration
{
    private string $table = 'orders';

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
                `client` VARCHAR(255) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `amount` DECIMAL(10, 2) NOT NULL,
                `discount` DECIMAL(10, 2) DEFAULT 0,
                `shipping` DECIMAL(10, 2) DEFAULT 0,
                `total` DECIMAL(10, 2) NOT NULL,
                `cep` VARCHAR(255) NOT NULL,
                `address` VARCHAR(255) NOT NULL,
                `status` ENUM('pending', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
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

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CartHook 
{
    /**
     * @return void
     */
    public function initialStateCart(): void
    {
        $ci = &get_instance();

        if(! $ci->session->has_userdata('cart')) {
            $ci->session->set_userdata('cart', (object) [
                'items' => [],
                'total' => 0,
                'totalItems' => 0,
                'shipping' => 20.00,
            ]);
        }
    }
}
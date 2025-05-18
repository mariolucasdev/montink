<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function index()
    {
        $this->template->loadHeader(['title' => 'Migrate']);
        $this->template->loadNavbar();

        if($this->migration->current()):
            $this->load->view('migration/updated');
        endif;
    }
}

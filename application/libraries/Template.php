<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
    /**
     * @var CI_Controller
     */
    private CI_Controller $ci;

    /**
     * folder content default
     * templates header, navbar and footer
     *
     * @var string
     */
    private string $templatesFolder;

    /**
     * path to views module
     * if exists
     *
     * @var string
     */
    private string $pathModuleViews;

    /**
     * construct class
     *
     * @param boolean $pathModuleViews
     * @param string $templatesFolder
     */
    public function __construct($pathModuleViews = false, $templatesFolder = 'template')
    {
        $this->ci              = &get_instance();
        
        $this->templatesFolder = $templatesFolder;
        $this->pathModuleViews = $pathModuleViews ? $pathModuleViews . "/" : '';
    }

    /**
     * load view library, load views with
     * header navbar and footer if exists
     * and load modal success and error
     *
     * @param boolean $content
     * @param array $data
     * @return void
     */
    public function load($content = false, $data = [])
    {
        $this->loadHeader($data);

        $this->loadNavbar();

        $this->loadMenu();

        $this->loadContent($content);

        $this->loadFooter();

        $this->loadModals();
    }

    /**
     * load view with header and
     * footer without navbar
     *
     * @param boolean $content
     * @param array $data
     * @return void
     */
    public function loadNavless($content = false, $data = []): void
    {
        $this->loadHeader($data);

        $this->loadNavbar();

        $this->loadContent($content);

        $this->loadFooter();
    }

    /**
     * load header if exists
     *
     * @param array $data
     * @return void
     */
    public function loadHeader($data): void
    {
        if(file_exists(APPPATH . 'views/' . $this->templatesFolder . '/header.php')):
            $this->ci->load->view($this->templatesFolder . '/header', $data);
        endif;
    }

    /**
     * load navbar if exists
     *
     * @return void
     */
    public function loadNavbar(): void
    {
        if(file_exists(APPPATH . 'views/' . $this->templatesFolder . '/navbar.php')):
            $this->ci->load->view($this->templatesFolder . '/navbar');
        endif;
    }

    /**
     * load menu if exists
     *
     * @return void
     */
    private function loadMenu(): void
    {
        if($this->ci->session->panel == 'client'):
            return;
        endif;

        if(file_exists(APPPATH . 'views/' . $this->templatesFolder . '/menu.php')):
            $this->ci->load->view($this->templatesFolder . '/menu');
        endif;
    }

    /**
     * load content if exists
     * content is view module
     *
     * @param boolean $content
     * @return mixed
     */
    public function loadContent($content, $data = []): mixed
    {
        if(!$content):
            return false;
        endif;

        if(is_array($content)):
            foreach ($content as $c):
                if(file_exists(APPPATH . 'views/' . $this->pathModuleViews . $c . '.php')):
                    $this->ci->load->view($this->pathModuleViews . $c, $data);
                endif;
            endforeach;

            return true;
        endif;

        if(file_exists(APPPATH . 'views/' . $this->pathModuleViews . $content . '.php')):
            $this->ci->load->view($this->pathModuleViews . $content, $data);

            return true;
        endif;

        return false;
    }

    /**
     * load footer if exists
     *
     * @return void
     */
    private function loadFooter(): void
    {
        if(file_exists(APPPATH . 'views/' . $this->templatesFolder . '/footer.php')):
            $this->ci->load->view($this->templatesFolder . '/footer');
        endif;
    }

    /**
     * load modal success and error
     * if exists
     *
     * @return void
     */
    private function loadModals(): void
    {
        if($this->ci->session->success):
            $this->ci->load->view('geral/modals/modal-success');
        endif;

        if($this->ci->session->error):
            $this->ci->load->view('geral/modals/modal-error');
        endif;
    }

    /**
     * load assets file by module loaded
     * if exists assets/index.php and assets/method.php
     * load this files
     *
     * @param string $module
     * @param string $method
     * @return void
     */
    public function loadAssets(string $module, string $method, $showIndex = true): void
    {
        if($showIndex):
            if(file_exists(APPPATH . "views/{$module}/assets/index.php")):
                $this->ci->load->view($module . '/assets/index');
            endif;
        endif;

        if(file_exists(APPPATH . "views/{$module}/assets/{$method}.php") && $method != 'index'):
            $this->ci->load->view($module . '/assets/' . $method);
        endif;
    }
}

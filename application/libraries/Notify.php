<?php

defined('BASEPATH') || exit('No direct script access allowed');

class Notify
{
    /**
     * Instance Codeigniter
     *
     * @var object
     */
    private object $ci;

    /**
     * constructor class
     */
    public function __construct()
    {}

    /**
     * Set Messages And Redirect
     *
     * @param string $type success|error
     * @param string $message
     * @param array $customize [description => '', button => '', buttonType=> 'success|danger|default', link => '']
     * @param $redirect
     * @return void
     */
    private static function setReturnMessage(string $type, string $message, array $customize = [], $redirect = false): void
    {
        $customize[$type] = $message;
        
        $ci = &get_instance();

        $ci->session->set_flashdata($customize);
        
        !$redirect ?: redirect($redirect);
    }

    /**
     * Set Success Message
     *
     * @param string $message
     * @param boolean|string $redirect
     * @param array $options [description<string>, button<string>, link<string>]
     * @return void
     */
    public static function error(string $message, string|bool $redirect = false, array $options = []): void
    {
        self::setReturnMessage('error', $message, $options, $redirect);
    }

    /**
     * Set Error Message
     *
     * @param string $message
     * @param boolean $redirect
     * @param array $options [description<string>, button<string>, link<string>]
     * @return void
     */
    public static function success(string $message, $redirect = false, array $options = []): void
    {
        self::setReturnMessage('success', $message, $options, $redirect);
    }
}

<?php 

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Render currency
 *
 * @param string $value
 * @param string $currency
 * @return void
 */
function format_currency(string $value, string $currency = 'BRL')
{
    $ci = &get_instance();
    $ci->load->helper('number');

    if ($currency == 'USD') {
        return '$ ' . number_format($value, 2, '.', ',');
    } else {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}

/**
 * Format currency to float
 *
 * @param string $value
 * @return float
 */
function format_currency_to_float($value)
{
    $ci = &get_instance();
    $ci->load->helper('number');

    return str_replace(['R$', '.', ','], ['', '', '.'], $value);
}
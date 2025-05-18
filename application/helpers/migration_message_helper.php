<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * render migration message
 *
 * @param string $table
 * @param string $last_query
 * @param string|null $query_info
 * @param array $error
 * @return void
 */
function render_migration_message(
    string $table,
    string $last_query,
    array $errors
): void {
    $ci = &get_instance();

    $ci->template->loadContent('migration/message', [
        'table'      => $table,
        'last_query' => $last_query,
        'errors'     => $errors,
    ]);
}

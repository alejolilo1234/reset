<?php
/*
Plugin Name: RESET Plugin
Plugin URI: http://jhonabril.com/
Description: Plugin personalizado para RESET y RESET+.
Version: 1.0.1
Author: Jhon Abril
Author URI: http://jhonabril.com
License: A "Slug" license name e.g. GPL2
*/


function activate_plugin_crm() {

}

function deactivate_plugin_crm() {

}

function create_menu_crm() {
    $parent_slug = plugin_dir_path(__FILE__).'pages/home/index.php';
    add_menu_page(
        'RESET',
        'RESET',
        'manage_options',
        $parent_slug,
        null,
        plugin_dir_url(__FILE__).'public/img/icon.svg',
        '1'
    );

    add_submenu_page(
        $parent_slug,
        'Inicio',
        'Inicio',
        'manage_options',
        $parent_slug,
        null,
        '1'
    );

    add_submenu_page(
        $parent_slug,
        'Miembros',
        'Miembros',
        'manage_options',
        plugin_dir_path(__FILE__).'pages/members/index.php',
        null,
        '2'
    );
}

function enqueue_plugin_code($hook) {
    if(str_contains($hook, 'reset')) {
        // Header y footer

    }
}

add_action('admin_enqueue_scripts','enqueue_plugin_code');
add_action('admin_menu','create_menu_crm');

register_activation_hook(__FILE__,'activate_plugin_crm');
register_deactivation_hook(__FILE__,'deactivate_plugin_crm');
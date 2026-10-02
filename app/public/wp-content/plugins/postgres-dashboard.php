<?php
/*
Plugin Name: PostgreSQL Dashboard
Description: Notre premier plugin.
Version: 1.0
Author: Moi
*/

if (!defined('ABSPATH')) {
    exit;
}

function postgres_dashboard_shortcode() {
    return '<h2>Mon tableau de bord</h2>
            <p>Le plugin fonctionne !</p>';
}

add_shortcode('postgres_dashboard', 'postgres_dashboard_shortcode');
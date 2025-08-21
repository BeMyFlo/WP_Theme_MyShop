<?php
namespace WaterShop;

if ( ! defined( 'ABSPATH' ) ) exit;

class Assets {

    private static $instance = null;

    private function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
    }

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function enqueue() {
        // CSS
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
        wp_enqueue_style('myshop-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
        wp_enqueue_style('myshop-style-customize', get_template_directory_uri() . '/assets/css/style.css', [], wp_get_theme()->get('Version'));

        // JS
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', [], null, true);
        wp_enqueue_script('myshop-js', get_template_directory_uri() . '/assets/js/script.js', [], wp_get_theme()->get('Version'), true);
    }
}

// Khởi tạo Assets
Assets::get_instance();

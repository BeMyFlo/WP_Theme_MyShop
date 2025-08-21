<?php
namespace WaterShop;

if ( ! defined( 'ABSPATH' ) ) exit;

class Setup {

    private static $instance = null;

    private function __construct() {
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_action('init', [$this, 'register_menus']);
    }

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function theme_supports() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
    }

    public function register_menus() {
        register_nav_menus([
            'main-menu' => __('Main Menu', 'watershop'),
            'mobile-menu' => __('Mobile Menu', 'watershop'),
            'vertical-menu' => __('Vertical Menu', 'watershop'),
        ]);
    }
}

Setup::get_instance();
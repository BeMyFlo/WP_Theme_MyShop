<?php
namespace WaterShop;

if ( ! defined( 'ABSPATH' ) ) exit;

final class Theme {

    private static $instance = null;

    private function __construct() {
        $this->load_dependencies();
        $this->init_hooks();
    }

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function load_dependencies() {
        require_once get_template_directory() . '/inc/Setup.php';
        require_once get_template_directory() . '/inc/Assets.php';
    }

    private function init_hooks() {
        Setup::get_instance();
        Assets::get_instance();
    }
}
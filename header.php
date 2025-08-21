<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php var_dump(get_template_directory_uri()); ?>
<header class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php bloginfo('name'); ?>
        </a>

        <!-- Toggle button cho mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ms-auto">
                <?php
                $locations = get_nav_menu_locations();
                $menu_id = $locations['main-menu'] ?? 0;
                $menu_items = wp_get_nav_menu_items($menu_id);

                if ($menu_items) {
                    $parents = [];
                    foreach ($menu_items as $item) {
                        if (!$item->menu_item_parent) {
                            $parents[$item->ID] = $item;
                        }
                    }

                    foreach ($parents as $parent) {
                        // Tìm các menu con
                        $submenu = [];
                        foreach ($menu_items as $item) {
                            if ($item->menu_item_parent == $parent->ID) {
                                $submenu[] = $item;
                            }
                        }

                        if ($submenu) {
                            echo '<li class="nav-item dropdown">';
                            echo '<a class="nav-link dropdown-toggle" href="'.esc_url($parent->url).'" id="menu-'.$parent->ID.'" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                            echo esc_html($parent->title);
                            echo '</a>';
                            echo '<ul class="dropdown-menu" aria-labelledby="menu-'.$parent->ID.'">';
                            foreach ($submenu as $child) {
                                echo '<li><a class="dropdown-item" href="'.esc_url($child->url).'">'.esc_html($child->title).'</a></li>';
                            }
                            echo '</ul>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="'.esc_url($parent->url).'">'.esc_html($parent->title).'</a>';
                            echo '</li>';
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</header>


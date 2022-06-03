<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php get_template_part('template-parts/head'); ?>
</head>

<body <?php body_class("page-body"); ?>>
<div class="wrapper" id="app">
    <div class="content">
        <header class="page-header">
            <div class="page-container">
                <div class="header__wrrap">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"
                       rel="home"><?php bloginfo('name'); ?></a>
                    <div class="nav__wrrap">
                        <nav class="main-nav" role="navigation">
                            <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_class' => 'main-nav__list', 'container' => false)); ?>
                        </nav>
                        <a href="#" class="btn btn-uncolor">Login</a>
                    </div>
                </div>
            </div>
        </header>

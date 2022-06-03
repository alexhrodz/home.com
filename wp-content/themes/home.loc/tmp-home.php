<?php
/*
 * Template Name: Home
 */

get_header(); ?>

    <main id="main" class="page-main">
   <?php
   $image = get_field('main_logo', 'option');
   $size = 'medium'; // (thumbnail, medium, large, full or custom size)
   if( $image ) {
       echo wp_get_attachment_image( $image, $size );
   }
        get_template_part('template-parts/section/section-hero');
        get_template_part('template-parts/section/section-advantages');
        get_template_part('template-parts/section/section-work');
        get_template_part('template-parts/section/section-interface');
        get_template_part('template-parts/section/section-customer');
        get_template_part('template-parts/section/section-testimonial');

        ?>

<!--        --><?php //get_template_part('template-parts/section/congratulations'); ?>
<!--        --><?php //get_template_part('template-parts/section/health-benefits'); ?>
<!--        --><?php //get_template_part('template-parts/section/s-sing-up'); ?>
<!--        --><?php //get_template_part('template-parts/section/quotes'); ?>
<!--        --><?php //get_template_part('template-parts/section/services'); ?>
    </main>

<?php get_footer(); ?>
<?php

?>

<section class="section-testimonial">
    <div class="page-container">
        <div class="section-testimonial__wrap">

            <div class="section-testimonial__items">
                <div class="section_testimonial_slider">
                    <?php
                    // задаем нужные нам критерии выборки данных из БД
                    $args = array(
                        'posts_per_page' => 3,
                        'post_type' => 'testimonials'

                    );
                    $query = new WP_Query($args);
                    // Цикл
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="section-testimonial__item">
                                <i class="fa-solid fa-quote-left"></i>
                                <p class="testimonial__text">
                                    <?php the_field('testimonial_text', $testimonials_id); ?>
                                </p>
                                <div class="testimonial__img">
                                    <img src="<?php echo get_the_post_thumbnail_url($testimonials_id, 'large'); ?>" alt="">
                                </div>
                                <span class="testimonial__avtor">
                                    <?php the_field('testimonial_avtor', $testimonials_id); ?>
                                </span>
                                <span class="testimonial__position">
                                    <?php the_field('testimonial_avtor_position', $testimonials_id); ?>
                                </span>
                            </div>
                            <?php
                        }
                    } else {
                        // Постов не найдено
                    }
                    // Возвращаем оригинальные данные поста. Сбрасываем $post.
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
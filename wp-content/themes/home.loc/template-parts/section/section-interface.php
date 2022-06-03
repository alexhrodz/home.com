<?php
$interface_item = get_field('interface_section_slider_item');
$interface_title = get_field('interface_section_title');
?>

<section class="s-interface">
    <div class="page-container">
        <div class="s-interface__wrap">

            <?php if ($interface_title) : ?>
                <div class="s-advantages__title title">
                    <?php echo $interface_title; ?>
                </div>
            <?php endif; ?>

            <div class="s-interface__items">
                <div class="interface_section_slider">
                    <?php
                    // задаем нужные нам критерии выборки данных из БД
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'integrations'

                    );
                    $query = new WP_Query($args);
                    // Цикл
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="s-interface__item">
                                <a href="<?php the_field('integrationscat_link', $integrations_id); ?>" target="_blank">
                                    <img src="<?php echo get_the_post_thumbnail_url($integrations_id, 'large'); ?>"
                                         alt="<?php the_title(); ?>">
                                </a>
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
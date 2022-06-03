<?php
$interface_item = get_field('interface_section_slider_item');
$customer_title = get_field('section_customer_title');
?>

<section class="section-customer">
    <div class="page-container">
        <div class="section-customer__wrap">

            <?php if ($customer_title) : ?>
                <div class="section-customer__title title">
                    <?php echo $customer_title; ?>
                </div>
            <?php endif; ?>

            <div class="section-customer__items">
                <div class="section_customer_slider">
                    <?php
                    // задаем нужные нам критерии выборки данных из БД
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'customers'

                    );
                    $query = new WP_Query($args);
                    // Цикл
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="section-customer__item">
                                <a href="<?php the_field('integrationscat_link', $customers_id); ?>" target="_blank">
                                    <img src="<?php echo get_the_post_thumbnail_url($customers_id, 'large'); ?>"
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
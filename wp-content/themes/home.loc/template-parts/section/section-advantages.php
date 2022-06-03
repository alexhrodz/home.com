<?php
$advantages_items = get_field('advantages_section_items');
$advantages_title = get_field('advantages_section_title');
?>

<section class="s-advantages">
    <div class="page-container">
        <div class="s-advantages__wrap">

            <?php if ($advantages_title) : ?>
                <h2 class="s-advantages__title title">
                    <?php echo $advantages_title; ?>
                </h2>
            <?php endif; ?>

            <div class="s-advantages__items">
                <?php
                if (have_rows('advantages_section_items')):
                    while (have_rows('advantages_section_items')) : the_row(); ?>
                        <div class="s-advantages__item">
                            <div class="s-advantages__img">
                                <img src="<?php the_sub_field('img'); ?>" alt="">
                            </div>
                            <h4><?php the_sub_field('title'); ?></h4>
                            <p><?php the_sub_field('text'); ?></p>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');
$hero_btn_link = get_field('hero_button_link');
$hero_btn_txt = get_field('hero_button_text');
?>

<section class="s-hero-home section-hero">
    <div class="page-container">
        <div class="s-hero-home__wrap">
            <?php if ($hero_title) : ?>
                <h1 class="s-hero-home__title title">
                    <?php echo $hero_title; ?>
                </h1>
            <?php endif; ?>

            <?php if ($hero_description) : ?>
                <p class="s-hero-home__desc">
                    <?php echo $hero_description; ?>
                </p>
            <?php endif; ?>

<!--            <a href="--><?php //echo $hero_btn_link; ?><!--">-->
<!--                --><?php //if ($hero_btn_txt) : ?>
<!--                    <div class="s-hero-home__btn-wrap btn btn-color">-->
<!--                        --><?php //echo $hero_btn_txt; ?>
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--            </a>-->

            <?php
            if( $hero_btn_link ):
                $link_url = $hero_btn_link['url'];
                $link_title = $hero_btn_link['title'];
                $link_target = $hero_btn_link['target'] ? $hero_btn_link['target'] : '_self';
                ?>
                <a class="s-hero-home__btn-wrap btn btn-color" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>


        </div>
    </div>
</section>
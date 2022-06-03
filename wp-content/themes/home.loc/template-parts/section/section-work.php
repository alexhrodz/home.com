<?php
$work_title = get_field('work_section_title');

?>

<section class="s-work">
    <div class="page-container">
        <div class="s-work__wrap">

            <?php if ($work_title) : ?>
                <h2 class="s-work__title title">
                    <?php echo $work_title; ?>
                </h2>
            <?php endif; ?>

            <?php
            $i = 1;
            while ($i <= 3):
                $group_name = 'work_section_item_' . $i;
                $work_section_item = get_field($group_name);
                ?>
                <div class="s-work__item">

                    <div>
                        <h3><?php echo $work_section_item['tittle']; ?></h3>
                        <p><?php echo $work_section_item['text']; ?></p>
                    </div>
                    <div>
                        <img src="<?php echo $work_section_item['img']; ?>" alt="">
                    </div>

                </div>
                <?php
                $i++;
            endwhile;
            ?>
            <a href="#">
                <div class="btn btn-color s-work__btn-wrap">
                    Learn more
                </div>
            </a>
        </div>
    </div>
</section>
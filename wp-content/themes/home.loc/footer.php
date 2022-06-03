        </div>
        <!--close content class tag-->
        <footer class="page-footer" role="contentinfo">
            <div class="section-footer">
                <div class="footer__wrrap page-container">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home"><?php bloginfo( 'name' ); ?></a>
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_class' => 'main-nav__list', 'container' => false ) ); ?>
                </div>
                <div class="footer__copyright">
                    <div class="page-footer__inner page-container">
                        <p class="copyright">&copy; <?php echo date("Y"); ?> All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--close wrapper class tag-->
<?php wp_footer(); ?>

</body>
</html>

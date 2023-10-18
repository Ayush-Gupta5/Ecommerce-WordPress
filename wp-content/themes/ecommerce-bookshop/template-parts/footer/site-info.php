<?php
/**
 * Displays footer site info
 *
 * @package Ecommerce Bookshop
 * @subpackage ecommerce_bookshop
 */

?>
<div class="site-info">
    <div class="container">
        <p><?php ecommerce_bookshop_credit();?> <?php echo esc_html(get_theme_mod('author_writer_footer_text',__('By Themespride','ecommerce-bookshop'))); ?></p>
    </div>
</div>

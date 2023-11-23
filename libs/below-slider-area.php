<?php if(is_active_sidebar('under-header-image-sidebar')): ?>
<div id="kt-below-slider">
 <div class="container">
        <div class="row">
        <div class="col-md-12">
            <?php if ( ! dynamic_sidebar( 'under-header-image-sidebar' ) ) : ?>
            <div class="pre-widget">
                    <h3><?php _e('Widgetized Sidebar', 'business-card'); ?></h3>
                    <p><?php _e('This panel is active and ready for you to add 
                    some widgets via the WP Admin', 'business-card'); ?></p>
            </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>
<?php endif; ?>
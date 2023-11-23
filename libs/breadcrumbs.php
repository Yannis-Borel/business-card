<div id="kt-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php if(is_search()): ?>
            <div id="kt-breadcrumb-container">
                    <a href="<?php echo esc_url(home_url()); ?>">
                    <?php _e('Home','business-card');?> </a>/
                    <?php echo __('Search Results','business-card');?>
            </div>
            <?php elseif(is_day() || is_month() || is_year()): ?>
            <div id="kt-breadcrumb-container">
                    <a href="<?php echo esc_url(home_url()); ?>"><?php _e('Home','business-card');?> </a>/
                    <?php echo get_the_date('M Y');?>
            </div>
            <?php else:?>
                <div id="kt-breadcrumb-container">
                    <a href="<?php echo esc_url(home_url()); ?>"><?php _e('Home','business-card');?> </a>/ <?php echo single_cat_title();?>
                </div>
            <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="icon" href="<?php if(of_get_option('favicon_upload','') != ''): echo esc_url_raw(of_get_option('favicon_upload','')); endif; ?> " type="image/x-icon">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Top Bar Area ends here-->
<div id="kt-logo-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4" id="kt-logo">
                <a href="<?php echo esc_url(home_url()); ?>" title="<?php the_title_attribute(); ?>">
                <?php echo get_bloginfo('title');?>
                </a>
            </div>
            <div class="col-md-8" id="kt-main-nav">
            <?php $menu_args =  array('theme_location'=>'primary',
                                      'menu_container'=>false,
                                      'menu_class'=>'main-menu',
                                      'menu_id'=>false); 
            wp_nav_menu($menu_args);                           
            ?>
            </div>
        </div>
    </div>
</div>
<?php if (get_header_image() != ''){    ?>
    <img class="img-responsive" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
<?php } ?>
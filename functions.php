<?php 
/***
*
OPTIONS -  This code works with the Options Framework Plugin
*
***/
if ( !function_exists('of_get_option')) {
function of_get_option($name, $default = false) {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    
    if ( get_option($option_name) ) {
        $options = get_option($option_name);
    }
        
    if ( isset($options[$name]) ) {
        return $options[$name];
    } else {
        return $default;
    }
}
} 
/***
*
TGM PLUGIN ACTIVATION
*
***/
require_once('libs/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'businesscard_register_recommended_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function businesscard_register_recommended_plugins() {
 
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'      => 'Options Framework',
            'slug'      => 'options-framework',
            'required'  => false,
        ),
        array(
            'name'      => 'Bootstrap 3 Shortcodes',
            'slug'      => 'bootstrap-3-shortcodes',
            'required'  => false,
        ),
        array(
            'name'      => 'Ketchup Shortcodes',
            'slug'      => 'ketchup-shortcodes-pack',
            'required'  => false,
        )

    );
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'business-card' ),
            'menu_title'                      => __( 'Install Plugins', 'business-card' ),
            'installing'                      => __( 'Installing Plugin: %s', 'business-card' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'business-card' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','business-card' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','business-card' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','business-card' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','business-card' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','business-card' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','business-card' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','business-card' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','business-card' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','business-card' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','business-card' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'business-card' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'business-card' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'business-card' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
}
/***
*
THEME SETUP
*
***/
function businesscard_theme_setup(){
    
        // Set $content_width
        if (!isset( $content_width ))
        $content_width = 575;
         // Load Background
        $ketchupthemes_background_args = array(
        'default-color' => 'ffffff',
        'default-image' => get_template_directory_uri() . '/img/bg.png',
        'wp-head-callback' => 'businesscard_custom_background_cb',
        );
        add_theme_support( 'custom-background', $ketchupthemes_background_args );
        add_editor_style( 'style.css' );
        //Load Header
        $ketchupthemes_header_defaults = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => '1920',
        'height'                 => '450',
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => false,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
        );
        add_theme_support('title-tag');
        add_theme_support( 'custom-header', $ketchupthemes_header_defaults );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );     
        register_nav_menu( 'primary', __('Main Menu','business-card') );
        load_theme_textdomain('business-card', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'businesscard_theme_setup');
function businesscard_custom_background_cb() {
  $background = set_url_scheme( get_background_image() );
  $color = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );

  if ( ! $background && ! $color )
    return;

  $style = $color ? "background-color: #$color;" : '';

  if ( $background ) {
    $image = " background-image: url('$background');";

    $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
    if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
      $repeat = 'repeat';
    $repeat = " background-repeat: $repeat;";

    $position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
    if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
      $position = 'left';
    $position = " background-position: top $position;";

    $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
    if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
      $attachment = 'scroll';
    $attachment = " background-attachment: $attachment;";

    $style .= $image . $repeat . $position . $attachment;
  }
?>
<style type="text/css" id="custom-background-css">
body.custom-background { <?php echo trim( $style ); ?> }
</style>
<?php
}
/***
*
LOAD CSS AND JS STYLES
*
***/
    function businesscard_load_scripts() {
   
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'',true);
        wp_enqueue_script('slicknav',get_template_directory_uri().'/js/jquery.slicknav.min.js',array('jquery'),'',true);
        wp_enqueue_script('cycle2',get_template_directory_uri().'/js/cycle2.js',array('jquery'),'',true);
        wp_enqueue_script('init',get_template_directory_uri().'/js/init.js',array('jquery'),'',true);
        
        wp_localize_script('init', 'init_vars', array(
            'label' => __('Menu', 'business-card')
        ));

    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
    }
    add_action('wp_enqueue_scripts', 'businesscard_load_scripts');
   
   
    function businesscard_load_styles()
    { 
        wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css','','','all' );
        wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri().'/css/bootstrap-theme.min.css','','','all' );
        wp_enqueue_style( 'slicknav',get_template_directory_uri().'/css/slicknav.css','','','all');
        wp_enqueue_style( 'elegant-font',get_template_directory_uri().'/fonts/elegant_font/HTML_CSS/style.css','','','all');
        wp_enqueue_style( 'style', get_stylesheet_uri(),'','','all' );
    }    
    add_action('wp_enqueue_scripts', 'businesscard_load_styles');
   
    function businesscard_add_ie_html5_shim () {
        echo '<!--[if lt IE 9]>';
        echo '<script src="'.get_template_directory_uri().'/js/html5shiv.js"></script>';
        echo '<![endif]-->';
    }
    add_action('wp_head', 'businesscard_add_ie_html5_shim');
/***
*
SIDEBARS INITIALIZATION
*
***/
function businesscard_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Sidebar', 'business-card' ),
        'id'   => 'sidebar',
        'description' => __('This is the widgetized sidebar.', 'business-card' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Under Header Sidebar', 'business-card' ),
        'id'   => 'under-header-image-sidebar',
        'description' => __('This is the widgetized sidebar under the header image.', 'business-card' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Left footer Sidebar', 'business-card' ),
        'id'   => 'footer-sidebar-1',
        'description' => __('This is the widgetized sidebar.', 'business-card' ),
        'before_widget' => '<div id="%1$s" class="footerwidget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Right Footer Sidebar', 'business-card' ),
        'id'   => 'footer-sidebar-2',
        'description' => __('This is the widgetized sidebar.', 'business-card' ),
        'before_widget' => '<div id="%1$s" class="footerwidget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
    }
add_action( 'widgets_init', 'businesscard_widgets_init' );
/***
*
THEME FUNCTIONS
*
***/
function businesscard_wp_title($title,$sep){

    global $page, $paged;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    if ( $paged >= 2 || $page >= 2 )
        
        $title = "$title $sep " . sprintf( __( 'Page %s', 'business-card' ), max( $paged, $page ) );
        
        return $title;
}
add_filter( 'wp_title', 'businesscard_wp_title', 10, 2 );
    
function businesscard_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'businesscard_excerpt_length', 999 );

function businesscard_disable_featured_image(){
    $is_enabled = false;
    if(of_get_option('disabled_featured_image') == 'yes'):
    $is_enabled = false;
    else:
    $is_enabled = true;
    endif;
    
    return $is_enabled;
}
function businesscard_show_below_header_background(){
    $html = '';
    if(of_get_option('under_header_sidebar_color','#ffffff') != '#ffffff'):
    
    $bg =  of_get_option('under_header_sidebar_color','#ffffff');
    $fontcolor = of_get_option('under_header_sidebar_font_color','#000000');
    $html .= '<style>';
    $html .= ' #kt-below-slider{';
    $html .= 'background:'.$bg.';';
    $html .= 'color:'.$fontcolor.';';
    $html .= '</style>';
    
    echo $html;
    endif;
}
add_action('wp_head','businesscard_show_below_header_background');

/***
*
METABOXES
*
***/
$prefix = 'businesscard_';
$meta_box = array(
    'id' => 'disable-title-metabox',
    'title' => __('Page Metabox','business-card'),
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Disable the title','business-card'),
            'id' => $prefix.'disable-title',
            'type' => 'radio',
            'std' =>'Yes',
            'options' => array(
                array('name' => __('Enable','business-card'), 'value' => 'No'),
                array('name' => __('Disable','business-card'), 'value' => 'Yes')
            )
        )
    )
);
add_action('admin_menu', 'businesscard_add_metabox');
// Add meta box
function businesscard_add_metabox() {
    global $meta_box;
    add_meta_box($meta_box['id'], $meta_box['title'], 'businesscard_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}
function businesscard_show_box() {
    global $meta_box, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta(get_the_ID(), $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">'.$field['name'].'</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"',checked($meta,$option['value'])  , ' />',$option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '</td><td>',
            '</td></tr>';
    }
    echo '</table>';
}
add_action('save_post', 'businesscard_save_data');
function businesscard_save_data($post_id) {
    global $meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
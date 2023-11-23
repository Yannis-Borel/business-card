<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => __('Basic Options', 'business-card'),
		'type' => 'heading');
        
    $options[] = array(
        'name' => __('Premium Features', 'business-card'),
        'desc' => __('<ul>
        
        <li>Upload Logo</li>
        <li>Slider (enable/disable title & description)</li>
        <li>Testimonials</li>
        <li>Google Fonts</li>
        <li>Color Picker</li>
        <li>Opening Hours</li>
        <li>Jet Pack </li>
        <li>Gallery</li>
        <li>1-4 Columns Widgetized Footer Sidebar</li>
        </ul>
        <p>
        <a rel="nofollow" href="'.esc_url( __( 'http://www.ketchupthemes.com/business-card/', 'business-card')).'" style="background:red; padding:10px 20px; color:#ffffff; margin-top:10px; text-decoration:none;">Update to Premium</a></p>'),
        'type' => 'info');

	$options[] = array(
		'name' => __('Favicon Upload', 'business-card'),
		'desc' => __('Upload Your Favicon icon here. Please upload a 16x16 icon.', 'business-card'),
		'id' => 'favicon_upload',
		'type' => 'upload');
        
               
    $options[] = array(
        'name' => __('Under Header Sidebar Background', 'business-card'),
        'desc' => __('By default is #ffffff(white).', 'business-card'),
        'id' => 'under_header_sidebar_color',
        'std' => '#ffffff',
        'type' => 'color' );
        
    $options[] = array(
        'name' => __('Under Header Sidebar Color', 'business-card'),
        'desc' => __('By default is #000000(black).', 'business-card'),
        'id' => 'under_header_sidebar_font_color',
        'std' => '#000000',
        'type' => 'color' );
        
    $options[] = array(
        'name' => __('Disable all featured images', 'business-card'),
        'desc' => __('Disable all featured images from pages and posts at once.', 'business-card'),
        'id' => 'disabled_featured_image',
        'std' => 'no',
        'type' => 'radio',
        'options' => array('no'=>__('No','business-card'),
                           'yes'=>__('Yes','business-card')
                           ));
        
    $options[] = array(
        'name' => __('Footer Sidebars', 'business-card'),
        'desc' => __('Select Footer Sidebars Number.', 'business-card'),
        'id' => 'footer_sidebars_number',
        'std' => '1',
        'type' => 'radio',
        'options' => array('1'=>__('1','business-card'),
                           '2'=>__('2','business-card')
                           ));

	return $options;
}
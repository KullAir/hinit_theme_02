<?php


function fb_iframe_shortcode( $atts, $content = null ) {
	global $wp;
	$current_url = home_url( add_query_arg( array(), $wp->request ) );
	
	return '<div class="fb_like_frame"><iframe src="https://www.facebook.com/plugins/like.php?href='.$current_url.'%2F&width=96&layout=button&action=like&size=small&show_faces=true&share=true&height=65&appId=360553860641770" width="100px" height="40px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>';
}

add_shortcode( 'like_buttons', 'fb_iframe_shortcode' );



function social_buttons_shortcode($atts, $content = null ) {


	$linkedin = get_option('linkedin_url');
	$facebook = get_option('facebook_url');
    $insta = get_option('instegram_url');
    $email =  get_option('contact_email_thmee_opt');
	$phone =  get_option('contact_phone_thmee_opt');
    


	$content = '<div id="social_buttons">';

	if ($linkedin){
		$content .= '<a href="'.$linkedin .'" target="_blank" class="linkedin-link" ><i class="fa fa-linkedin"></i><span class="sr-only">'.__('פרופיל הלינקאין').'</sapn></a>';
	}

    if ($insta ){
		$content .= '<a href="'.$insta.'" target="_blank" class="insta-link"><i class="fa fa-instagram"></i><span class="sr-only">'.__('עמוד האינסטגרם').'</sapn></a>';
	}
		
	if( $facebook) {
		$content .= '<a href="'.$facebook.'" target="_blank" class="facebook-link" ><i class="fa fa-facebook-f" aria-hidden="true"></i><span class="sr-only">'.__('לעמוד הפייסבוק').'</sapn></a>';
	}


	// fa-envelope-o 
	if ($email ){
	    $content .= '<a href="mailto:'.$email.'" target="_blank"><i class="fa fa-at"></i><span class="sr-only">'.__('שליחת מייל').'</sapn></a>';
    }

	if ($phone ){
	    $content .= '<a href="tel:'.$phone.'" target="_blank"><i class="fa fa-mobile"></i><span class="sr-only">'.__('חיוג למספר').'</sapn></a>';
    }
    
    //$content .= '<a href="https://www.flickr.com/photos/ido/albums" target="_blank"><i class="fa fa-flickr"></i><span class="sr-only">'.__('עמוד הפליקר').'</sapn></a>';
	
	
	$content .= '</div>';
    return $content;
}


add_shortcode( 'social_buttons', 'social_buttons_shortcode' );

function short_social_links() {


	$linkedin = get_option('linkedin_url');
	$facebook = get_option('facebook_url');
	$insta = get_option('instegram_url');
   
	$content = '<div class="social_buttons short_social">';
    
	if ($linkedin){
		$content .= '<a href="'.$linkedin .'" target="_blank" class="linkedin-link"><i class="fa fa-linkedin"></i><span class="sr-only">'.__('פרופיל הלינקאין').'</sapn></a>';
	}

	if ($insta ){
		$content .= '<a href="'.$insta.'" target="_blank" class="insta-link"><i class="fa fa-instagram"></i><span class="sr-only">'.__('עמוד האינסטגרם').'</sapn></a>';
	}
	
	if( $facebook) {
		$content .= '<a href="'.$facebook.'" target="_blank" class="facebook-link" ><i class="fa fa-facebook-f" aria-hidden="true"></i><span class="sr-only">'.__('לעמוד הפייסבוק').'</sapn></a>';
	}
    	
	$content .= '</div>';
    return $content;
}


add_shortcode( 'social_buttons_short', 'short_social_links' );

function footer_social(){
	echo short_social_links();
}


/*******************************************
*
*
*   Adding Admin Menu for Social Links
*	https://blog.templatetoaster.com/wordpress-settings-api-creating-theme-options/
*
*
********************************************/

//add new menu for theme-options page with page callback theme-options-page.
function add_social_setting_page() {
	add_theme_page( "Social Link Setting", "Social Link Setting", "manage_options", "social-setting", "theme_option_page", null, 99);

}
add_action( 'admin_menu', 'add_social_setting_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	
	?>
	<div class="wrap">
		<h1>Social Link Setting</h1>
		<form method="post" action="options.php">
			<?php
			// display settings field on theme-option page
			settings_fields("theme-options-grp");

			// display all sections for theme-options page
			do_settings_sections("analytics_code_setting");
			



			// display settings field on theme-option page
				settings_fields("theme-options-grp");

			// display all sections for theme-options page
				do_settings_sections("social-setting");
				submit_button();
			?>

		<?php
		?>
		</form>
		</div>
	<?php
}

function theme_section_description(){
		echo '<p>'.__('Set the links of scoial buttons: Fiil in your fackebook page, Instegram page and so on').'</p>';
}

function theme_analytics_section_description(){
	echo '<p>'.__('Enter your Google Analytics').'</p>';
}


//admin-init hook to create settings section with title “New Theme Options Section”.
function test_theme_settings(){

	add_settings_section( 'analytics_code_section', 'Code for Analytics',
	'theme_analytics_section_description','analytics_code_setting');

	add_settings_field('analytics_code', 'Analytics Code', 'display_analytics_code_element', 'analytics_code_setting', 'analytics_code_section');
	register_setting( 'theme-options-grp', 'analytics_code');


	add_settings_section( 'social_link_section', 'Links for Social Buttons',
    'theme_section_description','social-setting');

	/* Phone Option*/
	add_settings_field('contact_phone_thmee_opt', 'Full phone number include cuntry code', 'display_phone_element', 'social-setting', 'social_link_section');
	register_setting( 'theme-options-grp', 'contact_phone_thmee_opt');
    
    add_settings_field('contact_email_thmee_opt', 'Email for contact by email button', 'display_email_element', 'social-setting', 'social_link_section');
	register_setting( 'theme-options-grp', 'contact_email_thmee_opt');

	add_settings_field('facebook_url', 'Facebook Page Url', 'display_facebook_element', 'social-setting', 'social_link_section');
	register_setting( 'theme-options-grp', 'facebook_url');

	add_settings_field('linkedIn_url', 'Linkedin Page Url', 'display_linkedin_element', 'social-setting', 'social_link_section');
	register_setting( 'theme-options-grp', 'linkedin_url');

	add_settings_field('instagram_url', 'Instagram Page Url', 'display_instegram_element', 'social-setting', 'social_link_section');
	register_setting( 'theme-options-grp', 'instegram_url');

}
add_action('admin_init','test_theme_settings');




function display_analytics_code_element(){
	//php code to take input from text field for twitter URL.
	?>
	<input type="text" name="analytics_code" id="analytics_code" value="<?php echo get_option('analytics_code'); ?>" />
	<?php
}


function display_facebook_element(){
	//php code to take input from text field for twitter URL.
	?>
	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
	<?php
}

function display_linkedin_element(){
	//php code to take input from text field for twitter URL.
	?>
	<input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
	<?php
}

function display_instegram_element(){
	//php code to take input from text field for twitter URL.
	?>
	<input type="text" name="instegram_url" id="instegram_url" value="<?php echo get_option('instegram_url'); ?>" />
	<?php
}

function display_email_element(){
	//php code to take input from text field for twitter URL.
	?>
	<input type="email" name="contact_email_thmee_opt" id="contact_email_thmee_opt" value="<?php echo get_option('contact_email_thmee_opt'); ?>" />
	<?php
}


function display_phone_element(){
	//php code to take input from text field for twitter URL.
	?>
	<input type="text" name="contact_phone_thmee_opt" id="contact_phone_thmee_opt" value="<?php echo get_option('contact_phone_thmee_opt'); ?>" />
	<?php
}

<?php 

// ADMIN PAGE 

function sunset_add_admin_page() {

  // Generate Sunset page
  add_menu_page("Sunset theme options", "Sunset", "manage_options", "edward_sunset", "sunset_theme_create_page", get_template_directory_uri() . "/img/sunset-icon.png", 110);
  
  // Generate admin sub pages
  add_submenu_page("edward_sunset", "Sunset Sidebar options", "Sidebar", "manage_options", "edward_sunset", "sunset_theme_create_page");
  add_submenu_page("edward_sunset", "Sunset theme options", "Theme options", "manage_options", "edward_sunset_theme", "sunset_theme_support_page");
  add_submenu_page("edward_sunset", "sunset CSS options", "Custom CSS", "manage_options", "edward_sunset_css", "sunset_theme_settings_page");

  // Activate custom settings
  add_action("admin_init", "sunset_custom_settings");
}

function sunset_custom_settings() {
  // Sidebar options
	register_setting('sunset-settings-group', 'profile_picture' );
  register_setting("sunset-settings-group", "first_name");
  register_setting("sunset-settings-group", "last_name");
  register_setting("sunset-settings-group", "user_description");
  register_setting("sunset-settings-group", "twitter_handler", "sunset_sanitize_twitter_handler");
  register_setting("sunset-settings-group", "facebook_handler");
  register_setting("sunset-settings-group", "gplus_handler");

  add_settings_section("sunset-sidebar-options", "Sidebar options", "sunset_sidebar_options", "edward_sunset");
  
  add_settings_field('sidebar-profile-picture', 'Profile Picture', 'sunset_sidebar_profile', 'edward_sunset', 'sunset-sidebar-options');
  add_settings_field("sidebar-name", "Full Name", "sunset_sidebar_name", "edward_sunset", "sunset-sidebar-options");
  add_settings_field("sidebar-description", "Description", "sunset_sidebar_description", "edward_sunset", "sunset-sidebar-options");
  add_settings_field("sidebar-twitter", "Twitter", "sunset_sidebar_twitter", "edward_sunset", "sunset-sidebar-options");
  add_settings_field("sidebar-facebook", "Facebook", "sunset_sidebar_facebook", "edward_sunset", "sunset-sidebar-options");
  add_settings_field("sidebar-gplus", "Google+", "sunset_sidebar_gplus", "edward_sunset", "sunset-sidebar-options");

  // Theme support
  register_setting("sunset-theme-support", "post_formats", "sunset_posts_formats_callback");

  add_settings_section("sunset-theme-options", "Theme Options", "sunset_theme_options", "edward_sunset_theme");

  add_settings_field("post-formats", "PostFormats", "sunset_post_formats", "edward_sunset_theme", "sunset-theme-options");
}

function sunset_theme_options() {
  echo "Activate/Deactivate";
}

function sunset_post_formats() {
  $options = get_option( 'post_formats' );
  $formats = array("aside", "gallery", "link", "image", "quote", "status", "video", "audio", "chat");
  $output = "";

  foreach ($formats as $format) {
    $checked = @$options[$format] == "1" ? "checked" : "";
    $output .= '
      <label>
        <input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'/>'.$format.'
      </label> <br>
    ';  
  }

  echo $output;
}

function sunset_posts_formats_callback($input) {
  return $input;
}

// Sanitization settings
function sunset_sanitize_twitter_handler($input) {
  $output = sanitize_text_field( $input );
  $output = str_replace("@", "", $output);
  return $output;
}


function sunset_sidebar_profile() {
  $picture = esc_attr( get_option( 'profile_picture' ) );
	echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
}

function sunset_sidebar_facebook() {
  $facebook = esc_attr( get_option('facebook_handler') );
  echo '
    <input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="facebook" />
  ';
}

function sunset_sidebar_description() {
  $description = esc_attr( get_option('user_description') );
  echo '
    <input type="text" name="user_description" value="'.$description.'" placeholder="description" />
  ';
}

function sunset_sidebar_gplus() {
  $gplus = esc_attr( get_option('gplus_handler') );
  echo '
    <input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="gplus" />
  ';
}

function sunset_sidebar_twitter() {
  $twitter = esc_attr( get_option('twitter_handler') );
  echo '
    <input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="twitter" />
  ';
}

function sunset_sidebar_options() {
  echo "customize your sidebar information";
}

function sunset_sidebar_name() {
  $firstName = esc_attr( get_option('first_name') );
  $lastName = esc_attr( get_option('last_name') );
  echo '
    <input type="text" name="first_name" value="'.$firstName.'" placeholder="first name" />
    <input type="text" name="last_name" value="'.$lastName.'" placeholder="last name" />
  ';
}

add_action("admin_menu", "sunset_add_admin_page");

function sunset_theme_create_page() {
  require_once(get_template_directory() . "/inc/templates/sunset-admin.php");
}

function sunset_theme_support_page() {
  require_once(get_template_directory() . "/inc/templates/sunset-theme-support.php");
}

function sunset_theme_settings_page() {
  return 0;
}
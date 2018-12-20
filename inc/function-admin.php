<?php 

// ADMIN PAGE 

function sunset_add_admin_page() {

  // Generate Sunset page
  add_menu_page(
    "Sunset theme options",
    "Sunset",
    "manage_options",
    "edward_sunset",
    "sunset_theme_create_page",
    get_template_directory_uri() . "/img/sunset-icon.png",
    110 
  );

  // Generate admin sub pages
  add_submenu_page(
    "edward_sunset", 
    "Sunset theme options", 
    "General", 
    "manage_options", 
    "edward_sunset", 
    "sunset_theme_settings_page",
    "sunset_theme_create_page"
  );

  add_submenu_page(
    "edward_sunset",
    "sunset CSS options",
    "Custom CSS",
    "manage_options", 
    "edward_sunset_css",
    "sunset_theme_settings_page"
  );

  // Activate custom settings
  add_action("admin_init", "sunset_custom_settings");
}

function sunset_custom_settings() {
  register_setting("sunset-settings-group", "first_name");
  add_settings_section(
    "sunset-sidebar-options", 
    "Sidebar options", 
    "sunset_sidebar_options", 
    "edward_sunset"
  );

  add_settings_field(
    "sidebar-name", 
    "First Name", 
    "sunset_sidebar_name", 
    "edward_sunset",
    "sunset-sidebar-options"
  );
}

function sunset_sidebar_options() {
  echo "customize your sidebar information";
}

function sunset_sidebar_name() {
  $firstName = esc_attr( get_option('first_name') );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="first name" />';
}

add_action("admin_menu", "sunset_add_admin_page");

function sunset_theme_create_page() {
  require_once(get_template_directory() . "/inc/templates/sunset-admin.php");
}

function sunset_theme_settings_page() {
  return 0;
}
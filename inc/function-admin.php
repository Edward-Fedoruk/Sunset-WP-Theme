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

}

add_action("admin_menu", "sunset_add_admin_page");

function sunset_theme_create_page() {
  echo "<h1>Sunset Theme Options</h1>";
}

function sunset_theme_settings_page() {
  return 0;
}
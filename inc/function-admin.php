<?php 

// ADMIN PAGE 

function sunset_add_admin_page() {

  add_menu_page(
    "Sunset theme options",
    "Sunset",
    "manage_options",
    "edward_sunset",
    "sunset_theme_create_page",
    get_template_directory_uri() . "/img/sunset-icon.png",
    110 
  );
}

add_action("admin_menu", "sunset_add_admin_page");

function sunset_theme_create_page() {
  echo "<h1>Sunset Theme Options</h1>";
}
<h1>Sunset Theme Support</h1>
<?php settings_errors(); ?>
<?php 
	
	// $picture = esc_attr( get_option( 'profile_picture' ) );
  
?>



<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( "sunset-contact-options" ); ?>
	<?php do_settings_sections( "edward_sunset_theme_contact" ); ?>
	<?php submit_button(); ?>
</form>
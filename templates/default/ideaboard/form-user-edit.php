<?php

/**
 * IdeaBoard User Profile Edit Part
 *
 * @package IdeaBoard
 * @subpackage Theme
 */

?>

<form id="ideaboard-your-profile" action="<?php ideaboard_user_profile_edit_url( ideaboard_get_displayed_user_id() ); ?>" method="post" enctype="multipart/form-data">

	<h2 class="entry-title"><?php _e( 'Name', 'ideaboard' ) ?></h2>

	<?php do_action( 'ideaboard_user_edit_before' ); ?>

	<fieldset class="ideaboard-form">
		<legend><?php _e( 'Name', 'ideaboard' ) ?></legend>

		<?php do_action( 'ideaboard_user_edit_before_name' ); ?>

		<div>
			<label for="first_name"><?php _e( 'First Name', 'ideaboard' ) ?></label>
			<input type="text" name="first_name" id="first_name" value="<?php ideaboard_displayed_user_field( 'first_name', 'edit' ); ?>" class="regular-text" tabindex="<?php ideaboard_tab_index(); ?>" />
		</div>

		<div>
			<label for="last_name"><?php _e( 'Last Name', 'ideaboard' ) ?></label>
			<input type="text" name="last_name" id="last_name" value="<?php ideaboard_displayed_user_field( 'last_name', 'edit' ); ?>" class="regular-text" tabindex="<?php ideaboard_tab_index(); ?>" />
		</div>

		<div>
			<label for="nickname"><?php _e( 'Nickname', 'ideaboard' ); ?></label>
			<input type="text" name="nickname" id="nickname" value="<?php ideaboard_displayed_user_field( 'nickname', 'edit' ); ?>" class="regular-text" tabindex="<?php ideaboard_tab_index(); ?>" />
		</div>

		<div>
			<label for="display_name"><?php _e( 'Display Name', 'ideaboard' ) ?></label>

			<?php ideaboard_edit_user_display_name(); ?>

		</div>

		<?php do_action( 'ideaboard_user_edit_after_name' ); ?>

	</fieldset>

	<h2 class="entry-title"><?php _e( 'Contact Info', 'ideaboard' ) ?></h2>

	<fieldset class="ideaboard-form">
		<legend><?php _e( 'Contact Info', 'ideaboard' ) ?></legend>

		<?php do_action( 'ideaboard_user_edit_before_contact' ); ?>

		<div>
			<label for="url"><?php _e( 'Website', 'ideaboard' ) ?></label>
			<input type="text" name="url" id="url" value="<?php ideaboard_displayed_user_field( 'user_url', 'edit' ); ?>" class="regular-text code" tabindex="<?php ideaboard_tab_index(); ?>" />
		</div>

		<?php foreach ( ideaboard_edit_user_contact_methods() as $name => $desc ) : ?>

			<div>
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo apply_filters( 'user_' . $name . '_label', $desc ); ?></label>
				<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php ideaboard_displayed_user_field( $name, 'edit' ); ?>" class="regular-text" tabindex="<?php ideaboard_tab_index(); ?>" />
			</div>

		<?php endforeach; ?>

		<?php do_action( 'ideaboard_user_edit_after_contact' ); ?>

	</fieldset>

	<h2 class="entry-title"><?php ideaboard_is_user_home_edit() ? _e( 'About Yourself', 'ideaboard' ) : _e( 'About the user', 'ideaboard' ); ?></h2>

	<fieldset class="ideaboard-form">
		<legend><?php ideaboard_is_user_home_edit() ? _e( 'About Yourself', 'ideaboard' ) : _e( 'About the user', 'ideaboard' ); ?></legend>

		<?php do_action( 'ideaboard_user_edit_before_about' ); ?>

		<div>
			<label for="description"><?php _e( 'Biographical Info', 'ideaboard' ); ?></label>
			<textarea name="description" id="description" rows="5" cols="30" tabindex="<?php ideaboard_tab_index(); ?>"><?php ideaboard_displayed_user_field( 'description', 'edit' ); ?></textarea>
		</div>

		<?php do_action( 'ideaboard_user_edit_after_about' ); ?>

	</fieldset>

	<h2 class="entry-title"><?php _e( 'Account', 'ideaboard' ) ?></h2>

	<fieldset class="ideaboard-form">
		<legend><?php _e( 'Account', 'ideaboard' ) ?></legend>

		<?php do_action( 'ideaboard_user_edit_before_account' ); ?>

		<div>
			<label for="user_login"><?php _e( 'Username', 'ideaboard' ); ?></label>
			<input type="text" name="user_login" id="user_login" value="<?php ideaboard_displayed_user_field( 'user_login', 'edit' ); ?>" disabled="disabled" class="regular-text" tabindex="<?php ideaboard_tab_index(); ?>" />
		</div>

		<div>
			<label for="email"><?php _e( 'Email', 'ideaboard' ); ?></label>

			<input type="text" name="email" id="email" value="<?php ideaboard_displayed_user_field( 'user_email', 'edit' ); ?>" class="regular-text" tabindex="<?php ideaboard_tab_index(); ?>" />

			<?php

			// Handle address change requests
			$new_email = get_option( ideaboard_get_displayed_user_id() . '_new_email' );
			if ( !empty( $new_email ) && $new_email !== ideaboard_get_displayed_user_field( 'user_email', 'edit' ) ) : ?>

				<span class="updated inline">

					<?php printf( __( 'There is a pending email address change to <code>%1$s</code>. <a href="%2$s">Cancel</a>', 'ideaboard' ), $new_email['newemail'], esc_url( self_admin_url( 'user.php?dismiss=' . ideaboard_get_current_user_id()  . '_new_email' ) ) ); ?>

				</span>

			<?php endif; ?>

		</div>

		<div id="password">
			<label for="pass1"><?php _e( 'New Password', 'ideaboard' ); ?></label>
			<fieldset class="ideaboard-form password">
				<input type="password" name="pass1" id="pass1" size="16" value="" autocomplete="off" tabindex="<?php ideaboard_tab_index(); ?>" />
				<span class="description"><?php _e( 'If you would like to change the password type a new one. Otherwise leave this blank.', 'ideaboard' ); ?></span>

				<input type="password" name="pass2" id="pass2" size="16" value="" autocomplete="off" tabindex="<?php ideaboard_tab_index(); ?>" />
				<span class="description"><?php _e( 'Type your new password again.', 'ideaboard' ); ?></span><br />

				<div id="pass-strength-result"></div>
				<span class="description indicator-hint"><?php _e( 'Your password should be at least ten characters long. Use upper and lower case letters, numbers, and symbols to make it even stronger.', 'ideaboard' ); ?></span>
			</fieldset>
		</div>

		<?php do_action( 'ideaboard_user_edit_after_account' ); ?>

	</fieldset>

	<?php if ( current_user_can( 'edit_users' ) && ! ideaboard_is_user_home_edit() ) : ?>

		<h2 class="entry-title"><?php _e( 'User Role', 'ideaboard' ) ?></h2>

		<fieldset class="ideaboard-form">
			<legend><?php _e( 'User Role', 'ideaboard' ); ?></legend>

			<?php do_action( 'ideaboard_user_edit_before_role' ); ?>

			<?php if ( is_multisite() && is_super_admin() && current_user_can( 'manage_network_options' ) ) : ?>

				<div>
					<label for="super_admin"><?php _e( 'Network Role', 'ideaboard' ); ?></label>
					<label>
						<input class="checkbox" type="checkbox" id="super_admin" name="super_admin"<?php checked( is_super_admin( ideaboard_get_displayed_user_id() ) ); ?> tabindex="<?php ideaboard_tab_index(); ?>" />
						<?php _e( 'Grant this user super admin privileges for the Network.', 'ideaboard' ); ?>
					</label>
				</div>

			<?php endif; ?>

			<?php ideaboard_get_template_part( 'form', 'user-roles' ); ?>

			<?php do_action( 'ideaboard_user_edit_after_role' ); ?>

		</fieldset>

	<?php endif; ?>

	<?php do_action( 'ideaboard_user_edit_after' ); ?>

	<fieldset class="submit">
		<legend><?php _e( 'Save Changes', 'ideaboard' ); ?></legend>
		<div>

			<?php ideaboard_edit_user_form_fields(); ?>

			<button type="submit" tabindex="<?php ideaboard_tab_index(); ?>" id="ideaboard_user_edit_submit" name="ideaboard_user_edit_submit" class="button submit user-submit"><?php ideaboard_is_user_home_edit() ? _e( 'Update Profile', 'ideaboard' ) : _e( 'Update User', 'ideaboard' ); ?></button>
		</div>
	</fieldset>

</form>
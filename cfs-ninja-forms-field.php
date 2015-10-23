<?php

class cfs_ninja_forms_field extends cfs_field {
	function __construct() {
		$this->name  = 'ninja_forms_field';
		$this->label = __( 'Ninja Forms Selector', 'cfsnfs' );
	}

	function html( $field ) {

		// Simple check to make sure Ninja Forms in fact exists.
		if ( ! class_exists( 'Ninja_Forms' ) ) {
			?>

			<p>Please make sure the Ninja Forms plugin is installed and active.</p>

			<?php
			return;
		}

		$ninja_forms_listing = Ninja_Forms()->forms()->get_all();
		?>

		<select name="<?php esc_attr_e( $field->input_name ); ?>" name="<?php esc_attr_e( $field->input_class ); ?>">
			<option value="0">None</option>

			<?php // Output available forms as options
			foreach ( $ninja_forms_listing as $form_id ) :
				$form_title = Ninja_Forms()->form( $form_id )->get_setting( 'form_title' );
				$selected = in_array( $form_id, (array) $field->value ) ? ' selected' : '';
				?>

				<option value="<?php esc_attr_e( $form_id ); ?>"<?php echo $selected; ?>><?php esc_attr_e( $form_title ); ?></option>

			<?php endforeach; ?>

		</select>
		<?php
	}
}
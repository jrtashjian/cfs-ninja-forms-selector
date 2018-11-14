<?php

class cfs_ninja_forms_field extends cfs_field {
	public function __construct() {
		$this->name  = 'ninja_forms_field';
		$this->label = __( 'Ninja Forms Selector', 'cfsnfs' );
	}

	public function html( $field ) {

		// Simple check to make sure Ninja Forms in fact exists.
		if ( ! class_exists( 'Ninja_Forms' ) ) {
			?>

			<p>Please make sure the Ninja Forms plugin is installed and active.</p>

			<?php
			return;
		}

		$ninja_forms_listing = Ninja_Forms()->form()->get_forms();
		?>

		<select name="<?php esc_attr( $field->input_name ); ?>" name="<?php esc_attr( $field->input_class ); ?>">
			<option value="0">None</option>

			<?php
			// Output available forms as options
			foreach ( $ninja_forms_listing as $form ) :
				$form_id    = $form->get_id();
				$form_title = $form->get_setting( 'title' );
				$selected   = in_array( $form_id, (array) $field->value, true ) ? ' selected' : '';
				?>

				<option value="<?php echo esc_attr( $form_id ); ?>"<?php echo esc_attr( $selected ); ?>>
					<?php echo esc_attr( $form_title ); ?>
				</option>

			<?php endforeach; ?>

		</select>
		<?php
	}
}

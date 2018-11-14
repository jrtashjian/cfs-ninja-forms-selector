<?php
/*
Plugin Name: CFS - Ninja Forms Selector
Plugin URI: http://wordpress.org/plugins/cfs-ninja-forms-selector/
Description: Adds a Ninja Forms selector field type.
Version: 1.0.1
Author: JR Tashjian
Author URI: http://jrtashjian.com/
Text Domain: cfsnfs
License: GPL2

Copyright 2014-2018 JR Tashjian

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, see <http://www.gnu.org/licenses/>.
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cfs_ninja_forms_selector = new cfs_ninja_forms_selector();

class cfs_ninja_forms_selector {
	public function __construct() {
		add_filter( 'cfs_field_types', [ $this, 'cfs_field_types' ] );
	}

	public function cfs_field_types( $field_types ) {
		$field_types['ninja_forms_field'] = dirname( __FILE__ ) . '/cfs-ninja-forms-field.php';

		return $field_types;
	}
}

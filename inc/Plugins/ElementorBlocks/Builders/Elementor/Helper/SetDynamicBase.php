<?php
/*
 * Copyright (c) 2020. This file is copyright by WPEssential.
 */

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Helper;

use function get_class;

trait SetDynamicBase
{

	public function set_name ()
	{
		return 'WPEssential' . substr( strrchr( get_class( $this ), "\\" ), 1 );
	}

	public function set_title ()
	{
		return str_replace( 'WPEssential', '', preg_replace( '/(?<!\ )[A-Z]/', ' $0', substr( strrchr( get_class( $this ), "\\" ), 1 ) ) );
	}
}

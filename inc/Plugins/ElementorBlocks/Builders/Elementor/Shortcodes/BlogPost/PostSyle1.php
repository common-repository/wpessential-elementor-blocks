<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\BlogPost;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use Elementor\Skin_Base;
use WPEssential\Plugins\Implement\Skin;

use function defined;

class PostSyle1 extends Skin_Base implements Skin
{
	public function get_id ()
	{
		return '1';
	}

	public function get_title ()
	{
		return esc_html__( 'Style 1', 'wpessential-elementor-blocks' );
	}

	public function _register_controls_actions ()
	{
		add_action( 'elementor/element/Post/section_1/after_section_start', [ $this, 'register_control_view' ], 20, 2 );
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @param $object
	 * @param $args
	 *
	 * @since  0.0.1
	 * @access public
	 */
	public function register_control_view ( $object, $args )
	{
		/*$object->add_control(
			'view_of_sh_1',
			[
				//'label'       => esc_html__( 'View', 'elementor-custom-skins' ),
				'label_block' => true,
				'type'        => 'image_select',
				'default'     => '',
				'options'     => [
					'view' => [
						'url' => '#',
					],
				],
				'default'     => 'view',
				'condition'   => [
					'blog_style' => 'grid-1',
				],
			]
		);*/

		/*$this->start_controls_section(
			$this->get_name() . '_section_1',
			[
				'label' => esc_html__( 'Post Settings', 'wpessential-elementor-blocks' )
			]
		);

		$post_opt = Number::make( esc_html__( 'Posts Display', 'wpessential-elementor-blocks' ), 'posts_per_page' )
						  ->min( 0 )
						  ->max( - 1 )
						  ->step( 1 )
						  ->desc( esc_html__( 'Enter the number of post to display on frontend.', 'wpessential-elementor-blocks' ) )
						  ->default( 3 )
						  ->toArray();
		$this->add_control( $post_opt[ 'id' ], $post_opt );

		$this->end_controls_section();*/
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  0.0.1
	 * @access public
	 */
	public function render () {}
}

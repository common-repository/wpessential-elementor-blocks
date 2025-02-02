<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use WPEssential\Plugins\Builders\Fields\RawHtml;

use function defined;

class ProductAddToCart extends WCCategory
{
	/**
	 * Set widget keywords.
	 * Retrieve widget keywords.
	 *
	 * @return array Widget keywords.
	 * @access public
	 * @since  0.0.1
	 * @public
	 */
	public function set_keywords ()
	{
		return [ 'woocommerce', 'shop', 'store', 'cart', 'product', 'button', 'add to cart' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  0.0.1
	 * @access public
	 */
	public function register_controls ()
	{
		$this->start_controls_section(
			'section_1',
			[
				'label' => esc_html__( 'Layout', 'wpessential-elementor-blocks' )
			]
		);

		$this->add_control(
			'product_id',
			[
				'label' => esc_htmlesc_html__( 'Product', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
				'options' => wpe_get_posts( [ 'post_type' => 'product', 'posts_per_page' => - 1 ] ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_pro_wc',
			[
				'label' => esc_html__( 'Pro', 'wpessential-elementor-blocks' )
			]
		);

		$opt = RawHtml::make( esc_html__( 'WooCommerce', 'wpessential-elementor-blocks' ) )
					  ->data( esc_html__( 'There are no option found. If you want more options, then please try the Pro version.', 'wpessential-elementor-blocks' ), )
					  ->toArray();
		$this->add_control( $opt[ 'id' ], $opt );

		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  0.0.1
	 * @access public
	 */
	public function render ()
	{
		global $product;

		if ( ! is_product() )
		{
			global $post;
			$product = wc_get_product( $this->get_settings( 'product_id' ) );
			$post    = get_post( $product->get_id() );
		}
		else
		{
			$product = wc_get_product();
		}

		if ( empty( $product ) )
		{
			return;
		}
		?>
		<div class="wpe-add-to-cart wpe-product-<?php echo esc_attr( $product->get_type() ); ?>">
			<?php woocommerce_template_single_add_to_cart(); ?>
		</div>
		<?php
	}
}

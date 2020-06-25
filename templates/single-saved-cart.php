<?php
/**
 * Single post template for saved cart.
 * You can override this template by creating
 * single-wcssc-cart.php file inside theme.
 *
 * @package Ankit\WCSSC
 * @author Ankit Gade <ankit.gade@news.co.uk>
 * @since 2.0.0
 * @version 1.0.0
 */

?>

<div id="saved-cart-description">
	<?php echo $content; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>

<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">

	<thead>
	<tr>
		<th class="product-name" colspan="2"><?php esc_html_e( 'Product', 'wcssc' ); ?></th>
		<th class="product-price"><?php esc_html_e( 'Price', 'wcssc' ); ?></th>
		<th class="product-quantity"><?php esc_html_e( 'Quantity', 'wcssc' ); ?></th>
		<th class="product-subtotal"><?php esc_html_e( 'Total', 'wcssc' ); ?></th>
	</tr>
	</thead>

	<tbody>
	<?php
	$total_quantity = 0;
	$total_price    = 0;
	foreach ( $cart as $cart_item_key => $cart_item ) {

		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>

			<tr class="woocommerce-cart-form__cart-item">

			<td class="product-thumbnail">
				<?php
				$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'thumbnail' ), $cart_item, $cart_item_key );

				if ( ! $product_permalink ) {
					echo wp_kses_post( $thumbnail );
				} else {
					printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
				}
				?>

			</td>

			<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'wcssc' ); ?>">
				<?php
				if ( ! $product_permalink ) {
					echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
				} else {
					echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
				}

				do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

				// Meta data.
				echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

				// Backorder notification.
				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
					echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'wcssc' ) . '</p>' ) );
				}
				?>
			</td>

			<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'wcssc' ); ?>">
				<?php
				echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
				?>
			</td>

			<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'wcssc' ); ?>">
				<?php
				if ( $_product->is_sold_individually() ) {
					$product_quantity = 1;
				} else {
					$product_quantity = $cart_item['quantity'];
				}

				$total_quantity = $total_quantity + $product_quantity;

				echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
				?>
			</td>

			<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'wcssc' ); ?>">
				<?php
				$subtotal = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
				echo $subtotal; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

				$product_price = 0;
				if ( WC()->cart->display_prices_including_tax() ) {
					$product_price = wc_get_price_including_tax( $_product );
				} else {
					$product_price = wc_get_price_excluding_tax( $_product );
				}

				$total_price = $total_price + ( $product_price * $product_quantity );
				?>
			</td>

			</tr>
			<?php
		}
	}
	?>
	<tr>
		<td colspan="3">
		</td>
		<td >
		<?php
			echo sprintf( __( 'Total Quantity: %d', 'wcssc' ), $total_quantity );
		?>
		</td>
		<td >
		<?php
			echo sprintf( __( 'Total Price: %s', 'wcssc' ), wc_price( $total_price ) );
		?>
		</td>
	</tr>
	</tbody>
</table>

<div class="load-cart" style="text-align: right">
	<a class="button" href="<?php echo esc_url( $load_url ); ?>" rel="nofollow">
		<?php esc_html_e( 'Load Cart', 'wcssc' ); ?>
	</a>
</div>

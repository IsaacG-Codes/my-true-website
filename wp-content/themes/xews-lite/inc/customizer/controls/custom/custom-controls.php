<?php
/**
 * Customizer custom controls
 *
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	

	

	/**
	 * Image layout picker custom control
	 *
	 */
	class Image_Radio_Buttons extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'image_radio_buttons';
		public $changednd = '';

		private function abs_path_to_url( $path = '' ) {
			$url = str_replace(
				wp_normalize_path( untrailingslashit( ABSPATH ) ),
				site_url(),
				wp_normalize_path( $path )
			);
			return esc_url_raw( $url );
		}
		/**
		 * Control scripts and styles enqueue
		 *
		 * @since 1.0.0
		 */
		public function enqueue() {
			wp_enqueue_style( 'custom-controls', $this->abs_path_to_url( dirname( __FILE__ ) . '/css/custom-controls.css'));
		}
		/**
		 * Control method
		 *
		 * @since 1.0.0
		 */
		public function render_content() {
			?>
			<div class="image_radio_buttons">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo esc_html( $this->description ); ?></p>
				<?php
				foreach ( $this->choices as $choices_key => $choices_value ) {
					$name = isset($choices_value['name']) ? $choices_value['name'] : '';
					?>
					<label rel="<?php echo esc_attr($this->changednd);?>">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $choices_key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $choices_key ), $this->value() ); ?>/>
						<img src="<?php echo esc_attr( $choices_value['image'] ); ?>" alt="<?php echo esc_attr( $name ); ?>" title="<?php echo esc_attr( $name ); ?>" />
					</label>
					<?php
				}
				?>
			</div>
			<?php
		}
	}

	



}//customizer check close
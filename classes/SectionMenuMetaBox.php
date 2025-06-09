<?php
class SectionMenuMetaBox {

	private $post_types = [ 'doc', 'component' ];
	private $meta_key = '_side_menu_data';

	public function __construct() {
		add_action( 'add_meta_boxes', [ $this, 'add_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_meta_box' ] );
		add_filter( 'rest_prepare_post', [ $this, 'add_meta_to_rest' ], 10, 2 );
		add_filter( 'rest_prepare_doc', [ $this, 'add_meta_to_rest' ], 10, 2 );
		add_filter( 'rest_prepare_component', [ $this, 'add_meta_to_rest' ], 10, 2 );
	}

	// Adds the meta box for each post type
	public function add_meta_box() {
		foreach ( $this->post_types as $post_type ) {
			add_meta_box(
				'side_menu_meta_box',
				'Side Menu Sections (JS Array)',
				[ $this, 'render_meta_box' ],
				$post_type,
				'side',
				'default'
			);
		}
	}

	// Renders the textarea input
	public function render_meta_box( $post ) {
		wp_nonce_field( 'save_side_menu_meta', 'side_menu_nonce' );
		$value = get_post_meta( $post->ID, $this->meta_key, true );
		?>
		<textarea name="side_menu_meta" rows="8" style="width:100%;"><?php echo esc_textarea( $value ); ?></textarea>
		<p class="description">Paste JSON array, e.g.:<br>
		<code>[{ "title": "Section 1", "id": "#section-1" }]</code>
		</p>
		<?php
	}

	// Saves the meta value
	public function save_meta_box( $post_id ) {
		if ( ! isset( $_POST['side_menu_nonce'] ) || ! wp_verify_nonce( $_POST['side_menu_nonce'], 'save_side_menu_meta' ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		if ( isset( $_POST['side_menu_meta'] ) ) {
			$clean = wp_kses_post( $_POST['side_menu_meta'] );
			update_post_meta( $post_id, $this->meta_key, $clean );
		}
	}

	// Adds meta to REST API response
	public function add_meta_to_rest( $response, $post ) {
		if ( in_array( $post->post_type, $this->post_types ) ) {
			$meta = get_post_meta( $post->ID, $this->meta_key, true );
			$response->data['meta']['side_menu'] = $meta;
		}
		return $response;
	}
}

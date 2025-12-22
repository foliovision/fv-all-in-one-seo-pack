<?php

class FV_Simpler_SEO_JSON_LD {

	public function __construct() {
		add_action( 'wp_head', array( $this, 'wp_head' ) );
	}

	public function wp_head() {

		// Only do this for single posts
		if ( ! is_single() ) {
			return;
		}

		echo "\n<script type='application/ld+json'>";
		echo json_encode( $this->get_data() );
		echo "</script>\n";
	}

	public function get_data() {
		global $post;

		$description = get_post_meta( $post->ID, '_aioseo_description', true );
		if ( ! $description ) {
			$description = wp_trim_words( strip_shortcodes( strip_tags( $post->post_content ) ), 20, '...' );
		}

		$data = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'NewsArticle',
			'headline'      => get_the_title(),
			'description'   => $description,
			'image'         => array(
				get_the_post_thumbnail_url( $post->ID, 'full' ),
			),
			'datePublished' => get_the_date( 'c' ),
			'dateModified'  => get_the_modified_date( 'c' ),
			'author'        => array(
				array(
					'@type' => 'Person',
					'name'  => get_the_author_meta( 'display_name', $post->post_author ),
					'url'   => get_author_posts_url( $post->post_author ),
				),
			),
			'publisher'     => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo( 'name' ),
				'url'   => get_bloginfo( 'url' ),
			),
		);

		return $data;
	}
}

new FV_Simpler_SEO_JSON_LD();

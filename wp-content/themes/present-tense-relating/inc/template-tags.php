<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package New Zea
 */

if ( ! function_exists( 'new_zea_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function new_zea_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		wp_kses_post( __( '<a href="%1$s" rel="bookmark"><i class="fa fa-clock-o"></i> %2$s</a>', 'new-zea' ) ), esc_url( get_permalink() ), $time_string );

	$byline = sprintf(
		esc_html_x( ' by %s', 'post author', 'new-zea' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user" aria-hidden="true"></i> ' . esc_html( get_the_author() ) . '</a></span>'
	);
	

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	if( comments_open() ) { ?><span class="meta-info-comment"><a href="<?php comments_link(); ?>"> <i class="fa fa-comments"></i> <?php _e('Leave a Comment', 'new-zea'); ?></a></span><?php } else{?><span class="meta-info-comment"> <i class="fa fa-comments"></i> <?php _e('Comment is Closed', 'new-zea'); ?></a></span><?php }
}
endif;

if ( ! function_exists( 'new_zea_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function new_zea_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'new-zea' ) );
		if ( $categories_list && new_zea_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'new-zea' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'new-zea' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'new-zea' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'new-zea' ), esc_html__( '1 Comment', 'new-zea' ), esc_html__( '% Comments', 'new-zea' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'new-zea' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function new_zea_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'new_zea_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'new_zea_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so new_zea_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so new_zea_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in new_zea_categorized_blog.
 */
function new_zea_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'new_zea_categories' );
}
add_action( 'edit_category', 'new_zea_category_transient_flusher' );
add_action( 'save_post',     'new_zea_category_transient_flusher' );

<?php

/*
 * A codesnippet to modify the slug while saving post
 */

function customSlugForPosts($post_id) {
    if(!wp_is_post_revision($post_id)) {
        remove_action('save_post', 'customSlugForPosts');

        $original_slug = sanitize_title(get_the_title($post_id));

        /* Change and do things with slug here */
        $new_slug = date('d-m-Y') .'-'. $original_slug;

        wp_update_post( array(
            'ID' => $post_id,
            'post_name' => $new_slug
        ));

        add_action('save_post', 'customSlugForPosts');
    }
} add_action('save_post', 'customSlugForPosts');
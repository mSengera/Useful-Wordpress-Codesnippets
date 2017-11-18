<?php

/*
 * A codesnippet to refresh the taxonomy count
 */

/* Only add taxonomy name here */
$update_taxonomy = 'taxonomy-name';

$get_terms_args = array(
    'taxonomy' => $update_taxonomy,
    'fields' => 'ids',
    'hide_empty' => false,
);

$update_terms = get_terms($get_terms_args);
wp_update_term_count_now($update_terms, $update_taxonomy);
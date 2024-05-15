<?php 
function add_exclude_search_meta_box() {
    $screens = ['post', 'page'];
    foreach ($screens as $screen) {
        add_meta_box(
            'exclude_search_id',
            'Exclude from Internal Search',
            'exclude_search_meta_box_html',
            $screen,
            'side'
        );
    }
}
add_action('add_meta_boxes', 'add_exclude_search_meta_box');

function exclude_search_meta_box_html($post) {
    wp_nonce_field('exclude_search_update', 'exclude_search_nonce');
    $value = get_post_meta($post->ID, '_exclude_from_search', true);
    ?>
    <input type="checkbox" id="exclude_search_field" name="exclude_search_field" value="1" <?php checked($value, 1); ?>>
    <label for="exclude_search_field">Exclude from Search Results:</label>
    <?php
}

function save_exclude_search_meta_box_data($post_id) {
    if (!isset($_POST['exclude_search_nonce']) || !wp_verify_nonce($_POST['exclude_search_nonce'], 'exclude_search_update') || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)) {
        return;
    }
    $new_value = isset($_POST['exclude_search_field']) ? '1' : '';
    $current_value = get_post_meta($post_id, '_exclude_from_search', true);

    if ($new_value !== $current_value) {
        update_post_meta($post_id, '_exclude_from_search', $new_value);
    }
}
add_action('save_post', 'save_exclude_search_meta_box_data');

function modify_search_query($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search) {
        $meta_query = $query->get('meta_query') ?: [];
        $meta_query[] = array(
            'relation' => 'OR',  // This specifies that any of the following conditions can be true
            array(
                'key'     => '_exclude_from_search',
                'compare' => 'NOT EXISTS'  // This condition includes posts that do not have the meta key set
            ),
            array(
                'key'     => '_exclude_from_search',
                'value'   => '',           // This condition includes posts where the meta key is empty
                'compare' => '='
            )
        );
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'modify_search_query');
?>


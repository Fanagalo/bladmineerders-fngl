<?php

/* Fire our meta box setup function on the post editor screen. */
// add_action('load-post.php', 'wporg_add_custom_box');
// add_action('load-post-new.php', 'wporg_add_custom_box');


function wporg_add_custom_box()
{
    $screens = ['post'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wporg_box_id',                 // Unique ID
            'Custom Meta Box Title',      // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen                            // Post type
        );
    }
}
// add_action('add_meta_boxes', 'wporg_add_custom_box');
add_action('admin_init', 'wporg_add_custom_box');

function wporg_custom_box_html($post)
{
?>
    <label for="wporg_field">Description for this field</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">Select something...</option>
        <option value="something">Something</option>
        <option value="else">Else</option>
    </select>
<?php
}

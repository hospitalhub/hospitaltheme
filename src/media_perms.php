<?php
// AM dla zamowien - edycja plikow
function fix_media_permissions()
{
    global $wp_post_types;
    $wp_post_types['attachment']->cap->edit_posts = 'upload_files';
    $wp_post_types['attachment']->cap->edit_post = 'upload_files';
    $wp_post_types['attachment']->cap->delete_posts = 'upload_files';
}
add_action('admin_init', 'fix_media_permissions');
?>

<?php
function kalki_style() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');
    // Enqueue custom CSS
    wp_enqueue_style('kalki_Automation', get_template_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style('kalki_Automation_service', get_template_directory_uri() . '/assets/css/service.css');
    wp_enqueue_style('kalki_Automation_blog', get_template_directory_uri() . '/assets/css/blog.css');
    wp_enqueue_style('kalki_Automation_single', get_template_directory_uri() . '/assets/css/single.css');
    wp_enqueue_style('kalki_Automation_contact', get_template_directory_uri() . '/assets/css/contact.css');
    wp_enqueue_style('kalki_Automation_about', get_template_directory_uri() . '/assets/css/about.css');
    //font aswome declear garea ko
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), null, 'all');
    // Enqueue Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    // Enqueue Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), null, true);
    // Enqueue custom JS for the carousel
    wp_enqueue_script('custom-carousel-js', get_template_directory_uri() . '/assets/js/featured.js', array('swiper-js', 'jquery'), null, true);
    // Localize script to pass data from PHP to JS (if needed)
    wp_localize_script('custom-carousel-js', 'kalki_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'kalki_style');
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_action('admin_enqueue_scripts','kalki_admin_style');

function kalki_admin_style(){
    wp_enqueue_script('custom-catagory-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);

}

add_action('category_add_form_fields', 'zAddTexonomyField_custom');
function zAddTexonomyField_custom() {
    wp_enqueue_media();
    echo '<div class="form-field">
        <input type="hidden" name="zci_taxonomy_image_id" id="zci_taxonomy_image_id" value="" />
        <label for="zci_taxonomy_image">' . __('Image', 'categories-images') . '</label>
        <input type="text" name="zci_taxonomy_image" id="zci_taxonomy_image" value="" />
        <br/>
        <button class="z_upload_image_button button">' . __('Upload/Add image', 'categories-images') . '</button>
    </div>';
}

add_action('category_edit_form_fields', 'zEditTexonomyField_custom');
function zEditTexonomyField_custom($taxonomy) {
    wp_enqueue_media();
    $image_url = get_option('z_taxonomy_image' . $taxonomy->term_id, '');
    $image_id  = get_option('z_taxonomy_image_id' . $taxonomy->term_id, '');

    echo '<tr class="form-field">
        <th scope="row" valign="top"><label for="zci_taxonomy_image">' . __('Image', 'categories-images') . '</label></th>
        <td><input type="hidden" name="zci_taxonomy_image_id" id="zci_taxonomy_image_id" value="'.esc_attr($image_id).'" />
        <img class="zci-taxonomy-image" src="' . esc_url($image_url) . '"/><br/>
        <input type="text" name="zci_taxonomy_image" id="zci_taxonomy_image" value="'.esc_url($image_url).'" /><br />
        <button class="z_upload_image_button button">' . __('Upload/Add image', 'categories-images') . '</button>
        <button class="z_remove_image_button button">' . __('Remove image', 'categories-images') . '</button>
        </td>
    </tr>';
}

function zSaveTaxonomyImage($term_id) {
    if (isset($_POST['zci_taxonomy_image'])) {
        update_option('z_taxonomy_image'.$term_id, $_POST['zci_taxonomy_image'], false);
    }
    if (isset($_POST['zci_taxonomy_image_id'])) {
        update_option('z_taxonomy_image_id'.$term_id, $_POST['zci_taxonomy_image_id'], false);
    }
}
add_action('edited_category', 'zSaveTaxonomyImage', 10, 2);
add_action('create_category', 'zSaveTaxonomyImage', 10, 2);

function zGetAttachmentIdByUrl($image_src) {
    global $wpdb;
    $query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid = %s", $image_src);
    $id = $wpdb->get_var($query);
    return (!empty($id)) ? $id : NULL;
}
?>

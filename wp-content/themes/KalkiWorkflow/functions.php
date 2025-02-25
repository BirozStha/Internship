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
    wp_enqueue_style('kalki_Automation_banner', get_template_directory_uri() . '/assets/css/banner.css');
    wp_enqueue_style('kalki_Automation_booking', get_template_directory_uri() . '/assets/css/booking.css');
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


// cpt for appointment
// Register Appointment Custom Post Type
function register_appointment_cpt() {
    $labels = [
        'name'          => 'Appointments',
        'singular_name' => 'Appointment',
        'menu_name'     => 'Appointments',
        'add_new'       => 'Add Appointment',
        'add_new_item'  => 'Add New Appointment',
        'edit_item'     => 'Edit Appointment',
        'new_item'      => 'New Appointment',
        'view_item'     => 'View Appointment',
        'all_items'     => 'All Appointments'
    ];
    $args = [
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => true,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-calendar-alt',
        'supports'     => ['title', 'custom-fields'],
        'rewrite'      => ['slug' => 'appointments'],
    ];
    register_post_type('appointment', $args);
}
add_action('init', 'register_appointment_cpt');

function sync_appointments_to_cpt() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointments';
    $appointments = $wpdb->get_results("SELECT * FROM $table_name");

    foreach ($appointments as $appointment) {
        $existing_post = get_posts([
            'post_type'  => 'appointment',
            'meta_key'   => '_appointment_id',
            'meta_value' => $appointment->id,
            'numberposts'=> 1
        ]);

        if (!$existing_post) {
            $post_id = wp_insert_post([
                'post_title'   => sanitize_text_field($appointment->name . ' - ' . $appointment->date),
                'post_status'  => 'publish',
                'post_type'    => 'appointment',
            ]);

            if ($post_id) {
                update_post_meta($post_id, '_appointment_id', $appointment->id);
                update_post_meta($post_id, '_appointment_date', $appointment->date);
                update_post_meta($post_id, '_appointment_time', $appointment->time);
                update_post_meta($post_id, '_appointment_service', $appointment->service);
                update_post_meta($post_id, '_appointment_status', $appointment->status);
                update_post_meta($post_id, '_appointment_email', $appointment->email);
                update_post_meta($post_id, '_appointment_phone', $appointment->phone);
            }
        }
    }
}
add_action('init', 'sync_appointments_to_cpt');

function add_appointment_meta_boxes() {
    add_meta_box('appointment_details', 'Appointment Details', 'render_appointment_meta_box', 'appointment', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_appointment_meta_boxes');

function render_appointment_meta_box($post) {
    $date    = get_post_meta($post->ID, '_appointment_date', true);
    $time    = get_post_meta($post->ID, '_appointment_time', true);
    $service = get_post_meta($post->ID, '_appointment_service', true);
    $status  = get_post_meta($post->ID, '_appointment_status', true);
    $email   = get_post_meta($post->ID, '_appointment_email', true);
    $phone   = get_post_meta($post->ID, '_appointment_phone', true);

    echo '<div style="padding: 15px; background: #F9F9F9; border-radius: 8px;">';
    echo '<label for="_appointment_date"><strong>Date:</strong></label><br>';
    echo '<input type="date" id="_appointment_date" name="_appointment_date" value="' . esc_attr($date) . '" style="width:100%; padding:8px; margin-bottom:10px;" /><br>';
    
    echo '<label for="_appointment_time"><strong>Time:</strong></label><br>';
    echo '<input type="time" id="_appointment_time" name="_appointment_time" value="' . esc_attr($time) . '" style="width:100%; padding:8px; margin-bottom:10px;" /><br>';

    echo '<label for="_appointment_service"><strong>Service:</strong></label><br>';
    echo '<input type="text" id="_appointment_service" name="_appointment_service" value="' . esc_attr($service) . '" style="width:100%; padding:8px; margin-bottom:10px;" /><br>';

    echo '<label for="_appointment_status"><strong>Status:</strong></label><br>';
    echo '<select id="_appointment_status" name="_appointment_status" style="width:100%; padding:8px;">';
    $statuses = ['Cancelled', 'Pending', 'Confirmed'];
    foreach ($statuses as $option) {
        $selected = ($status == $option) ? 'selected' : '';
        echo '<option value="' . esc_attr($option) . '" ' . $selected . '>' . esc_html($option) . '</option>';
    }
    echo '</select><br>';

    echo '<label for="_appointment_email"><strong>Email:</strong></label><br>';
    echo '<input type="email" id="_appointment_email" name="_appointment_email" value="' . esc_attr($email) . '" style="width:100%; padding:8px; margin-bottom:10px;" /><br>';

    echo '<label for="_appointment_phone"><strong>Phone:</strong></label><br>';
    echo '<input type="text" id="_appointment_phone" name="_appointment_phone" value="' . esc_attr($phone) . '" style="width:100%; padding:8px; margin-bottom:10px;" /><br>';

    echo '</div>';
}

function save_appointment_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    $updated_data = [];
    if (isset($_POST['_appointment_date'])) {
        $updated_data['date'] = sanitize_text_field($_POST['_appointment_date']);
        update_post_meta($post_id, '_appointment_date', $updated_data['date']);
    }
    if (isset($_POST['_appointment_time'])) {
        $updated_data['time'] = sanitize_text_field($_POST['_appointment_time']);
        update_post_meta($post_id, '_appointment_time', $updated_data['time']);
    }
    if (isset($_POST['_appointment_service'])) {
        $updated_data['service'] = sanitize_text_field($_POST['_appointment_service']);
        update_post_meta($post_id, '_appointment_service', $updated_data['service']);
    }
    if (isset($_POST['_appointment_status'])) {
        $updated_data['status'] = sanitize_text_field($_POST['_appointment_status']);
        update_post_meta($post_id, '_appointment_status', $updated_data['status']);
    }
    if (isset($_POST['_appointment_email'])) {
        $updated_data['email'] = sanitize_email($_POST['_appointment_email']);
        update_post_meta($post_id, '_appointment_email', $updated_data['email']);
    }
    if (isset($_POST['_appointment_phone'])) {
        $updated_data['phone'] = sanitize_text_field($_POST['_appointment_phone']);
        update_post_meta($post_id, '_appointment_phone', $updated_data['phone']);
    }

    // Sync changes back to the database
    if (!empty($updated_data)) {
        global $wpdb;
        $appointment_id = get_post_meta($post_id, '_appointment_id', true);
        if ($appointment_id) {
            $wpdb->update(
                $wpdb->prefix . 'appointments',
                $updated_data,
                ['id' => $appointment_id]
            );
        }
    }
}
add_action('save_post', 'save_appointment_meta');

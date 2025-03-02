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


// CPT for Appointment
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

// Add Custom Columns in Admin List View
function add_appointment_columns($columns) {
    $columns['appointment_date'] = 'Date';
    $columns['appointment_time'] = 'Time';
    $columns['appointment_service'] = 'Service';
    $columns['appointment_status'] = 'Status';
    $columns['appointment_email'] = 'Email';
    $columns['appointment_phone'] = 'Phone';
    $columns['send_mail'] = 'Send Mail';
    return $columns;
}
add_filter('manage_appointment_posts_columns', 'add_appointment_columns');

// Populate Custom Columns in Admin List
function populate_appointment_columns($column, $post_id) {
    switch ($column) {
        case 'appointment_date':
            echo esc_html(get_post_meta($post_id, '_appointment_date', true) ?: '—');
            break;
        case 'appointment_time':
            echo esc_html(get_post_meta($post_id, '_appointment_time', true) ?: '—');
            break;
        case 'appointment_service':
            echo esc_html(get_post_meta($post_id, '_appointment_service', true) ?: '—');
            break;
        case 'appointment_status':
            echo esc_html(get_post_meta($post_id, '_appointment_status', true) ?: '—');
            break;
        case 'appointment_email':
            echo esc_html(get_post_meta($post_id, '_appointment_email', true) ?: '—');
            break;
        case 'appointment_phone':
            echo esc_html(get_post_meta($post_id, '_appointment_phone', true) ?: '—');
            break;
        case 'send_mail':
            echo '<button class="send_mail_button" data-post-id="' . $post_id . '">Send Mail</button>';
            break;
    }
}
add_action('manage_appointment_posts_custom_column', 'populate_appointment_columns', 10, 2);

// Sync CPT with Database Table
// Sync CPT Changes to Database
function save_appointment_meta($post_id) {
    if (get_post_type($post_id) !== 'appointment') {
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'appointments';

    // Fetch stored appointment ID
    $appointment_id = get_post_meta($post_id, '_appointment_id', true);
    if (!$appointment_id) return;

    // Prepare data
    $data = [
        'date'    => sanitize_text_field($_POST['_appointment_date']),
        'time'    => sanitize_text_field($_POST['_appointment_time']),
        'service' => sanitize_text_field($_POST['_appointment_service']),
        'status'  => sanitize_text_field($_POST['_appointment_status']),
        'email'   => sanitize_email($_POST['_appointment_email']),
        'phone'   => sanitize_text_field($_POST['_appointment_phone']),
    ];

    // Update database
    $wpdb->update($table_name, $data, ['id' => $appointment_id]);

    // Ensure CPT metadata is updated
    foreach ($data as $key => $value) {
        update_post_meta($post_id, "_appointment_$key", $value);
    }
}
add_action('save_post', 'save_appointment_meta');

// Sync Database Changes Back to CPT
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

        if ($existing_post) {
            $post_id = $existing_post[0]->ID;

            // Update CPT if database changes
            update_post_meta($post_id, '_appointment_date', $appointment->date);
            update_post_meta($post_id, '_appointment_time', $appointment->time);
            update_post_meta($post_id, '_appointment_service', $appointment->service);
            update_post_meta($post_id, '_appointment_status', $appointment->status);
            update_post_meta($post_id, '_appointment_email', $appointment->email);
            update_post_meta($post_id, '_appointment_phone', $appointment->phone);
        } else {
            // Insert new CPT entry if it doesn't exist
            $post_id = wp_insert_post([
                'post_title'   => sanitize_text_field($appointment->name),
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


// Add Meta Boxes for Appointment CPT
function add_appointment_meta_boxes() {
    add_meta_box('appointment_details', 'Appointment Details', 'render_appointment_meta_box', 'appointment', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_appointment_meta_boxes');

function render_appointment_meta_box($post) {
    $fields = [
        'date'    => 'Date',
        'time'    => 'Time',
        'service' => 'Service',
        'status'  => 'Status',
        'email'   => 'Email',
        'phone'   => 'Phone'
    ];

    echo '<div style="padding: 15px; background: #F9F9F9; border-radius: 8px;">';

    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, "_appointment_$key", true);
        if ($key == 'status') {
            echo "<label for='_appointment_$key'><strong>$label:</strong></label><br>";
            echo "<select id='_appointment_$key' name='_appointment_$key' style='width:100%; padding:8px;'>";
            foreach (['Cancelled', 'Pending', 'Confirmed'] as $option) {
                $selected = ($value == $option) ? 'selected' : '';
                echo "<option value='$option' $selected>$option</option>";
            }
            echo "</select><br>";
        } else {
            echo "<label for='_appointment_$key'><strong>$label:</strong></label><br>";
            $type = ($key == 'email') ? 'email' : (($key == 'date') ? 'date' : 'text');
            echo "<input type='$type' id='_appointment_$key' name='_appointment_$key' value='$value' style='width:100%; padding:8px; margin-bottom:10px;' /><br>";
        }
    }

    echo '</div>';
}

//Enqueue Script to Handle Button Click
function enqueue_send_mail_script() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // When Send Mail button is clicked
            $('.send_mail_button').on('click', function() {
                var post_id = $(this).data('post-id');
                
                // Send AJAX request to handle email sending
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    method: 'POST',
                    data: {
                        action: 'send_appointment_email',
                        post_id: post_id
                    },
                    success: function(response) {
                        alert('Email Sent Successfully!');
                    },
                    error: function() {
                        alert('There was an error sending the email.');
                    }
                });
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'enqueue_send_mail_script');


//Handle AJAX Request for Sending Email:
function send_appointment_email_ajax() {
    if (isset($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']);
        // Fetch appointment details with proper checks
        $date = get_post_meta($post_id, '_appointment_date', true);
        $time = get_post_meta($post_id, '_appointment_time', true);
        $service = get_post_meta($post_id, '_appointment_service', true);
        $status = get_post_meta($post_id, '_appointment_status', true);
        $email = get_post_meta($post_id, '_appointment_email', true);
        
        $subject = 'Appointment Notification';
        $message =  "
            <h2>Appointment Details</h2>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Time:</strong> $time</p>
            <p><strong>Service:</strong> $service</p>
            <p><strong>Status:</strong> $status</p>
            <p><strong>Message:</strong> Please be present on time and date.</p>"; // Customize your message

        // Send email
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $result = wp_mail($email, $subject, $message, $headers);

        if ($result) {
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }
    wp_die();
}
add_action('wp_ajax_send_appointment_email', 'send_appointment_email_ajax');



//for the counter using meta box
// Add meta box for counter values
function add_counter_meta_box() {
    $home_page_id = get_option('page_on_front'); // Get the ID of the set Home Page

    // Only add the meta box if editing the Home Page
    if (get_the_ID() == $home_page_id) {
        add_meta_box(
            'counter_meta_box', // Meta box ID
            'Counter Values', // Title
            'render_counter_meta_box', // Callback function
            'page', // Post type (only for pages)
            'normal', // Context
            'high' // Priority
        );
    }
}
add_action('add_meta_boxes', 'add_counter_meta_box');

// function add_counter_meta_box() {
//     add_meta_box(
//         'counter_meta_box', // ID of the meta box
//         'Counter Values', // Title of the meta box
//         'render_counter_meta_box', // Callback function to display the fields
//         'page', // Post type (you can change this to other post types like 'post' or a custom post type)
//         'normal', // Context (normal, side, etc.)
//         'high' // Priority (high, low, etc.)
//     );
// }
// add_action('add_meta_boxes', 'add_counter_meta_box');

// Render the meta box fields
function render_counter_meta_box($post) {
    // Get current values (if any)
    $projects_completed = get_post_meta($post->ID, '_projects_completed', true);
    $hours_coding = get_post_meta($post->ID, '_hours_coding', true);
    $happy_clients = get_post_meta($post->ID, '_happy_clients', true);

    ?>
    <label for="projects_completed"><strong>Projects Completed:</strong></label>
    <input type="number" id="projects_completed" name="projects_completed" value="<?php echo esc_attr($projects_completed); ?>" style="width:100%;" />
    <br><br>
    
    <label for="hours_coding"><strong>Hours Coding:</strong></label>
    <input type="number" id="hours_coding" name="hours_coding" value="<?php echo esc_attr($hours_coding); ?>" style="width:100%;" />
    <br><br>
    
    <label for="happy_clients"><strong>Happy Clients:</strong></label>
    <input type="number" id="happy_clients" name="happy_clients" value="<?php echo esc_attr($happy_clients); ?>" style="width:100%;" />
    <?php
}

// Save the meta box data
function save_counter_meta_box_data($post_id) {
    // Check if the fields are set and save the data
    if (isset($_POST['projects_completed'])) {
        update_post_meta($post_id, '_projects_completed', sanitize_text_field($_POST['projects_completed']));
    }
    if (isset($_POST['hours_coding'])) {
        update_post_meta($post_id, '_hours_coding', sanitize_text_field($_POST['hours_coding']));
    }
    if (isset($_POST['happy_clients'])) {
        update_post_meta($post_id, '_happy_clients', sanitize_text_field($_POST['happy_clients']));
    }
}
add_action('save_post', 'save_counter_meta_box_data');


//Ajax for Counter Using Meta Box
function get_updated_counter_values() {
    // Get the current post ID dynamically instead of hardcoding
    $post_id = 135; // Change this if necessary

    // Fetch latest meta values
    $response = [
        'projects_completed' => get_post_meta($post_id, '_projects_completed', true) ?: '400',
        'hours_coding' => get_post_meta($post_id, '_hours_coding', true) ?: '150',
        'happy_clients' => get_post_meta($post_id, '_happy_clients', true) ?: '700',
    ];

    wp_send_json_success($response); // Send JSON response correctly
}
add_action('wp_ajax_get_counter_values', 'get_updated_counter_values');
add_action('wp_ajax_nopriv_get_counter_values', 'get_updated_counter_values'); // Allow non-logged-in users to access


function enqueue_counter_script() {
    wp_enqueue_script('counter-update', get_template_directory_uri() . '/assets/js/counter-update.js', ['jquery'], null, true);

    // Localize script to pass AJAX URL
    wp_localize_script('counter-update', 'counterAjax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_counter_script');



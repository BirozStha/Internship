<?php
function InternTask_style() {
    wp_enqueue_style('TnternShipTask', get_template_directory_uri() . '/assets/css/custom.css');
}
add_action('wp_enqueue_scripts', 'InternTask_style');

//For custom Post Type
function register_projects_cpt() {
    register_post_type('projects', [
        'labels' => ['name' => 'Projects'],
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true
    ]);
}
add_action('init', 'register_projects_cpt');


//meta initial gareako
function add_project_details_metabox() {
    add_meta_box('project_details', 'Project Details', 'project_details_callback', 'projects');
}
add_action('add_meta_boxes', 'add_project_details_metabox');


function project_details_callback($post) {
    $client = get_post_meta($post->ID, '_client_name', true);
    $deadline = get_post_meta($post->ID, '_project_deadline', true);
    $status = get_post_meta($post->ID, '_project_status', true);
    ?>
    <label>Client Name:</label>
    <input type="text" name="client_name" value="<?= esc_attr($client) ?>"><br>
    <label>Deadline:</label>
    <input type="date" name="project_deadline" value="<?= esc_attr($deadline) ?>"><br>
    <label>Status:</label>
    <select name="project_status">
        <option <?= selected($status, 'Not Started') ?>>Not Started</option>
        <option <?= selected($status, 'In Progress') ?>>In Progress</option>
        <option <?= selected($status, 'Completed') ?>>Completed</option>
    </select>
    <?php
}

function save_project_meta($post_id) {
    if (isset($_POST['client_name']))
        update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
    if (isset($_POST['project_deadline']) && $_POST['project_deadline'] >= date('Y-m-d'))
        update_post_meta($post_id, '_project_deadline', $_POST['project_deadline']);
    if (isset($_POST['project_status']))
        update_post_meta($post_id, '_project_status', $_POST['project_status']);
}
add_action('save_post', 'save_project_meta');

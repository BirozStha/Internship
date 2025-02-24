<?php
/* Template Name: Booking Page */
get_header();
global $wpdb;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_booking'])) {
    if (isset($_POST['appbokin_nonce']) && wp_verify_nonce($_POST['appbokin_nonce'], 'submit_booking')) {
        
        $name    = sanitize_text_field($_POST['name']);
        $email   = sanitize_email($_POST['email']);
        $phone   = sanitize_text_field($_POST['phone']);
        $date    = sanitize_text_field($_POST['date']);
        $time    = sanitize_text_field($_POST['time']);
        $service = sanitize_text_field($_POST['service']);
        $status  = 'pending'; // Default status for new bookings

        $table_name = $wpdb->prefix . 'appbokin_appointments'; // Change table name according to your plugin

        // Insert appointment data into the database
        $wpdb->insert(
            $table_name,
            array(
                'name'    => $name,
                'email'   => $email,
                'phone'   => $phone,
                'date'    => $date,
                'time'    => $time,
                'service' => $service,
                'status'  => $status,
            ),
            array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
        );

        if ($wpdb->insert_id) {
            // Optional: Redirect or display success message
            echo '<p class="success-message">Your appointment has been booked successfully.</p>';
        } else {
            echo '<p class="error-message">There was an error booking your appointment.</p>';
        }
    } else {
        echo '<p class="error-message">Invalid form submission.</p>';
    }
}
?>

<div class="booking-container">
    <!-- Image Section -->
    <div class="booking-image-section">
        <h1>Booking for Appointment</h1>
        <br>
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
    </div>

    <!-- Form Section -->
    <form class="booking-form" method="post" action="">
        <?php wp_nonce_field('submit_booking', 'appbokin_nonce'); ?>

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Select Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="service">Select Service:</label>
        <select id="service" name="service" required>
            <option value="Consultation">Consultation</option>
            <option value="Support Call">Support Call</option>
            <option value="Development Meeting">Development Meeting</option>
        </select>

        <input type="submit" name="submit_booking" value="Book Now">
    </form>
</div>

<?php get_footer(); ?>

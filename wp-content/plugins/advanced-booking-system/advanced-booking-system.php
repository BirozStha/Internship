<?php
/**
 * Plugin Name: advanced-booking-system
 * Plugin URI: https://wordpress.test/plugins/advanced-booking-system/
 * Description: A custom WordPress plugin for managing appointments.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://wordpress.test/plugins/advanced-booking-system/
 * License: GPL2
 */



if (!defined('ABSPATH')) {
    exit;
}

class bookingsystem {
    private static $instance = null;
    private $table_name;

    private function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'appointments';

        // Register hooks
        add_action('admin_menu', [$this, 'register_booking_menu']);
        add_action('init', [$this, 'handle_booking_form']);
        add_action('admin_init', [$this, 'delete_booking']);
        add_action('admin_init', [$this, 'handle_admin_booking_submission']);
        add_action('admin_post_edit_appointment', [$this, 'handle_admin_booking_submission']);
        add_action('admin_init', [$this, 'register_ajax_handler']);

    }

    // Singleton pattern
    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
 
    public function show_add_appointment_form() {
        echo "<div class='wrap'><h1>Add New Appointment</h1>";
    
        if (isset($_POST['submit_new_appointment'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'appointments';
    
            $name    = sanitize_text_field($_POST['name']);
            $email   = sanitize_email($_POST['email']);
            $phone   = sanitize_text_field($_POST['phone']);
            $date    = sanitize_text_field($_POST['date']);
            $time    = sanitize_text_field($_POST['time']);
            $service = sanitize_text_field($_POST['service']);
            $status  = sanitize_text_field($_POST['status']);
    
            // Insert appointment into database
            $wpdb->insert($table_name, [
                'name'    => $name,
                'email'   => $email,
                'phone'   => $phone,
                'date'    => $date,
                'time'    => $time,
                'service' => $service,
                'status'  => $status
            ]);
    
            echo "<div class='updated'><p>Appointment Added Successfully!</p></div>";
        }
    
        echo "<form method='post' action=''>";
        wp_nonce_field('add_appointment_action', 'add_appointment_nonce');
        echo "
            <table class='form-table'>
                <tr><th><label for='name'>Name</label></th><td><input type='text' name='name' required class='regular-text'></td></tr>
                <tr><th><label for='email'>Email</label></th><td><input type='email' name='email' required class='regular-text'></td></tr>
                <tr><th><label for='phone'>Phone</label></th><td><input type='text' name='phone' required class='regular-text'></td></tr>
                <tr><th><label for='date'>Date</label></th><td><input type='date' name='date' required></td></tr>
                <tr><th><label for='time'>Time</label></th><td><input type='time' name='time' required></td></tr>
                <tr><th><label for='service'>Service</label></th>
                    <td>
                        <select name='service'>
                            <option value='Consultation'>Consultation</option>
                            <option value='Support Call'>Support Call</option>
                            <option value='Development Meeting'>Development Meeting</option>
                        </select>
                    </td>
                </tr>
                <tr><th><label for='status'>Status</label></th>
                    <td>
                        <select name='status'>
                            <option value='Pending'>Pending</option>
                            <option value='Confirmed'>Confirmed</option>
                            <option value='Cancelled'>Cancelled</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input type='submit' name='submit_new_appointment' value='Add Appointment' class='button button-primary'>
        ";
        echo "</form></div>";
    }

    // Register Admin Menu
    public function register_booking_menu() {
        add_menu_page(
            'Appointments',
            'Appointments',
            'manage_options',
            'booking_system',
            [$this, 'show_bookings'],
            'dashicons-calendar-alt',
            20
        );

        // Add "Add Appointment" submenu
        add_submenu_page(
            'booking_system',
            'Add Appointment',
            'Add Appointment',
            'manage_options',
            'add_appointment',
            [$this, 'show_add_appointment_form']
        );
    }
    

    // Show Appointments and handle Edit request
    public function show_bookings() {
        // If an edit is requested, show the edit form
        if (isset($_GET['edit'])) {
            $this->show_edit_appointment_form(intval($_GET['edit']));
            return; // Stop further processing so only the edit form is shown.
        }
        // Send Email Logic in Admin Panel
        if (isset($_GET['send_email'])) {
            $this->send_email_notification(intval($_GET['send_email']));
        }


        global $wpdb;
        $appointments = $wpdb->get_results("SELECT * FROM $this->table_name");

        echo "<h2>Appointments</h2>";
        
        // Add Appointment Button
        echo "<a href='?page=booking_system&add_appointment=true' class='button button-primary' style='margin-bottom: 15px;'>Add Appointment</a>";
        if (isset($_GET['add_appointment'])) {
            $this->show_add_appointment_form();
        }
        if (isset($_GET['updated'])) {
            echo "<div class='updated'><p>Appointment Updated Successfully!</p></div>";
        }
        if (isset($_GET['email_sent'])) {
            echo "<div class='updated'><p>Email Sent Successfully!</p></div>";
        }

        echo "<table class='widefat'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>";

        foreach ($appointments as $appointment) {
            echo "<tr>
            <td>{$appointment->id}</td>
            <td>{$appointment->name}</td>
            <td>{$appointment->email}</td>
            <td>{$appointment->phone}</td>
            <td>{$appointment->date}</td>
            <td>{$appointment->time}</td>
            <td>{$appointment->service}</td>
            <td>
                <div style='display:flex; justify-content:center; column-gap:10px;'>
                    <div>
                        <select name='status' class='app-select' id='status_{$appointment->id}'>
                            <option value='Pending' " . selected($appointment->status, 'Pending', false) . ">Pending</option>
                            <option value='Confirmed' " . selected($appointment->status, 'Confirmed', false) . ">Confirmed</option>
                            <option value='Cancelled' " . selected($appointment->status, 'Cancelled', false) . ">Cancelled</option>
                        </select>
                    </div>
                    <div>
                        <button type='button' class='update-status' data-id='{$appointment->id}'>✓</button>
                    </div>
                </div>
            </td>
            <td>
                <a href='?page=booking_system&edit={$appointment->id}' class='button'>Edit</a>
                <a href='?page=booking_system&delete={$appointment->id}' class='button button-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                <a href='?page=booking_system&send_email={$appointment->id}' class='button'>Send Email</a>
            </td>
        </tr>";
        }
        echo "</table>";
        echo "<script type='text/javascript'>
                    jQuery(document).ready(function($) {
                        $('.update-status').on('click', function() {
                            var appointmentId = $(this).data('id');
                            var status = $('#status_' + appointmentId).val(); // Get the selected status

                            // Send AJAX request to update status
                            $.ajax({
                                url: '" . admin_url('admin-ajax.php') . "',
                                type: 'POST',
                                data: {
                                    action: 'update_appointment_status',
                                    appointment_id: appointmentId,
                                    status: status
                                },
                                success: function(response) {
                                    if (response.success) {
                                        alert('Status updated successfully!');
                                    } else {
                                        alert('Error updating status');
                                    }
                                },
                                error: function() {
                                    alert('Error occurred while updating status');
                                }
                            });
                        });
                    });
                </script>";

    }
    public function register_ajax_handler() {
        add_action('wp_ajax_update_appointment_status', [$this, 'update_appointment_status']);
    }
    
    public function update_appointment_status() {
        // Check if we have the appointment_id and status in the request
        if (!isset($_POST['appointment_id']) || !isset($_POST['status'])) {
            wp_send_json_error('Invalid request');
        }
    
        global $wpdb;
        $appointment_id = intval($_POST['appointment_id']);
        $status = sanitize_text_field($_POST['status']); // Sanitize input
    
        // Update only the status column in the database for the given appointment_id
        $updated = $wpdb->update(
            $this->table_name,
            ['status' => $status],
            ['id' => $appointment_id]
        );
    
        if ($updated !== false) {
            wp_send_json_success();
        } else {
            wp_send_json_error('Failed to update status');
        }
    }
    

    // New Function: Show Edit Appointment Form
    public function show_edit_appointment_form($appointment_id) {
        global $wpdb;
        $appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $this->table_name WHERE id = %d", $appointment_id));
        
        if (!$appointment) {
            echo "<div class='error'><p>Appointment not found.</p></div>";
            return;
        }

        echo "<div class='wrap'><h1>Edit Appointment</h1>";
        
        if (isset($_POST['submit_edit_appointment'])) {
            // Verify nonce for security
            if (!isset($_POST['edit_appointment_nonce']) || !wp_verify_nonce($_POST['edit_appointment_nonce'], 'edit_appointment_action')) {
                wp_die("Security check failed");
            }

            $name    = sanitize_text_field($_POST['name']);
            $email   = sanitize_email($_POST['email']);
            $phone   = sanitize_text_field($_POST['phone']);
            $date    = sanitize_text_field($_POST['date']);
            $time    = sanitize_text_field($_POST['time']);
            $service = sanitize_text_field($_POST['service']);
            $status  = sanitize_text_field($_POST['status']);

            // Update the appointment in the database
            $wpdb->update(
                $this->table_name,
                [
                    'name'    => $name,
                    'email'   => $email,
                    'phone'   => $phone,
                    'date'    => $date,
                    'time'    => $time,
                    'service' => $service,
                    'status'  => $status,
                ],
                ['id' => $appointment_id]
            );

            // Redirect to the bookings page with a success message
            wp_redirect(admin_url('admin.php?page=booking_system&updated=true'));
            exit;
        }
      
        

      // Edit Appointment Form
        echo "<form method='post' action=''>";
        wp_nonce_field('edit_appointment_action', 'edit_appointment_nonce');
        echo "
            <input type='hidden' name='appointment_id' value='" . esc_attr($appointment->id) . "'>
            <table class='form-table'>
                <tr><th><label for='name'>Name</label></th><td><input type='text' name='name' required class='regular-text' value='" . esc_attr($appointment->name) . "'></td></tr>
                <tr><th><label for='email'>Email</label></th><td><input type='email' name='email' required class='regular-text' value='" . esc_attr($appointment->email) . "'></td></tr>
                <tr><th><label for='phone'>Phone</label></th><td><input type='text' name='phone' required class='regular-text' value='" . esc_attr($appointment->phone) . "'></td></tr>
                <tr><th><label for='date'>Date</label></th><td><input type='date' name='date' required value='" . esc_attr($appointment->date) . "'></td></tr>
                <tr><th><label for='time'>Time</label></th><td><input type='time' name='time' required value='" . esc_attr($appointment->time) . "'></td></tr>
                <tr><th><label for='service'>Service</label></th><td><select name='service'>
                    <option value='Consultation' " . selected($appointment->service, 'Consultation', false) . ">Consultation</option>
                    <option value='Support Call' " . selected($appointment->service, 'Support Call', false) . ">Support Call</option>
                    <option value='Development Meeting' " . selected($appointment->service, 'Development Meeting', false) . ">Development Meeting</option>
                </select></td></tr>
                <tr><th><label for='status'>Status</label></th><td><select name='status'>
                    <option value='Pending' " . selected($appointment->status, 'Pending', false) . ">Pending</option>
                    <option value='Confirmed' " . selected($appointment->status, 'Confirmed', false) . ">Confirmed</option>
                    <option value='Cancelled' " . selected($appointment->status, 'Cancelled', false) . ">Cancelled</option>
                </select></td></tr>
            </table>
            <input type='submit' name='submit_edit_appointment' value='Update Appointment' class='button button-primary'>
        ";
        echo "</form>";

    }

    public function handle_admin_booking_submission() {
        if (isset($_POST['submit_edit_appointment'])) {
            if (!isset($_POST['edit_appointment_nonce']) || !wp_verify_nonce($_POST['edit_appointment_nonce'], 'edit_appointment_action')) {
                wp_die("Security check failed");
            }
    
            global $wpdb;
            $appointment_id = intval($_POST['appointment_id']);
            $name    = sanitize_text_field($_POST['name']);
            $email   = sanitize_email($_POST['email']);
            $phone   = sanitize_text_field($_POST['phone']);
            $date    = sanitize_text_field($_POST['date']);
            $time    = sanitize_text_field($_POST['time']);
            $service = sanitize_text_field($_POST['service']);
            $status  = sanitize_text_field($_POST['status']);
    
            // Update the appointment in the database
            $wpdb->update(
                $this->table_name,
                [
                    'name'    => $name,
                    'email'   => $email,
                    'phone'   => $phone,
                    'date'    => $date,
                    'time'    => $time,
                    'service' => $service,
                    'status'  => $status,
                ],
                ['id' => $appointment_id]
            );
    
            // Redirect to the dashboard
            wp_redirect(admin_url('admin.php?page=booking_system&updated=true'));
            exit;
        }
    }
    

    // Handle Booking Form Submission (Front Page)
    public function handle_booking_form() {
        if (isset($_POST['submit_booking'])) {
            global $wpdb;

            $name    = sanitize_text_field($_POST['name']);
            $email   = sanitize_email($_POST['email']);
            $phone   = sanitize_text_field($_POST['phone']);
            $date    = sanitize_text_field($_POST['date']);
            $time    = sanitize_text_field($_POST['time']);
            $service = sanitize_text_field($_POST['service']);

            // Validate date range
            if ($date < '2025-01-01' || $date > '2026-12-31') {
                wp_die("Error: The appointment date must be between 2025 and 2026.");
            }

            // Insert data
            $wpdb->insert($this->table_name, [
                'name'    => $name,
                'email'   => $email,
                'phone'   => $phone,
                'date'    => $date,
                'time'    => $time,
                'service' => $service,
                'status'  => 'Pending'
            ]);

            // Send emails
            $this->send_booking_email($name, $email, $date, $time, $service, 'Pending');
            $this->send_admin_notification($name, $email, $date, $time, $service, 'Pending');

            // Redirect to confirmation page dynamically
            $confirmation_page = get_permalink(get_page_by_path('confirmation'));
            if ($confirmation_page) {
                wp_redirect($confirmation_page . '?email_sent=true');
                exit;
            } else {
                wp_redirect(home_url());
                exit;
            }
        }
    }

    // Delete Booking
    public function delete_booking() {
        if (isset($_GET['delete'])) {
            global $wpdb;
            $appointment_id = intval($_GET['delete']);
            $wpdb->delete($this->table_name, ['id' => $appointment_id]);

            wp_redirect(admin_url('admin.php?page=booking_system&deleted=true'));
            exit;
        }
    }


    // Send Booking Email
    private function send_booking_email($name, $email, $date, $time, $service, $status) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }

        $subject = "Appointment Notification";
        $message = "Dear $name,\n\nYour appointment details:\n\n";
        $message .= "Service: $service\nDate: $date\nTime: $time\nStatus: $status\n\nThank you!";

        wp_mail($email, $subject, $message);
    }
    public function send_email_notification($appointment_id) {
        global $wpdb;
        $appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $this->table_name WHERE id = %d", $appointment_id));
    
        if ($appointment) {
            // Send the email
            $this->send_booking_email(
                $appointment->name, 
                $appointment->email, 
                $appointment->date, 
                $appointment->time, 
                $appointment->service, 
                $appointment->status
            );
    
            // Display a JavaScript alert and redirect back to the Appointments page
            echo "<script>
                    alert('Email Sent Successfully!');
                    window.location.href='" . admin_url('admin.php?page=booking_system') . "';
                  </script>";
            exit;
        }
    }
    
    // Send Admin Notification
    private function send_admin_notification($name, $email, $date, $time, $service, $status) {
        $admin_email = get_option('admin_email');
        $subject = "New Appointment Booked";
        $message = "New Appointment Details:\n\n";
        $message .= "Name: $name\nEmail: $email\nService: $service\nDate: $date\nTime: $time\nStatus: $status\n\n";

        wp_mail($admin_email, $subject, $message);
    }
}

// Initialize the plugin
bookingsystem::get_instance(); //this code has error where edit and send mail doesnt work in admin panel
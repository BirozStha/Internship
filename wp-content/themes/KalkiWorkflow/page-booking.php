<?php
/* Template Name: Booking Page */
get_header();
?>
<div class="booking-section">
    <div class="booking-image">
        <h2 >Book an Appointment</h2>
        <img src="<?php the_post_thumbnail_url('large')?>" alt="">
    </div>
    <div class="app-container">
        <div class="app-content">
            <form class="app-form" method="post" action="">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>
                <label for="time">Select Time:</label>
                <input type="time" id="time" required name="time">
                <label for="service">Select Service:</label>
                <select id="service" name="service" required>
                    <option value="Consultation">Consultation</option>
                    <option value="Support Call">Support Call</option>
                    <option value="Development Meeting">Development Meeting</option>
                </select>
                <input type="submit" name="submit_booking" value="Book Now">
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>
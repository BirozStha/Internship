<?php get_header();?>
<!-- inner banner -->
<section class="inner-banner py-sm-5 py-4">
    <div class="w3l-breadcrumb pt-5 pb-4">
        <div class="container py-xl-5 py-lg-4">
            <h4 class="inner-text-title font-weight-bold pt-5">Contact Us</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li class="active"><i class="fas fa-angle-right mx-2"></i>Contact</li>
            </ul>
        </div>
    </div>
</section>
<!-- //inner banner -->

<!-- contact -->
 <section class="w3l-contact-main py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:600px;">
            <p>Contact Us</p>
            <h3 class="title-style">Get In Touch</h3>
        </div>
        <div class="w3l-contact-info">
            <div class="row contact-infos justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <i class="fas fa-map-marked-alt"></i></div>
                        <div class="text-box">
                            <h3 class="mb-2">Our Location</h3>
                            <p>Tours, 10001, 5th Avenue, #06 lane street, NY - 62617.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <i class="fas fa-mobile-alt"></i></div>
                        <div class="text-box">
                            <h3 class="mb-2">Give us a call</h3>
                            <p><a href="tel:+12 234-45-67-63">+12 234-45-67-63</a></p>
                            <p><a href="tel:+12 404-11-22-99">+12 404-11-22-99</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <i class="fas fa-envelope-open-text"></i></div>
                        <div class="text-box">
                            <h3 class="mb-2">Help Desk</h3>
                            <p> <a href="mailto:info@gmail.com">info@gmail.com</a></p>
                            <p> <a href="mailto:support@gmail.com">support@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //contact -->

<!-- contact map -->
<section class="w3l-contact-main" id="contact">
    <div class="container">
        <div class="map pt-lg-3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059445135!2d-74.25986613799748!3d40.69714941774136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e3!4m0!4m0!5e0!3m2!1sen!2sin!4v1570181661801!5m2!1sen!2sin"
                allowfullscreen=""></iframe>
        </div>
    </div>
</section>
<!-- //contact map -->

<!-- contact-form -->
<section class="w3l-contact-main">
    <div class="contact-infhny py-5">
        <div class="container py-lg-3">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:600px;">
                <p>Send your Queries</p>
                <h3 class="title-style">Drop Us A Line</h3>
            </div>
            <div class="top-map">
                <div class="map-content-9">
                    <form action="https://sendmail.w3layouts.com/submitForm" method="post">
                        <div class="form-top">
                            <div class="form-top-left">
                                <input type="text" name="w3lName" id="w3lName" placeholder="Name" required="">
                                <input type="number" name="w3lPhone" placeholder="Your phone number" required="">
                                <input type="email" name="w3lSender" id="w3lSender" placeholder="Email*"
                                    required="">
                                <input type="text" name="w3lSubject" id="w3lName" placeholder="Subject" required="">
                            </div>
                            <div class="form-top-righ">
                                <textarea name="w3lMessage" id="w3lMessage" placeholder="Message*"
                                    required=""></textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-style btn-primary">Submit Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //contact-form -->

<button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fas fa-level-up-alt" aria-hidden="true"></span>
</button>

<?php get_footer();?>
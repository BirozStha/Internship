<?php get_header(); ?>


    <!-- banner section -->
    <div class="slideshow">
        <div class="holder">
            <div class="slide slide-1">
                <span class="container">
                    <span class="banner-content">
                        <h3>Travel & Adventures </h3>
                        <p>Discover amzaing places at exclusive deals.</p>
                        <a class="btn btn-style mt-sm-5 mt-4" href="about.html">Explore More</a>
                    </span>
                </span>
            </div>
            <div class="slide slide-2">
                <span class="container">
                    <span class="banner-content">
                        <h3 class="mb-2">Your Journey Begins</h3>
                        <p>Take advantage of this amazing exclusive offers.</p>
                        <a class="btn btn-style mt-sm-5 mt-4" href="about.html">Explore More</a>
                    </span>
                </span>
            </div>
            <div class="slide slide-3">
                <span class="container">
                    <span class="banner-content">
                        <h3>Love and Travel</h3>
                        <p>Discover amzaing places at exclusive deals.</p>
                        <a class="btn btn-style mt-sm-5 mt-4" href="about.html">Explore More</a>
                    </span>
                </span>
            </div>
            <div class="slide slide-4">
                <span class="container">
                    <span class="banner-content">
                        <h3>Live your Adventure</h3>
                        <p>Take advantage of this amazing exclusive offers.</p>
                        <a class="btn btn-style mt-sm-5 mt-4" href="about.html">Explore More</a>
                    </span>
                </span>
            </div>
        </div>
        <div class="steps"></div>
        <a href="#" class="prev"><i class="fas fa-arrow-left"></i></a>
        <a href="#" class="next"><i class="fas fa-arrow-right"></i></a>
    </div>
    <!-- //banner section -->

    <!-- booking form section -->
    <section class="w3l-form-main py-5" id="book">
        <div class="container py-lg-5 py-md-4 py-2">
            <form action="#" method="post" class="form-styles">
                <div class="">
                    <label for="inputtextnumber" class="form-label">Date from:</label>
                    <input type="date" name="date" id="dateofbirth" required="">
                </div>
                <div class="">
                    <label for="inputtextnumber" class="form-label">Destinations:</label>
                    <span class="input-group-btn">
                        <select class="btn btn-default" name="ext" required>
                            <option selected="">Select Location</option>
                            <option>Australia</option>
                            <option>London</option>
                            <option>India</option>
                            <option>Bangladesh</option>
                            <option>Saudi Arabia</option>
                            <option>America</option>
                            <option>Srilanka</option>
                        </select>
                    </span>
                </div>
                <div class="">
                    <label for="inputtextnumber" class="form-label">Activity:</label>
                    <span class="input-group-btn">
                        <select class="btn btn-default" name="ext" required>
                            <option selected="">Select Any</option>
                            <option>Adventure</option>
                            <option>Beache</option>
                            <option>City Tours</option>
                            <option>Cruises</option>
                            <option>Discovery</option>
                            <option>Historical</option>
                            <option>Relaxation Tours</option>
                        </select>
                    </span>
                </div>
                <div class="">
                    <label for="inputtextnumber" class="form-label">Guests:</label>
                    <span class="input-group-btn">
                        <select class="btn btn-default" name="ext" required>
                            <option selected="">0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                    </span>
                </div>
                <button class="btn btn-style" type="submit">Find Tour</button>
            </form>
        </div>
    </section>
    <!-- //booking form section -->

    
    <!-- about section -->
    <section class="w3l-aboutblock py-lg-5 py-4" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/about.jpg" alt="" class="img-fluid radius-image">
                </div>
                <div class="col-lg-6 ps-xl-5 ps-lg-4 mt-lg-0 mt-5">
                    <div class="title-main">
                        <p>About Us</p>
                        <h3 class="title-style">Plan Your Trip with Tours</h3>
                    </div>
                    <p class="mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</p>
                    <ul class="mt-4 list-style-lis">
                        <li><i class="fas fa-check-circle"></i>2000+ Our Worldwide Guide</li>
                        <li class="mt-2"><i class="fas fa-check-circle"></i>100% Trusted Tour Agency</li>
                        <li class="mt-2"><i class="fas fa-check-circle"></i>24+ Years of Experience</li>
                        <li class="mt-2"><i class="fas fa-check-circle"></i>100% Travelers are Happy</li>
                    </ul>
                    <a href="contact.html" class="btn btn-style mt-5">Booking Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- //about section -->

    <!-- tours slider section -->
    <section class="w3l-index5 pb-5 pt-4">
        <div class="container-fluid py-lg-5 py-md-4 py-2">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:600px;">
                <p>Featured tours</p>
                <h3 class="title-style">Most Popular Tours</h3>
            </div>
            <div class="inner-sec-w3layouts pb-4">
                <div class="owl-three owl-carousel owl-theme">
                    <div class="item">
                        <div class="content-left-sec">
                            <a class="blog-link d-block zoom-image" href="tours.html"><img src="<?php echo get_template_directory_uri() ?>/assets/images/s1.jpg"
                                    class="img-fluid scale-image" alt=""></a>
                            <div class="blog-info">
                                <ul class="rating-list mb-2">
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li class="ms-1">4.07</li>
                                </ul>
                                <a href="tours.html" class="to-title">Discovery Best Tours</a>
                                <p class="mt-1"><i class="fas fa-map-marker-alt me-1"></i>Central Park West NY, USA</p>
                                <div class="to-price mt-2">
                                    <label>From</label> <span>$39.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <p><i class="far fa-clock me-1"></i>10 Days</p>
                                    <a href="tours.html" class="btn btn-style btn-style-primary">Explore<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-left-sec">
                            <a class="blog-link d-block zoom-image" href="tours.html"><img src="<?php echo get_template_directory_uri() ?>/assets/images/s2.jpg"
                                    class="img-fluid scale-image" alt=""></a>
                            <div class="blog-info">
                                <ul class="rating-list mb-2">
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li class="ms-1">4.05</li>
                                </ul>
                                <a href="tours.html" class="to-title">Dubai – Stunning Places</a>
                                <p class="mt-1"><i class="fas fa-map-marker-alt me-1"></i>5th Avenue, London</p>
                                <div class="to-price mt-2">
                                    <label>From</label> <span>$69.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <p><i class="far fa-clock me-1"></i>15 Days</p>
                                    <a href="tours.html" class="btn btn-style btn-style-primary">Explore<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-left-sec">
                            <a class="blog-link d-block zoom-image" href="tours.html"><img src="<?php echo get_template_directory_uri() ?>/assets/images/s3.jpg"
                                    class="img-fluid scale-image" alt=""></a>
                            <div class="blog-info">
                                <ul class="rating-list mb-2">
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li class="ms-1">4.07</li>
                                </ul>
                                <a href="tours.html" class="to-title">Enquiry Form Only – Italy</a>
                                <p class="mt-1"><i class="fas fa-map-marker-alt me-1"></i>Henley Street, Italy</p>
                                <div class="to-price mt-2">
                                    <label>From</label> <span>$39.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <p><i class="far fa-clock me-1"></i>6 Days</p>
                                    <a href="tours.html" class="btn btn-style btn-style-primary">Explore<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-left-sec">
                            <a class="blog-link d-block zoom-image" href="tours.html"><img src="<?php echo get_template_directory_uri() ?>/assets/images/s4.jpg"
                                    class="img-fluid scale-image" alt=""></a>
                            <div class="blog-info">
                                <ul class="rating-list mb-2">
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li class="ms-1">4.08</li>
                                </ul>
                                <a href="tours.html" class="to-title">Switzerland – best Zurich </a>
                                <p class="mt-1"><i class="fas fa-map-marker-alt me-1"></i>Zermatt, USA</p>
                                <div class="to-price mt-2">
                                    <label>From</label> <span>$49.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <p><i class="far fa-clock me-1"></i>7 Days</p>
                                    <a href="tours.html" class="btn btn-style btn-style-primary">Explore<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-left-sec">
                            <a class="blog-link d-block zoom-image" href="tours.html"><img src="<?php echo get_template_directory_uri() ?>/assets/images/s6.jpg"
                                    class="img-fluid scale-image" alt=""></a>
                            <div class="blog-info">
                                <ul class="rating-list mb-2">
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li class="ms-1">4.09</li>
                                </ul>
                                <a href="tours.html" class="to-title">Paris – Eiffel Tower</a>
                                <p class="mt-1"><i class="fas fa-map-marker-alt me-1"></i>Northern central France, Paris
                                </p>
                                <div class="to-price mt-2">
                                    <label>From</label> <span>$69.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <p><i class="far fa-clock me-1"></i>15 Days</p>
                                    <a href="tours.html" class="btn btn-style btn-style-primary">Explore<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-left-sec">
                            <a class="blog-link d-block zoom-image" href="tours.html"><img src="<?php echo get_template_directory_uri() ?>/assets/images/s5.jpg"
                                    class="img-fluid scale-image" alt=""></a>
                            <div class="blog-info">
                                <ul class="rating-list mb-2">
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li class="ms-1">4.06</li>
                                </ul>
                                <a href="tours.html" class="to-title">America – Lake Tahoe</a>
                                <p class="mt-1"><i class="fas fa-map-marker-alt me-1"></i>Figueroa Mountain Road, USA
                                </p>
                                <div class="to-price mt-2">
                                    <label>From</label> <span>$59.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <p><i class="far fa-clock me-1"></i>12 Days</p>
                                    <a href="tours.html" class="btn btn-style btn-style-primary">Explore<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //tours slider section -->

    <!-- stats section -->
    <section class="w3_stats py-5" id="stats">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-main text-center mx-auto mb-5" style="max-width:600px;">
                <p>Statistics</p>
                <h3 class="title-style text-white">We have over 10 years Experience</h3>
            </div>
            <div class="w3-stats text-center py-lg-4">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <i class="fas fa-route"></i>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="timer" data-to="200" data-speed="1500"></div>
                                <span class="stats-plus">+</span>
                            </div>
                            <p class="count-text">Total Destinations</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <i class="fas fa-smile"></i>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="timer" data-to="100" data-speed="1500"></div>
                                <span class="stats-plus">+</span>
                            </div>
                            <p class="count-text">Happy People</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mt-md-0 mt-4">
                        <div class="counter">
                            <i class="fas fa-medal"></i>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="timer" data-to="30" data-speed="1500"></div>
                                <span class="stats-plus">+</span>
                            </div>
                            <p class="count-text">Awards Won</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mt-md-0 mt-4">
                        <div class="counter">
                            <i class="fas fa-umbrella-beach"></i>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="timer" data-to="130" data-speed="1500"></div>
                                <span class="stats-plus">+</span>
                            </div>
                            <p class="count-text">Stunning Places</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //stats section -->

    <!-- services section -->
    <section class="w3l-grids-block py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:600px;">
                <p>Our Services</p>
                <h3 class="title-style">Our Amazing Services for your Travel</h3>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="bottom-block">
                        <a href="tours.html" class="d-block">
                            <i class="fas fa-dragon"></i>
                            <h3 class="my-3">Wildlife Tours</h3>
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium tempora
                                rerum perspiciatis?</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mt-md-0 mt-4">
                    <div class="bottom-block">
                        <a href="tours.html" class="d-block">
                            <i class="fas fa-plane-departure"></i>
                            <h3 class="my-3">Adventure Tours</h3>
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium tempora
                                rerum perspiciatis?</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mt-lg-0 mt-4">
                    <div class="bottom-block">
                        <a href="tours.html" class="d-block">
                            <i class="fab fa-discourse"></i>
                            <h3 class="my-3">Trip Planing</h3>
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium tempora
                                rerum perspiciatis?</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //services section -->

    <!-- why section -->
    <section class="w3l-whyblock pb-5 pt-2">
        <div class="container pb-lg-5 pb-md-4 pb-2">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/about2.jpg" alt="" class="img-fluid radius-image">
                </div>
                <div class="col-lg-6 ps-xl-5 ps-lg-4 mt-lg-0 mt-5">
                    <div class="title-main mb-4" style="max-width:600px;">
                        <p>Our Features</p>
                        <h3 class="title-style">Why Choose Tours!</h3>
                    </div>
                    <p>Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</p>
                    <div class="two-grids mt-5">
                        <div class="grids_info">
                            <i class="fas fa-certificate"></i>
                            <div class="detail">
                                <h4>Professional and Certified</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit.</p>
                            </div>
                        </div>
                        <div class="grids_info mt-xl-5 mt-4">
                            <i class="fas fa-money-bill-wave"></i>
                            <div class="detail">
                                <h4>Get Instant Tour Bookings</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //why section -->

    <!-- blog section -->
    <div class="w3l-blog-content py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:600px;">
                <p>Our Blog</p>
                <h3 class="title-style">Learn more from our latest Blog Posts</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-grid-1">
                        <div class="card-header p-0 position-relative">
                            <a href="#blog" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="<?php echo get_template_directory_uri() ?>/assets/images/blog1.jpg" alt="Card image cap">
                            </a>
                            <div class="course-price-badge">Trips</div>
                        </div>
                        <div class="card-body course-details">
                            <div class="course-meta mb-3">
                                <div class="meta-item course-students">
                                    <a href="#author"><span class="fas fa-user"></span>
                                        <span class="meta-value"></span>John</a>
                                </div>
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-heart"></span>
                                    <span class="meta-value"> 23 </span>
                                </div>
                                <div class="meta-item course-students">
                                    <span class="fa fa-calendar"></span>
                                    <span class="meta-value">Dec 06, 2021</span>
                                </div>
                            </div>
                            <a href="#blog" class="course-desc">Travel the Most Beautiful Places in the
                                World</a>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur elit. Earum mollitia
                                ipsam autem.</p>
                            <a href="#blog" class="btn btn-style mt-4">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="blog-grid-1">
                        <div class="card-header p-0 position-relative">
                            <a href="#blog" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="<?php echo get_template_directory_uri()?>/assets/images/blog2.jpg" alt="Card image cap">
                            </a>
                            <div class="course-price-badge">Travels</div>
                        </div>
                        <div class="card-body course-details">
                            <div class="course-meta mb-3">
                                <div class="meta-item course-students">
                                    <a href="#author"><span class="fas fa-user"></span>
                                        <span class="meta-value"></span>Anton</a>
                                </div>
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-heart"></span>
                                    <span class="meta-value"> 24 </span>
                                </div>
                                <div class="meta-item course-students">
                                    <span class="fa fa-calendar"></span>
                                    <span class="meta-value">Dec 07, 2021</span>
                                </div>
                            </div>
                            <a href="#blog" class="course-desc">A Place where Start New Life with Peace</a>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur elit. Earum mollitia
                                ipsam autem.</p>
                            <a href="#blog" class="btn btn-style mt-4">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <div class="blog-grid-1">
                        <div class="card-header p-0 position-relative">
                            <a href="#blog" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="<?php echo get_template_directory_uri()?>/assets/images/blog3.jpg" alt="Card image cap">
                            </a>
                            <div class="course-price-badge">Journey</div>
                        </div>
                        <div class="card-body course-details">
                            <div class="course-meta mb-3">
                                <div class="meta-item course-students">
                                    <a href="#author"><span class="fas fa-user"></span>
                                        <span class="meta-value"></span>Miche</a>
                                </div>
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-heart"></span>
                                    <span class="meta-value"> 22 </span>
                                </div>
                                <div class="meta-item course-students">
                                    <span class="fa fa-calendar"></span>
                                    <span class="meta-value">Dec 08, 2021</span>
                                </div>
                            </div>
                            <a href="#blog" class="course-desc">Top 10 Destinations & Adventure Trips</a>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur elit. Earum mollitia
                                ipsam autem.</p>
                            <a href="#blog" class="btn btn-style mt-4">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //blog section -->

    <!-- promocode section -->
    <section class="w3l-promocode py-5">
        <div class="container ppy-lg-5 py-md-4 py-2">
            <div class="row aap-4-section align-items-center">
                <div class="col-lg-6 col-8 m-auto app4-right-image pe-md-5 text-center">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/img.jpg" class="img-fluid radius-image" alt="App Device" />
                </div>
                <div class="col-lg-6 app4-left-text ps-lg-0 mb-lg-0 mb-5">
                    <h6>For 30% Discount</h6>
                    <h4>Get Our Promocode</h4>
                    <p class="mb-4"> Uspendisse efficitur orci urna. In et augue ornare, tempor massa in, luctus
                        sapien. Proin a
                        diam et dui fermentum molestie vel id neque. </p>
                    <div class="app-4-connection">
                        <div class="newsletter">
                            <label>Never Miss a Deal !</label>
                            <form action="#" methos="GET" class="d-flex wrap-align">
                                <input type="email" placeholder="Enter your email id" required="required" />
                                <button type="submit" class="button-style">Get Promocode</button>
                            </form>
                        </div>
                        <p class="mobile-text-app mt-4 pt-2">(Or) To Get Our Mobile Apps</p>
                        <div class="app-4-icon">
                            <ul>
                                <li><a href="#url" title="Apple" class="app-icon apple-vv"><span
                                            class="fab fa-apple  icon-color" aria-hidden="true"></span></a></li>
                                <li><a href="#url" title="Google play" class="app-icon play-vv"><span
                                            class="fab fa-google-play icon-color" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#url" title="Microsoft" class="app-icon windows-vv"><span
                                            class="fab fa-windows icon-color" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //promocode section -->

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>


<?php get_footer(); ?>
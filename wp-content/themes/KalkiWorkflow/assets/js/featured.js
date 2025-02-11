jQuery(document).ready(function($) {
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });

    const slides = document.querySelectorAll(".testimonial-slide");
    const prevBtn = document.getElementById("prevTestimonial");
    const nextBtn = document.getElementById("nextTestimonial");
    const prevImage = document.getElementById("prevImage");
    const nextImage = document.getElementById("nextImage");

    let currentIndex = 0;

    function updateSlider() {
        if (!slides.length || !prevImage || !nextImage) return; // Prevent errors
        slides.forEach((slide, index) => {
            slide.style.transform = `translateX(-${currentIndex * 100}%)`;
        });

        const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
        const nextIndex = (currentIndex + 1) % slides.length;

        prevImage.src = slides[prevIndex]?.querySelector(".testimonial-img img")?.src || "";
        nextImage.src = slides[nextIndex]?.querySelector(".testimonial-img img")?.src || "";
    }

    if (prevBtn) {
        prevBtn.addEventListener("click", function () {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener("click", function () {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        });
    }

    updateSlider();
});

document.addEventListener("DOMContentLoaded", function () {
    let members = document.querySelectorAll(".team-member-large");
    let memberTexts = document.querySelectorAll(".team-member-text");
    let thumbnails = document.querySelectorAll(".team-thumb");
    let prevBtn = document.getElementById("prev-btn");
    let nextBtn = document.getElementById("next-btn");

    let currentIndex = 0;

    function updateActiveMember(index) {
        if (!members.length || !memberTexts.length || !thumbnails.length) return;
        members.forEach(member => member.classList.remove("active"));
        memberTexts.forEach(text => text.classList.remove("active"));
        thumbnails.forEach(thumb => thumb.classList.remove("selected"));

        members[index]?.classList.add("active");
        memberTexts[index]?.classList.add("active");
        thumbnails[index]?.classList.add("selected");
    }

    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener("click", function () {
            currentIndex = index;
            updateActiveMember(currentIndex);
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener("click", function () {
            currentIndex = (currentIndex - 1 + members.length) % members.length;
            updateActiveMember(currentIndex);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener("click", function () {
            currentIndex = (currentIndex + 1) % members.length;
            updateActiveMember(currentIndex);
        });
    }

    updateActiveMember(currentIndex);
});

// Nav
// function showOnScroll($id) {
//     let el = document.getElementById($id);
//     $(window).scroll(function () {
//         if ($(this).scrollTop() > 500) {
//             el.style.opacity = 1;
//         } else {
//             el.style.opacity = 0;
//         }
//     });
// }
// Nav end

// Competition
// top
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slide-top");
    var dots = document.getElementsByClassName("page-top");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

// bottom
var slideIndexx = 1;
showSlidess(slideIndexx);

function plusSlidess(n) {
    showSlidess(slideIndexx += n);
}

function currentSlidee(n) {
    showSlidess(slideIndexx = n);
}

function showSlidess(n) {
    var i;
    var slide = document.getElementsByClassName("slide-bottom");
    var dot = document.getElementsByClassName("page-bottom");
    if (n > slide.length) { slideIndexx = 1 }
    if (n < 1) { slideIndexx = slide.length }
    for (i = 0; i < slide.length; i++) {
        slide[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slide[slideIndexx - 1].style.display = "block";
    dot[slideIndexx - 1].className += " active";
}

// sm-top
var slideIndexSm = 1;
showSlidesSm(slideIndexSm);

function plusSlidesSm(n) {
    showSlidesSm(slideIndexSm += n);
}

function currentSlideSm(n) {
    showSlidesSm(slideIndexSm = n);
}

function showSlidesSm(n) {
    var i;
    var slides = document.getElementsByClassName("slide-sm-top");
    var dots = document.getElementsByClassName("page-sm-top");
    if (n > slides.length) { slideIndexSm = 1 }
    if (n < 1) { slideIndexSm = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndexSm - 1].style.display = "block";
    dots[slideIndexSm - 1].className += " active";
}

// sm-bottom
var slideIndexxSm = 1;
showSlidessSm(slideIndexxSm);

function plusSlidessSm(n) {
    showSlidessSm(slideIndexxSm += n);
}

function currentSlideeSm(n) {
    showSlidessSm(slideIndexxSm = n);
}

function showSlidessSm(n) {
    var i;
    var slide = document.getElementsByClassName("slide-sm-bottom");
    var dot = document.getElementsByClassName("page-sm-bottom");
    if (n > slide.length) { slideIndexxSm = 1 }
    if (n < 1) { slideIndexxSm = slide.length }
    for (i = 0; i < slide.length; i++) {
        slide[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slide[slideIndexxSm - 1].style.display = "block";
    dot[slideIndexxSm - 1].className += " active";
}
// Competition end

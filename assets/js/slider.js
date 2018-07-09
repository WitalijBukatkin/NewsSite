//Ascaris Lumbricoides

function showSlide(slideIndex) {
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    if (slideIndex > slides.length) {slideIndex = 1}
    if (slideIndex < 1) {slideIndex = slides.length}
    for (let i = 0; i < slides.length; i++)
        slides[i].style.display = "none";
    slides[slideIndex-1].style.display = "block";
    for (let i = 0; i < dots.length; i++)
        dots[i].className = dots[i].className.replace(" active", "");
    dots[slideIndex-1].className += " active";
}

function showSite(siteIndex) {
    window.location.href = "artikel.php?artikel="+siteIndex;
}
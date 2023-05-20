// Variabel Dropdown
const tombolMenu = document.querySelector("header #navbar .tombol-menu"),
    tombolMenuIcon = document.querySelector("header #navbar .tombol-menu i"),
    dropDownMenu = document.querySelector("header .dropdown-menu");

// Function Tombol Open Dropdown Navbar
tombolMenu.onclick = function () {
    dropDownMenu.classList.toggle("open")
}

//Variabel Carousel
const carouselRow = document.querySelector(".slides-row"),
    carouselSlides = document.getElementsByClassName("slide"),
    dots = document.getElementsByClassName("dot"),
    nextBtn = document.querySelector(".next"),
    prevBtn = document.querySelector(".prev");

// Deklarasi Variabel
let index = 1;
var width;

function slideWidth() {
    width = carouselSlides[0].clientWidth;
}
slideWidth();
window.addEventListener("resize", slideWidth);
carouselRow.style.transform = "translateX(" + (-width * index) + "px)";

// Next Slide
nextBtn.addEventListener("click", nextSlide);

function nextSlide() {
    if (index >= carouselSlides.length - 1) {
        return
    };
    carouselRow.style.transition = "transform 0.2s ease-out";
    index++;
    carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
}
dotsLabel();

// Previous Slide
prevBtn.addEventListener("click", prevSlide);

function prevSlide() {
    if (index <= 0) {
        return
    };
    carouselRow.style.transition = "transform 0.2s ease-out";
    index--;
    carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
    dotsLabel();
}

// Loop Carousel Slide
carouselRow.addEventListener("transitionend", function () {
    if (carouselSlides[index].id === "duplikat-slide-awal") {
        carouselRow.style.transition = "none";
        index = carouselSlides.length - index;
        carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
        dotsLabel();
    }

    if (carouselSlides[index].id === "duplikat-slide-akhir") {
        carouselRow.style.transition = "none";
        index = carouselSlides.length - 2;
        carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
        dotsLabel();
    }

});

// Auto Sliding
function autoSlide() {
    deleteInterval = setInterval(timer, 3500);

    function timer() {
        nextSlide();
    }
}
autoSlide();

// Mouse Hover Carousel = Stop Auto Sliding 
const mainContainer = document.querySelector(".carouselnya");
mainContainer.addEventListener("mouseover", function () {
    clearInterval(deleteInterval);
});

//Mouse Kada Hover Carousel = Lanjut Auto Sliding
mainContainer.addEventListener("mouseout", autoSlide);

//Ingpo Pagination 
function dotsLabel() {
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("active", "");
    }
    dots[index - 1].className += " active";
}

//Hide and Seek
var btn_elements = document.querySelectorAll("header li button");
var item_elements = document.querySelectorAll(".item");

for (var i = 0; i < btn_elements.length; i++) {
    btn_elements[i].addEventListener("click", function () {
        btn_elements.forEach(function (button) {
            button.classList.remove("active");
        })
        this.classList.add("active");
        var btn_value = this.getAttribute("data-btn");
        item_elements.forEach(function (item) {
            item.style.display = "none";
        });
        if (btn_value == "belanja") {
            document.querySelector("." + btn_value).style.display = "block";
        } else if (btn_value == "semtim") {
            document.querySelector("." + btn_value).style.display = "block";
        } else {
            console.log("");
        }
    });
}
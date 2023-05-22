// BERANDA HEADER -> Variabel Dropdown
const tombolMenu = document.querySelector("header .nav-bar .tombol-menu"),
    tombolMenuIcon = document.querySelector("header .nav-bar .tombol-menu i"),
    dropDownMenu = document.querySelector("header .dropdown-menu");

// BERANDA HEADER -> Function Tombol Open Dropdown Navbar
tombolMenu.onclick = function () {
    dropDownMenu.classList.toggle("open")
}

// Belanja -> Navbar Belanja Di Click
var navBaju = document.getElementById("nav-baju");
var navMchan = document.getElementById("nav-mchan");
var belanjaBaju = document.getElementById("belanja-baju");
var belanjaMchan = document.getElementById("belanja-mchan");
var isiBelanja = document.getElementById("isi-belanja")

navBaju.onclick = function () {
    navBaju.classList.add("active");
    navMchan.classList.remove("active");
    belanjaBaju.style.display = "block";
    belanjaMchan.style.display = "none";
    belanjaBaju.style.animation = "baju-in .8s";
    isiBelanja.style.animation = "baju-in .8s";
}

navMchan.onclick = function () {
    navMchan.classList.add("active");
    navBaju.classList.remove("active");
    belanjaMchan.style.display = "block";
    belanjaBaju.style.display = "none";
    belanjaMchan.style.animation = "mchan-in .8s";
    isiBelanja.style.animation = "mchan-in .8s";
}
    

// // BERANDA MAIN -> Variabel Carousel
// const carouselRow = document.querySelector(".slides-row"),
//     carouselSlides = document.getElementsByClassName("slide"),
//     dots = document.getElementsByClassName("dot"),
//     nextBtn = document.querySelector(".next"),
//     prevBtn = document.querySelector(".prev");

// // BERANDA MAIN -> Deklarasi Variabel Carousel
// let index = 1;
// var width;

// function slideWidth() {
//     width = carouselSlides[0].clientWidth;
// }
// slideWidth();
// window.addEventListener("resize", slideWidth);
// carouselRow.style.transform = "translateX(" + (-width * index) + "px)";

// // BERANDA MAIN -> Next Slide
// nextBtn.addEventListener("click", nextSlide);

// function nextSlide() {
//     if (index >= carouselSlides.length - 1) {
//         return
//     };
//     carouselRow.style.transition = "transform 0.7s ease-out";
//     index++;
//     carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
//     dotsLabel();
// }

// // BERANDA MAIN -> Previous Slide
// prevBtn.addEventListener("click", prevSlide);

// function prevSlide() {
//     if (index <= 0) {
//         return
//     };
//     carouselRow.style.transition = "transform 0.7s ease-out";
//     index--;
//     carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
//     dotsLabel();
// }

// // BERANDA MAIN -> Loop Carousel Slide
// carouselRow.addEventListener("transitionend", function () {
//     if (carouselSlides[index].id === "duplikat-slide-awal") {
//         carouselRow.style.transition = "none";
//         index = carouselSlides.length - index;
//         carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
//         dotsLabel();
//     }

//     if (carouselSlides[index].id === "duplikat-slide-akhir") {
//         carouselRow.style.transition = "none";
//         index = carouselSlides.length - 2;
//         carouselRow.style.transform = "translateX(" + (-width * index) + "px)";
//         dotsLabel();
//     }

// });

// // BERNADA MAIN -> Auto Sliding
// function autoSlide() {
//     deleteInterval = setInterval(timer, 3500);

//     function timer() {
//         nextSlide();
//     }
// }
// autoSlide();

// // BERANDA MAIN -> Mouse Hover Carousel = Stop Auto Sliding 
// const mainContainer = document.querySelector(".carouselnya");
// mainContainer.addEventListener("mouseover", function () {
//     clearInterval(deleteInterval);
// });

// // BERANDA MAIN -> Mouse Kada Hover Carousel = Lanjut Auto Sliding
// mainContainer.addEventListener("mouseout", autoSlide);

// // BERANDA MAIN -> Ingpo Pagination 
// function dotsLabel() {
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace("active", "");
//     }
//     dots[index - 1].className += " active";
// }

//Hide and Seek
// var btn_elements = document.querySelectorAll("header li button");
// var item_elements = document.querySelectorAll(".item");

// for (var i = 0; i < btn_elements.length; i++) {
//     btn_elements[i].addEventListener("click", function () {
//         btn_elements.forEach(function (button) {
//             button.classList.remove("active");
//         });
//         this.classList.add("active");
//         var btn_value = this.getAttribute("data-btn");
//         item_elements.forEach(function (item) {
//             item.style.display = "none";
//         });
//         if (btn_value == "belanja") {
//             document.querySelector("." + btn_value).style.display = "block";
//         } else if (btn_value == "semtim") {
//             document.querySelector("." + btn_value).style.display = "block";
//         } else {
//             console.log("");
//         }
//     });
// }

// Belanja - > Produk Di Click
// var overlay = document.getElementById("overlay");
// var produkKlik = document.getElementById("produk-klik");
// var ukuranL = document.querySelector(".container-belanja .overlay .produk-klik .konten-bawah .ukuran #l")
// var ukuranXL = document.querySelector(".container-belanja .overlay .produk-klik .konten-bawah .ukuran #xl")
// var ukuranXXL = document.querySelector(".container-belanja .overlay .produk-klik .konten-bawah .ukuran #xxl")
// var l = document.getElementById("l");
// var xl = document.getElementById("xl");
// var xxl = document.getElementById("xxl");

// function tampilProduk() {
//     overlay.style.display = "block";
//     produkKlik.classList.add("active");
// }

// function tutupProduk() {
//     overlay.style.display = "none";
//     produkKlik.classList.remove("active");
// }

// l.onclick = function () {
//     ukuranL.classList.toggle("active");
//     ukuranXL.classList.remove("active");
//     ukuranXXL.classList.remove("active");
// }

// xl.onclick = function () {
//     ukuranL.classList.remove("active");
//     ukuranXL.classList.toggle("active");
//     ukuranXXL.classList.remove("active");
// }

// xxl.onclick = function () {
//     ukuranL.classList.remove("active");
//     ukuranXL.classList.remove("active");
//     ukuranXXL.classList.toggle("active");
// }
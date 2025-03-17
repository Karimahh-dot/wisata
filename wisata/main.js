const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

// Mengontrol play/pause audio
document
  .getElementById("play-button")
  .addEventListener("click", function (event) {
    event.preventDefault();
    const audio = document.getElementById("background-audio");
    if (audio.paused) {
      audio.play();
    } else {
      audio.pause();
    }
  });

// Mengontrol buka/tutup menu
menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");
  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

navLinks.addEventListener("click", (e) => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-line");
});

// Scroll Reveal Animations
const scrollRevealOption = {
  origin: "bottom",
  distance: "50px",
  duration: 1000,
};

ScrollReveal().reveal(".header__image img", {
  ...scrollRevealOption,
  origin: "right",
});
ScrollReveal().reveal(".header__content p", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".header__content h1", {
  ...scrollRevealOption,
  delay: 1000,
});
ScrollReveal().reveal(".header__btns", { ...scrollRevealOption, delay: 1500 });
ScrollReveal().reveal(".destination__card", {
  ...scrollRevealOption,
  interval: 500,
});
ScrollReveal().reveal(".showcase__image img", {
  ...scrollRevealOption,
  origin: "left",
});
ScrollReveal().reveal(".showcase__content h4", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".showcase__content p", {
  ...scrollRevealOption,
  delay: 1000,
});
ScrollReveal().reveal(".showcase__btn", { ...scrollRevealOption, delay: 1500 });
ScrollReveal().reveal(".banner__card", {
  ...scrollRevealOption,
  interval: 500,
});
ScrollReveal().reveal(".discover__card", {
  ...scrollRevealOption,
  interval: 500,
});

// Swiper
const swiper = new Swiper(".swiper", {
  slidesPerView: 3,
  spaceBetween: 20,
  loop: true,
});
let next = document.querySelector(".next");
let prev = document.querySelector(".prev");

next.addEventListener("click", function () {
  let items = document.querySelectorAll(".item");
  document.querySelector(".slide").appendChild(items[0]);
});

prev.addEventListener("click", function () {
  let items = document.querySelectorAll(".item");
  document.querySelector(".slide").prepend(items[items.length - 1]); // here the length of items = 6
});

let currentIndex = 0;

function slideLeft() {
  const row = document.querySelector(".row");
  const cards = document.querySelectorAll(".menu-card");
  currentIndex = currentIndex > 0 ? currentIndex - 1 : cards.length - 1;
  updateSlide(row, cards);
}

function slideRight() {
  const row = document.querySelector(".row");
  const cards = document.querySelectorAll(".menu-card");
  currentIndex = currentIndex < cards.length - 1 ? currentIndex + 1 : 0;
  updateSlide(row, cards);
}

function updateSlide(row, cards) {
  const cardWidth = cards[currentIndex].clientWidth;
  row.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
}

const backToTopButton = document.getElementById("backToTop");

// Munculkan tombol ketika halaman di-scroll
window.onscroll = function () {
  const button = document.getElementById("scrollButton");
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    button.style.display = "block";
  } else {
    button.style.display = "none";
  }
};

// script.js
document.getElementById("submitComment").addEventListener("click", function () {
  // Mengambil nilai dari textarea
  const commentInput = document.getElementById("commentInput");
  const commentText = commentInput.value.trim();

  // Memeriksa apakah textarea tidak kosong
  if (commentText !== "") {
    // Membuat elemen list baru
    const li = document.createElement("li");
    li.textContent = commentText; // Menetapkan teks komentar

    // Menambahkan komentar ke dalam daftar komentar
    document.getElementById("commentsList").appendChild(li);

    // Mengosongkan textarea setelah komentar ditambahkan
    commentInput.value = "";
  } else {
    alert("Komentar tidak boleh kosong!"); // Peringatan jika komentar kosong
  }
});

// Fungsi untuk scroll ke atas
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

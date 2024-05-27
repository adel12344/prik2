function closeNav() {
  document.body.classList.remove("nav-open");
}

function openNav() {
  document.body.classList.add("nav-open");
}

document.addEventListener("DOMContentLoaded", () => {
  const openNavButton = document.getElementById("openNav");
  const closeNavButton = document.getElementById("close-nav");
  const overlay = document.getElementById("overlay");

  openNavButton.addEventListener("click", openNav);
  closeNavButton.addEventListener("click", closeNav);
  overlay.addEventListener("click", closeNav);
});

document.addEventListener("DOMContentLoaded", function () {
  // First carousel
  const carouselInner = document.querySelector(".carousel-inner");
  const carouselItems = document.querySelectorAll(".carousel-item");
  const prevButton = document.querySelector(".carousel-control.prev");
  const nextButton = document.querySelector(".carousel-control.next");
  let currentIndex = 0;

  function updateCarousel() {
    const offset = -currentIndex * 100;
    carouselInner.style.transform = `translateX(${offset}%)`;
  }

  prevButton.addEventListener("click", function () {
    currentIndex =
      currentIndex > 0 ? currentIndex - 1 : carouselItems.length - 1;
    updateCarousel();
  });

  nextButton.addEventListener("click", function () {
    currentIndex =
      currentIndex < carouselItems.length - 1 ? currentIndex + 1 : 0;
    updateCarousel();
  });

  setInterval(function () {
    currentIndex =
      currentIndex < carouselItems.length - 1 ? currentIndex + 1 : 0;
    updateCarousel();
  }, 6000);

  // Second carousel
  const carouselInner2 = document.querySelector(".carousel-inner2");
  const carouselItems2 = document.querySelectorAll(".carousel-item2");
  const prevButton2 = document.querySelector(".carousel-control2.prev2");
  const nextButton2 = document.querySelector(".carousel-control2.next2");
  let currentIndex2 = 0;

  function updateCarousel2() {
    const offset = -currentIndex2 * 100;
    carouselInner2.style.transform = `translateX(${offset}%)`;
  }

  prevButton2.addEventListener("click", function () {
    currentIndex2 =
      currentIndex2 > 0 ? currentIndex2 - 1 : carouselItems2.length - 1;
    updateCarousel2();
  });

  nextButton2.addEventListener("click", function () {
    currentIndex2 =
      currentIndex2 < carouselItems2.length - 1 ? currentIndex2 + 1 : 0;
    updateCarousel2();
  });

  setInterval(function () {
    currentIndex2 =
      currentIndex2 < carouselItems2.length - 1 ? currentIndex2 + 1 : 0;
    updateCarousel2();
  }, 3000);
});

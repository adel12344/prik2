function closeNav() {
  const openNav = document.querySelector("#openNav");
  const nav = document.querySelector("nav");
  nav.style.display = "none";
  openNav.style.display = "block";
}

function openNav() {
  const openNav = document.querySelector("#openNav");
  const nav = document.querySelector("nav");
  nav.style.display = "block";
  openNav.style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
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
});

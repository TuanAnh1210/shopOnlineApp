const header__bar = document.querySelector(".header__bar");
const header__nav = document.querySelector(".header__nav");
const close_btn = document.querySelector(".close-btn");

header__bar.onclick = () => {
  Object.assign(header__nav.style, {
    transform: "translateX(0%)",
  });
};

close_btn.onclick = () => {
  Object.assign(header__nav.style, {
    transform: "translateX(-110%)",
  });
};

// handle active header__item
const items = document.querySelectorAll(".header__item");
const pathPage = window.location.pathname;

const arrPath = pathPage.split("/");

items.forEach((item) => {
  if (item.getAttribute("data-item") == arrPath[arrPath.length - 1]) {
    item.classList.add("active");
  }
  if (
    item.getAttribute("data-item") == "product" &&
    arrPath[arrPath.length - 1] == "detail"
  ) {
    item.classList.add("active");
  }
});

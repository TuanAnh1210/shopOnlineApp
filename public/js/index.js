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

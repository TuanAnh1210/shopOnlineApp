const dashBoard_item = document.querySelectorAll(".dashBoard_item");

const pathPage = window.location.pathname;

const arrPath = pathPage.split("/");

if (arrPath[arrPath.length - 1] == "productManage") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Quản lý sản phẩm") {
      item.classList.add("active");
    }
  });
} else if (arrPath[arrPath.length - 1] == "cateManage") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Quản lý danh mục") {
      item.classList.add("active");
    }
  });
} else if (arrPath[arrPath.length - 1] == "userManage") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Quản lý user") {
      item.classList.add("active");
    }
  });
} else {
  dashBoard_item[0].classList.add("active");
}

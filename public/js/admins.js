const dashBoard_item = document.querySelectorAll(".dashBoard_item");

const pathPage = window.location.pathname;

const arrPath = pathPage.split("/");

if (arrPath[arrPath.length - 1] == "productManage") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Quản lý sản phẩm") {
      item.classList.add("active");
    }
  });
} else if (arrPath[arrPath.length - 1] == "category") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Quản lý danh mục") {
      item.classList.add("active");
    }
  });
} else if (arrPath[arrPath.length - 1] == "users") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Quản lý tài khoản") {
      item.classList.add("active");
    }
  });
} else if (arrPath[arrPath.length - 1] == "admin_comment") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Quản lý bình luận") {
      item.classList.add("active");
    }
  });
} else if (arrPath[arrPath.length - 1] == "admin_statistical") {
  dashBoard_item.forEach((item) => {
    if (item.querySelector("a").innerText == "Thống kê") {
      item.classList.add("active");
    }
  });
} else {
  dashBoard_item[0].classList.add("active");
}

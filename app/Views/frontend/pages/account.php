<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $GLOBALS["domainPage"] ?>/public/css/account.css">

</head>

<body>
    <div class="account__wrapper">
        <div class="form__wrapper">
            <form class="form__login" action="" method="POST">
                <h2 class="form__title">Đăng nhập</h2>
                <div class="form__group">
                    <label for="">Email</label>
                    <input id="emailLogin" type="text" placeholder="Email" name="emailLogin">
                    <p class="error"></p>
                </div>
                <div class="form__group">
                    <label for="">Mật khẩu</label>
                    <input id="passLogin" type="password" placeholder="Mật khẩu" name="passLogin">
                    <p class="error"></p>

                </div>
                <button class="btn__login">Đăng nhập</button>
                <a class="forgot__pass" href="#">Quên mật khẩu</a>
                <a class="forgot__pass" href="<?= $GLOBALS["domainPage"] ?>">Trang chủ</a>
            </form>
            <form class="form__regis" action="">
                <h2 class="form__title regis">Đăng ký</h2>
                <div class="form__group">
                    <label for="">Họ tên</label>
                    <input type="text" placeholder="Họ và tên">
                    <p class="error"></p>
                </div>
                <div class="form__group">
                    <label for="">Email</label>
                    <input type="text" placeholder="Email">
                    <p class="error"></p>
                </div>
                <div class="form__group">
                    <label for="">Mật khẩu</label>
                    <input type="password" placeholder="Mật khẩu">
                    <p class="error"></p>
                </div>
                <div class="form__group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" placeholder="Xác nhận mật khẩu">
                    <p class="error"></p>
                </div>
                <div class="form__group flr">
                    <div>
                        <label for="">Khách hàng</label>
                        <input checked id="userIpt" name="option" type="radio" value="user" class="auth">
                    </div>
                    <div>
                        <label for="">Quản trị</label>
                        <input id="adminIpt" name="option" type="radio" value="admin" class="auth">
                    </div>
                </div>
                <button class="btn__regis">Đăng ký</button>
                <a class="forgot__pass" href="<?= $GLOBALS["domainPage"] ?>">Trang chủ</a>
            </form>
            <div class="overlay_container">
                <div class="overlay-login">
                    <div class="isInfoRegis">
                        <h2 class="overlay-title">Bạn chưa có tài khoản ?</h2>
                        <p class="overlay-sub">Đăng ký ngay để bắt đầu mua sắm nhé với Mangostino nhé !</p>
                        <button class="overlay-btn regisJs">Đăng ký ngay </button>
                    </div>
                    <div class="isInfoLogin close">
                        <h2 class="overlay-title">Chào mừng bạn đến với Mangostino</h2>
                        <p class="overlay-sub">Đăng nhập ngay để mua những sản phẩm đẹp nhất !</p>
                        <button class="overlay-btn loginJs">Đăng nhập ngay</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        const regisJs = document.querySelector('.regisJs')
        const loginJs = document.querySelector('.loginJs')
        const isInfoRegis = document.querySelector('.isInfoRegis')
        const isInfoLogin = document.querySelector('.isInfoLogin')
        const overlay_container = document.querySelector('.overlay_container')
        const form__login = document.querySelector('.form__login')
        const form__regis = document.querySelector('.form__regis')

        regisJs.onclick = () => {
            isInfoRegis.classList.add('close')
            isInfoLogin.classList.remove('close')
            overlay_container.classList.add('isRegis')
            form__login.classList.add('ani')
            form__regis.classList.remove('ani')
        }

        loginJs.onclick = () => {
            isInfoRegis.classList.remove('close')
            isInfoLogin.classList.add('close')
            overlay_container.classList.remove('isRegis')
            form__regis.classList.add('ani')
            form__login.classList.remove('ani')

        }


        // handle get data from db and convert arr php to arr js
        const listUser = <?= json_encode($listUser) ?>

        listUser.forEach(element => {
            for (let i in element) {
                if (!isNaN(Number(i))) {
                    delete element[i];
                }
            }
        });



        const formFieldLogin = ["emailLogin", "passLogin"]
        const form_login = document.querySelector('.form__login')

        const checkExist = () => {
            const emailLogin = document.querySelector("#emailLogin")
            const passLogin = document.querySelector("#passLogin")

            const isSuccess = listUser.some(user => user.email == emailLogin.value && user.password == passLogin.value)

            return isSuccess
        }

        const showError = (ele, message) => {
            ele.nextElementSibling.innerHTML = message
            ele.style.border = "1px solid red"
        }

        const hideError = (ele) => {
            ele.nextElementSibling.innerHTML = ""
            ele.style.border = ""
        }

        const regEmail = /^\w+@(\w+\.\w+){1,2}$/;

        form_login.onsubmit = (e) => {
            e.preventDefault()
            let isError = true
            formFieldLogin.forEach(field => {
                const ele = document.getElementById(field)

                if (field == 'emailLogin') {
                    if (!regEmail.test(ele.value.trim())) {
                        showError(ele, "Email không đúng định dạng")
                        isError = false
                    }
                }

                if (ele.value.trim() == "") {
                    showError(ele, "Dữ liệu không được để trống")
                    isError = false
                }

                ele.oninput = () => {
                    hideError(ele)
                }
            })

            if (isError) {
                if (checkExist()) {
                    form_login.submit()

                } else {
                    alert('Email hoặc mật khẩu không chính xác !')
                }
            }

        }
    </script>
</body>

</html>
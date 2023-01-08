<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/du_an_mau/public/css/accounts.css">

</head>

<body>
    <div class="account__wrapper">
        <div class="form__wrapper">
            <form class="form__login" action="">
                <h2 class="form__title">Đăng nhập</h2>
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
                <button class="btn__login">Đăng nhập</button>
                <a class="forgot__pass" href="#">Quên mật khẩu</a>
                <a class="forgot__pass" href="http://localhost/du_an_mau">Trang chủ</a>
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
                <button class="btn__regis">Đăng ký</button>
                <a class="forgot__pass" href="http://localhost/du_an_mau">Trang chủ</a>
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
    </script>
</body>

</html>
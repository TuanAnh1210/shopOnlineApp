<?php ipView('frontend.component.header') ?>


<div class="contact__wrapper">
    <div class="container">
        <h1 class="contact__heading">
            Liên hệ
        </h1>
        <p class="contact__sub">Chúng tôi luôn sẵn sàng tiếp nhận mọi ý kiến ​đóng góp và giải đáp những yêu cầu của
            bạn.<br>
            Hãy liên hệ ngay với chúng tôi</p>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <form class="form__contact" action="">
                    <div class="form__group">
                        <label for="">Họ tên</label>
                        <input type="text" required>
                        <p class="error"></p>
                    </div>
                    <div class="form__group">
                        <label for="">Email</label>
                        <input type="text" required>
                        <p class="error"></p>
                    </div>
                    <div class="form__group">
                        <label for="">Điện thoại</label>
                        <input type="text" required>
                        <p class="error"></p>
                    </div>
                    <div class="form__group">
                        <label for="">Nội dung</label>
                        <textarea name="" id="" cols="30" rows="10" required></textarea>
                        <p class="error"></p>
                    </div>

                    <button class="btn__send">Gửi đi</button>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <section
                    class="index-module_col__2EQm9 index-module_c-12__u7UXF index-module_m-12__2CxUL index-module_l-6__JoV9k">
                    <iframe style="width: 100%;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863855881387!2d105.7445984141118!3d21.03813279283602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1671415003992!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </section>
            </div>
        </div>
    </div>
</div>
<?php ipView('frontend.component.footer') ?>
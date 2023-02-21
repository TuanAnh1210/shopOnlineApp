<?php
include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$code = rand(1000, 9999);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'braintech0852131210@gmail.com'; // SMTP username
    $mail->Password = 'zurbsmwbtvmkhuzs'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('braintech0852131210@gmail.com', 'BrainTech');

    $mail->addAddress($emailCheck, 'tuan anh'); // Add a recipient
    // $mail->addAddress('tuananh1210085213@gmail.com', 'tuan em'); // Add a recipient
    // Name is optional

    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Ma xac minh email (vui long khong chia se cho ai)';
    $mail->Body = 'Mã xác minh của bạn là:' . $code;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác minh</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        font-family: Arial, Helvetica, sans-serif;
    }

    .form__wrapper {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url('http://localhost/du_an_mau/public/imgs/mail2.jpg') center center / cover no-repeat;

    }

    .authForm {
        width: 600px;
        max-height: 500px;
        border: 1px solid #ccc;
        background-color: white;
        display: flex;
        flex-direction: column;
        padding: 24px 12px;
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;


    }

    .authTitle {
        font-size: 24px;
        font-weight: 500;
        letter-spacing: .5px;
    }

    .authSub {
        font-size: 16px;
        font-style: italic;
        margin: 32px 0 12px 0;
    }

    .authCode {
        padding: 8px 20px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ccc;

        outline: none;
    }

    .authBtn {
        margin-top: 24px;
        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
        border: none;
        font-size: 16px;
        font-weight: 700;
        padding: 10px 0;
        border-radius: 8px;
        opacity: .8;
    }

    .authBtn:hover {
        opacity: 1;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="form__wrapper">
        <form class="authForm" action="http://localhost/du_an_mau/account/authForgotPass" method="POST">
            <h3 class="authTitle">Chúng tôi vừa gửi mã xác minh tới email của bạn !</h3>
            <p class="authSub">Vui lòng nhập mã xác minh</p>
            <input required type="text" class="authCode" placeholder="Nhập mã xác minh...">
            <input hidden type="text" value="<?= $emailCheck ?>" name="emailUser">

            <button class="authBtn">Xác minh</button>
        </form>
    </div>


    <script>
    const code = <?= json_encode($code) ?>

    const authForm_wrapper = document.querySelector('.authForm')

    authForm_wrapper.onsubmit = (e) => {
        e.preventDefault()
        const codeIpt = document.querySelector('.authCode')
        if (codeIpt.value == code) {
            alert('Xác minh thành công !')
            authForm_wrapper.submit()
        }
    }
    </script>
</body>

</html>
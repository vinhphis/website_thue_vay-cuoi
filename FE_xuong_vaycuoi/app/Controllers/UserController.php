<?php

namespace App\Controllers;

use App\Models\BienTheModel;
use App\Models\DetailOrderModel;
use App\Models\LichHenModel;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class UserController
{
    protected $userAccount, $detailOrderModel, $bienTheModel, $lichHenModel;
    public function __construct()
    {
        $this->detailOrderModel = new DetailOrderModel();
        $this->bienTheModel = new BienTheModel();
        $this->userAccount = new UserModel();
        $this->lichHenModel = new LichHenModel();
    }
    public function account()
    {
        $listProduct = $this->lichHenModel->selectAll($_SESSION['user']['id_account']);
        require '../Views/User/detail.php';
    }
    public function logout()
    {
        unset($_SESSION['user']);
        header("location: " . $_SESSION['url'] . "index.php ");
    }
    public function login()
    {
        if (isset($_POST['login'])) {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $checkAccount =  $this->userAccount->checkAccount($_POST['username'], $_POST['password']);
                var_dump($checkAccount);
                if ($checkAccount == true) {
                    $_SESSION['user'] = $checkAccount;

                    // if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

                    // }

                    header("location: " . $_SESSION['url'] . "index.php ");
                } else {
                    $thongbao = "<script>
                alert('Tài khoản mật khẩu của bạn chưa đúng');
                    </script>";
                    setcookie("thongbao", $thongbao, time() + 1);
                    header("location: " . $_SESSION['url'] . "?login ");
                }
            } else {
                echo "<script>
                alert('Vui lòng không bỏ trống thông tin');
                    </script>";
            }
        }
        require '../Views/User/login.php';
    }
    public function register()
    {
        if (isset($_POST['register'])) {
            if (!empty($_POST['username']) && !empty($_POST['email'])) {
                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $password = substr(str_shuffle($chars), 0, 10);
                $this->userAccount->add($_POST['username'], $password, $_POST['email']);
                $this->senMail($_POST['username'], $password, $_POST['email']);
                $thongbao = "<script>
                alert('Bạn đã đăng ký thành công, vui lòng kiểm tra email');
            </script>";
                setcookie("thongbao", $thongbao, time() + 1);
                header("location: " . $_SESSION['url'] . "?login ");
            } else {
                echo "<script>
                alert('Vui lòng không bỏ trống thông tin');
            </script>";
            }
        }
        require '../Views/User/register.php';
    }
    public function cart()
    {
        require '../Views/User/detail.php';
    }
    public  function senMail($hoten, $password, $email)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->SMTPDebug = 0;                    //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'qvinhjr10@gmail.com';                     //SMTP username
            $mail->Password   = 'eurm ngqu dmlf sfhm';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('qvinhjr10@gmail.com', 'vinh');
            $mail->addAddress('' . $email . '', '' . $hoten . '');     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'VGshop Thong Bao!!';
            $mail->Body    = '
            <div 
            style="font-family: Arial, Helvetica, sans-serif;"
            >
                <h1>Bạn đã đăng ký tài khoản thành công</h1>
                <h4>Mật khẩu : ' . $password . '</h4>
            
                <h2>Cảm ơn bạn đã ghé qua shop, chúc bạn ngày mới tốt lành!!</h2>
            </div>
            ';


            // $mail->AltBody = '
            // ho ten: abc   sdt: 0981085402
            // email : vinh@gmail.com


            // ';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

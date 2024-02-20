<?php

namespace App\Controllers;

use App\Models\BienTheModel;
use App\Models\DetailOrderModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Controllers\ProductController;
use App\Models\DetailDatLichModel;

class DetailOrderController extends ProductController
{
    protected $detailOrderModel, $bienTheModel, $detailDatLichModel;
    public function __construct()
    {
        $this->detailOrderModel = new DetailOrderModel();
        $this->bienTheModel = new BienTheModel();
        $this->detailDatLichModel = new DetailDatLichModel();
    }

    public function cart()
    {
        if (!isset($_SESSION['cart']))  $_SESSION['cart'] = [];

        if (!isset($_SESSION['user'])) {

            $id_bienthe = join(",", $_SESSION['cart']);

            if ($id_bienthe == true) {
                $bienthe = $this->bienTheModel->selectAll($id_bienthe, "");
            } else {
                $bienthe = $this->bienTheModel->selectAll(9999999, "");
            }
        } else {
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as  $value) {
                    $checkBienThe = $this->bienTheModel->checkIdBienThe($value, $_SESSION['user']['id_account']);
                    // var_dump($checkBienThe);
                    if (!$checkBienThe) {
                        $_SESSION['id_bienthe'] = $value;
                        var_dump($value);
                        $this->detailDatLichModel->add($_SESSION['user']['id_account'], $_SESSION['id_bienthe']);
                    }
                    unset($_SESSION['id_bienthe']);
                }
                unset($_SESSION['cart']);
            }

            $bienthe = $this->bienTheModel->selectAll("", $_SESSION['user']['id_account']);
        }

        require '../Views/cart.php';
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

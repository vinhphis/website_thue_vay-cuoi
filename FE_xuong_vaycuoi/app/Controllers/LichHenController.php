<?php

namespace App\Controllers;



// use App\Abstracts\AbstractController;
use App\Models\{BienTheModel, ProductModel, CategoryModel, ColorModel, DetailDatLichModel, LichHenModel, OrderModel, StyleModel};
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class LichHenController
{
    protected $productModel, $Swiftmailer, $detailDatLichModel, $lichHenModel, $bienTheModel, $categoryModel, $styleModel, $colorModel, $orderModel;

    public function __construct()
    {

        $this->bienTheModel = new BienTheModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->styleModel = new StyleModel();
        $this->colorModel = new ColorModel();
        $this->lichHenModel = new LichHenModel();
        $this->orderModel = new OrderModel();
        $this->detailDatLichModel = new DetailDatLichModel();
    }

    public function success()
    {
        echo '<script>alert("Bạn Đã Đặt Lịch Thành Công")</script>';
    }

    public function success_update()
    {
        echo '<script>alert("Cập nhật Sản Phẩm Thành Công")</script>';
    }

    public function success_xoa()
    {
        echo '<script>alert("Xóa Sản Phẩm Thành Công")</script>';
    }



    public function error()
    {
        echo '<script>alert("Không được bỏ trống thông tin")</script>';
    }

    public function bill()
    {
        if (isset($_POST['success_order1'])) {
            if (!empty($_POST['hoten']) && !empty($_POST['email']) && !empty($_POST['sdt']) && !empty($_POST['thoigian']) && !empty($_POST['ghichu'])) {
                $bienThe = $this->bienTheModel->check_bien_the($_POST['id_product'], $_POST['id_color'], $_POST['id_style']);
                // var_dump($_POST['thoigian']);
                // die;
                $this->lichHenModel->add1($_POST['hoten'], $_POST['email'], $_POST['sdt'], $bienThe['id_bienthe'], $_POST['thoigian'], $_POST['ghichu']);
                // $this->success();
                $this->senMail($_POST['hoten'], $_POST['sdt'], $_POST['email'], $_POST['thoigian'], $_POST['nameProduct'], $_POST['priceProduct'], $_POST['nameColor'], $_POST['nameStyle']);
                header("location: /FE_xuong_vaycuoi/app/Views/index.php");
            } else {
                $this->error();
                header("location:" . $_SESSION['dir'] . "?chi-tiet-san-pham&id_product=" . $_POST['id_product']);
            }
        }

        if (isset($_POST['success_order2'])) {

            if (!empty($_POST['hoten']) && !empty($_POST['email']) && !empty($_POST['sdt']) && !empty($_POST['thoigian']) && !empty($_POST['ghichu'])) {

                $this->lichHenModel->add2($_POST['hoten'], $_POST['email'], $_POST['sdt'], $_SESSION['user']['id_account'], $_POST['thoigian'], $_POST['ghichu']);
                $id_datlich = $this->lichHenModel->selectTop1Id();
                for ($i = 0; $i < count($_POST['id_bienthe']); $i++) {
                    $this->detailDatLichModel->updateDatLich($id_datlich['id_appointment_date'], $_POST['id_bienthe'][$i], $_SESSION['user']['id_account']);
                }
                // var_dump($id_datlich['id_appointment_date']);
                // die;
                header("location: /FE_xuong_vaycuoi/app/Views/index.php");
            } else {
                $this->error();
                header("location:" . $_SESSION['dir'] . "?cart");
            }
        }
    }
    public  function senMail($hoten, $sdt, $email, $thoigian, $tenSanPham, $gia, $mau, $kieuDang)
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
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'VGshop Thong Bao!!';
            $mail->Body    = '
            <div 
            style="font-family: Arial, Helvetica, sans-serif;"
            >
                <h1>Bạn đã đặt lịch hẹn thành công</h1>
                <p>Họ tên : <strong>' . $hoten . '</strong>      SDT: <strong>' . $sdt . '</strong></p> 
                <p>Email : <strong>' . $email . '</strong></p>
                <p>Thời Gian Hẹn: <strong>' . $thoigian . '</strong> </p>
                <h2>Thông tin hàng</h2>
                <p>Tên sản phẩm : <strong>' . $tenSanPham . '.</strong></p>
                <p>Giá tiền : <strong>' . $gia . '</strong></p>
                <p>Màu Sắc : <strong>' . $mau . '</strong> & Kiểu dáng : <strong>' . $kieuDang . '</strong> </p>
            
                <h2>Cảm ơn bạn đã ghé qua shop, chúc bạn ngày mới tốt lành!!</h2>
            </div>
            ';
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

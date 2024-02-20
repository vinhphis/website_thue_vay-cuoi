<?php

namespace Vinhphis\Templateadmin\Controllers;

date_default_timezone_set('Asia/Ho_Chi_Minh');

use DateTime;
use Vinhphis\Templateadmin\Models\BienTheModel;
use Vinhphis\Templateadmin\Models\DetailOrderModel;
use Vinhphis\Templateadmin\Models\OrderModel;
use Vinhphis\Templateadmin\Models\ProductModel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// require '../../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
class OrderController
{
    protected $orderModel, $productModel, $bienTheModel, $detailOrderModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->bienTheModel = new BienTheModel();
        $this->orderModel = new OrderModel();
        $this->detailOrderModel = new DetailOrderModel();
    }
    public function inThongTin()
    {
        $listDonHang = $this->orderModel->selectAll();
        require "./app/Views/Orders/list.php";
    }
    public function view_themThongTin()
    {
        $listProduct = $this->productModel->selectAllAction1();
        require "./app/Views/Orders/add.php";
    }
    public function view_capNhatThongTin()
    {

        if (!empty($_POST['hoten'])) {
            $hoten =  $_POST['hoten'];
        } else {
            $hoten = "";
        }
        if (!empty($_POST['thoigian'])) {
            $date =  $_POST['thoigian'];
        } else {
            $date = "";
        }
        if (!empty($_POST['sdt'])) {
            $sdt =   $_POST['sdt'];
        } else {
            $sdt =   "";
        }
        if (!empty($_POST['email'])) {
            $email =  $_POST['email'];
        } else {
            $email =  "";
        }
        if (!empty($_POST['diachi'])) {
            $diachi = $_POST['diachi'];
        } else {
            $diachi = "";
        }

        $id_bienthe = join(",", $_POST['id_bienthe']);
        $listProduct =  $this->bienTheModel->selectAll($id_bienthe);

        require "./app/Views/Orders/orderProduct.php";
    }

    public function pay()
    {

        $hoten =    $_POST['hoten'];
        $sdt =     $_POST['sdt'];
        $email =   $_POST['email'];
        $ngaytra =   $_POST['ngaytra'];
        $diachi =   $_POST['diachi'];

        $id_bienthe = join(",", $_POST['id_bienthe']);
        $bienthe = $this->bienTheModel->selectAll($id_bienthe);

        $sum_price = $sum = 0;
        $arrPrice = [];
        $date = date("Y-m-d");
        $datetime1 = new DateTime($_POST['ngaytra']);
        $datetime2 = new DateTime($date);
        $datetime3 = $datetime1->diff($datetime2);
        for ($i = 0; $i < count($_POST['soluong']); $i++) {
            $sum = $_POST['soluong'][$i] * $_POST['giatien'][$i] * $datetime3->format("%d");
            $sum_price += $sum;
            array_push($arrPrice, $sum);
        }
        var_dump($arrPrice); // tiền hàng từng sản phẩm
        echo $sum_price; // tổng tiền đơn hàng
        $i = 0;
        foreach ($bienthe as &$object) {

            $object['soluongmua'] = $_POST['soluong'][$i];
            $object['thanhtien'] =  $arrPrice[$i];
            $i++;
        }
        echo "<br>";
        echo $object['soluongmua'];

        // echo "<pre>";
        // print_r($bienthe);
        // die;
        require "./app/Views/Orders/payOrder.php";
    }
    public function success_order()
    {
        if (isset($_POST['success_pay'])) {
            $ngay_dat = date("Y-m-d H:i:s");

            $this->orderModel->themThongTin($_POST['hoten'], $_POST['sdt'], $_POST['email'], $_POST['diachi'], $ngay_dat, $_POST['ngaytra'], $_POST['tongtien']);
            $id_order = $this->orderModel->selectIdOrder();

            for ($i = 0; $i < count($_POST['id_bienthe']); $i++) {
                $this->detailOrderModel->themThongTin($id_order['id_order'], $_POST['id_bienthe'][$i], $_POST['soluongmua'][$i], $_POST['thanhtien'][$i]);
            }

            $listProduct = $this->detailOrderModel->selectAll($id_order['id_order']);
            $this->senMailOrder($_POST['hoten'], $_POST['sdt'], $_POST['email'], $_POST['diachi'], $listProduct, $_POST['tongtien']);
            include './app/Views/Orders/successOrder.php';
        }
    }

    public  function senMailOrder($hoten, $sdt, $email, $diachi, $donHang, $tongtien)
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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <h1>Bạn vừa thanh toán thành công đơn hàng</h1>
            <p><strong>Người mua hàng : </strong> ' . $hoten . '</p>
            <span><strong>Số điện thoại : </strong> ' . $sdt . '</span>
            <span><strong>Email : </strong> ' . $email . '</span>
            <p><strong>Địa chỉ : </strong> ' . $diachi . '</p>
        
            <h3>Thông tin đơn hàng</h3>
        
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Màu sắc & Kiểu dáng</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
        
                    </tr>
                </thead>
                <tbody>';

            foreach ($donHang as $item) {
                // extract($item);
                $mail->Body .= '
        <tr>
            <td>' . $item['name_product'] . '</td>
            <td>' . $item['price_product'] . '</td>
            <td>' . $item['name_color'] . '& ' . $item['name_style'] . '</td>
            <td>' . $item['so_luong'] . '</td>
            <td>' . $item['tong_tien'] . '</td>
        </tr>';
            }

            $mail->Body .= '
                    <tr>
                        <td colspan="3" class="text-center">Tồng Tiền</td>
                        <td colspan="2" class="text-center">' . $tongtien . '</td>
        
                    </tr>
                </tbody>
            </table>
        
            <h3>Cảm ơn quý khách đã sử dụng dịch vụ bên VGshop.</h3>
            ';


            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

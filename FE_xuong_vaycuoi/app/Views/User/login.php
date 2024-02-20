<?php
if (isset($_COOKIE['thongbao'])) echo $_COOKIE['thongbao'];

?>
<form style="margin-top: 150px;" class="col-6 mx-auto " method="post" action="<?= $_SESSION['url'] ?>?login">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Tài Khoản </label>
        <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Nhập tài khoản của bạn" />
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Mật khẩu</label>
        <input type="password" name="password" id="form2Example2" class="form-control" placeholder="Nhập mật khẩu của bạn" />
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">


        <div class="col justify-content-center">
            <!-- Simple link -->
            <a href="#!" style="color: #e6be9f;">Quên mật khẩu?</a>
        </div>
    </div>

    <!-- Submit button -->
    <input type="submit" value="Đăng Nhập" class="btn btn-danger btn-block mb-4" name="login">

    <!-- Register buttons -->
    <div class="text-center">
        <p>Bạn chưa có tài khoản? <a href="<?= $_SESSION['url'] ?>?register" style="color: #e6be9f;">Đăng Ký</a></p>
        <p>or sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
        </button>
    </div>
</form>
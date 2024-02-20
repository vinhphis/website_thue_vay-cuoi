<form style="margin-top: 150px;" class="col-6 mx-auto " method="post" action="<?= $_SESSION['url'] ?>?register">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Tài Khoản </label>
        <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Nhập tài khoản của bạn muốn đăng ký" />
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Email</label>
        <input type="email" name="email" id="form2Example2" class="form-control" placeholder="Nhập email của bạn muốn đăng ký" />
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
        <div class="col justify-content-center">
            <!-- Simple link -->
            <a href="#!" style="color: #e6be9f;">Quên mật khẩu?</a>
        </div>
    </div>
    
    <!-- Submit button -->
    <!-- <button type="submit" class="btn btn-danger btn-block mb-4">Đăng Ký</button> -->
    <input type="submit" value="Đăng Ký" class="btn btn-danger btn-block mb-4" name="register">
    <!-- Register buttons -->
    <div class="text-center">
        <p>Bạn đã có tài khoản? <a href="<?= $_SESSION['url'] ?>?login" style="color: #e6be9f;">Đăng Nhập</a></p>
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
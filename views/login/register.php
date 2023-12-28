<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
?>
<div class="container">
    <form action="index.php?controller=login&action=register" method="POST">
        <h1 style="text-align: center;">Đăng ký tài khoản</h1>
        <div class="form-group">
            <label for="">Tài khoản:</label>
            <input type="text" name="username" class="form-control" placeholder="Tài khoản">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu:</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
            <label for="">Họ tên:</label>
            <input type="text" name="name" class="form-control" placeholder="Họ tên">
        </div>
        <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
        </div>
        <div class="form-group">
            <label for="">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="email">
        </div>
        <div style="padding-top: 5px;" class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Đăng ký">
            <p style="padding-top: 1rem;">Bạn đã có tài khoản? <a href="http://localhost:81/mvc/index.php?controller=login&action=login">Đăng nhập</a></p>
        </div>
    </form>
</div>
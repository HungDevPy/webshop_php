<h4 class="text-primary font-weight-bold">Thêm mới tài khoản</h4>
<form action="index.php?controller=taikhoan&action=add_submit" method="post" class="was-validated">
    <div class="form-group">
        <label>Tên đăng nhập:</label>
        <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" >
    </div>
    <div class="form-group">
        <label>Mật khẩu:</label>
        <input type="password" class="form-control" id="matkhau" name="matkhau" >
    </div>
    <div class="form-group">
        <label>Họ và tên:</label>
        <input type="text" class="form-control" id="hoten" name="hoten">
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label>Phone:</label>
        <input type="phone" class="form-control" id="phone" name="phone">
    </div>
    <button type="submit" class="btn btn-primary" name="add">Thêm</button>
</form>
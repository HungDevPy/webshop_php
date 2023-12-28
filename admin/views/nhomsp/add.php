<h4 class="text-primary font-weight-bold">Thêm Nhóm Sản Phẩm</h4>
<form action="index.php?controller=nhomsp&action=add_submit" method="post" class="was-validated">
    <div class="form-group">
        <label>ID:</label>
        <input type="text" class="form-control" id="id" name="id">
    </div>
    <div class="form-group">
        <label>Tên Sản Phẩm:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <button type="submit" class="btn btn-primary" name="add">Thêm</button>
</form>
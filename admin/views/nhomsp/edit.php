<h4 class="text-primary font-weight-bold">Sửa thông tin Nhóm Sản Phẩm</h4>
<form action="index.php?controller=nhomsp&action=edit_submit" method="post" class="was-validated">
    <div class="form-group">
        <label>id:</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $nhomsp->id ?> " disabled>
    </div>
    <div class="form-group">
        <label>Ten Nhom San Pham:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $nhomsp->name ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $nhomsp->id ?>">
    <button type="submit" class="btn btn-primary" name="edit">Sửa</button>
</form>
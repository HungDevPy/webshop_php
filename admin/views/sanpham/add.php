<h4 class="text-primary font-weight-bold">Thêm Sản Phẩm</h4>
<form action="index.php?controller=sanpham&action=add_submit" method="post" class="was-validated" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tên Sản Phẩm:</label>
        <input type="text" class="form-control" id="title" name="title" >
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="text" class="form-control" id="price" name="price" >
    </div>
    <div class="form-group">
        <label for="number">Số lượng:</label>
        <input type="text" class="form-control" id="number" name="number" >
    </div>
    <div class="form-group">
        <label for="thumbnail">Ảnh:</label>
        <input type="file" id="thumbnail" name="thumbnail" required>
    </div>
    <div class="form-group">
        <label for="content">Ghi chú:</label>
        <input type="text" class="form-control" id="content" name="content">
    </div>
    <div class="form-group">
        <label for="nhomid">LOAI SAN PHAM:</label>
        <select class="form-control" id="nhomid" name="nhomid" required>
            <?php foreach ($nhomsp as $obj) { ?>
                <option value="<?php echo $obj->id ?>"><?php echo $obj->name ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="add">Thêm</button>
</form>
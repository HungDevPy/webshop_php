<h4 class="text-primary font-weight-bold">Thêm Sản Phẩm</h4>
<form action="index.php?controller=sanpham&action=edit_submit" method="post" class="was-validated" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tên Sản Phẩm:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $sanpham->title ?>">
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="text" class="form-control" id="price" name="price" value="<?php echo $sanpham->price ?>">
    </div>
    <div class="form-group">
        <label for="number">Số lượng:</label>
        <input type="text" class="form-control" id="number" name="number" value="<?php echo $sanpham->number ?>">
    </div>
    <div class="form-group">
        <label for="thumbnail">Ảnh:</label>
        <input type="file" id="thumbnail" name="thumbnail">
    </div>
    <div class="form-group">
        <label for="content">Ghi chú:</label>
        <textarea class="form-control" id="content" name="content" rows="5" cols="50"><?php echo $sanpham->content ?></textarea>
    </div>
    <div class="form-group">
        <label for="nhomid">LOAI SAN PHAM:</label>
        <select class="form-control" id="nhomid" name="nhomid">
            <?php foreach ($nhomsp as $obj) { ?>
                <option value="<?php echo $obj->id ?>"><?php echo $obj->name ?></option>
            <?php } ?>
        </select>
    </div>

    <input type="hidden" id="id" name="id" value="<?php echo $sanpham->id ?>">
    <button type="submit" class="btn btn-primary" name="add">Sua</button>
</form>
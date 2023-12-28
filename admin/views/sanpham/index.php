<table class="table table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>Tên</th>
      <th>Giá</th>
      <th>Số Lượng</th>
      <th>Ảnh</th>
      <th>Ghi chú</th>
      <th>Mã sản phẩm</th>
      <th>Thời Gian Tạo</th>
      <th>Thời Gian Sửa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sanpham as $sp) { ?>
      <tr>
        <td><a href="index.php?controller=sanpham&action=detail&id=<?php echo $sp->id ?>"><?php echo $sp->id ?></a></td>
          <td><?php echo $sp->title ?></td>
          <td><?php echo $sp->price ?></td>
          <td><?php echo $sp->number ?></td>
          <td><img src="<?php echo $sp->thumbnail; ?> " width="100" height="100"></td>
          <td><?php echo $sp->content ?></td>
          <td><?php echo $sp->id_category ?></td>
          <td><?php echo $sp->created_at ?></td>
          <td><?php echo $sp->updated_at ?></td>
          <td><a href="index.php?controller=sanpham&action=edit&id=<?php echo $sp->id ?>">Sửa |</a>
            <a href="index.php?controller=sanpham&action=del&id=<?php echo $sp->id ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
          </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<a href="index.php?controller=sanpham&action=add">Thêm mới sản phẩm</a>
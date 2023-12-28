<table class="table table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($nhomsp as $obj) { ?>
      <tr>
         
        <td><a href="index.php?controller=nhomsp&action=detail&id=<?php echo $obj->id ?>"><?php echo $obj->id ?></a></td>
        <td><?php echo $obj->name ?></td>
        <td><a href="index.php?controller=nhomsp&action=edit&id=<?php echo $obj->id ?>">Sửa |</a>
        <a href="index.php?controller=nhomsp&action=del&id=<?php echo $obj->id ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td> 
      </tr>
    <?php } ?>
  </tbody>
</table>
<a href="index.php?controller=nhomsp&action=add">Thêm mới tài khoản</a>
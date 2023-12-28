<?php
require_once('database/config.php');
require_once('database/dbhelper.php');

// Ensure that $order_id is set to avoid undefined variable error
$order_id = '';

// Check if 'id' is set in the URL parameters
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
}

// Retrieve order details based on the provided order_id
$sql = "SELECT * FROM orders, order_details, product
        WHERE order_details.order_id = orders.id
        AND product.id = order_details.product_id
        AND orders.id = $order_id";

try {
    $count = 0;
    $order_details_List = executeResult($sql);
} catch (Exception $e) {
    die("Lỗi thực thi sql: " . $e->getMessage());
}
?>

<!-- HTML structure -->
<div class="panel-body">
    <form action="" method="POST">
        <table class="table table-bordered table-hover">
            <thead>
                <tr style="font-weight: 500;text-align: center;">
                    <td width="50px">STT</td>
                    <td width="200px">Tên User</td>
                    <td>Tên Sản Phẩm/<br>Số lượng</td>
                    <td>Tổng tiền</td>
                    <td width="250px">Địa chỉ</td>
                    <td>Số điện thoại</td>
                    <td>Trạng thái</td>
                    <td width="100px">Lưu</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_details_List as $item) : ?>
                    <tr style="text-align: center;">
                        <td width="50px"><?= ++$count ?></td>
                        <td style="text-align:center"><?= $item['fullname'] ?></td>
                        <td><?= $item['title'] ?><br>(<strong><?= $item['num'] ?></strong>)</td>
                        <td class="b-500 red"><?= number_format($item['price'], 0, ',', '.') ?><span> VNĐ</span></td>
                        <td width="100px"><?= $item['address'] ?></td>
                        <td width="100px"><?= $item['phone_number'] ?></td>
                        <td>
                            <select name="status[]" id="status" onchange="status(<?= $item['order_id'] ?>)">
                                <option value="Đang xử lý" <?= ($item['status'] == 'Đang xử lý') ? 'selected' : '' ?>>Đang xử lý</option>
                                <option value="Đang giao hàng" <?= ($item['status'] == 'Đang giao') ? 'selected' : '' ?>>Đang giao hàng</option>
                                <option value="Đã giao hàng" <?= ($item['status'] == 'Đã giao hàng') ? 'selected' : '' ?>>Đã giao hàng</option>
                                <option value="Đã hủy" <?= ($item['status'] == 'Đã hủy') ? 'selected' : '' ?>>Đã hủy</option>
                            </select>
                        </td>
                        <td width="100px">
                            <button type="submit" name="save" class="btn btn-success">Lưu</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php?controller=donhang" class="btn btn-warning">Back</a>
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save'])) {
        // Assuming 'status' is an array because of the multiple selection
        $statuses = $_POST['status'];

        // Update each order detail with the selected status
        foreach ($statuses as $key => $status) {
            $order_id = $order_details_List[$key]['order_id'];
            $sql = "UPDATE `order_details` SET `status` = '$status' WHERE `order_id` = $order_id";
            execute($sql);
        }

        echo '<script language="javascript">
            alert("Cập nhật thành công!");
            window.location = "index.php?controller=donhang";
        </script>';
    }
    ?>
</div>

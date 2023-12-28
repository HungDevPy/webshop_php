<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
?>
<table class="table table-striped">
    <thead>
        <tr style="font-weight: 500;text-align: center;">
            <td width="50px">STT</td>
            <td width="200px">Tên User</td>
            <td>Tên Sản Phẩm/<br>Số lượng</td>
            <td>Tổng tiền</td>
            <td width="250px">Địa chỉ</td>
            <td>Số điện thoại</td>
            <td>Trạng thái</td>
            <!-- <td width="50px">Lưu</td> -->
        </tr>
    </thead>
    <tbody>
        <?php
        try {

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $limit = 10;
            $start = ($page - 1) * $limit;

            $sql = "SELECT * from orders, order_details, product
                                where order_details.order_id=orders.id and product.id=order_details.product_id ORDER BY order_date DESC limit $start,$limit ";
            $order_details_List = executeResult($sql);
            $total = 0;
            $count = 0;
            // if (is_array($order_details_List) || is_object($order_details_List)){
            foreach ($order_details_List as $item) {
                echo '
                                        <tr style="text-align: center;">
                                            <td width="50px">' . (++$count) . '</td>
                                            <td style="text-align:center">' . $item['fullname'] . '</td>
                                            <td>' . $item['title'] . '<br>(<strong>' . $item['num'] . '</strong>)</td>
                                            <td class="b-500 red">' . number_format($item['price'], 0, ',', '.') . '<span> VNĐ</span></td>
                                            <td width="100px">' . $item['address'] . '</td>
                                            <td width="100px">' . $item['phone_number'] . '</td>
                                            <td width="100px" class="green b-500">' . $item['status'] . '</td>
                                            <td width="100px">
                                                <a href="index.php?controller=donhang&action=edit&id=' . $item['order_id'] . '" class="btn btn-success">Edit</a>
                                            </td>
                                        </tr>
                                    ';
            }
        } catch (Exception $e) {
            die("Lỗi thực thi sql: " . $e->getMessage());
        }
        ?>

    </tbody>
</table>
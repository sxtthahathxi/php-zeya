<?php
    include_once'navbar.php';
    include_once 'connect.php';
    $sql = "SELECT * FROM product";
    $result = $con->query($sql);
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-danger" style="text-align: center;">ข้อมูล product</div>
        <div class="card-body">
            <a href="add_product.php" class="btn btn-outline-danger mb-3"><i class="bi bi-person-plus-fill"></i>เพิ่มข้อมูล</a>
            <table class="table table-striped">
                <tr>
                    <th class="bg-danger text-white">รหัสสินค้า</th>
                    <th class="bg-danger text-white">ชื่อสินค้า</th>
                    <th class="bg-danger text-white">ราคาสินค้า</th>
                    <th class="bg-danger text-white">จำนวนสินค้า</th>
                    <th class="bg-danger text-white">สถานะสินค้า</th>
                    <th class="bg-danger text-white">Action</th>
                </tr>
                <?php 
                    while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['pro_id']?></td>
                    <td><?php echo $row['pro_name']?></td>
                    <td><?php echo $row['pro_price']?></td>
                    <td><?php echo $row['pro_amount']?></td>
                    <td><?php
                        if($row['pro_status'] == 1){
                            echo "สินค้าพร้อมจำหน่าย";
                        }elseif($row['pro_status'] == 2){
                            echo "สินค้าหมด";
                        }elseif($row['pro_status'] == 3){
                            echo "สินค้ายกเลิกจำหน่าย";
                        }
                    ?>
                    </td>
                    <td>
                        <button class="btn btn-warning"><a href="edit_product.php?pro_id=<?php echo $row['pro_id']?>">แก้ไข</a></button>
                        <button class="btn btn-danger "><a href="del_product.php?pro_id=<?php echo $row['pro_id']?>" onclick="return confirm('ยืนยันการลบ?')">ลบ</a></button>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php
include_once 'navbar.php';
include_once 'connect.php';
$username=$_GET['username'];
$sql = "SELECT * FROM user WHERE username = '$username' ";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if(isset($_POST['submit'])){//เช็คการกดปุ่ม
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    if($password == '' || $fullname == '' || $email == ''){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง')</script>";
    }else{
        $sql = "UPDATE user SET password='$password', fullname='$fullname', email='$email' WHERE username='$username' ";
        $result = $con->query($sql);
        if(!$result){
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
        }else{
            header('location:user.php');
        }//ปิดเช็คค่าว่าง
    }//ปิดเช็คการกดปุ่ม
}
?>

<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-danger text-white">
            แก้ไขข้อมูล user
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username']?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $row['password']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">fullname</label>
                    <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>">
                </div>
                <button type="submit" class="btn btn-danger" name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>
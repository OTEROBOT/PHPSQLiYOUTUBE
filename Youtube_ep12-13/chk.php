<?php
session_start();
include("dbconnect.php"); // แก้ไขชื่อไฟล์ให้ถูกต้อง

if (isset($_POST['username'])) {
    // รับค่าจากฟอร์ม
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password'])); // ถอดรหัส MD5

    // แก้ไขคำสั่ง SQL ที่ถูกต้อง
    $sql = "SELECT * FROM employee WHERE emp_user = '$username' AND emp_pass = '$password'";
    $result = mysqli_query($con, $sql);

    // ตรวจสอบว่าเจอข้อมูลหรือไม่
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION["emp_id"] = $row["emp_id"];
        $_SESSION["emp_user"] = $row["emp_name"] . " " . $row["emp_surname"];  // แก้ไขการดึงชื่อและนามสกุล
        $_SESSION["emp_level"] = $row["emp_level"];

        // ตรวจสอบระดับผู้ใช้งาน
        if ($_SESSION["emp_level"] == "a") { // ถ้าเป็น "a" ให้กระโดดไปหน้า admin_page.php
            header("location: admin_page.php");
        } else if ($_SESSION["emp_level"] == "u") { // ถ้าเป็น "u" ให้กระโดดไปหน้า user_page.php
            header("location: user_page.php");
        }
    } else {
        echo "<script>";
        echo "alert(\"ชื่อเข้าระบบหรือรหัสผ่านไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {
    header("location: login.php");  // ถ้าไม่มีการส่งค่า จะกลับไปหน้า login.php
}
?>

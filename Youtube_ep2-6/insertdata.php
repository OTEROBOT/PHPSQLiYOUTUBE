<?php

// เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

// รับค่าที่ส่งมาจากฟอร์ม
$emp_title = $_POST["emp_title"];
$emp_name = $_POST["emp_name"];
$emp_surname = $_POST["emp_surname"];
$emp_birthday = $_POST["emp_birthday"];

// บันทึกข้อมูล
$sql = "INSERT INTO employee (emp_title, emp_name, emp_surname, emp_birthday) 
        VALUES ('$emp_title', '$emp_name', '$emp_surname', '$emp_birthday')";

// รันคำสั่ง SQL
$result = mysqli_query($con, $sql);

// ตรวจสอบการทำงานของคำสั่ง Insert
if ($result) {
    header("location:index.php");
    exit(0);
} else {
    echo "Error: " . mysqli_error($con);
}

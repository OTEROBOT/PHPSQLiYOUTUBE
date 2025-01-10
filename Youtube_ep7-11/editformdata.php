<?php
require('dbconnect.php');
$emp_id = $_GET["emp_id"];
$sql = "SELECT * FROM employee WHERE emp_id=$emp_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f7fc;
            color: #4a4a4a;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #6c63ff;
        }

        form {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], select, textarea, input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f3f1fa;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="date"]:focus, select:focus, textarea:focus, input[type="tel"]:focus {
            border-color: #6c63ff;
            outline: none;
            background-color: #f0eefc;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        input[type="submit"], input[type="reset"], .btn-back {
            flex: 1;
            text-align: center;
            text-decoration: none;
            background-color: #6c63ff;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5148d1;
        }

        input[type="reset"] {
            background-color: #ff6b6b;
        }

        input[type="reset"]:hover {
            background-color: #d14a4a;
        }

        .btn-back {
            background-color: #b8e4c9;
        }

        .btn-back:hover {
            background-color: #9fd7b7;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form action="updatedata.php" method="POST">
        <input type="hidden" value="<?php echo $row["emp_id"]; ?>" name="emp_id">
        <h2>แก้ไขข้อมูลพนักงาน</h2>
        <hr>
        <label for="emp_title">คำนำหน้า :</label>
        <select name="emp_title" id="emp_title" required>
            <option value="นาย" <?php if ($row["emp_title"] == "นาย") { echo "SELECTED"; } ?>>นาย</option>
            <option value="นาง" <?php if ($row["emp_title"] == "นาง") { echo "SELECTED"; } ?>>นาง</option>
            <option value="นางสาว" <?php if ($row["emp_title"] == "นางสาว") { echo "SELECTED"; } ?>>นางสาว</option>
        </select>
        
        <div class="form-group">
            <label for="emp_name">ชื่อ :</label>
            <input type="text" name="emp_name" class="form-control" value="<?php echo htmlspecialchars($row["emp_name"]); ?>">
        </div>
        
        <div class="form-group">
            <label for="emp_surname">นามสกุล :</label>
            <input type="text" name="emp_surname" class="form-control" value="<?php echo htmlspecialchars($row["emp_surname"]); ?>">
        </div>
        
        <div class="form-group">
            <label for="emp_birthday">วันเดือนปีเกิด :</label>
            <input type="date" name="emp_birthday" class="form-control" value="<?php echo htmlspecialchars($row["emp_birthday"]); ?>">
        </div>
        
        <div class="form-group">
            <label for="emp_adr">ที่อยู่ปัจจุบัน :</label>
            <textarea name="emp_adr" class="form-control"><?php echo htmlspecialchars($row["emp_adr"]); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="emp_skill">ทักษะความสามารถ :</label>
            <textarea name="emp_skill" class="form-control"><?php echo htmlspecialchars($row["emp_skill"]); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="emp_tel">เบอร์โทรศัพท์ :</label>
            <input type="tel" name="emp_tel" class="form-control" value="<?php echo htmlspecialchars($row["emp_tel"]); ?>">
        </div>
        
        <div class="button-group">
            <input type="submit" value="แก้ไขข้อมูลพนักงาน">
            <input type="reset" value="ล้างข้อมูล">
            <a href="index.php" class="btn-back">กลับไปหน้าหลัก</a>
        </div>
    </form>
</body>
</html>

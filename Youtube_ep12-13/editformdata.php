<?php
require('dbconnect.php');
$emp_id = $_GET["emp_id"];
$sql = "SELECT * FROM employee WHERE emp_id=$emp_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
    <style>
        /* ใช้สไตล์จากไฟล์ insertform.php */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fbe7f7;
            color: #4a4a4a;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        h2 {
            text-align: center;
            color: #ff7e9e;
            margin-bottom: 20px;
        }

        form {
            background-color: #ffffff;
            border: 1px solid #f1c0d3;
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #f36c8f;
        }

        input[type="text"], input[type="date"], input[type="tel"], select, textarea, input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #f1c0d3;
            border-radius: 8px;
            background-color: #ffe3f0;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="date"]:focus, select:focus, textarea:focus, input[type="password"]:focus {
            border-color: #ff7e9e;
            outline: none;
            background-color: #fff1f6;
        }

        .button-group {
            display: flex;
            gap: 15px;
        }

        input[type="submit"], input[type="reset"], .btn-back {
            flex: 1;
            text-align: center;
            text-decoration: none;
            background-color: #ff7e9e;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, .btn-back:hover {
            background-color: #ff5c6f;
        }

        input[type="reset"] {
            background-color: #ff9bb0;
        }

        input[type="reset"]:hover {
            background-color: #f88d99;
        }

        .btn-back {
            background-color: #ffe3f0;
        }

        .btn-back:hover {
            background-color: #f5c6d2;
        }

        hr {
            border: 0;
            height: 1px;
            background: #f1c0d3;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form action="updatedata.php" method="POST">
        <h2>แก้ไขข้อมูลพนักงาน</h2>
        <hr>

        <input type="hidden" name="emp_id" value="<?php echo $row['emp_id']; ?>">

        <label for="emp_title">คำนำหน้า :</label>
        <select name="emp_title" id="emp_title" required>
            <option value="นาย" <?php if ($row["emp_title"] == "นาย") echo "selected"; ?>>นาย</option>
            <option value="นาง" <?php if ($row["emp_title"] == "นาง") echo "selected"; ?>>นาง</option>
            <option value="นางสาว" <?php if ($row["emp_title"] == "นางสาว") echo "selected"; ?>>นางสาว</option>
        </select>

        <label for="emp_name">ชื่อ :</label>
        <input type="text" name="emp_name" id="emp_name" value="<?php echo htmlspecialchars($row['emp_name']); ?>" required>

        <label for="emp_surname">นามสกุล :</label>
        <input type="text" name="emp_surname" id="emp_surname" value="<?php echo htmlspecialchars($row['emp_surname']); ?>" required>

        <label for="emp_birthday">วันเดือนปีเกิด :</label>
        <input type="date" name="emp_birthday" id="emp_birthday" value="<?php echo htmlspecialchars($row['emp_birthday']); ?>" required>

        <label for="emp_adr">ที่อยู่ปัจจุบัน :</label>
        <textarea name="emp_adr" id="emp_adr" rows="4" required><?php echo htmlspecialchars($row['emp_adr']); ?></textarea>

        <label for="emp_skill">ทักษะความสามารถ :</label>
        <textarea name="emp_skill" id="emp_skill" rows="4" required><?php echo htmlspecialchars($row['emp_skill']); ?></textarea>

        <label for="emp_tel">เบอร์โทรศัพท์ :</label>
        <input type="tel" name="emp_tel" id="emp_tel" value="<?php echo htmlspecialchars($row['emp_tel']); ?>" required>

        <label for="emp_user">ชื่อเข้าระบบ :</label>
        <input type="text" name="emp_user" id="emp_user" value="<?php echo htmlspecialchars($row['emp_user']); ?>" required>

        <label for="emp_pass">รหัสผ่าน :</label>
        <input type="password" name="emp_pass" id="emp_pass" value="<?php echo htmlspecialchars($row['emp_pass']); ?>" required>

        <label for="emp_level">ระดับผู้ใช้งาน :</label>
        <select name="emp_level" id="emp_level" required>
            <option value="a" <?php if ($row['emp_level'] == 'a') echo 'selected'; ?>>ผู้ดูแลระบบ</option>
            <option value="u" <?php if ($row['emp_level'] == 'u') echo 'selected'; ?>>ผู้ใช้งาน</option>
        </select>

        <label for="emp_department">แผนก :</label>
<select name="emp_department" id="emp_department" required>
    <option value="1" <?php echo isset($row['emp_department']) && $row['emp_department'] == '1' ? 'selected' : ''; ?>>ฝ่ายบุคคล</option>
    <option value="2" <?php echo isset($row['emp_department']) && $row['emp_department'] == '2' ? 'selected' : ''; ?>>ฝ่ายสินเชื่อ</option>
    <option value="3" <?php echo isset($row['emp_department']) && $row['emp_department'] == '3' ? 'selected' : ''; ?>>ฝ่ายขาย</option>
    <option value="4" <?php echo isset($row['emp_department']) && $row['emp_department'] == '4' ? 'selected' : ''; ?>>ฝ่ายจัดซื้อ</option>
    <option value="5" <?php echo isset($row['emp_department']) && $row['emp_department'] == '5' ? 'selected' : ''; ?>>ฝ่ายการเงิน</option>
    <option value="6" <?php echo isset($row['emp_department']) && $row['emp_department'] == '6' ? 'selected' : ''; ?>>ฝ่ายส่งของ</option>
</select>


        <div class="button-group">
            <input type="submit" value="อัปเดตข้อมูลพนักงาน">
            <input type="reset" value="ล้างข้อมูล">
            <a href="index.php" class="btn-back">กลับไปหน้าหลัก</a>
        </div>
    </form>
</body>
</html>

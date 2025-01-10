<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูลพนักงาน</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fbe7f7; /* สีพื้นหลังพาสเทลชมพู */
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
            color: #ff7e9e; /* สีชมพูพาสเทล */
            margin-bottom: 20px;
        }

        form {
            background-color: #ffffff;
            border: 1px solid #f1c0d3; /* สีกรอบอ่อนๆ */
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
            color: #f36c8f; /* สีชมพูเข้ม */
        }

        input[type="text"], input[type="date"], input[type="tel"], select, textarea, input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #f1c0d3; /* สีกรอบอ่อนๆ */
            border-radius: 8px;
            background-color: #ffe3f0; /* พื้นหลังกล่องพาสเทลชมพู */
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="date"]:focus, select:focus, textarea:focus, input[type="password"]:focus {
            border-color: #ff7e9e; /* ขอบสีชมพูพาสเทลเมื่อโฟกัส */
            outline: none;
            background-color: #fff1f6; /* พื้นหลังอ่อนเมื่อโฟกัส */
        }

        .button-group {
            display: flex;
            gap: 15px;
        }

        input[type="submit"], input[type="reset"], .btn-back {
            flex: 1;
            text-align: center;
            text-decoration: none;
            background-color: #ff7e9e; /* สีปุ่มชมพูพาสเทล */
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, .btn-back:hover {
            background-color: #ff5c6f; /* ปุ่มสีชมพูเข้มเมื่อ hover */
        }

        input[type="reset"] {
            background-color: #ff9bb0; /* สีปุ่มรีเซ็ตพาสเทลชมพู */
        }

        input[type="reset"]:hover {
            background-color: #f88d99; /* ปุ่มรีเซ็ตสีชมพูเข้มเมื่อ hover */
        }

        .btn-back {
            background-color: #ffe3f0; /* ปุ่มกลับสีชมพูอ่อน */
        }

        .btn-back:hover {
            background-color: #f5c6d2; /* ปุ่มกลับสีชมพูเข้มเมื่อ hover */
        }

        hr {
            border: 0;
            height: 1px;
            background: #f1c0d3; /* สีเส้นแนวนอนอ่อนๆ */
            margin-bottom: 20px;
        }
        body {
    height: auto;
    min-height: 100vh;
}
body, html {
    overflow: auto;
}
body {
    font-family: 'Arial', sans-serif;
    background-color: #fbe7f7;
    color: #4a4a4a;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* เปลี่ยนจาก center เป็น flex-start */
    min-height: 100vh; /* เปลี่ยนจาก height เป็น min-height */
}

    </style>
</head>
<body>
    
<form action="insertdata.php" method="POST">
    <h2>ฟอร์มกรอกข้อมูลพนักงาน</h2>
    <hr>
    <label for="emp_title">คำนำหน้า :</label>
    <select name="emp_title" id="emp_title" required>
        <option value="นาย">นาย</option>
        <option value="นาง">นาง</option>
        <option value="นางสาว">นางสาว</option>
    </select>

    <label for="emp_name">ชื่อ :</label>
    <input type="text" name="emp_name" id="emp_name" required>

    <label for="emp_surname">นามสกุล :</label>
    <input type="text" name="emp_surname" id="emp_surname" required>

    <label for="emp_birthday">วันเดือนปีเกิด :</label>
    <input type="date" name="emp_birthday" id="emp_birthday" required>

    <label for="emp_adr">ที่อยู่ปัจจุบัน :</label>
    <textarea name="emp_adr" id="emp_adr" rows="4" required></textarea>

    <label for="emp_skill">ทักษะความสามารถ :</label>
    <textarea name="emp_skill" id="emp_skill" rows="4" required></textarea>

    <label for="emp_tel">เบอร์โทรศัพท์ :</label>
    <input type="tel" name="emp_tel" id="emp_tel" required>

    <label for="emp_user">ชื่อเข้าระบบ :</label>
    <input type="text" name="emp_user" id="emp_user" required>

    <label for="emp_pass">รหัสผ่าน :</label>
    <input type="password" name="emp_pass" id="emp_pass" required>

    <label for="emp_level">ระดับผู้ใช้งาน :</label>
    <select name="emp_level" id="emp_level" required>
        <option value="">--เลือกระดับผู้ใช้งาน--</option>
        <option value="a">ผู้ดูแลระบบ</option>
        <option value="u">ผู้ใช้งาน</option>
    </select>

    <label for="emp_department">แผนก :</label>
    <select name="emp_department" id="emp_department" required>
        <option value="">--เลือกแผนก--</option>
        <option value="1">ฝ่ายบุคคล</option>
        <option value="2">ฝ่ายสินเชื่อ</option>
        <option value="3">ฝ่ายขาย</option>
        <option value="4">ฝ่ายจัดซื้อ</option>
        <option value="5">ฝ่ายการเงิน</option>
        <option value="6">ฝ่ายส่งของ</option>
    </select>

    <div class="button-group">
        <input type="submit" value="บันทึกข้อมูลพนักงาน">
        <input type="reset" value="ล้างข้อมูล">
        <a href="index.php" class="btn-back">กลับไปหน้าหลัก</a>
    </div>
</form>

</body>
</html>

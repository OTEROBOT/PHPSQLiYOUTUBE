<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูลพนักงาน</title>
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

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f3f1fa;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="date"]:focus, select:focus {
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
        <div class="button-group">
            <input type="submit" value="บันทึกข้อมูลพนักงาน">
            <input type="reset" value="ล้างข้อมูล">
            <a href="index.php" class="btn-back">กลับไปหน้าหลัก</a>
        </div>
    </form>
</body>
</html>

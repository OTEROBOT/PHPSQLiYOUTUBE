<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>save หน้าแสดงผลข้อมูลที่รับมา</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f9fd;
            color: #2c3e50;
            text-align: center;
            padding: 50px;
        }
        .result-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        p {
            font-size: 1.1rem;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <?php
        if ($_POST) {
            $name = htmlspecialchars($_POST['fname']);
            $surname = htmlspecialchars($_POST['lname']);
            $birthday = htmlspecialchars($_POST['birthday']);
            $sex = htmlspecialchars($_POST['sex']);
            $username = htmlspecialchars($_POST['username']);
            $pwd = htmlspecialchars($_POST['pwd']);

            echo "<h2>สวัสดีคุณ $name $surname</h2>";
            echo "<p>วันเกิด: $birthday</p>";
            echo "<p>เพศ: " . ($sex == 'f' ? "หญิง" : "ชาย") . "</p>";
            echo "<p>ชื่อเข้าระบบ: $username</p>";
            echo "<p>รหัสผ่านคือ: $pwd</p>";
        }
        ?>
    </div>
</body>
</html>

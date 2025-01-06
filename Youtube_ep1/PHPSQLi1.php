<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regis หน้ารับข้อมูล</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            color: #34495e;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
        }
        h1 {
            text-align: center;
            color: #8e44ad;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            font-size: 1rem;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        form input, form select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dcdde1;
            border-radius: 5px;
            font-size: 1rem;
        }
        form input[type="radio"] {
            width: auto;
            margin: 0 10px 0 0;
        }
        form input[type="submit"] {
            background-color: #8e44ad;
            color: white;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            width: 100%;
        }
        form input[type="submit"]:hover {
            background-color: #6c3483;
        }
        .radio-group {
            margin-bottom: 15px;
            font-size: 1rem;
        }
        .radio-option {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .radio-option label {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>กรอกข้อมูล</h1>
        <form action="save.php" method="POST">
            <label for="sex">เพศ:</label>
            <div class="radio-group">
                <div class="radio-option">
                    <input type="radio" id="male" name="sex" value="m">
                    <label for="male">ชาย</label>
                </div>
                <div class="radio-option">
                    <input type="radio" id="female" name="sex" value="f">
                    <label for="female">หญิง</label>
                </div>
            </div>

            <label for="fname">ชื่อ:</label>
            <input type="text" id="fname" name="fname" placeholder="กรอกชื่อของคุณ">

            <label for="lname">สกุล:</label>
            <input type="text" id="lname" name="lname" placeholder="กรอกนามสกุลของคุณ">

            <label for="birthday">วันเกิด:</label>
            <input type="date" id="birthday" name="birthday">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="ตั้งชื่อผู้ใช้งาน">

            <label for="password">Password:</label>
            <input type="password" id="password" name="pwd" placeholder="ตั้งรหัสผ่าน">

            <input type="submit" value="บันทึกข้อมูล">
        </form>
    </div>
</body>
</html>

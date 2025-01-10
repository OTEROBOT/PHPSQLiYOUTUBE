<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบจัดการข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        font-family: 'Arial', sans-serif;
        background-color: #F8E2EC; /* Light pink background */
        color: #4a4a4a;
        padding-top: 30px;
      }

      .form-login {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        margin: auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      }

      h2 {
        color: #ff66b3; /* Soft pink color */
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
      }

      .form-control {
        background-color: #f9f1f8; /* Light pastel pink */
        border: 1px solid #f1c1d1;
        border-radius: 8px;
      }

      .form-control:focus {
        background-color: #ffedf3; /* Soft pink focus */
        border-color: #ff66b3;
        outline: none;
      }

      .btn-primary {
        background-color: #ff66b3;
        border-color: #ff66b3;
      }

      .btn-primary:hover {
        background-color: #ff3385;
        border-color: #ff3385;
      }

      .btn-warning {
        background-color: #ffd700;
        border-color: #ffd700;
      }

      .btn-warning:hover {
        background-color: #e6b800;
        border-color: #e6b800;
      }

      .mb-3 label {
        font-weight: bold;
      }

      .container {
        padding: 10px;
      }
    </style>
  </head>
  
  <body>
    <div class="container">
      <div class="form-login">
        <h2><i class="bx bxs-user-pin" style="color:#ff66b3"></i> เข้าสู่ระบบจัดการข้อมูลพนักงาน</h2>
        <form method="POST" action="chk.php">
          <div class="mb-3">
            <label for="username" class="form-label">ชื่อเข้าระบบ</label>
            <input type="username" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">รหัสผ่าน</label>
            <input type="password" class="form-control" id="Password" name="password" required>
          </div>
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
            <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>
            <a href="index.php" class="btn btn-info">กลับหน้าหลัก</a>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

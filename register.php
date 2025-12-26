<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register | Gen Z Course</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    body::before {
      content: '';
      position: absolute;
      width: 520px;
      height: 520px;
      background: radial-gradient(circle, #00c6ff, transparent 70%);
      top: -180px;
      left: -180px;
      opacity: 0.35;
    }

    body::after {
      content: '';
      position: absolute;
      width: 520px;
      height: 520px;
      background: radial-gradient(circle, #0072ff, transparent 70%);
      bottom: -180px;
      right: -180px;
      opacity: 0.35;
    }

    .register-card {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 420px;
      padding: 35px 30px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 18px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.45);
      color: #fff;
      animation: slideUp 0.8s ease;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(25px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .register-card h2 {
      text-align: center;
      margin-bottom: 8px;
      font-size: 28px;
      letter-spacing: 1px;
    }

    .register-card p {
      text-align: center;
      font-size: 14px;
      color: #cce7ff;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-group input {
      width: 100%;
      padding: 14px;
      border-radius: 10px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      font-size: 14px;
      transition: 0.3s;
    }

    .form-group input::placeholder {
      color: #d0eaff;
    }

    .form-group input:focus {
      background: rgba(255, 255, 255, 0.25);
      box-shadow: 0 0 10px rgba(0, 198, 255, 0.7);
    }

    .btn-register {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
      letter-spacing: 1px;
      margin-top: 5px;
    }

    .btn-register:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px rgba(0, 114, 255, 0.6);
    }

    .register-footer {
      margin-top: 20px;
      text-align: center;
      font-size: 13px;
      color: #cce7ff;
    }

    .register-footer a {
      color: #00c6ff;
      text-decoration: none;
      font-weight: 500;
    }

    .register-footer a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

  <div class="register-card">
    <h2>Create Account</h2>
    <p>Daftar dan mulai belajar sekarang</p>

    <form action="proses_register.php" method="POST">
      <div class="form-group">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <div class="form-group">
        <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
      </div>

      <button type="submit" class="btn-register">REGISTER</button>
    </form>

    <div class="register-footer">
      Sudah punya akun?
      <a href="login.php">Login di sini</a>
    </div>
  </div>

</body>
</html>

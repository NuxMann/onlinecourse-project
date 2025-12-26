<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Gen Z Course</title>
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

    /* Background glow */
    body::before {
      content: '';
      position: absolute;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, #00c6ff, transparent 70%);
      top: -150px;
      left: -150px;
      opacity: 0.4;
    }

    body::after {
      content: '';
      position: absolute;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, #0072ff, transparent 70%);
      bottom: -150px;
      right: -150px;
      opacity: 0.4;
    }

    .login-card {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 380px;
      padding: 35px 30px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 16px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.4);
      color: #fff;
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-card h2 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 28px;
      letter-spacing: 1px;
    }

    .login-card p {
      text-align: center;
      font-size: 14px;
      color: #cce7ff;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
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

    .btn-login {
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
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0, 114, 255, 0.6);
    }

    .login-footer {
      margin-top: 20px;
      text-align: center;
      font-size: 13px;
      color: #cce7ff;
    }

    .login-footer a {
      color: #00c6ff;
      text-decoration: none;
      font-weight: 500;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

  <div class="login-card">
    <h2>Welcome Back</h2>
    <p>Login ke akun Gen Z Course</p>

    <form action="proses_login.php" method="POST">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit" class="btn-login">LOGIN</button>
    </form>

    <div class="login-footer">
      Belum punya akun?
      <a href="register.php">Daftar Sekarang</a>
    </div>
  </div>

</body>
</html>

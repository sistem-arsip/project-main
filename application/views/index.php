<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sistem Arsip</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <style>
    html, body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
    }

    body {
      background: url("http://ppwalisongo.id/home/wp-content/uploads/2021/08/DSC_0072.jpg") no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 0;
      pointer-events: none;
    }

    .banner {
      position: relative;
      z-index: 1;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding-left: 80px;
      padding-right: 20px;
      color: white;
      text-align: left;
    }

    .banner h1 {
      font-size: 60px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .banner h2 {
      font-size: 32px;
      margin-bottom: 30px;
    }

    .login-btn {
      background-color:#5CB338;
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 4px;
      font-weight: bold;
      text-decoration: none;
      font-size: 18px;
      display: inline-block;
    }

    .login-btn:hover {
      background-color: #347928;
      text-decoration: none;
      color: white;
    }

    @media (max-width: 768px) {
      .banner {
        padding-left: 40px;
        padding-right: 20px;
      }

      .banner h1 {
        font-size: 40px;
      }

      .banner h2 {
        font-size: 24px;
      }

      .login-btn {
        font-size: 16px;
        padding: 10px 20px;
      }
    }

    @media (max-width: 480px) {
      .banner {
        flex-direction: column;
        align-items: flex-start;
        padding: 40px 20px;
      }

      .banner h1 {
        font-size: 32px;
      }

      .banner h2 {
        font-size: 18px;
      }

      .login-btn {
        font-size: 15px;
        padding: 8px 18px;
      }
    }
  </style>
</head>

<body>

  <div class="overlay"></div>

  <div class="banner">
    <div>
      <h1>Sistem Arsip Digital</h1>
      <h2>Pondok Pesantren Wali Songo Ngabar</h2>
      <a class="login-btn" href="<?php echo base_url('auth/login'); ?>">Login Admin / Petugas</a>
    </div>
  </div>

  <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

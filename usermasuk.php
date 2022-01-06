<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="zacky" content="rumahkos">
  <title>Welcome | Login abangKOS</title>
  <link rel="stylesheet" href="assets/css/sign-in.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="icon" href="assets/img/abangko.png">
  
  <style type="text/css">
        body{
      background-image: url("assets/img/tree-house-hd-wallpaper.jpg");}
    html,body{
      position: relative;
      height: 100%;}
      .avatar{
    width: 100px;height: 100px;
    margin: 0px auto 20px;
    border-radius: 100%;
    border: 2px solid #0a9;
    background-size: cover;
    background-image: url("assets/img/tree-house-hd-wallpaper.jpg");
}
  </style>

</head>
<body>
<br>

<div class="container">
    <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form action="cekloginuser.php" method="POST">
                    <input name="nama" type="text" placeholder="username">
                    <input name="password" type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="submitlogin">Login</button> 
                <p><small>Belum punya akun? <a href="daftaruser.php">Daftar</a></small></p>
                </form>
            </div>
        </div>    
</div>
<script  src="assets/js/sign-in.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Logo</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" method="POST">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example18" class="form-control form-control-lg" name="user_email_Login" />
              <label class="form-label" for="form2Example18">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name="user_password_Login" />
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
            </div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>

</body>
</html>


<?php
require_once("config.php");
$sql = "SELECT * FROM users";
$conn->query($sql);
$talab = ($conn->query($sql)) -> fetchAll(PDO::FETCH_ASSOC);
// -> fetchAll(PDO::FETCH_ASSOC) لغى التكرار

// $Flag = FALSE;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
  foreach($talab as $ele){
    if ($ele["email"]=== $_POST["user_email_Login"] && $ele["password"] === $_POST["user_password_Login"]){
    echo "<pre>";
    print_r($ele);
    echo "</pre>";
        session_start();
        $_SESSION["id"]= $ele["id"];
        $_SESSION["name"]= $ele["name"];
        $_SESSION["email"]= $ele["email"];
        $_SESSION["phone"]= $ele["phone"];
        $_SESSION["birthday_date"]= $ele["birthday_date"];
        $_SESSION["password"]= $ele["password"];
        $_SESSION["date_created"]= $ele["date_created"];
        $_SESSION["date_last_login"]= $ele["date_last_login"];
        $_SESSION["is_admin"]= $ele["is_admin"];
      header("location: landpage.php");
    }

  };

}
// print_r($conn);
// echo "<br>";

// echo "<pre>";
// print_r($conn->query($sql));
// echo "</pre>";


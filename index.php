<?php 
    session_start();
    if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        header("Location: dashboard.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>

    <form action="" class="mt-4 w-50 mx-auto">
        <h1 class="mb-3 d-flex justify-content-center">Login / Register</h1>
        <span class="mb-3 d-flex justify-content-center" id="status" style="display: none;"></span>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter you password">
        </div>
        <div class="mb-3" id="confirmation" style="display: none;" >
                <span class="mb-3 text-danger" id="msg">Your email is not recognized please confirm your password if you wish to register</span><br>
                <label for="confirm" class="form-label mt-2">Confirm Password</label>
                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm your password">
        </div>
        <div class="mb-3">
            <input type="button" name="submit" id="btn" value="Send" class="btn btn-primary w-100">
        </div>
        <div class="mb-3" style="display: none;" id="btn2">
            <input type="button" name="submitRegister" id="btnRegister" value="Register" class="btn btn-primary w-100">
        </div>
    </form>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./index.js"></script>

</body>
</html>
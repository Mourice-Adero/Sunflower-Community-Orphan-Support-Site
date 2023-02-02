<?php
include "./config.php";
$first_nameErr = $emailErr = $last_nameErr = $passwordErr = "";
$first_name = $email = $last_name = "";
$reg_success = $user_error = $reg_failed = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $first_nameErr = "First Name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
      $first_nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["last_name"])) {
    $last_nameErr = "Last Name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
      $last_nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    if (strlen($password) < 6) {
      $passwordErr = "Password must be at least 6 characters";
    }
    if (!preg_match('/^\S*$/', $password)) {
      $passwordErr = "Should not contain spaces";
    }
  }

  if (empty($first_nameErr) && empty($last_nameErr) && empty($emailErr) && empty($passwordErr)) {
    if (isset($_POST['register'])) {
      $get_user = "SELECT * FROM admins WHERE email='$email'";
      $result = mysqli_query($conn, $get_user);
      $num_rows = mysqli_num_rows($result);

      if ($num_rows > 0) {
        $user_error =  "User already exists";
      } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admins (id, first_name, last_name, email, password)
                    VALUES ('', '$first_name', '$last_name', '$email', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
          if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
            header("Location: ./index.php");
            exit();
          }
        }
      }
    }
  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sunflower Community Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/adminstyles.css" />
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="login-page d-flex">
    <div class="left d-none d-lg-block">
      <div class="left-overlay"></div>
      <div class="container h-100 d-flex flex-column">
        <img src="./images/logo-icon.png" alt="sunflower image" class="m-auto image-fluid h-50" />
        <h1 class="m-auto text-center">Sunflower Community Orphans Support Project</h1>
        <div class="social-media m-auto">
          <ul class="list-unstyled d-flex gap-4 my-auto">
            <li>
              <a href="https://web.facebook.com/sunflowercommunityorphanssupportproject"><i class="fab fa-facebook p-2 fs-4" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-whatsapp p-2 fs-4" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-twitter p-2 fs-4" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-instagram p-2 fs-4" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-linkedin p-2 fs-4" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="right d-flex m-auto mt-4 h-100">
      <div class="">
        <div class="d-flex justify-content-center"><img src="./images/logo-icon.png" class="d-lg-none small-logo" alt="Community Logo"></div>
        <h3 class="d-lg-none">Sunflower Community</h3>
        <div class="login-form mt-3 d-flex flex-column">
          <i class="fa fa-user-circle text-center" aria-hidden="true"></i>
          <h3 class="text-center">Register</h3>
          <span class="text-warning"><?php echo $reg_failed ?></span>
          <span class="text-success"><?php echo $reg_success ?></span>
          <span class="text-warning"><?php echo $user_error ?></span>
          <form method="post" id="register" name="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="d-flex flex-column">
            <label class="p-1 mt-1 d-flex" for="first_name">First Name: <h6 class="text-warning mx-1">* <?php echo $first_nameErr; ?></h6> </label>

            <input class="p-1 rounded" type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>">
            <label class="p-1 mt-1 d-flex" for="last_name">Last Name: <h6 class="text-warning mx-1">* <?php echo $last_nameErr; ?></h6></label>

            <input class="p-1 rounded" type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
            <label class="p-2 mt-1 d-flex" for="email">Enter Your Email: <h6 class="text-warning mx-1">* <?php echo $emailErr; ?></h6></label>

            <input class="p-1 rounded" type="text" name="email" id="user-email" value="<?php echo $email; ?>">
            <label class="p-1 mt-1 d-flex" for="password">Enter Your Password: <h6 class="text-warning mx-1">* <?php echo $passwordErr; ?></h6></label>

            <input class="p-1 m-1 rounded" type="password" name="password" id="user-password" value="<?php echo $password; ?>">
            <button type="submit" name="register" class="rounded p-2 mt-3">Register</button>
            <div class="d-flex gap-2 mt-2">
              <p>Have an account? </p> <a href="./login.php" id="login">Login Here</a>
            </div>
          </form>
          <div class="social-media m-auto d-lg-none mb-3">
            <ul class="list-unstyled d-flex gap-4 my-auto">
              <li>
                <a href="#"><i class="fab fa-facebook p-2 fs-4" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-whatsapp p-2 fs-4" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-twitter p-2 fs-4" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-instagram p-2 fs-4" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-linkedin p-2 fs-4" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
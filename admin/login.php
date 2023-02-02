<?php
include "./config.php";
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("Location: ./login.php");
  exit;
}
$emailErr = $passwordErr = "";
$email = $password = "";
$login_success = $user_error = $invalid_cridentials = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['login'])) {
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
      $password = $_POST["password"];
    }
    if (!$emailErr && !$passwordErr) {
      $get_user = "SELECT * FROM admins WHERE email=?";
      $stmt = mysqli_prepare($conn, $get_user);
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($password = $user['password']) {
          session_start();
          $_SESSION['user'] = $user;
          if (isset($_POST['remember']) && $_POST['remember'] == "1") {
            setcookie("email", $email, time() + (30 * 24 * 60 * 60));
            setcookie("password", $password, time() + (30 * 24 * 60 * 60));
          }
          header("Location: index.php");
        } else {
          $invalid_cridentials = "Incorrect password!";
        }
      } else {
        $user_error = "User not registered!";
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
        <div class="login-form mt-5 d-flex flex-column relative">
          <i class="fa fa-user-circle text-center" aria-hidden="true"></i>
          <h3 class="text-center" id="login">Login</h3>
          <span class="text-warning"><?php echo $invalid_cridentials ?></span>
          <span class="text-warning"><?php echo $user_error ?></span>
          <form method="post" class="d-flex flex-column" name="login">
            <label class="p-2 m-1 d-flex" for="email">Enter Your Email: <h6 class="text-warning mx-1">* <?php echo $emailErr; ?></h6></label>

            <input class="p-2 m-1 rounded" type="text" name="email" id="email" value="<?php echo $email; ?>">
            <label class="p-2 m-1 d-flex" for="password">Enter Your Password: <h6 class="text-warning mx-1">* <?php echo $passwordErr; ?></h6></label>

            <input class="p-2 m-1 rounded" type="password" name="password" id="password" value="<?php echo $password; ?>">
            <div class="d-flex"><input class="p-2 m-1 w-auto" type="checkbox" name="remember" id="remember" value="1" <?php if (isset($remember_me)) echo "checked"; ?>>
              <label class="p-2 m-1" for="remember_me">Remember me</label>
            </div>
            <button type="submit" name="login" class="rounded p-2 mb-3">Login</button>
          </form>
          <div class="social-media m-auto d-lg-none mb-3">
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
    </div>
  </div>
</body>

</html>
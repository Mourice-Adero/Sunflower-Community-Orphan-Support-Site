<?php
include "./header.php";
?>

<div id="navbar" class="navbar-collapse collapse pull-right">
  <ul class="nav navbar-nav">
    <li><a href="index.php">HOME</a></li>
    <li><a href="about.php">ABOUT</a></li>
    <li><a href="gallery.php">GALLERY</a></li>
    <li><a class="is-active" href="contact.php">CONTACT</a></li>
  </ul>
</div>

</div>

</div>

</nav>
</header>

<div class="page-heading text-center">
  <div class="page-heading-overlay"></div>

  <div class="container zoomIn animated">

    <h1 class="page-title">CONTACT US <span class="title-under"></span></h1>
    <p class="page-description">
      You can reach out to us through the form below or the contact information provided here.
    </p>

  </div>

</div>

<div class="main-container fadeIn animated">

  <div class="container">

    <div class="row">

      <div class="col-md-7 col-sm-12 col-form">

        <h2 class="title-style-2">CONTACT FORM <span class="title-under"></span></h2>

        <?php

        $nameErr = $emailErr = $messageErr = $status_info = "";

        if (isset($_POST["send_message"])) {
          if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);

            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
              $nameErr = "Only letters and white space allowed";
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

          if (empty($_POST["message"])) {
            $messageErr = "Message is required";
          } else {
            $message = test_input($_POST["message"]);
          }

  
          if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
            $sql = "INSERT INTO messages (Client_name, client_email, message)
VALUES (?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
              $status_info = "Message Sent Successfuly!";
            } else {
              $status_info = "Could not send message at the moment: " . mysqli_error($conn);
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
        <form class="contact-form" method="POST">
          <?php echo "<span class='text-success p-2'>" .$status_info. "</span>" ?>
          <div class="row">
            <div class="form-group col-md-6">
              <?php echo $nameErr; ?>
              <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required>
            </div>

            <div class="form-group col-md-6">
              <?php echo $emailErr; ?>
              <input type="email" name="email" id="email" class="form-control" placeholder="E-mail*" required>
            </div>
          </div>

          <div class="form-group">
            <?php echo $messageErr; ?>
            <textarea name="message" rows="5" id="message" class="form-control" placeholder="Message*" required></textarea>

          </div>
          <div class="form-group">
            <button type="submit" name="send_message" class="btn btn-primary pull-right">Send message</button>
          </div>
        </form>

      </div>

      <div class="col-md-4 col-md-offset-1 col-contact">

        <h2 class="title-style-2"> SUNFLOWER COMMUNITY CONTACTS <span class="title-under"></span></h2>
        <p>
          <b>Sunflower Community</b> values communication as it the only way to understanding each other. Reach out and support us.
        </p>

        <div class="contact-items">

          <ul class="list-unstyled contact-items-list">
            <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-map-marker"></i></span> Kapita, Homabay - Kenya</li>
            <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-phone"></i></span>+254791085576</li>

            <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-envelope"></i></span>orphanssunflower@gmail.com</li>
          </ul>
        </div>



      </div>

    </div> 


  </div>



</div>
</div>


<footer class="main-footer">
  <div class="footer-top"></div>

  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="footer-col">
            <h4 class="footer-title">
              About us <span class="title-under"></span>
            </h4>

            <div class="footer-content">
              <p>
                Welcome to
                <strong>Sunflower Community Orphans Support</strong>
                , where we are dedicated to improving the lives of orphaned
                children in Kenya. Our mission is to provide essential
                support and resources to these vulnerable children, helping
                them to grow and thrive in a safe and nurturing environment.
              </p>

              <p>
                We believe that every child deserves the opportunity to
                reach their full potential, and we are committed to making
                that a reality for the children in our care.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="footer-col">
            <h4 class="footer-title">
              Facebook Comments <span class="title-under"></span>
            </h4>

            <div class="footer-content">
              <ul class="tweets list-unstyled">
                <li class="tweet">
                  I love the emphasis on equality and empowerment for the
                  orphans that this organization supports. It's clear that
                  they not only provide necessary resources but also work to
                  break the cycle of poverty and discrimination that so
                  often plagues orphaned children.
                </li>

                <li class="tweet">
                  I am so impressed with the comprehensive approach that
                  this organization takes in supporting orphans. From
                  healthcare and nutrition to education and human rights,
                  it's clear that they are dedicated to ensuring that these
                  vulnerable children have the best possible chance at
                  success.
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="footer-col">
            <h4 class="footer-title">
              Our Social Media <span class="title-under"></span>
            </h4>

            <div class="footer-content">
              <ul class="list-unstyled list-inline header-social">
                <li>
                  <a href="https://web.facebook.com/sunflowercommunityorphanssupportproject"> <i class="fa fa-facebook"></i> </a>
                </li>
                <li>
                  <a href="#"> <i class="fa fa-twitter"></i> </a>
                </li>
                <li>
                  <a href="#"> <i class="fa fa-google"></i> </a>
                </li>
                <li>
                  <a href="#"> <i class="fa fa-youtube"></i> </a>
                </li>
                <li>
                  <a href="#"> <i class="fa fa fa-pinterest-p"></i> </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container text-center">
      SunflowerCommunityOrphanSupport @ copyrights   <?php 
    echo date("Y"); 
  ?>
    </div>
  </div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')
</script>

<script src="assets/js/bootstrap.min.js"></script>

<script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script src="assets/js/main.js"></script>
</body>

</html>
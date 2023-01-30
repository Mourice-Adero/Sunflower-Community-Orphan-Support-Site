<?php
include "./config.php";
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sunflower Community Admin Dashboard</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.12.6/dist/umd/popper.min.js" integrity="sha384-ZQi/6v4cATVuE6vbX7VU5S5U5V5U5vz8Z1g/4g4a4V7KjmvXyV7N/P5eB/0/0Rv" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="../assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/adminstyles.css" />
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 sidebar d-lg-block collapse navbar-colapse position-relative" id="sidebar-content">
        <div class="navbar-toggler m-3 p-2 h1 d-lg-none border position-absolute end-2 top-0" data-bs-toggle="collapse" data-bs-target="#sidebar-content" aria-controls="sidebar-content" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="admin-details d-flex flex-column justify-content-center pt-3 text-center">
          <img src="./images/admin-avatar.jpg" class="rounded-circle image-fluid image-thumbnail m-auto" style="height: 100px" alt="Admin Avatar" />
          <h4 class="m-2 admin-name">Admin</h4>
        </div>
        <hr class="hr" />
        <h3 class="my-4 text-center">Dashboard</h3>
        <hr class="hr" />
        <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#admins"><i class="fa fa-users px-2" aria-hidden="true"></i> Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages"><i class="fa fa-commenting px-2" aria-hidden="true"></i>
              Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#donations">
              <i class="fas fa-donate px-2"></i> Donations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#sponsors"><i class="fa fa-life-ring px-2" aria-hidden="true"></i>
              Sponsors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#contacts"><i class="fa fa-phone px-2" aria-hidden="true"></i> Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#blog"><i class="fa fa-rss px-2" aria-hidden="true"></i> Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#gallery"><i class="fa fa-th px-2 mb-2" aria-hidden="true"></i>
              Gallary</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-12 col-lg-10 right-content shadow-sm">
        <div class="d-flex justify-content-between right-header">
          <div class="navbar-toggler m-auto p-2 h1 border d-lg-none btn-show-nav" data-bs-toggle="collapse" data-bs-target="#sidebar-content" aria-controls="sidebar-content" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
          <h2 class="p-2 mx-auto title">
            Sunflower Community Orphan Support
          </h2>
          <div class="profile-container d-flex align-items-center" style="background-color: rgb(69, 158, 69)">
            <img src="./images/admin-avatar.jpg" class="image-fluid image-thumbnail avatar rounded-circle mx-2" />
            <button class="btn btn-outline-secondary d-none d-sm-inline-block text-dark mx-2">
              Log Out
            </button>
            <i class="fas fa-sign-out d-sm-none mr-2" style="color: #1f1812"></i>
          </div>
        </div>
        <div class="dashboard-body d-flex flex-wrap gap-3 mt-4">
          <div class="card text-center mx-auto m-3" style="min-width: 12rem">
            <div class="card-header">Admis</div>
            <div class="card-body">
              <h5 class="card-title">
                <i class="fa fa-users px-2" aria-hidden="true"></i>
              </h5>
              <p class="card-text">
                <?php
                $sql = "SELECT COUNT(*) FROM admins";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                  $row = mysqli_fetch_row($result);
                  $count = $row[0];
                  echo  $count;
                } else {
                  echo "Error counting rows: " . mysqli_error($conn);
                }
                ?>

              </p>
            </div>
          </div>
          <div class="card text-center mx-auto m-3" style="min-width: 12rem">
            <div class="card-header">Sponsers</div>
            <div class="card-body">
              <h5 class="card-title">
                <i class="fa fa-life-ring px-2" aria-hidden="true"></i>
              </h5>
              <p class="card-text">10</p>
            </div>
          </div>
          <div class="card text-center mx-auto m-3" style="min-width: 12rem">
            <div class="card-header">Donations</div>
            <div class="card-body">
              <h5 class="card-title">
                <i class="fas fa-donate px-2"></i>
              </h5>
              <p class="card-text">200</p>
            </div>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane" id="admins">
            <div class="content-head d-flex justify-content-between mx-3" id="admins-content">
              <h3>Admins</h3>
              <a href="./register.php" class="p-2 mb-1 table-btn">New Admin</a>
            </div>
            <div class="content-data">
              <table class="table p-3 mx-2 mx-auto" style="background: rgba(0, 0, 0, 0.171) !important; width: 95%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM admins";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>
                    <td scope="row">' . $row["id"] . '</td>
                    <td>' . $row["first_name"] . '</td>
                    <td>' . $row["last_name"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>
                      <button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>';
                    }
                  } else {
                    echo "0 results";
                  }
                  mysqli_close($conn);
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="messages">
            <div class="content-head d-flex justify-content-between mx-3" id="messages-content">
              <h3>Messages</h3>
              <button class="mb-2">Delete All</button>
            </div>
            <div class="content-data">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>mark@mdo</td>
                    <td>Otto</td>
                    <td>
                      <button class="btn btn-success btn-sm">Reply</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>mark@mdo</td>
                    <td>Otto</td>
                    <td>
                      <button class="btn btn-success btn-sm">Reply</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="donations">
            <div class="content-head d-flex justify-content-between mx-3" id="messages-content">
              <h3>Donations</h3>
              <button class="">Delete All</button>
            </div>
            <div class="content-data">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td>
                      <button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td>
                      <button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td>
                      <button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="sponsors">
            <div class="content-head d-flex justify-content-between mx-3" id="messages-content">
              <h3>Sponsers</h3>
            </div>
            <div class="content-data">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td>
                      <button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td>
                      <button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td>
                      <button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="contacts">
            <div class="content-head d-flex justify-content-between mx-3" id="messages-content">
              <h3>Contacts</h3>
            </div>
            <div class="content-data">
              <div class="container">
                <div class="row d-flex">
                  <div class=" d-flex flex-column my-3  contact_grid p-3">
                    <div class="about-text text-center">About Us</div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti odio ea illum corporis officia omnis culpa inventore! Deleniti, a dolorem.</p>
                  </div>
                  <div class=" d-flex flex-wrap gap-3 my-3">
                    <div class="my-3 contact_grid p-3">
                      <h6 class="d-flex"><i class="fa fa-location-arrow mx-1" aria-hidden="true"></i> Location</h6>
                      <P>Kapita, Homabay - Kenya</P>
                      <button class="btn btn-success btn-sm">Update</button>
                    </div>
                    <div class="my-3 contact_grid p-3">
                      <h6 class="d-flex"> <i class="fa fa-phone mx-1" aria-hidden="true"></i> Contacts</h6>
                      <table class="table table-respinsive">
                        <thead>
                          <th>Phone</th>
                          <th>Update</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <p>+254712345678</p>
                            </td>
                            <td class=" d-flex gap-1">
                              <button class="btn btn-success btn-sm m-1">Update</button>
                              <button class="btn btn-danger btn-sm m-1">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                      </table class="table table-respinsive">
                    </div>
                    <div class="my-3 contact_grid p-3">
                      <h6 class="d-flex"> <i class="fas fa-mail-bulk mx-1"></i> Email</h6>
                      <table>
                        <thead>
                          <th>Email</th>
                          <th>Update</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <p>cokendo2000@gmail.com</p>
                            </td>
                            <td class=" d-flex gap-1">
                              <button class="btn btn-success btn-sm m-1">Update</button>
                              <button class="btn btn-danger btn-sm m-1">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="tab-pane" id="blog">
            <div class="content-head d-flex justify-content-between mx-3" id="messages-content">
              <h3>Blog Content</h3>
              <button class="">Delete All</button>
            </div>
            <div class="content-data">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td><button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td><button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td><button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="gallery">
            <div class="content-head d-flex justify-content-between mx-3" id="messages-content">
              <h3>Gallery</h3>
            </div>
            <div class="content-data">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td><button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td><button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@mdo</td>
                    <td><button class="btn btn-success btn-sm">Update</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <button class="btn btn-top" id="scroll-top-btn">Top</button>
</body>

<!-- scroll listener -->
<script>
  const button = document.getElementById("scroll-top-btn");
  button.addEventListener("click", () => {
    window.scroll({
      top: 0,
      left: 0,
      behavior: "smooth",
    });
  });

  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 0) {
      button.style.display = "block";
    } else {
      button.style.display = "none";
    }
  });

  const listItems = document.querySelectorAll(".nav-link");
  const contents = document.querySelectorAll(".tab-pane");

  listItems.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.preventDefault();
      listItems.forEach((i) => i.classList.remove("active"));
      item.classList.add("active");
      contents.forEach((content) => content.classList.remove("d-block"));
      const id = item.getAttribute("href");
      const content = document.querySelector(id);
      content.classList.add("d-block");
      content.scrollIntoView({
        behavior: "smooth"
      });

    });
  });
</script>

</html>
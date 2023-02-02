<?php
include "../config.php";
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: ../login.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../../assets/css/adminstyles.css">
	<script src="ajax/ajax.js"></script>
</head>

<body>
	<div class="container">
		<p id="success"></p>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row text-center">
					<div class="col-sm-4 m-auto d-flex">
						<a href="../index.php" class="btn btn-custom"><span>Back to Dashboard</span></a>
					</div>
					<div class="col-sm-4">
						<h2>Manage <b>Admins</b></h2>
					</div>
					<div class="col-sm-4 m-auto d-flex">
						<a href="#addAdminModal" class="btn btn-custom" data-toggle="modal"><span>Add New Admin</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover table-responsive" style="  display: block; overflow-x: auto; max-width: 100%;">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>SL NO</th>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
						<th>EMAIL</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$result = mysqli_query($conn, "SELECT * FROM admins");
					$i = 1;
					while ($row = mysqli_fetch_array($result)) {
					?>
						<tr id="<?php echo $row["id"]; ?>">
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" class="user_checkbox" data-admin-id="<?php echo $row["id"]; ?>">
									<label for="checkbox2"></label>
								</span>
							</td>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["first_name"]; ?></td>
							<td><?php echo $row["last_name"]; ?></td>
							<td><?php echo $row["email"]; ?></td>
							<td>
								<a href="#editAdminModal" class="edit" data-toggle="modal">
									<i class="material-icons update" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>" data-first-name="<?php echo $row["first_name"]; ?>" data-last-name="<?php echo $row["last_name"]; ?>" data-email="<?php echo $row["email"]; ?>" title="Edit">&#xE254;</i>
								</a>
								<a href="#deleteAdminModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
					<?php
						$i++;
					}
					?>
				</tbody>
			</table>

		</div>
	</div>
	<!-- Add Modal HTML -->
	<div id="addAdminModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">
						<h4 class="modal-title">Add Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>FIRST NAME</label>
							<input type="text" id="first_name" name="first_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>LAST NAME</label>
							<input type="text" id="last_name" name="last_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" id="email" name="email" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editAdminModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">
						<h4 class="modal-title">Edit Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="first_name_u" name="first_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="last_name_u" name="last_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteAdminModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>

					<div class="modal-header">
						<h4 class="modal-title">Delete Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
<?php include('../includes/config.php') ?>

<?php

if(isset($_POST['btnsubmit'])) {
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];

  $check_query = mysqli_query($db_conn, "SELECT * FROM members WHERE email = '$email'");
  if(mysqli_num_rows($check_query) > 0) {
    $error = 'Member already exists';
  } else {
    mysqli_query($db_conn, "INSERT INTO members (name, mobile, email) VALUE ('$name', '$mobile', '$email')") or die(mysqli_error($db_conn));
  }
}

?>

<?php include('../admin/header.php') ?>
<?php include('../admin/sidebar.php') ?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Member</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
              </div>
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number" required>
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php include('../admin/footer.php'); ?>

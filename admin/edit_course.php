<?php 
include('../includes/config.php');

if(isset($_GET['id'])) {
  $course_id = $_GET['id'];

  // Retrieve course details for the selected course ID
  $result = mysqli_query($db_conn, "SELECT * FROM courses WHERE id = '$course_id'");
  $course = mysqli_fetch_assoc($result);

  if(isset($_POST['submit'])) {
    // Update course details in the database
    $name = $_POST['name'];
    $category= $_POST['category'];
    $duration= $_POST['duration'];
    $image = $course['image']; // keep the existing image unless a new one is uploaded
    $today = date('Y-m-d');

    if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '') {
      // Upload new image if a file is selected
      $target_dir = "../dist/uploads/";
      $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $uploadOk = 1;

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["thumbnail"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      } else {
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
          $image = $_FILES['thumbnail']["name"];
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }

    mysqli_query($db_conn, "UPDATE courses SET `name` = '$name', `category` = '$category', `duration` = '$duration', `image` = '$image', `date` = '$today' WHERE id = '$course_id'") or die(mysqli_error($db_conn));       
    $_SESSION['success_msg'] = 'Course has been updated successfully';
    header('Location: courses.php'); exit;
  }
}

?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Course</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right"></ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
    
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Course Details</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $course['name']; ?>">
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                  <?php
                    $categories = mysqli_query($db_conn, "SELECT * FROM categories");
                    while($category = mysqli_fetch_assoc($categories)) {
                      $selected = ($category['id'] == $course['category']) ? 'selected' : '';
                      echo '<option value="'.$category['id'].'" '.$selected.'>'.$category['name'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="duration">Duration (in weeks)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="<?php echo $course['duration']; ?>">
              </div>
              <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                  <label class="custom-file-label" for="thumbnail">Choose file</label>
                </div>
              </div>
              <div class="form-group">
                <img src="<?php echo '../dist/uploads/'.$course['image']; ?>" width="100" height="100">
              </div>
            </div>
            <!-- /.card-body -->
                    <div class="card-footer">
          <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>



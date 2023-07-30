<?php include('../admin/includes/config.php') ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php 
  if(isset($_POST['submit']))
  {
   $title = $_POST['title'];
  
   $sections = implode(',',$_POST['section']); 
   
   $added_date = date('Y-m-d');
   mysqli_query($db_conn, "INSERT INTO classes(title,section,added_date) VALUE ('$title','$sections','$added_date')") or die('DB error');
  }

  ?>

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Admin</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <?php
        if (isset($_REQUEST['action'])) { ?>
          <!---Info boxes--->
          <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                  Add New Classes
                </h3>
              </div>  
              <div class="card-body">
                <form action="">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title" required class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="title">Section</label>
                    <?php 
                    $query = mysqli_query($db_conn,'SELECT * FROM sections');
                    $count=1;
                    while($sections = mysqli_fetch_object($query)) { ?>
                    <div>
                      <label for="<?=$count?>">
                        <input type="checkbox" id="<?=$count?>" name="section[]" placeholder="Section" required>
                        <?=$sections->title?>
                      </label>
                    </div>
                    <?php
                    $count++;
                    } ?>
                  </div>

                  <button class="btn btn-success">
                    Submit
                  </button>
                </form>
              </div>
            </div>
            <!-- /.row -->
            <?php }else{?>
        <!-- Info boxes -->
        <div class="card">
          <div class="card-header py-2">
            <h3 class="card-little">
              Courses
            </h3>
            <div class="card-tools">
              <a href="?action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive bg-white">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                      $count = 1;
                      $curse_query = mysqli_query($db_conn, 'SELECT * FROM courses');
                      while ($course = mysqli_fetch_object($curse_query)) {?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><img src="<?=$course->image?>" height="100" alt=""></td>
                        <td><?=$course->name?></td>
                        <td><?=$course->category?></td>
                        <td><?=$course->duration?></td>
                        <td><?=$course->date?></td>
                      </tr>

                      <?php } ?>

                    </toby>
              </table>
              </table>

            
          </div> 
          </div>
        </div>
        <!--/.row.-->
        <?php } ?>
      </div>
    </section>
    <!-- /.content -->
<?php include('footer.php'); ?>
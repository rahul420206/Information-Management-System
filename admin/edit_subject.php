<?php include('../includes/config.php') ?>
<?php
if(isset($_POST['submit']))
{
  $title = isset($_POST['title'])?$_POST['title']:'';
  $from = isset($_POST['from'])?$_POST['from']:'';
  $to = isset($_POST['to'])?$_POST['to']:'';
  $status = 'publish';
  $type = 'subject';
  $date_add = date('Y-m-d g:i:s');
  $subject_id = $_POST['subject_id']; // add this line to get the subject id from the form

  $query = mysqli_query($db_conn, "UPDATE `posts` SET `title`='$title', `publish_date`='$date_add' WHERE id='$subject_id'"); // change the query to update the post

  if($query)
  {
    mysqli_query($db_conn, "UPDATE `metadata` SET `meta_value`='$from' WHERE `item_id`='$subject_id' AND `meta_key`='from'"); // update the metadata for the 'from' field
    mysqli_query($db_conn, "UPDATE `metadata` SET `meta_value`='$to' WHERE `item_id`='$subject_id' AND `meta_key`='to'"); // update the metadata for the 'to' field
  }

  header('Location: subjects.php');
  exit;
}

if(isset($_GET['id']))
{
  $subject_id = $_GET['id'];
  $args = array(
    'id' => $subject_id,
    'type' => 'subject',
    'status' => 'publish'
  );
  $subject = get_post($args);
}
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>


<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Subject</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($subject['title'])?$subject['title']:''; ?>" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label for="from">From</label>
                <input type="text" class="form-control" id="from" name="from" value="<?php echo get_metadata($subject['id'], 'from'); ?>" placeholder="Enter from">
              </div>
              <div class="form-group">
                <label for="to">To</label>
                <input type="text" class="form-control" id="to" name="to" value="<?php echo get_metadata($subject['id'], 'to'); ?>" placeholder="Enter to">
              </div>
              <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>" />
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
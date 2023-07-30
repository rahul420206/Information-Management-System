<?php include('../admin/header.php') ?>
<?php include('../admin/sidebar.php') ?>
<?php
  $db_conn = mysqli_connect('localhost', 'root', '', 'ims_project');
if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT enrollments.*, courses.name, courses.duration FROM enrollments JOIN courses ON enrollments.course_id = courses.id";
$result = mysqli_query($db_conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Course Name</th><th>Course Duration</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["student_name"] . "</td><td>" . $row["name"] . "</td><td>" . $row["duration"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No enrollments found.";
}

mysqli_close($db_conn);
?>
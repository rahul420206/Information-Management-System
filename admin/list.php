<?php 
include('../includes/config.php');
include('header.php');
include('sidebar.php');

$db_conn = mysqli_connect('localhost', 'root', '', 'ims_project');
if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT enrollments.*, courses.name, courses.duration FROM enrollments JOIN courses ON enrollments.course_id = courses.id";
$result = mysqli_query($db_conn, $query);

echo "<div class='container'>";
echo "<h2>Enrolled Students List</h2>";

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    echo "<tr><th>Student Name</th><th>Course Name</th><th>Course Duration</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["student_name"] . "</td><td>" . $row["name"] . "</td><td>" . $row["duration"] . "</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No enrollments found.</p>";
}

echo "</div>";

mysqli_close($db_conn);

include('footer.php'); 
?>

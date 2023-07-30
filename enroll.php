<?php
$db_conn = mysqli_connect('localhost', 'root', '', 'ims_project');
if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["enroll"])) {
    $course_id = $_POST["course_id"];
    $query = "INSERT INTO enrollments (course_id) VALUES ('$course_id')";
    if (mysqli_query($db_conn, $query)) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db_conn);
    }
}

mysqli_close($db_conn);
?>

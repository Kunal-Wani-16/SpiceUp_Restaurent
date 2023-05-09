

<?php
include_once 'partials/_dbconnect.php';
$sql = "DELETE FROM booktable WHERE email='" . $_GET["email"] . "' ";
$result = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location = '/restoran-1.0.0/todayBooking.php';</script> ";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
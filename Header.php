<?php
session_start();
include 'connect.php';

// Check if the user is logged in
if (isset($_SESSION['UserID'])) {
    // User is logged in, get the image URL from the database
    $userID = $_SESSION['UserID'];

    $query = "SELECT UserIDImage FROM User_Table WHERE UserID = '$userID'";
    $result = mysqli_query($con, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $imageUrl = "Useruploads/" . $row['UserIDImage']; // Change this path accordingly
        $linkContent = "<a href='logout.php'><img src='$imageUrl' alt='User Image'></a>";
    } else {
        // Handle the case where the image couldn't be retrieved
        $linkContent = "<a href='logout.php'><img src='Profile.jpg' alt='Default Profile Image'></a>";
    }
} else {
    // User is not logged in, show the default login link
    $linkContent = "<a href='login.php'>Login</a>";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GNB TwoWheels Auto</title>
    <link rel="stylesheet" href="style6.css">
</head>

<body>
    <header>
        <h2 class="logo"><img src="logo.png" alt="Logo">
            <p>Wheeled Auto</p>
        </h2>
        <nav class="navigation">
            <a href="Main.php">Home</a>
            <a href="Main.php#Category">Repair Shops</a>
            <a href="Main.php#About">About Us</a>
            <a href="Main.php#footer">Contact Us</a>
            <?php echo $linkContent; ?>
        </nav>
    </header>
</body>

</html>

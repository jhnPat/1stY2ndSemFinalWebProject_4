<?php
session_start();
include_once("Header.php");
include("connect.php");

$data = $_GET['data'];

// Check if the form is submitted
if (isset($_POST["submit"])) {
    $userID = $_SESSION['UserID'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    // Calculate the next available RateID manually
    $result = mysqli_query($con, "SELECT MAX(RateID) as maxID FROM rating_table");
    $row = mysqli_fetch_assoc($result);
    $maxID = $row['maxID'];

    $nextID = $maxID + 1;


    $sql = "INSERT INTO rating_table (RateID, UserID, ID, Rating, Comment) 
            VALUES ('$nextID', '$userID', '$data', '$rating', '$comment')";

    if (mysqli_query($con, $sql)) {
        $registe = "Feedback added";
    } else {
        $registe = "<p class='error'>Error: " . mysqli_error($con) . "</p>";
    }
}

// Fetch shop details
$data = $_GET['data'];
$sql = "SELECT * FROM repairshops WHERE id=$data";
$result = mysqli_query($con, $sql);

// Check if the user is logged in
$loggedIn = isset($_SESSION["UserID"]);
$userID = $loggedIn ? $_SESSION["UserID"] : null;

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $images = array($row['Image'], $row['ImageOne'], $row['ImageTwo']);
    echo "<div class='container'>";
    echo "<div class='slideshow-container'>";
    foreach ($images as $key => $image) {
        echo "<div class='mySlides'>";
        echo "<img src='uploads/" . $image . "' alt='Uploaded Image'>";
        echo "</div>";
    }
    echo "<a class='arrow left' onclick='plusSlides(-1)'>&#10094;</a>";
    echo "<a class='arrow right' onclick='plusSlides(1)'>&#10095;</a>";
    echo "</div>";
    echo "<div class='info'>";
    echo "<p>Name: " . $row['Name'] . "</p>";
    echo "<p>About: " . $row['About'] . "</p>";
    echo "<p>Address: " . $row['Address'] . "</p>";
    echo "<p>Contact No: " . $row['Contact_No'] . "</p>";

    if ($loggedIn) {
        // Output the feedback form for logged-in users
        echo "<div id='feedback_container'>";
        echo "<form method='post'>";
        echo "<input type='text' name='comment' placeholder='Comment' required><br>";
        echo "<input type='number' placeholder='Rate 1/5' name='rating' min='1' max='5' required><br>";
        // Use 'shop_id' instead of 'data'
        echo "<button type='submit' name='submit'>Submit Feedback</button>";
        if (!empty($registe)) {
            echo $registe;
        }
        echo "</form>";
        include_once("feedback.php");
        feedback($data);
        echo "</div>";
    } else {
        // Output a message for users who are not logged in
        echo "<div id='feedback_container'>";
        echo "<p>Login to submit feedback and ratings.</p>";
        include_once("feedback.php");
        feedback($data);
        echo "</div>";
    }
}
?>
<a href="RepairShop.php">Back</a>

<script>
    slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        var i;
        slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
</script>



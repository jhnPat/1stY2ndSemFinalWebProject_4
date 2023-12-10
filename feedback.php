<?php

function feedback($data) {
    include("connect.php");

    $sql = "SELECT * FROM rating_table WHERE ID='$data' ORDER BY RateID DESC";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $userID = $row['UserID'];

            // Fetch user details based on UserID
            $sqlUser = "SELECT UserIDImage, Username FROM user_table WHERE UserID='$userID'";
            $resultUser = mysqli_query($con, $sqlUser);

            if ($resultUser && $rowUser = mysqli_fetch_assoc($resultUser)) {
                $imagePath = 'uploads/' . $rowUser['UserIDImage'];

                echo '<div class="feedback-box-item">';
                echo '<img src="' . $imagePath . '" alt="User Image">';
                echo '<p>User: ' . $rowUser['Username'] . '</p>';
                echo '<p>Rating: ' . $row['Rating'] . '</p>';
                echo '<p>Comment: ' . $row['Comment'] . '</p>';
                echo '</div>';
            }
        }
    } else {
        echo 'No feedback available.';
    }
}

?>

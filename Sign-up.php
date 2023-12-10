<?php
include_once("Header.php");
include 'connect.php';

if (isset($_POST["submit"])) {
    $fullName = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $contact = isset($_POST["contact"]) ? $_POST["contact"] : "";

    $image = $_FILES['useridimage']['name'];
    $image_tmp = $_FILES['useridimage']['tmp_name'];

    $uploadsDirectory = __DIR__ . '/useruploads/';
    move_uploaded_file($image_tmp, $uploadsDirectory . $image);

    $sql = "SELECT * FROM user_table WHERE Email = '$email'";
    $result = mysqli_query($con, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $error_message = "Email already exists!";
    } else {
        $result = mysqli_query($con, "SELECT COUNT(*) as total FROM user_table");
        $row = mysqli_fetch_assoc($result);
        $totalRows = $row['total'];

        $nextID = $totalRows + 1;

        $sql = "INSERT INTO user_table (UserID, Username, Password, Email, User_Contact, UserIDImage) 
                        VALUES ('$nextID', '$fullName', '$password', '$email', '$contact', '$image')";

        if (mysqli_query($con, $sql)) {
            $error_message = "<p>Registration successful!</p>";
        } else {
            $error_message = "<p class='error'>Error: " . mysqli_error($con) . "</p>";
        }
    }
}
?>

    <div id="register_container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h2>Sign-up</h2>
            <?php if (!empty($error_message)) {
                echo $error_message;
            } ?>
            <input type="text" placeholder="Email" name="email" required>

            <input type="text" placeholder="Full Name" name="fullname" required>

            <input type="password" placeholder="Password" name="password" required>

            <input type="text" placeholder="Contact No." name="contact" required>

            <label for="useridimage">Profile Picture:</label>
            <input type="file" id="useridimage" name="useridimage" accept="image/*" required><br>

            <button type="submit" name="submit">Sign-up</button>
            <p>Already Registered? <a href="login.php">Login Here</a></p>
        </form>
    </div>
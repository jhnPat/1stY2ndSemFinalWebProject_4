<?php
include_once("Header.php");
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT UserID, Username FROM user_table WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['Username'] = $row['Username'];

        header('Location: main.php');
        exit();
    } else {
        $error_message = "Invalid email or password";
    }
}

mysqli_close($con);
?>

<div id="register_container">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h2>Login</h2>
        <?php if (!empty($error_message)) {
            echo $error_message;
        } ?>
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>

        <button type="submit">Login</button>
        <p>Don't have an account? <a href="Sign-up.php">Register here</a></p>
    </form>
</div>
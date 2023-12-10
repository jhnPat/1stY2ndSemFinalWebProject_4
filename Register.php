<?php
include_once("header.php");
include 'connect.php';

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $about = $_POST['about'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $idimage = $_FILES['idimage']['name'];
    $idimage_tmp = $_FILES['idimage']['tmp_name'];

    $image1 = $_FILES['image1']['name'];
    $image1_tmp = $_FILES['image1']['tmp_name'];

    $image2 = $_FILES['image2']['name'];
    $image2_tmp = $_FILES['image2']['tmp_name'];

    $uploadsDirectory = __DIR__ . '/uploads/';
    move_uploaded_file($image_tmp, $uploadsDirectory . $image);
    move_uploaded_file($idimage_tmp, $uploadsDirectory . $idimage);
    move_uploaded_file($image1_tmp, $uploadsDirectory . $image1);
    move_uploaded_file($image2_tmp, $uploadsDirectory . $image2);

    $result = mysqli_query($con, "SELECT COUNT(*) as total FROM repairshops");
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total'];

    $nextID = $totalRows + 1;

    $sql = "INSERT INTO repairshops (ID, Email, Name, About, Address, Contact_No, Image, IDImage, ImageOne, ImageTwo) 
                VALUES ('$nextID', '$email', '$name', '$about', '$address', '$contact', '$image', '$idimage',  '$image1', '$image2')";


    if (mysqli_query($con, $sql)) {
        echo $registe = "Registration successful!";
    } else {
        echo $registe = "<p class='error'>Error: " . mysqli_error($con) . "</p>";
    }
}
?>



    <div id="register_container">
        <form method="post" enctype="multipart/form-data">
            <h2>Shop Registration</h2>
            <?php if (!empty($registe)) {
                echo $registe;
            }
            ?><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="name" placeholder="Shop Name" required><br>
            <input type="text" name="about" placeholder="About The Shop" required><br>
            <input type="text" name="address" placeholder="Address" required><br>
            <input type="text" name="contact" placeholder="Contact No." required><br>

            <label for="idimage">ID:</label>
            <input type="file" id="idimage" name="idimage" accept="image/*" required><br>

            <label for="image">Shop Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>

            <label for="image1">Recent Work 1:</label>
            <input type="file" id="image1" name="image1" accept="image/*" required><br>

            <label for="image2">Recent Work 2:</label>
            <input type="file" id="image2" name="image2" accept="image/*" required><br>

            <button type="submit" name="submit">Register</button>
            <a href="RepairShop.php">Back!</a>
        </form>
    </div>


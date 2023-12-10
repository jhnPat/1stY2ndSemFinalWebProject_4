<?php
include_once("Header.php");
include("connect.php")
    ?>

<body>

    <form method="post" class="searchbox">
        <input type="text" placeholder="Search" name="search">
        <button name="submit"></button>
    </form>

    <div id="register-shop">
        <a href="Register.php.">Register Your Shop</a>
    </div>

    <div class="ShopContain">
        <?php
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $sql = "SELECT * FROM repairshops WHERE id like '%$search%' or 
                            Name like '%$search%' or Address like '%$search%'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $imagePath = 'uploads/' . $row['Image'];
                    echo '<div class="shop-box">
                                    <img src="' . $imagePath . '" alt="' . $row['Name'] . '">
                                    <p><a href="SearchData.php?data=' . $row['ID'] . '">' . $row['Name'] . '</a></p>
                                    <p>' . $row['Address'] . '</p>
                                  </div>';
                }
            } else {
                echo '<h1 align="center">Data not Found</h1>';
            }
        }
        ?>
    </div>
    </div>
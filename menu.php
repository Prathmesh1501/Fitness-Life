<?php include('config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Life</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="border">
        <div class="">
        <div class="bgcolor">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL;?>index.php" title="Logo">
                    <img src="images/logo3.png" alt="Restaurant Logo" class="img-responsive" >
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>products.php">Products</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>about_us.php">About Us</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        </div>
        </div>
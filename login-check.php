<?php 


    //Authorization or access control
    //check the user logged in or not
    if(!isset($_SESSION['user']))//if user session is not set
    {
        //User is not logged in
        //redirect to login page
        $_SESSION['no-login-message'] = "<div class='error' text-center>Please Login to access pannel</div>";
        //redirect to log in page
        header('location:'.SITEURL.'admin/login.php');
    }

?>
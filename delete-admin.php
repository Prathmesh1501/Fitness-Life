<?php

    //inclide constants.php file here
    include('../config/constants.php');

    //1.get the id admin to be deletedGETGET
    $id = $_GET['id'];

    //create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    // check whether the query executed successfully or not
    if($res==true)
    {
        //query executed successfully and admin Delated
        //echo "Admin Deleted";
        //create session variable to display messesge
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully.</div>";
        //redirect to manage admin page
        header('location:'.SITEURL. 'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. try again later.</div>";
        header('location:'.SITEURL. 'admin/manage-admin.php');
    }

    //redirect to manage admin page with messege (success/error)
?>
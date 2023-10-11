<?php 
    //include constants file
    include('../config/constants.php');
    //echo "Delete Page";
    //check whether the id and image name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image = $_image_name['image_name'];

        //remove the physical image file is available
        if($image_name !="")
        {
            //image is available so remove it
            $path = "../images/Category".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove image then add or error messege and stop the process
            if($remove==false)
            {
                //set the session messege
                $_SESSION['remove'] = "<div class='error'>Failed to Remove category Image</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }

        //delete data from database
        //sql query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the data is delete from database or not
        if($res==true)
        {
            //set success messege and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        }
        else
        {
            //set fail messege and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to Delete.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        //redirect to manage category page with messege
    
    
?>
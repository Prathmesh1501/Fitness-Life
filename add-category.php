<?php  include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>

        <!-- add category form start  -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name= "title" placeholder="category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name= "image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

         <!-- add category form start  -->

         <?php
            //submit button clicked or not 
            if(isset($_POST['submit']))
            {
                // echo "clicked";
                //1. get the value from category form
                $title = $_POST['title'];

                //for radio input type to ceck button is selected or not 
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];

                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];

                }
                else
                {
                    $active = "No";
                }
                //image selected or not and set the value for image name accordingly
                // print_r($_FILES['image']);

                // die();//break the code here

                if(isset($_FILES['image']['name']))
                {
                    //to upload image we need image name, source path and  destination path
                    $image_name = $_FILES['image']['name'];
                    //upload the image only if image is selected
                    if($image_name != "")
                    {

                    

                        //auto rename our image
                        //get the extension of our image[jpg,png,gif,etc]. eg. pizza.jpg
                        $ext = end(explode('.',$image_name)); 

                        //raname the image
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; //eg. Food_Ctegory_345.jpg

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //finally upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check wether the image is upoaded or not
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Faild To Upload Image.</div>";

                            header('location:'.SITEURL.'admin/add-category.php');
                            //stop the process
                            die();
                        }

                    }
                }
                else
                {
                    $image_name = "";
                }

                //2. create sql query to insert categary into database
                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active ='$active'

                ";
                //3. execute the query and save in database
                $res = mysqli_query($conn, $sql);

                //4. query executed or not or data added or not
                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully. </div>";

                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed To Add Category . </div>";

                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
         
         ?>
    </div>
</div>


<?php  include('partials/footer.php');?>   
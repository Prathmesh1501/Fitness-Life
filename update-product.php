<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>

            <br><br>


            <?php
                //check whether the id set or not
                if(isset($_GET['id']))
                {
                    //get the id and all other details
                    //echo "getting the data"
                    $id = $_GET['id'];
                    //create sql query to get all other details
                    $sql2 = "SELECT * FROM tbl_product WHERE id=$id";

                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //count the rows to check whether id is valid or not
                    $count = mysqli_num_rows($res2);

                    if($count==1)
                    {
                        //get all the data
                        $row2 = mysqli_fetch_assoc($res2);
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $current_image = $row2['image_name'];
                        $current_category = $row2['category_id'];
                        $featured = $row2['featured'];
                        $active = $row2['active'];
                    }
                    else
                    {
                        //redirect to manage category withe session
                        $_SESSION['no-category-found'] = "<div class='error'>Product not found</div>";
                        header('location:'.SITEURL.'admin/manage-product.php');
                    }

                }
                else
                {
                    //redirect to manage category
                    header('location:'.SITEURL.'admin/manage-product.php');
                }
            ?>


            <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value ="<?php  echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" ><?php  echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                    <input type="number" name="price" value="<?php  echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>current Image: </td>
                    <td>
                        <?php 
                            if($current_image !="")
                            {
                                //display the image
                                ?>
                                <img src="<?php echo SITEURL;?>images/product/<?php echo $current_image; ?>" width="150px" height="150px">

                                <?php
                            }
                            else
                            {
                                //display the messege
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Select New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                                //query to get active categories
                                $sql= "SELECT * FROM tbl_category WHERE active='Yes'";
                                //execute the query
                                $res = mysqli_query($conn, $sql);
                                //count the rows
                                $count = mysqli_num_rows($res);

                                //check whether category available or not
                                if($count>0)
                                {
                                    //category available
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $category_title = $row['title'];
                                        $category_id= $row['id'];

                                        //echo "<option value='$category_id'>$category_title</option>";
                                        ?>
                                            <option <?php if ($current_category==$category_id){echo "selected";} ?>value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option> 
                                        <?php
                                    }
                                }
                                else
                                {
                                    //Category not available
                                    echo "<option value='0'>Category Not Available</option>";
                                }
                            ?>


                            
                        </select>
                    </td>
                </tr>

                

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes

                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes

                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                    </td>
                </tr>

            </table>

            </form>

            <?php 
            
                if(isset($_POST['submit']))
                {
                    //echo "clicked";
                    //get all the values from our form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $current_image = $_POST['current_image'];
                    $category = $_POST['category'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];
                    

                    //updating new image if selected
                    //check whether image is selected or not
                    if(isset($_FILES['image']['name']))
                    {
                        //get the image Details
                        $image_name = $_FILES['image']['name'];

                        //check whether the image is available or not 
                        if($image_name != "");
                        {
                            //image available
                            //upload new image

                            //auto rename image
                            //get the extension of image(jpg,png,jpeg,etc) e.g. "food.jpg"
                            $ext = end(explode('.', $image_name));

                            //rename the image
                            $image_name = "Product-Name-".rand(0000,9999).'.'.$ext;

                            $src_path = $_FILES['image']['tmp_name'];
                            $dest_path ="../images/product/".$image_name;

                            //upload the image
                            $upload = move_uploaded_file($src_path, $dest_path);

                            //check whether the image uploaded or not
                            //and if the image is not uploaded then we will stop the process and redirect the messege
                            if($upload==false)
                            {
                                //set the messege
                                $_SESSION['upload'] = "<div class= 'error'>Failed to upload image</div>";
                                //redirect to add category page
                                header('location:'.SITEURL. 'admin/manage-product.php');
                                //stop the process
                                die();
                            }

                            
                            //remove the current image if available
                            if($current_image !="")
                            {
                                $remove_path = "../images/foodproduct/".$current_image;

                                $remove = unlink($remove_path);

                                //check whether the image is remove or not
                                //if failed to remove then display the messege and stop the process
                                if($remove==false)
                                {
                                    //failed to remove image
                                    $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image</div>";
                                    header('location'.SITEURL.'admin/manage-product.php');
                                    die(); //stop the process
                                }
                            }


                    }   
                    
                    {
                        $image_name = $current_image;
                    }

                    //update the database
                    $sql3 = "UPDATE tbl_product SET
                        title = '$title',
                        description = '$description',
                        price = $price,
                        image_name = '$image_name',
                        category_id = '$category',
                        featured = '$featured',
                        active = '$active'
                        WHERE id=$id
                    ";

                    //execute the query
                    $res3 = mysqli_query($conn, $sql3);

                    //redirect to manage category page
                    //check whether query executed or not
                    if($res3==true)
                    {
                        //category updated
                        $_SESSION['update'] = "<div class='success'>Product Updated successfully</div>";
                        
                    }
                    else
                    {
                        //failed to update category
                        $_SESSION['update'] = "<div class='error'>Failed to Update Product</div>";
                        header('location:'.SITEURL.'admin/manage-Product.php');
                    }
                    
                }

            }
            
            ?>

    </div>
</div>

<?php include('partials/footer.php') ?>

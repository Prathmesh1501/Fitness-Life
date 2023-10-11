<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product</h1>
        
        <br><br>

            <!--  Bottom to add Admin -->
            <a href="<?php echo SITEURL; ?>admin/add-product.php" class="btn-primary">Add Product</a>

            <br><br><br>

            <?php 
            
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unauthorized']))
                {
                    echo $_SESSION['unauthorized'];
                    unset($_SESSION['unauthorized']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }



                



            
            ?>


                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>


                    <?php
                    
                        //create sql query to get all the food
                        $sql = "SELECT * FROM tbl_product";

                        //Execute the query
                        $res = mysqli_query($conn, $sql);

                        //count the rows to check have food or not
                        $count = mysqli_num_rows($res);

                        //create serial number variable and set default value as 1
                        $sn=1;

                        if($count>0)
                        {
                            //we have food in database
                            //get the foods from database and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the value from individual column
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                            <?php
                                                //check whether we have image name
                                                if($image_name=="")
                                                {
                                                    //we do not have image name
                                                    echo "<div class='error'>Image Not Added</div>";
                                                }
                                                else
                                                {
                                                    //we have image
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" width="100px" height="100px">
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" class="btn-danger">Delete Product</a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //food not added in database
                            echo "<tr> <td colspan='7' class='error'>Product not added yet</td> </tr>";
                        }
                    
                    ?>

                    

                    
                </table>

    </div>
       
</div>

<?php include('partials/footer.php')?>
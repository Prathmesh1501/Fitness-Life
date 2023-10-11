<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
            
            //get the search keyword
            $search = mysqli_real_escape_string($conn, $_POST['search']);

            ?>
            <h2>Product on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center text-white">Product Menu</h2>

            <?php
            
                
                //sql query to get the search keyword
                //$search = burger' ; DROP database name;
                //"SELECT  * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger'%'";
                $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

                //execute the query 
                $res = mysqli_query($conn, $sql);

                //count rows 
                $count = mysqli_num_rows($res); 

                //check whether the food is availabel or not
                if($count>0)
                {
                    //food available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">

                                <?php
                                    //check wether the image is availabele or not
                                    if($image_name=="")
                                    {
                                        //image not available
                                        echo "<div class='error'>Image Not Available.</div>";
                                    }
                                    else
                                    {
                                        //image available
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="image not found" class="img-responsive img-curve">
                                        <?php

                                    }
                                ?>

                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;  ?></h4>
                                    <p class="food-price"> ₹ <?php echo $price; ?></p>
                                    <p class="food-detail">
                                    <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL;?>order.php" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    //food not available
                    echo "<div class='error '>Food not Found.</div>";
                }
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
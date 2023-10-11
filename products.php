<?php include('partials-front/menu.php')?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Product.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center text-white">Product Menu</h2>





            <?php
                //create sql query to display categories from database
                $sql2 = "SELECT * FROM tbl_product WHERE active='Yes' AND featured='Yes'";
                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    //food available
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="food-menu-box" data-aos="flip-left">
                                <div class="food-menu-img">

                                <?php
                                        if($image_name=="")
                                        {
                                            //display messege
                                            echo "<div class='error'>Image not Available</div>";
                                        }
                                        else
                                        {
                                            //image available
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>

                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price"><?php echo $price;?></p>
                                    <p class="food-detail">
                                        <?php echo $description;?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL;?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        <?php

                    }
                }
                else
                {
                    //categories not available
                    echo "<div class='error'>Category not added.</div>";
                }
            ?>









            

            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- WP pop up message  ( Live chat)-->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-16f5c48a-51d0-4334-9620-4c5e7718c16e"></div>

<!-- live chat end  -->

<?php include('partials-front/footer.php')?>
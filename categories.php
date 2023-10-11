<?php include('partials-front/menu.php')?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class=" container">
            <h2 class="text-center" style="color:white;">Explore Products</h2>   



            <?php
                //create sql query to display categories from database
                $sql = "SELECT * FROM tbl_category";
                //execute the query
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                                <a href="<?PHP echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
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
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>

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

    <!-- Categories Section Ends Here -->

    <!-- WP pop up message  ( Live chat)-->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-16f5c48a-51d0-4334-9620-4c5e7718c16e"></div>


<?php include('partials-front/footer.php')?>
<?php
include_once("connection.php");
?>
   <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="images/b1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MaverikStudio</strong></h1>
                            <p class="m-b-40">Not everything<br> You think about yourself is true. <br> Everything okay in your world.</p>
                            <p><a class="btn hvr-hover" href="">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner7.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MaverikStudio</strong></h1>
                            <p class="m-b-40">Not everything<br> You think about yourself is true. <br> Everything okay in your world.</p>
                            <p><a class="btn hvr-hover" href="">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="images/banner6.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MaverikStudio</strong></h1>
                            <p class="m-b-40">Not everything<br> You think about yourself is true. <br> Everything okay in your world.</p>
                            <p><a class="btn hvr-hover" href="">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-left">
                <img src="images/banner8.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                             <h1 class="m-b-20"><strong>Welcome To <br> MaverikStudio</strong></h1>
                            <p class="m-b-40">Not everything<br> You think about yourself is true. <br> Everything okay in your world.</p>
                            <p><a class="btn hvr-hover" href="shop.php">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->
    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>The most outstanding products of the marverik studio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">New Arrivals</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/product3.png" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="shop-detail.php" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="?page=cart">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lozenge Pants </h4>
                            <h5> $45</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/tee.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="?page=cart">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Smiley Embroidery T-Shirt (White)</h4>
                            <h5> $20</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/product7.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="?page=cart">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4> 
                            Khaki Shirt ( Cream )</h4>
                            <h5> $35</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/product10.png" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="?page=cart">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4> 
                                Smiley T-shirt ( Black )</h4>
                            <h5> $45</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products  -->
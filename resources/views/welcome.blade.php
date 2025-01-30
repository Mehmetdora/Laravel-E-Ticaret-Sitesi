<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('layouts.head')

    {{-- Slider Products --}}
    <style>
        .banner-area {
            width: 100%;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .slider-container {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .slider-container::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 70%;
            background: repeating-linear-gradient(45deg,
                    rgba(255, 255, 255, 0.1) 0px,
                    rgba(255, 255, 255, 0.1) 20px,
                    transparent 20px,
                    transparent 40px);
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .slide {
            min-width: 100%;
            height: 100%;
        }

        .slide-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10%;
            height: 100%;
            position: relative;
        }

        .text-content {
            flex: 0 0 40%;
            z-index: 2;
        }

        .text-content h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: #333;
        }

        .text-content p {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .add-bag {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .add-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .add-btn:hover {
            transform: scale(1.1);
        }

        .plus {
            rotate: 45deg;
            font-size: 24px;
            color: #ff7f50;
        }

        .add-text {
            font-weight: 600;
            color: #333;
        }

        .image-content {
            flex: 0 0 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .image-content img {
            max-width: 100%;
            height: auto;
            transform: rotate(-15deg);
        }

        .slider-nav {
            position: absolute;
            bottom: 2rem;
            right: 2rem;
            display: flex;
            gap: 1rem;
            z-index: 3;
        }

        .nav-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            padding: 0.5rem 1rem;
            transition: opacity 0.3s ease;
        }

        .nav-btn:hover {
            opacity: 0.8;
        }

        .prev::before {
            content: "←";
            margin-right: 0.5rem;
        }

        .next::after {
            content: "→";
            margin-left: 0.5rem;
        }

        /* Responsive Styles */
        @media screen and (max-width: 1024px) {
            .text-content h1 {
                font-size: 3rem;
            }

            .text-content p {
                font-size: 0.9rem;
            }
        }

        @media screen and (max-width: 768px) {
            .slide-content {
                padding: 0 5%;
                justify-content: center;
            }

            .text-content {
                flex: 0 0 100%;
                text-align: center;
                padding: 2rem;
            }

            .text-content h1 {
                font-size: 2.5rem;
            }

            .add-bag {
                justify-content: center;
            }

            .image-content {
                display: none;
                /* Hide images on mobile */
            }

            .slider-nav {
                bottom: 1rem;
                right: 50%;
                transform: translateX(50%);
            }

            .slider-container::before {
                width: 100%;
            }
        }

        @media screen and (max-width: 480px) {
            .text-content h1 {
                font-size: 2rem;
            }

            .text-content p {
                font-size: 0.8rem;
            }

            .nav-btn {
                font-size: 0.75rem;
                padding: 0.4rem 0.8rem;
            }
        }
    </style>

    {{-- v0 --}}
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .product-slider {
            position: relative;
        }

        .products-container {
            overflow: hidden;
        }

        .products-wrapper {
            display: flex;
            transition: transform 0.5s ease;
        }

        .col-lg-3 {
            flex: 0 0 25%;
            max-width: 25%;
            padding: 0 15px;
        }

        .single-product {
            margin-bottom: 30px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .single-product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-details {
            padding: 5px;
        }

        .product-details h6 {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        .price {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .price h6 {
            font-size: 18px;
            color: #e44d26;
        }

        .l-through {
            text-decoration: line-through;
            color: #999;
        }

        .prd-bottom {
            display: flex;
            justify-content: space-between;
        }

        .hover-text {
            font-size: 12px;
            margin: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .social-info:hover .hover-text {
            opacity: 1;
        }

        .arrow-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            font-size: 24px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            z-index: 10;
        }

        .arrow-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        #prev-btn {
            border-radius: 50%;
            left: -40px;
        }

        #next-btn {
            border-radius: 50%;
            right: -40px;
        }

        @media (max-width: 1024px) {
            .col-lg-3 {
                flex: 0 0 33.333%;
                max-width: 33.333%;
            }
        }

        @media (max-width: 768px) {
            .col-lg-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 480px) {
            .col-lg-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>


</head>

<body>

    @include('layouts.header')

    <section class="banner-area">
        <div class="slider-container">
            <div class="slider-wrapper">
                <!-- single-slide -->
                <div class="slide">
                    <div class="slide-content">
                        <div class="text-content">
                            <h1>Nike New<br>Collection!</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <div class="add-bag">
                                <button class="add-btn">
                                    <span class="plus">+</span>
                                </button>
                                <span class="add-text">ADD TO BAG</span>
                            </div>
                        </div>
                        <div class="image-content">
                            <img src="{{ asset('karma_template/') }}/img/banner/banner-img.png" alt="Nike Shoe">
                        </div>
                    </div>
                </div>
                <!-- Duplicate slides for continuous effect -->
                <div class="slide">
                    <div class="slide-content">
                        <div class="text-content">
                            <h1>Nike New<br>Collection!</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <div class="add-bag">
                                <button class="add-btn">
                                    <span class="plus">+</span>
                                </button>
                                <span class="add-text">ADD TO BAG</span>
                            </div>
                        </div>
                        <div class="image-content">
                            <img src="{{ asset('karma_template/') }}/img/banner/banner-img.png" alt="Nike Shoe">
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-nav">
                <button class="nav-btn prev">PREV</button>
                <button class="nav-btn next">NEXT</button>
            </div>
        </div>
    </section>


    <!-- End banner Area -->

    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('karma_template/') }}/img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('karma_template/') }}/img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('karma_template/') }}/img/features/f-icon3.png" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('karma_template/') }}/img/features/f-icon4.png" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- Start category Area -->
    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('karma_template/') }}/img/category/c1.jpg"
                                    alt="">
                                <a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('karma_template/') }}/img/category/c2.jpg"
                                    alt="">
                                <a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('karma_template/') }}/img/category/c3.jpg"
                                    alt="">
                                <a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Product for Couple</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('karma_template/') }}/img/category/c4.jpg"
                                    alt="">
                                <a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-deal">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('karma_template/') }}/img/category/c5.jpg"
                            alt="">
                        <a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
                            <div class="deal-details">
                                <h6 class="deal-title">Sneaker for Sports</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End category Area -->

    <!-- start product Area -->



    <div class="container">
        <h1 id="collection-title">Summer Collection</h1>
        <div class="product-slider">
            <button id="prev-btn" class="arrow-btn">&lt;</button>
            <div class="products-container">
                <div id="products-wrapper" class="products-wrapper">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-product">
                            <img class="img-fluid" src="https://picsum.photos/300/300?random=1" alt="">
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <button id="next-btn" class="arrow-btn">&gt;</button>
        </div>
    </div>



    <!-- end product Area -->


    <!-- Start exclusive deal Area -->
    <section class="exclusive-deal-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1>Exclusive Hot Deal Ends Soon!</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row clock-wrap">
                                <div class="col clockinner1 clockinner">
                                    <h1 class="days">150</h1>
                                    <span class="smalltext">Days</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="hours">23</h1>
                                    <span class="smalltext">Hours</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="minutes">47</h1>
                                    <span class="smalltext">Mins</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="seconds">59</h1>
                                    <span class="smalltext">Secs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="primary-btn">Shop Now</a>
                </div>
                <div class="col-lg-6 no-padding exclusive-right">
                    <div class="active-exclusive-product-slider">
                        <!-- single exclusive carousel -->
                        <div class="single-exclusive-slider">
                            <img class="img-fluid" src="{{ asset('karma_template/') }}/img/product/e-p1.png"
                                alt="">
                            <div class="product-details">
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <h4>addidas New Hammer sole
                                    for Sports person</h4>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div>
                            </div>
                        </div>
                        <!-- single exclusive carousel -->
                        <div class="single-exclusive-slider">
                            <img class="img-fluid" src="{{ asset('karma_template/') }}/img/product/e-p1.png"
                                alt="">
                            <div class="product-details">
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <h4>addidas New Hammer sole
                                    for Sports person</h4>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('karma_template/') }}/img/brand/1.png"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('karma_template/') }}/img/brand/2.png"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('karma_template/') }}/img/brand/3.png"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('karma_template/') }}/img/brand/4.png"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('karma_template/') }}/img/brand/5.png"
                        alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Deals of the Week</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r1.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r2.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r3.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r5.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r6.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r7.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r9.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r10.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('karma_template/') }}/img/r11.jpg"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto"
                                src="{{ asset('karma_template/') }}/img/category/c5.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->

    @include('layouts.footer')

    @include('layouts.scripts')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sliderWrapper = document.querySelector(".slider-wrapper")
            const slides = document.querySelectorAll(".slide")
            const prevBtn = document.querySelector(".prev")
            const nextBtn = document.querySelector(".next")

            let currentIndex = 0
            const slideWidth = 100 // 100%

            // Clone first slide and append to end for infinite effect
            const firstSlideClone = slides[0].cloneNode(true)
            sliderWrapper.appendChild(firstSlideClone)

            function slideRight() {
                currentIndex++
                sliderWrapper.style.transition = "transform 0.5s ease-in-out"
                updateSliderPosition()

                // If we've reached the clone, prepare to loop back
                if (currentIndex === slides.length) {
                    setTimeout(() => {
                        sliderWrapper.style.transition = "none"
                        currentIndex = 0
                        updateSliderPosition()
                    }, 500)
                }
            }

            function slideLeft() {
                if (currentIndex === 0) {
                    sliderWrapper.style.transition = "none"
                    currentIndex = slides.length
                    updateSliderPosition()

                    setTimeout(() => {
                        sliderWrapper.style.transition = "transform 0.5s ease-in-out"
                        currentIndex--
                        updateSliderPosition()
                    }, 50)
                } else {
                    currentIndex--
                    updateSliderPosition()
                }
            }

            function updateSliderPosition() {
                sliderWrapper.style.transform = `translateX(-${currentIndex * slideWidth}%)`
            }

            // Auto slide every 5 seconds
            let autoSlideInterval = setInterval(slideRight, 5000)

            // Reset interval on manual navigation
            function resetInterval() {
                clearInterval(autoSlideInterval)
                autoSlideInterval = setInterval(slideRight, 5000)
            }

            nextBtn.addEventListener("click", () => {
                slideRight()
                resetInterval()
            })

            prevBtn.addEventListener("click", () => {
                slideLeft()
                resetInterval()
            })
        })
    </script>


    {{-- v0 --}}
    <script>
        const productsWrapper = document.getElementById("products-wrapper")
        const prevBtn = document.getElementById("prev-btn")
        const nextBtn = document.getElementById("next-btn")

        let slidePosition = 0
        let productsPerView = getProductsPerView()
        const totalProducts = document.querySelectorAll(".col-lg-3").length

        function getProductsPerView() {
            if (window.innerWidth <= 480) return 1
            if (window.innerWidth <= 768) return 2
            if (window.innerWidth <= 1024) return 3
            return 4
        }

        function updateSlidePosition() {
            const productWidth = 100 / productsPerView
            productsWrapper.style.transform = `translateX(-${slidePosition * productWidth}%)`
        }

        function slideNext() {
            const maxSlidePosition = totalProducts - productsPerView
            if (slidePosition < maxSlidePosition) {
                slidePosition += productsPerView
                if (slidePosition > maxSlidePosition) {
                    slidePosition = maxSlidePosition
                }
                updateSlidePosition()
            }
            updateButtonVisibility() // Buton görünürlüğünü güncelle
        }

        function slidePrev() {
            if (slidePosition > 0) {
                slidePosition -= productsPerView
                if (slidePosition < 0) {
                    slidePosition = 0
                }
                updateSlidePosition()
            }
            updateButtonVisibility() // Buton görünürlüğünü güncelle
        }

        function updateButtonVisibility() {
            const maxSlidePosition = totalProducts - productsPerView
            prevBtn.style.display = slidePosition === 0 ? "none" : "block"
            nextBtn.style.display = slidePosition >= maxSlidePosition ? "none" : "block"
        }

        nextBtn.addEventListener("click", () => {
            slideNext()
        })

        prevBtn.addEventListener("click", () => {
            slidePrev()
        })

        window.addEventListener("resize", () => {
            const newProductsPerView = getProductsPerView()
            if (newProductsPerView !== productsPerView) {
                productsPerView = newProductsPerView
                slidePosition = 0
                updateSlidePosition()
                updateButtonVisibility()
            }
        })

        // Initial setup
        updateButtonVisibility()
    </script>

</body>

</html>

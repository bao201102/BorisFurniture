<nav class="navbar navbar-expand-lg fixed-top py-3 border-0 bg-transparent" id="nav-id">
    <div class="container-fluid">
        <a class="navbar-brand ms-5 fs-3" href="<?= URLROOT ?>/Home/index">Hamlin</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-item" aria-controls="navbar-collapse-item" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fs-10" id="navbar-collapse-item">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= URLROOT ?>/Home/index">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/Home/search">Shop all</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <div class="nav-item">
                <ul class="navbar-nav gap-2 flex-row">
                    <li>
                        <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </a>
                    </li>
                    <li class="cart-icon">
                        <a id="btn-shop-cart" class="nav-link" href="<?= URLROOT ?>/Home/cart">
                            <span class="material-symbols-outlined">
                                shopping_cart
                            </span>
                        </a>

                        <!-- shopping cart -->
                        <div class="header-cart-list shadow-lg">
                            <ul class="cart-product-list mb-2">
                                <li class="cart-product-item d-flex mb-2">
                                    <img src="./img/Classic-Lamp.jpg" alt="" style="width: 20%;">

                                    <div class="cart-product-description">
                                        <div class="cart-product-main-des mb-2 fs-4">
                                            Classic Lamp
                                        </div>
                                        <div class="cart-product-sub-des" style="color: rgb(155, 150, 150);">
                                            <span class="cart-product-quantity">1</span>
                                            <span>x</span>
                                            <span>450,000
                                                <span class="pSymbol">$</span>
                                            </span>
                                        </div>
                                    </div>

                                    <span class="material-symbols-outlined cart-delete">
                                        close
                                    </span>
                                </li>

                            </ul>
                            <div class="cart-subtotal d-flex fs-4 justify-content-center align-items-center border-top border-bottom py-3 fs-5">
                                <label class="mx-1">Subtotal:</label>
                                <div class="fs-5 fw-semibold">1,000,000<span class="pSymbol">$</span>
                                </div>
                            </div>
                            <div class="cart-button d-flex flex-column justify-content-center mt-3">
                                <button class="btn btn-primary">View Cart</button>
                                <button class="btn btn-outline-primary mt-2">Checkout</button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= URLROOT ?>/User/index">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="modal-layout ">
    <div class="modal-inner">
        <span class="material-symbols-outlined modal-close">
            close
        </span>
        <br style="clear: both;">
        <div class="row pt-2 pt-md-4 px-3 px-md-4">
            <!-- Anh san pham -->
            <div class="col-12 col-md-6 col-lg-7">
                <!--carousel picture -->
                <div class="carou-product">
                    <!-- slide picture -->
                    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner shadow-sm">
                            <div class="carousel-item active">
                                <img src="<?= IMAGE ?>/AMALFI-LOUNGE-CHAIR-1.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= IMAGE ?>/AMALFI-LOUNGE-CHAIR-2.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= IMAGE ?>/AMALFI-LOUNGE-CHAIR-3.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= IMAGE ?>/AMALFI-LOUNGE-CHAIR-4.jpg" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                            <span class="material-symbols-outlined">arrow_back_ios_new</span>
                            <span class="visually-hidden ">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                            <span class="material-symbols-outlined">arrow_forward_ios</span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Thong tin spham -->
            <div class="col-12 col-md-6 col-lg-5 mt-2 mt-md-0">
                <div class="">
                    <h3><?= $prod_name ?></h3>
                    <div class="fs-5">
                        <p class="fs-4">$<?= number_format($prod_price, 2, '.', ',') ?></p>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="info-product-des m-0">
                        <span class="me-2">SKU:</span>
                        <span class="fw-semibold">N/A</span>
                    </div>
                    <div class="info-product-des m-0 mt-2">
                        <span class="me-2">In Showroom:</span>
                        <span class="fw-semibold"> <?= $prod_quantity ?></span>
                    </div>
                </div>

                <div class="info-product-quantity gap-4 d-flex flex-row align-middle">
                    <p class="align-self-center fs-5">Quantity:</p>
                    <div class="d-inline-block product-quantity border border-dark border-2">
                        <input class="form-control" type="number" style="max-height: 30px; max-width: 90px;" value="1" min="0">
                    </div>
                </div>

                <div class=" d-inline-flex btn-group gap-3 info-product-buynow" role="group">
                    <button type="button" class="btn btn-primary">Buy now</button>
                    <button type="button" class="btn btn-outline-primary">Add to cart</button>
                </div>

                <div class="info-product-tags position-relative d-flex fs-5">
                    <span>Tags:</span>
                    <p>chair</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search offcanvas section -->
<?php
require_once APPROOT . '/views/includes/searchbox.php';
?>
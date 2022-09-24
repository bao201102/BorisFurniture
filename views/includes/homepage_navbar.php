<!-- Navbar section -->
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
                        <a id="btn-shop-cart" class="nav-link" href="<?= URLROOT ?>/Home/shopping_cart">
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
                        <a class="nav-link" href="<?= URLROOT ?>/Home/login_register">
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

<!-- Search offcanvas section -->
<?php
    require_once APPROOT . '/views/includes/searchbox.php';
?>
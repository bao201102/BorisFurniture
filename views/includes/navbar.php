<nav class="navbar navbar-expand-lg fixed-top py-3 border-0 bg-white shadow-sm">
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
                            <?php if (isset($_SESSION['cart']) && sizeof($_SESSION['cart'])>0) : ?>
                                <ul class="cart-product-list mb-2">
                                    <?php foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>

                                        <li class="cart-product-item d-flex mb-2">
                                            <img src="<?= IMAGE ?>/<?= $prod_img ?>" alt="" style="width: 20%;">

                                            <div class="cart-product-description">
                                                <div class="cart-product-main-des mb-2 fs-4">
                                                    <?= $prod_name ?>
                                                </div>
                                                <div class="cart-product-sub-des" style="color: rgb(155, 150, 150);">
                                                    <span class="cart-product-quantity"><?= $prod_quantity_cart ?></span>
                                                    <span>x</span>
                                                    <span>$<?= $prod_price ?>.00</span>
                                                </div>
                                            </div>
                                            <div>
                                                <form action="<?= URLROOT ?>/Cart/deleteProduct/<?= $prod_id ?>" method="POST">
                                                    <button style="border: none; background: white;">
                                                        <span class="material-symbols-outlined cart-delete">
                                                            close
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </li>

                                    <?php endforeach; ?>
                                </ul>
                                <div class="cart-subtotal d-flex fs-4 justify-content-center align-items-center border-top border-bottom py-3 fs-5">
                                    <label class="mx-1">Subtotal:</label>
                                    <div class="fs-5 fw-semibold">1,000,000<span class="pSymbol">$</span>
                                    </div>
                                </div>
                                <div class="cart-button d-flex flex-column justify-content-center mt-3">
                                    <a class="btn btn-primary" href="<?= URLROOT ?>/Home/cart" type="submit">View Cart</a>
                                    <a class="btn btn-outline-primary mt-2" href="<?= URLROOT ?>/Home/checkout" type="submit">Checkout</a>
                                </div>

                            <?php else : ?>

                                <div class="text-center">
                                    <p>You have no products in your cart</p>
                                </div>

                            <?php endif; ?>
                        </div>
                    </li>

                    <!-- login -->
                    <?php if (!empty($_SESSION['user_id'])) : ?>

                        <li class="dropdown">
                            <a class="nav-link" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <span class="material-symbols-outlined">
                                    account_circle
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-center pt-2" data-popper-placement="bottom-start" style="height: 95px; width: 150px;">
                                <a class="dropdown-item" type="button" href="<?= URLROOT ?>/User/profile">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" type="button" href="<?= URLROOT ?>/User/logout">Log out</a>
                            </div>
                        </li>

                    <?php else : ?>

                        <li>
                            <a class="nav-link" href="<?= URLROOT ?>/User/index">
                                <span class="material-symbols-outlined">
                                    account_circle
                                </span>
                            </a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<?php
require_once APPROOT . '/views/includes/searchbox.php';
?>
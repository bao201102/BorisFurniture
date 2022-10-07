<div class="header-cart-list shadow-lg">
    <?php if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) : ?>
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
        <?php if (isset($_SESSION['total'])) : ?>
            <div class="cart-subtotal d-flex fs-4 justify-content-center align-items-center border-top border-bottom py-3 fs-5">
                <label class="mx-1">Subtotal:</label>
                <div class="fs-5 fw-semibold">$<?= $_SESSION['total'] ?>.00</span>
                </div>
            </div>
        <?php endif; ?>
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
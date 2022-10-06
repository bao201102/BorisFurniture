<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>
<link rel="stylesheet" href="<?= CSSFILE ?>/shopping_cart.css">

<body>
    <div class="container-fluid p-0">
        <!-- Header -->
        <?php
        require_once APPROOT . '/views/includes/navbar.php';
        ?>

        <!-- title -->
        <section class="shopcart-title">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <p class="text-center text-lg-start text-black fs-5">Shopping cart</p>
                    </div>
                    <nav class="col-12 col-xl-4 col-lg-6 mt-2 mt-lg-0  shopcart-title-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 justify-content-center justify-content-lg-end fw-lighter" style="font-size: 14px;">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Cart -->
        <section class="container" style="padding: 130px 0;">
            <div class="row">
                <!-- table -->
                <div id="cart-table" class="col-12 col-xl-8 cart-table">
                    <div class="table-responsive-md">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">product</th>
                                    <th scope="col">price</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php if (isset($_SESSION['cart'])) :
                                    foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>

                                        <tr>
                                            <td scope="row"><img src="<?= $prod_img ?>" alt="" class="product-thumbnail">
                                            </td>
                                            <td><a href=""><?= $prod_name ?></a></td>
                                            <td>$<?= $prod_price ?>.00</td>
                                            <td class="product-quantity">
                                                <input class="form-control border border-1" type="number" value="<?= $prod_quantity ?>" min="0">
                                            </td>
                                            <td>$<?= $prod_price * $prod_quantity ?>.00</td>
                                            <td>
                                                <span class="material-symbols-outlined cart-delete">
                                                    close
                                                </span>
                                            </td>
                                        </tr>

                                <?php endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 mb-4 mb-xl-0 d-flex justify-content-center">
                        <div class="btn-group gap-3" role="group">
                            <button type="button" class="btn btn-outline-primary">Empty cart</button>
                            <button type="button" class="btn btn-outline-primary">Update cart</button>
                        </div>
                    </div>
                </div>

                <!-- summary -->
                <div id="cart-totals" class="col-12 col-xl-4" style="width: auto;">
                    <div class="product-summary">
                        <div class="text-black fs-4" style="margin-bottom: 30px;">
                            Cart totals
                        </div>
                        <table class="table align-middle" style="font-size: 15px;">
                            <tbody>
                                <tr>
                                    <td scope="row" class="text-black fw-semibold ps-0">Subtotal</td>
                                    <td class="text-end text-xl-start pe-0">$405.00</td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-black fw-semibold ps-0 ">Shipping</td>
                                    <td class="pe-0">
                                        <div class="float-end float-xl-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="shipping" id="free" checked>
                                                <label class="form-check-label" for="free">Free shipping</label>
                                            </div>
                                            <div class="form-check my-2">
                                                <input class="form-check-input" type="radio" name="shipping" id="flat">
                                                <label class="form-check-label" for="flat">Flat: $12.00</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="shipping" id="local">
                                                <label class="form-check-label" for="local">Local pickup</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-black fw-semibold  ps-0">Total</td>
                                    <td class="text-end  text-xl-start  pe-0">
                                        <p class="fw-semibold fs-3 text-black pb-3">$405.00</p>
                                        <span class="fs-6">(Includes $19.29 tax)</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex flex-column justify-content-center mt-2 mt-xl-5">
                            <a href="<?= URLROOT ?>/Home/checkout" class="btn btn-primary">
                                Proceed to checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script src="<?= JSFILE ?>/shopping_cart.js"></script>

</html>
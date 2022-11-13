<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>

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
                        <p class="text-center text-lg-start text-black fs-5">Checkout</p>
                    </div>
                    <nav class="col-12 col-xl-4 col-lg-6 mt-2 mt-lg-0  shopcart-title-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 justify-content-center justify-content-lg-end fw-lighter" style="font-size: 14px;">
                            <li class="breadcrumb-item"><a href="<?= URLROOT ?>/Home/index">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= URLROOT ?>/Search">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!--Checkout body section-->
        <div class="container" style="margin-top: 130px;">
            <h4 class="mb-4">Billing Details</h4>
            <form action="<?= URLROOT ?>/Order/addOrder" method="POST">
                <div class="row">

                    <?php
                    if (!empty($data['cus'])) :
                        foreach ($data['cus'] as $cus) : extract($cus); ?>

                            <div class="col-12 col-lg-6 px-4" id="customer-details" style="font-size: 16px;">
                                <input type="hidden" name="cus_id" value="<?= $cus_id ?>">
                                <div class="row">
                                    <div class="mb-3 first-name-box col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstNameInput" placeholder="First Name" value="<?= $firstname ?>" required>
                                    </div>
                                    <div class="mb-3 first-name-box col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastNameInput" placeholder="Last Name" value="<?= $lastname ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 street-name-box">
                                    <label class="form-label">Street address</label>
                                    <input type="text" class="form-control" name="streetInput" placeholder="Street addres" required>
                                </div>

                                <div class="mb-3 city-name-box">
                                    <label class="form-label">Town/City</label>
                                    <input type="text" class="form-control" name="townInput" placeholder="Town/City" required>
                                </div>

                                <div class="mb-3 phone-name-box">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phoneInput" placeholder="Phone" value="<?= $phone ?>" required>
                                </div>

                                <div class="mb-3 email-name-box">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="emailInput" placeholder="example@gmail.com" value="<?= $email ?>" required>
                                </div>

                                <div class="mb-3 other-name-box">
                                    <label class="form-label">Orther notes (optional)</label>
                                    <textarea class="form-control" rows="8" style="resize: none;" name="notesInput" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else : ?>

                        <div class="col-12 col-lg-6 px-4" id="customer-details" style="font-size: 16px;">
                            <input type="hidden" name="cus_id" value="null">
                            <div class="row">
                                <div class="mb-3 first-name-box col-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstNameInput" placeholder="First Name" required>
                                </div>
                                <div class="mb-3 first-name-box col-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastNameInput" placeholder="Last Name" required>
                                </div>
                            </div>

                            <div class="mb-3 street-name-box">
                                <label class="form-label">Street address</label>
                                <input type="text" class="form-control" name="streetInput" placeholder="Street addres" required>
                            </div>

                            <div class="mb-3 city-name-box">
                                <label class="form-label">Town/City</label>
                                <input type="text" class="form-control" name="townInput" placeholder="Town/City" required>
                            </div>

                            <div class="mb-3 phone-name-box">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phoneInput" placeholder="Phone" required>
                            </div>

                            <div class="mb-3 email-name-box">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="emailInput" placeholder="example@gmail.com" required>
                            </div>

                            <div class="mb-3 other-name-box">
                                <label class="form-label">Orther notes (optional)</label>
                                <textarea class="form-control" rows="8" style="resize: none;" name="notesInput" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>

                    <?php endif; ?>

                    <div class="col-12 col-lg-6 px-4">
                        <div id="order-details">
                            <div class="fs-4 text-black" style="margin-bottom: 30px;">
                                <p>Your order</p>
                            </div>

                            <table class="table align-middle" style="font-size: 15px;">
                                <thead>
                                    <tr>
                                        <th class="ps-0" scope="col" colspan="2">product</th>
                                        <th class="text-end text-xl-start pe-0" scope="col">total</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                    <?php foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                                        <tr>
                                            <input type="hidden" name="prod_id[]" value="<?= $prod_id ?>">
                                            <input type="hidden" name="quantity[]" value="<?= $prod_quantity_cart ?>">
                                            <input type="hidden" name="prod_price[]" value="<?= $prod_price ?>">
                                            <td class="ps-0" scope="row"><?= $prod_name ?></td>
                                            <td class="text-end text-xl-start pe-0"><?= $prod_quantity_cart ?> x $<?= number_format($prod_price, 2, '.', ',') ?></td>
                                            <td class="text-end text-xl-start pe-0">$<?= number_format($subtotal, 2, '.', ',') ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>

                            <table class="table align-middle" style="font-size: 15px;">
                                <tbody>

                                    <?php if (isset($_SESSION['total'])) : ?>
                                        <tr>
                                            <td scope="row" class="text-black fw-semibold ps-0">Subtotal</td>
                                            <td class="text-end text-xl-start pe-0">$<?= number_format($_SESSION['total'], 2, '.', ',') ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <td scope="row" class="text-black fw-semibold ps-0 ">Shipping</td>
                                        <td class="pe-0">
                                            <div class="float-end float-xl-start">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="shipping" id="free" checked>
                                                    <label class="form-check-label" for="free">Free shipping</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="shipping" id="local">
                                                    <label class="form-check-label" for="local">Local pickup</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php if (isset($_SESSION['total'])) : ?>
                                        <tr>
                                            <td scope="row" class="text-black fw-semibold  ps-0">Total</td>
                                            <td class="text-end  text-xl-start  pe-0">
                                                <p class="fw-semibold fs-3 text-black pb-3">$<?= number_format($_SESSION['total'] * 1.1, 2, '.', ',') ?></p>
                                                <span class="fs-6">(Includes $ <?= number_format($_SESSION['total'] * 0.1, 2, '.', ',') ?> tax)</span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                            <div class="pay-type">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" checked name="optionsRadios" id="optionsRadios3" value="option3">
                                    <label class="form-check-label" for="optionsRadios3">
                                        Cash on delivery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                    <label class="form-check-label" for="optionsRadios1">
                                        Direct bank transfer
                                    </label>
                                </div>
                                <div class="pay-type-note mb-3" style="font-size: 13px; background-color: #F0F2F2; padding: 15px;">
                                    <p>Make your payment directly into our
                                        bank account. Please use your Order ID as the payment reference. Your order will not
                                        be
                                        shipped until the funds have cleared in our account.</p>
                                </div>
                            </div>
                            <p style="margin: 20px 0; font-size: 13px;">Your personal data will be
                                used to process your order, support your experience throughout this website, and for other
                                purposes described in our privacy policy.</p>
                            <div class="d-flex flex-column justify-content-center mt-2">
                                <button type="submit" name="order" class="btn btn-primary ">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<style>
    .pay-type {
        font-size: 15px;
        background-color: white;
        padding: 20px;
    }

    #order-details {
        background-color: #f7f7f7;
        padding: 45px 45px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>

</html>
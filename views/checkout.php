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
        <?php
        require_once APPROOT . '/views/includes/breadcrumb.php';
        ?>

        <!--Checkout body section-->
        <div class="container" style="margin-top: 130px;">
            <h4 class="mb-4">Billing Details</h4>
            <div class="row">
                <div class="col-12 col-lg-6 px-4" id="customer-details" style="font-size: 16px;">
                    <div class="row">
                        <div class="mb-3 first-name-box col-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" require>
                        </div>
                        <div class="mb-3 first-name-box col-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" require>
                        </div>
                    </div>

                    <div class="mb-3 street-name-box">
                        <label class="form-label">Street address</label>
                        <input type="text" class="form-control" placeholder="Street addres" require>
                    </div>

                    <div class="mb-3 city-name-box">
                        <label class="form-label">Town/City</label>
                        <input type="text" class="form-control" placeholder="Town/City" require>
                    </div>

                    <div class="mb-3 phone-name-box">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" require>
                    </div>

                    <div class="mb-3 email-name-box">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="example@gmail.com" require>
                    </div>

                    <div class="mb-3 other-name-box">
                        <label class="form-label">Orther notes (optional)</label>
                        <textarea class="form-control" rows="8" style="resize: none;" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>

                </div>

                <div class="col-12 col-lg-6 px-4">
                    <div id="order-details">
                        <div class="fs-4 text-black" style="margin-bottom: 30px;">
                            <p>Your order</p>
                        </div>

                        <table class="table align-middle" style="font-size: 15px;">
                            <thead>
                                <tr>
                                    <th class="ps-0" scope="col">product</th>
                                    <th class="text-end text-xl-start pe-0" scope="col">total</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <td class="ps-0" scope="row">Classic-Lamp</td>
                                    <td class="text-end text-xl-start pe-0">37,000<span>₫</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-0" scope="row">Classic-Lamp</td>
                                    <td class="text-end text-xl-start pe-0">37,000<span>₫</span></td>
                                </tr>
                            </tbody>
                        </table>

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
                        <div class="pay-type">
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                <label class="form-check-label" for="optionsRadios2">
                                    Check payment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="optionsRadios" id="optionsRadios3" value="option3">
                                <label class="form-check-label" for="optionsRadios3">
                                    Cash on delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
                                <label class="form-check-label" for="optionsRadios4">
                                    PayPal
                                    <img src="https://lithohtml.themezaa.com/images/paypal-logo.jpg" alt="" class="w-120px margin-10px-left" style="width: 100px;" data-no-retina="">
                                </label>
                            </div>
                        </div>
                        <p style="margin: 20px 0; font-size: 13px;">Your personal data will be
                            used to process your order, support your experience throughout this website, and for other
                            purposes described in our privacy policy.</p>
                        <div class="d-flex flex-column justify-content-center mt-2">
                            <button class="btn btn-primary ">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
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
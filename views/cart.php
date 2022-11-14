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

        <!-- Title -->
        <section class="shopcart-title">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <p class="text-center text-lg-start text-black fs-5">Shopping cart</p>
                    </div>
                    <nav class="col-12 col-xl-4 col-lg-6 mt-2 mt-lg-0  shopcart-title-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 justify-content-center justify-content-lg-end fw-lighter" style="font-size: 14px;">
                            <li class="breadcrumb-item"><a href="<?= URLROOT ?>/Home/index">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= URLROOT ?>/Home/search">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <section class="container" style="padding: 130px 0;">
            <div id="products-cart">

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
<script type="text/javascript">
    var url = window.location.pathname.split('/');

    $(document).ready(function() {
        $("#products-cart").load(window.location.protocol + "//" +
            window.location.hostname + "/" + url[1] + "/Cart/refreshProductsCart/",
            function(responseTxt, statusTxt, xhr) {});
    });

    function deleteProductCart(prod_id) {
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/Cart/deleteProduct/" +
                prod_id,
            method: "POST",
            success: function(data) {
                $("#ses-cart").empty();
                $(".header-cart-list").remove();
                $("#ses-cart").load(window.location.protocol + "//" +
                    window.location.hostname + "/" + url[1] + "/Cart/refreshHeaderCart/",
                    function(responseTxt, statusTxt, xhr) {});

                $("#products-cart").empty();
                $("#products-cart").load(window.location.protocol + "//" +
                    window.location.hostname + "/" + url[1] + "/Cart/refreshProductsCart/",
                    function(responseTxt, statusTxt, xhr) {});
            }
        });
    }

    function emptyCart() {
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/Cart/emptyCart/",
            method: "POST",
            success: function(data) {
                $("#ses-cart").empty();
                $(".header-cart-list").remove();
                $("#ses-cart").load(window.location.protocol + "//" +
                    window.location.hostname + "/" + url[1] + "/Cart/refreshHeaderCart/",
                    function(responseTxt, statusTxt, xhr) {});

                $("#products-cart").empty();
                $("#products-cart").load(window.location.protocol + "//" +
                    window.location.hostname + "/" + url[1] + "/Cart/refreshProductsCart/",
                    function(responseTxt, statusTxt, xhr) {});
            }
        });
    }
</script>

</html>
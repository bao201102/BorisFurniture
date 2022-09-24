<html lang="en">

<?php
    require_once APPROOT . '/views/includes/head.php';
?>

<body>
    <div class="container-fluid m-0 p-0">
        <!-- Navbar section -->
        <?php
            require_once APPROOT . '/views/includes/homepage_navbar.php';
        ?>

        <!-- Search offcanvas section -->
        <div class="offcanvas offcanvas-top container" style="height: 500px;" tabindex="-1" id="offcanvasTop"
            aria-labelledby="offcanvasTopLabel">
            <button type="button" class="btn-close mt-3 ms-auto fs-5" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
            <div class="container" style="padding: 100px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasTopLabel">What are you looking for?</h5>
                </div>
                <div class="offcanvas-body">
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Landing banner section -->
        <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner p-0">
                <div class="carousel-item active">
                    <img src="<?= IMAGE ?>/living-white-room.jpg" style="height: 100vh;" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="<?= IMAGE ?>/scandinavian-living-room.jpg" style="height: 100vh;" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= IMAGE ?>/living-room-blank-white.jpg" style="height: 100vh;" class="d-block img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Products section -->
        <section class="mb-5" style="padding: 100px 0;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 text-center " style="padding-bottom: 100px;">
                        <span class="d-block mb-3" style="color: #ff6437;">Living interior</span>
                        <h1 class="fw-bold">New products</h1>
                    </div>
                </div>
            </div>

            <!-- start info item grid -->
            <div class="container-fluid">
                <div class="row text-center align-self-center">
                    <!-- product box -->
                    <?php require_once APPROOT . '/views/includes/products.php'; ?>
                    
                    <div class="col-12 text-center mt-5">
                        <button type="button" class="btn btn-outline-primary">More Collections</button>
                    </div>
                </div>
            </div>
            <!-- end info item grid -->
        </section>

        <!-- Sale off banner section -->
        <section class="p-0 mt-5 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- start info banner item -->
                    <div class="col-12 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col position-relative p-0 pe-xl-1" id="first-banner-div"
                                style="padding-left: 0;">
                                <a class="" href="">
                                    <img src="<?= IMAGE ?>/pink-armchair.jpg" class="img-fluid" alt="">
                                </a>

                                <div class="position-absolute" style="top: 28%; right: 15%;">
                                    <p class="fs-3">- Flat 50% off</p>
                                    <h1 class="mt-3" style="font-size: calc(1em + 1vw);"><span class="fw-light"> Wooden
                                        </span><br>
                                        armchair</h1>
                                    <button type="button" class="btn btn-secondary shadow-lg mt-4">DISCOVER NOW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end info banner item -->

                    <!-- start info banner item -->
                    <div class="col-12 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col position-relative p-0 ps-xl-1" id="second-banner-div"
                                style="padding-right: 0;">
                                <a class="" href="">
                                    <img src="<?= IMAGE ?>/green-sofa.jpg" class="img-fluid" alt="">
                                </a>

                                <div class="position-absolute" style="top: 28%; right: 15%;">
                                    <p class="fs-3">- Flat 40% off</p>
                                    <h1 class="mt-3" style="font-size: calc(1em + 1vw);"><span class="fw-light"> Modern
                                        </span><br>
                                        sofa</h1>
                                    <button type="button" class="btn btn-secondary shadow-lg mt-4">DISCOVER NOW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end info banner item -->
                </div>
            </div>
        </section>

        <!-- Footer and client logo section -->
        <?php
            require_once APPROOT .'/views/includes/footer.php';
        ?>

        <!-- Modal quick view-->
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
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"
                                    data-bs-slide="prev">
                                    <span class="material-symbols-outlined">arrow_back_ios_new</span>
                                    <span class="visually-hidden ">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"
                                    data-bs-slide="next">
                                    <span class="material-symbols-outlined">arrow_forward_ios</span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Thong tin spham -->
                    <div class="col-12 col-md-6 col-lg-5 mt-2 mt-md-0">
                        <div class="">
                            <h3>AMALFI LOUNGE CHAIR</h3>
                            <div class="fs-5">
                                <p class="me-auto">187,000,000</p>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="info-product-des m-0">
                                <span class="me-2">SKU:</span>
                                <span class="fw-semibold">xxxxxxx</span>
                            </div>
                            <div class="info-product-des m-0">
                                <span class="me-2">In Showroom:</span>
                                <span class="fw-semibold">2</span>
                            </div>
                        </div>

                        <div class="info-product-quantity gap-4 d-flex flex-row align-middle">
                            <p class="align-self-center fs-5">Quantity:</p>
                            <div class="d-inline-block product-quantity border border-dark border-2">
                                <input class="form-control" type="number" value="1" min="0">
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
    </div>
</body>

<style>
    .bg-transparent {
        transition: 0.6s ease;
    }

    .bg-white {
        transition: 0.6s ease;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script src="<?= JSFILE ?>/header-effect.js"></script>

</html>
<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>

<body>
    <div class="container-fluid m-0 p-0">
        <!-- Header section -->
        <?php
        require_once APPROOT . '/views/includes/homepage_navbar.php';
        ?>

        <!-- Landing banner section -->
        <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner p-0">
                <div class="carousel-item active">
                    <img src="<?= IMAGE ?>/living-white-room.jpg" style="height: 100vh; object-fit:cover;" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="<?= IMAGE ?>/scandinavian-living-room.jpg" style="height: 100vh; object-fit:cover;" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= IMAGE ?>/living-room-blank-white.jpg" style="height: 100vh; object-fit:cover;" class="d-block img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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
                    <?php
                    if (!empty($data['prod'])) :
                        $i = 0;
                        foreach ($data['prod'] as $prod) : extract($prod);
                            if ($i == 5) {
                                break;
                            } ?>
                            <div class="col box">
                                <form action="<?= URLROOT ?>/Cart/addProductToCart/<?= $prod_id ?>" method="POST">
                                    <div class="card border-0 shadow-sm mb-5 mx-auto" style="min-width: 21vh; max-width: 34vh;">
                                        <input type="hidden" name="prod_quantity" value="1">
                                        <a href="<?= URLROOT ?>/Home/details/<?= $prod_id ?>">
                                            <img src="<?= IMAGE ?>/<?= $data['image'][$i]['img_link'] ?>" class="card-img-top img-fluid" alt="...">
                                        </a>

                                        <div class="card-body" style="z-index: 2; background-color: white;">
                                            <div class="mt-3 fw-bold fs-5"> <?= $prod_name ?> </div>
                                            <div class="mt-1 fs-5"> $<?= number_format($prod_price, 2, '.', ',') ?></div>
                                        </div>

                                        <!-- quick view  -->
                                        <button type="submit" name="addToCart" id="btn-add-to-cart" class="add-to-cart">
                                            <p>ADD TO CART</p>
                                        </button>
                                    </div>
                                </form>
                            </div>
                    <?php $i++;
                        endforeach;
                    endif; ?>

                    <div class="text-center mt-5">
                        <a href="<?= URLROOT ?>/Home/search">
                            <button type="button" class="btn btn-outline-primary">
                                More Collections
                            </button>
                        </a>
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
                            <div class="col position-relative p-0 pe-xl-1" id="first-banner-div" style="padding-left: 0;">
                                <a class="" href="">
                                    <img src="<?= IMAGE ?>/pink-armchair.jpg" class="img-fluid" alt="">
                                </a>

                                <div class="position-absolute" style="top: 25%; right: 15%;">
                                    <p class="fs-3">- Flat 50% off</p>
                                    <h1 class="mt-3" style="font-size: calc(1em + 1vw);"><span class="fw-light"> Wooden
                                        </span><br>
                                        armchair</h1>
                                    <a href="<?= URLROOT ?>/Home/search">
                                        <button type="button" class="btn btn-secondary shadow-lg mt-4">DISCOVER NOW</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end info banner item -->

                    <!-- start info banner item -->
                    <div class="col-12 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col position-relative p-0 ps-xl-1" id="second-banner-div" style="padding-right: 0;">
                                <a class="" href="">
                                    <img src="<?= IMAGE ?>/green-sofa.jpg" class="img-fluid" alt="">
                                </a>

                                <div class="position-absolute" style="top: 25%; right: 15%;">
                                    <p class="fs-3">- Flat 40% off</p>
                                    <h1 class="mt-3" style="font-size: calc(1em + 1vw);"><span class="fw-light"> Modern
                                        </span><br>
                                        sofa</h1>
                                    <a href="<?= URLROOT ?>/Home/search">
                                        <button type="button" class="btn btn-secondary shadow-lg mt-4">DISCOVER NOW</button>
                                    </a>
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
        require_once APPROOT . '/views/includes/footer.php';
        ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script src="<?= JSFILE ?>/header-effect.js"></script>

</html>
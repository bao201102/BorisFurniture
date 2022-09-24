<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>

<body>
    <div class="container-fluid m-0 p-0">
        <!-- Header -->
        <?php
        require_once APPROOT . '/views/includes/navbar.php';
        ?>

        <!-- title -->
        <section class="shopcart-title">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <p class="text-center text-lg-start text-black fs-5">Search</p>
                    </div>
                    <nav class="col-12 col-xl-4 col-lg-6 mt-2 mt-lg-0  shopcart-title-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 justify-content-center justify-content-lg-end fw-lighter" style="font-size: 14px;">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!--Products panel-->
        <div class="row" style="margin-top: 130px;">
            <div class="col-xxl-5 col" id="searchmenubar" style="margin-bottom: 100px; padding-left: 50px;">
                <p style="font-weight: bold; color: black;">Theo giá cả</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="optionsRadios" id="optionRadio1" value="option2">
                    <label class="form-check-label" for="optionRadio1">
                        Dưới 1 triệu
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="optionsRadios" id="optionRadio2" value="option2">
                    <label class="form-check-label" for="optionRadio2">
                        Dưới 5 triệu
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="optionsRadios" id="optionRadio3" value="option2">
                    <label class="form-check-label" for="optionRadio3">
                        Dưới 10 triệu
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="optionsRadios" id="optionRadio4" value="option2">
                    <label class="form-check-label" for="optionRadio4">
                        Dưới 20 triệu
                    </label>
                </div>
                <p style="margin-top: 80px; font-weight: bold; color: black;">Theo sản phẩm</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck1">
                    <label class="form-check-label" for="flexCheck1">
                        Bàn
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                    <label class="form-check-label" for="flexCheck2">
                        Ghế
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck3">
                    <label class="form-check-label" for="flexCheck3">
                        Dụng cụ làm bếp
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck4">
                    <label class="form-check-label" for="flexCheck4">
                        Thiết bị điện
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck5">
                    <label class="form-check-label" for="flexCheck5">
                        Khác
                    </label>
                </div>
            </div>
            <div class="col-xxl-7 col row text-center">
                <!-- product box -->
                <?php require_once APPROOT . '/views/includes/products.php'; ?>

                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">«</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="./checkout.html">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">»</a>
                    </li>
                </ul>
            </div>
        </div>
        <br style="clear: both;">

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
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

                        <div class="d-inline-flex btn-group gap-3 info-product-buynow" role="group">
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
    .card-img1 {
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #searchmenubar {
        width: 300px;
        height: 500px;
        float: left;
        margin: 0 0 50px 30px;
    }

    .form-check {
        padding-top: 10px;
    }

    #box-result {
        background-color: grey;
        font-size: 30px;
        padding: 10px 0 10px 10px;
        margin-top: 120px;
        color: white
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script src="<?= JSFILE ?>/general-effect.js"></script>

</html>
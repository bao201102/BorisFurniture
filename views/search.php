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
        <section>
            <div class="container">
                <div class="row g-0" style="margin-top: 130px;">
                    <div class="col-12 col-lg-4 row flex-lg-column" style="margin-bottom: 100px;">
                        <div class="col-6 col-lg-12 ">
                            <p class="fw-bold text-black">Theo giá cả</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="under_1mil_product" id="optionRadio1" value="1000000">
                                <label class="form-check-label" for="optionRadio1">
                                    Dưới 1 triệu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="under_5mil_product" id="optionRadio2" value="5000000">
                                <label class="form-check-label" for="optionRadio2">
                                    Dưới 5 triệu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="under_10mil_product" id="optionRadio3" value="10000000">
                                <label class="form-check-label" for="optionRadio3">
                                    Dưới 10 triệu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="under_20mil_product" id="optionRadio4" value="20000000">
                                <label class="form-check-label" for="optionRadio4">
                                    Dưới 20 triệu
                                </label>
                            </div>
                        </div>

                        <div class="col-6 col-lg-12">
                            <p class="pt-0 pt-lg-5 fw-bold text-black">Theo sản phẩm</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="table" id="flexCheck1">
                                <label class="form-check-label" for="flexCheck1">
                                    Bàn
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="chair" id="flexCheck2">
                                <label class="form-check-label" for="flexCheck2">
                                    Ghế
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="cooking_tool" id="flexCheck3">
                                <label class="form-check-label" for="flexCheck3">
                                    Dụng cụ làm bếp
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="electric_device" id="flexCheck4">
                                <label class="form-check-label" for="flexCheck4">
                                    Thiết bị điện
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="other" id="flexCheck5">
                                <label class="form-check-label" for="flexCheck5">
                                    Khác
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 row text-center">
                        <!-- product box -->
                        <?php require_once APPROOT . '/views/includes/products.php'; ?>
                        <?php
                             
                        ?>

                        <!-- pagination -->
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
            </div>
        </section>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<style>
    .form-check {
        padding-top: 10px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script src="<?= JSFILE ?>/general-effect.js"></script>

</html>
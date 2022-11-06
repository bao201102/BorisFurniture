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
                        <form class="col-6 col-lg-12" action="<?= URLROOT ?>/Search/search_result" method="POST" id="search-form">
                            <div class="offcanvas-body">
                                <input class="form-control" type="text" placeholder="Search our product here" name="name">
                            </div>
                            <p class="fw-bold text-black">Search by price</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio4" value="all">
                                <label class="form-check-label" for="optionRadio4">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio1" value="0-500">
                                <label class="form-check-label" for="optionRadio1">
                                    0 - $500
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio2" value="501-1000">
                                <label class="form-check-label" for="optionRadio2">
                                    $500 - $1000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio3" value="1001-2000">
                                <label class="form-check-label" for="optionRadio3">
                                    $1000 - $2000
                                </label>
                            </div>
                            <p class="pt-0 pt-lg-5 fw-bold text-black">Search by category</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Lamp" id="flexCheck1" name="category">
                                <label class="form-check-label" for="flexCheck1">
                                    Lamp
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Chair" id="flexCheck2" name="category">
                                <label class="form-check-label" for="flexCheck2">
                                    Chair
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Accessories" id="flexCheck3" name="category">
                                <label class="form-check-label" for="flexCheck3">
                                    Accessories
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Table" id="flexCheck4" name="category">
                                <label class="form-check-label" for="flexCheck4">
                                    Table
                                </label>
                            </div>
                            <button class="btn btn-primary my-2 my-sm-0" type="submit" style="margin-left: 50%">Search</button>
                        </form>
                    </div>
                    <div class="col-12 col-lg-8 row text-center">
                        <!-- product box -->
                        <?php require_once APPROOT . '/views/includes/products.php'; ?>

                        <!-- pagination -->
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">«</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
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

<script>
</script>

</html>
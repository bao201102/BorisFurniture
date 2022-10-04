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
                        <p class="text-center text-lg-start text-black fs-5">Shop</p>
                    </div>
                    <nav class="col-12 col-xl-4 col-lg-6 mt-2 mt-lg-0  shopcart-title-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 justify-content-center justify-content-lg-end fw-lighter" style="font-size: 14px;">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">AMALFI LOUNGE CHAIR</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <?php
        if (!empty($data['prod'])) :
            foreach ($data['prod'] as $prod) : extract($prod); ?>
            
                <!-- Carousel -->
                <section class="margin-120">
                    <div class="container my-5">
                        <div class="row">
                            <!-- Anh san pham -->
                            <div class="col-12 col-lg-7">
                                <!--carousel picture -->
                                <div class="carou-product">
                                    <!-- slide picture -->
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner shadow-sm">
                                            <div class="carousel-item active">
                                                <img src="<?= IMAGE ?>/img01-1.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="<?= IMAGE ?>/img01-2.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="<?= IMAGE ?>/img01-3.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="<?= IMAGE ?>/img01-4.jpg" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="material-symbols-outlined">arrow_back_ios_new</span>
                                            <span class="visually-hidden ">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="material-symbols-outlined">arrow_forward_ios</span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Thong tin spham -->
                            <div id="inf-pro" class="col-12 col-lg-5 info-product">
                                <div class="mt-3 mt-lg-0 mt-xl-3">
                                    <h3><?= $prod_name ?></h3>
                                    <div class="fs-5">
                                        <p class="me-auto">$<?= $prod_price ?>.00</p>
                                    </div>
                                </div>

                                <div class="mt-2 mt-lg-3 mt-xl-4">
                                    <div class="info-product-des">
                                        <span class="me-2">SKU:</span>
                                        <span class="fw-semibold">N/A</span>
                                    </div>
                                    <div class="info-product-des">
                                        <span class="me-2">Availability:</span>
                                        <span class="fw-semibold">Ready for pickup or shipping</span>
                                    </div>
                                    <div class="info-product-des">
                                        <span class="me-2">Stock Status:</span>
                                        <span class="fw-semibold">In Stock</span>
                                    </div>
                                    <div class="info-product-des">
                                        <span class="me-2">In Showroom:</span>
                                        <span class="fw-semibold"><?= $prod_quantity ?></span>
                                    </div>
                                </div>

                                <div class="info-product-quantity gap-5 d-flex flex-row align-middle">
                                    <p class="align-self-center">Quantity:</p>
                                    <div class="d-inline-block product-quantity border border-dark border-2">
                                        <input class="form-control" type="number" value="1" min="0" max=<?= $prod_quantity ?>>
                                    </div>
                                </div>

                                <div class=" d-inline-flex btn-group gap-3 info-product-buynow" role="group">
                                    <button type="button" class="btn btn-primary">Buy now</button>
                                    <button type="button" class="btn btn-outline-primary">Add to cart</button>
                                </div>
                                <?php
                                if (!empty($data['cate'])) :
                                    foreach ($data['cate'] as $cate) : extract($cate); ?>

                                        <div class="info-product-tags d-flex fs-5">
                                            <span class="me-2">Tags:</span>
                                            <p><?= $category_name ?></p>
                                        </div>

                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Description -->
                <section class="margin-120">
                    <div class="container-fluid">
                        <ul class="nav nav-tabs d-flex justify-content-center mb-5" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#description" aria-selected="true" role="tab">Description</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#transport" aria-selected="false" role="tab" tabindex="-1">Transport</a>
                            </li>
                        </ul>
                    </div>

                    <div class="container tab-content fw-lighter" style="text-align: justify;">
                        <div class="tab-pane fade active show" id="description" role="tabpanel">
                            <p>Bàn ăn mở rộng Orbital được nhập khẩu từ thương hiệu nổi tiếng Calligaris của Ý, với thiết kế
                                thông
                                minh tiết kiệm không gian, bàn có thể xoay tròn mở rộng hoặc khép gọn khi cần thiết chỉ bằng 1
                                động
                                tác đơn giản. Sang trọng, tinh tế nhưng vẫn đáp ứng được đầy đủ tiện ích công năng, Orbital là
                                một
                                lựa chọn hoàn hảo cho không gian phòng ăn sang trọng</p>
                        </div>
                        <div class="tab-pane fade" id="transport" role="tabpanel">
                            <h3>GIAO HÀNG TẬN NƠI</h3>
                            <p>Cung cấp dịch vụ giao hàng tận nơi, lắp ráp và sắp xếp vị trí theo đúng ý muốn của quý
                                khách:</p>
                            <p>- MIỄN PHÍ giao hàng trong các Quận nội thành Tp.Hồ Chí Minh, áp dụng cho các đơn hàng trị
                                giá trên 10 triệu.</p>
                            <p>- Đối với khu vực các tỉnh lân cận: Tính phí hợp lý theo dựa trên quãng đường vận chuyển.</p>
                        </div>
                    </div>
                </section>

        <?php endforeach;
        endif; ?>

        <!-- Related product -->
        <section class="margin-120 border border-1 border-bottom-0">
            <div class="d-flex flex-column align-items-center" style="margin-top: 120px; margin-bottom: 100px;">
                <span class="d-block mb-3" style="color: #ff6437;">You May Also Like</span>
                <h1 class="fw-bold">Related products</h1>
            </div>
            <!-- product image -->
            <div class="container-fluid my-3">
                <div class="row text-center align-self-center">
                    <!-- product box -->
                    <div class="col box">
                        <div class=""></div>
                        <div class="card border-0 shadow-sm mb-5 mx-auto" style="width: 21rem;">
                            <img src="<?= IMAGE ?>/Classic-Lamp.jpg" class="card-img-top img-fluid" alt="...">
                            <div class="card-body" style="z-index: 2; background-color: white;">
                                <div class="mt-3 fw-bold fs-5">Classic Lamp</div>
                                <div class="mt-1 fs-5">$470.00</div>
                            </div>

                            <!-- quick view  -->
                            <button onclick="quickView()" type="button" class="add-to-cart">
                                <p>QUICK VIEW</p>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-5">
                        <button type="button" class="btn btn-outline-primary">More Collections</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>

        <!-- Quickview -->
        <?php require_once APPROOT . '/views/includes/quickview.php'; ?>
    </div>
</body>

<style>
    .margin-120 {
        margin: 120px 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>

</html>
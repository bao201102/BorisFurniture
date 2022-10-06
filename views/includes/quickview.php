<?php
if (!empty($data['prod'])) :
    foreach ($data['prod'] as $prod) : extract($prod); ?>

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
                                    <?php
                                    if (!empty($data['img'])) :
                                        foreach ($data['img'] as $image) : extract($image); ?>

                                            <?php if ($image['img_link'][6] == '1') : ?>

                                                <div class="carousel-item active">
                                                    <img src="<?= IMAGE ?>/<?= $img_link ?>" class="d-block w-100" alt="...">
                                                </div>

                                            <?php else : ?>

                                                <div class="carousel-item">
                                                    <img src="<?= IMAGE ?>/<?= $img_link ?>" class="d-block w-100" alt="...">
                                                </div>

                                            <?php endif; ?>

                                    <?php endforeach;
                                    endif; ?>
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
                    <form action="" method="POST" class="col-12 col-md-6 col-lg-5 mt-2 mt-md-0">
                        <div class="">
                            <h3><?= $prod_name ?></h3>
                            <div class="fs-5">
                                <p class="fs-4">$<?= $prod_price ?>.00</p>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="info-product-des m-0">
                                <span class="me-2">SKU:</span>
                                <span class="fw-semibold"><?= $prod_id ?></span>
                            </div>
                            <div class="info-product-des m-0 mt-2">
                                <span class="me-2">In Showroom:</span>
                                <span class="fw-semibold"> <?= $prod_quantity ?></span>
                            </div>
                        </div>

                        <div class="info-product-quantity gap-4 d-flex flex-row align-middle">
                            <p class="align-self-center fs-5">Quantity:</p>
                            <div class="d-inline-block product-quantity border border-dark border-2">
                                <input class="form-control" type="number" style="max-height: 30px; max-width: 90px;" value="1" min="0" max=<?= $prod_quantity ?>>
                            </div>
                        </div>

                        <div class=" d-inline-flex btn-group gap-3 info-product-buynow" role="group">
                            <a type="submit" class="btn btn-primary" href="<?= URLROOT ?>/Home/checkout">Buy now</a>
                            <a type="submit" name="submit" class="btn btn-outline-primary">Add to cart</a>
                        </div>

                        <div class="info-product-tags position-relative d-flex fs-5">
                            <span>Tags:</span>
                            <p>chair</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php endforeach;
endif; ?>
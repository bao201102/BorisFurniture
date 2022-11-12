<div class="row">
    <?php
    if (!empty($data['prod'])) :
        $i = 0;
        foreach ($data['prod'] as $prod) : extract($prod); ?>
            <!-- product box -->
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
                        <button type="submit" name="action" id="btn-add-to-cart" class="add-to-cart">
                            <p>ADD TO CART</p>
                        </button>
                    </div>
                </form>
            </div>
    <?php $i++;
        endforeach;
    endif; ?>
</div>
<div>
    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <!-- Previous button -->
        <?php if ($data['number'] == 1) :  ?>

            <li class="page-item disabled">
                <a class="page-link">«</a>
            </li>

        <?php else : ?>

            <li class="page-item">
                <a class="page-link" onclick="loadProduct(1)">«</a>
            </li>

        <?php endif ?>

        <!-- Page number -->
        <?php
        if (!empty($data['page'])) : ?>

            <?php $number = $data['number'];
            if ($number == 1) : ?>

                <li class="page-item active">
                    <a class="page-link" onclick="loadProduct(<?= $number ?>)"><?= $number ?></a>
                </li>

                <?php $number = $number + 1; ?>

                <li class="page-item">
                    <a class="page-link" onclick="loadProduct(<?= $number ?>)"><?= $number ?></a>
                </li>

            <?php else : ?>

                <?php $number = $number - 1; ?>

                <li class="page-item">
                    <a class="page-link" onclick="loadProduct(<?= $number ?>)"><?= $number ?></a>
                </li>

                <?php $number = $number + 1; ?>

                <li class="page-item active">
                    <a class="page-link" onclick="loadProduct(<?= $number ?>)"><?= $number ?></a>
                </li>

            <?php endif; ?>

            <!-- Nếu số nút trang hiện nhiều hơn 5 -->
            <?php if ($data['page'] - $number > 3) : ?>

                <?php for ($i = $number + 1; $i <= $number + 1; $i++) : ?>

                    <li class="page-item">
                        <a class="page-link" onclick="loadProduct(<?= $i ?>)"><?= $i ?></a>
                    </li>

                <?php endfor; ?>

                <li class="page-item disabled">
                    <a class="page-link">...</a>
                </li>

                <?php for ($i = $data['page'] - 1; $i <= $data['page']; $i++) : ?>

                    <li class="page-item">
                        <a class="page-link" onclick="loadProduct(<?= $i ?>)"><?= $i ?></a>
                    </li>

                <?php endfor; ?>

                <!-- Nếu số nút trang hiện ít hơn 5 -->
            <?php else : ?>

                <?php for ($i = $number + 1; $i <= $data['page']; $i++) : ?>

                    <li class="page-item">
                        <a class="page-link" onclick="loadProduct(<?= $i ?>)"><?= $i ?></a>
                    </li>

                <?php endfor; ?>

        <?php endif;
        endif; ?>


        <!-- Next button -->
        <?php if ($data['number'] == $data['page']) :  ?>

            <li class="page-item disabled">
                <a class="page-link">»</a>
            </li>

        <?php else : ?>

            <li class="page-item">
                <a class="page-link" onclick="loadProduct(<?= $data['page'] ?>)">»</a>
            </li>

        <?php endif ?>
    </ul>
</div>
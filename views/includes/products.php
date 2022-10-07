<?php
if (!empty($data['prod'])) :
    $id = 0;
    foreach ($data['prod'] as $prod) : extract($prod); ?>

        <!-- product box -->
        <div class="col box">
            <div class="card border-0 shadow-sm mb-5 mx-auto" style="min-width: 21vh; max-width: 34vh;">
                <a href="<?= URLROOT ?>/Home/details/<?= $prod_id ?>">
                    <img src="<?= IMAGE ?>/<?= $data['image'][$prod_id - 1]['img_link'] ?>" class="card-img-top img-fluid" alt="...">
                </a>

                <div class="card-body" style="z-index: 2; background-color: white;">
                    <div class="mt-3 fw-bold fs-5"> <?= $prod_name ?> </div>
                    <div class="mt-1 fs-5"> $<?= number_format($prod_price, 2, '.', ',') ?></div>
                </div>

                <!-- quick view  -->
                <button onclick="quickView()" type="button" class="add-to-cart">
                    <p>QUICK VIEW</p>
                </button>
            </div>
        </div>

<?php $id += 1; endforeach;
endif; ?>
<?php
if (!empty($data['prod'])):
    foreach ($data['prod'] as $prod): extract($prod);?>

<!-- product box -->
<div class="col box">
    <div class=""></div>
    <div class="card border-0 shadow-sm mb-5 mx-auto" style="width: 21rem;">
        <img src="<?= IMAGE ?>/Classic-Lamp.jpg" class="card-img-top img-fluid" alt="...">
        <div class="card-body" style="z-index: 2; background-color: white;">
            <div class="mt-3 fw-bold fs-5"> <?=$prod_name?> </div>
            <div class="mt-1 fs-5"> <?=$prod_price?> </div>
        </div>

        <!-- quick view  -->
        <button onclick="quickView()" type="button" class="add-to-cart">
            <p>QUICK VIEW</p>
        </button>
    </div>
</div>
<?php endforeach; endif;?>
<?php if (!empty($data['prodList'])) :
    $i = 0;
    foreach ($data['prodList'] as $prodList) : extract($prodList);
        // foreach ($prodList as $prod) : extract($prod); 
?>
        <tr>
            <th scope="row"><?= $prod_id ?></th>
            <td><img src="<?= IMAGE ?>/<?= $data['image'][$i]['img_link'] ?>" alt="" class="product-thumbnail"></td>
            <td><?= $prod_name ?></td>
            <td><?= $data['category'][$i][0]['category_name'] ?></td>
            <td class="text-center utility">
                <div class="d-flex justify-content-center">
                    <form action="<?= URLROOT ?>/Admin/showEdit/<?= $prod_id ?>" method="POST">
                        <button name="editProduct" type="submit" class="material-symbols-outlined edit border border-0 bg-white">edit</button>
                    </form>
                    <form action="<?= URLROOT ?>/Admin/deleteProduct/<?= $prod_id ?>" method="POST">
                        <button name="deleteProduct" type="submit" class="material-symbols-outlined delete border border-0 bg-white">delete</button>
                    </form>
                </div>
            </td>
        </tr>
<?php $i++;
    // endforeach;
    endforeach;
endif; ?>
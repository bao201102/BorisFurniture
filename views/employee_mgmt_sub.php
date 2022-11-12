<?php if (!empty($data['emp'])) :
    $i = 0;
    foreach ($data['emp'] as $emp) : extract($emp); ?>
        <tr>
            <th scope="row"><?= $emp_id ?></th>
            <td><?= $lastname ?> <?= $firstname ?></td>
            <td><?= $birthday ?></td>
            <td><?= $phone ?></td>
            <td class="text-center utility">
                <div class="d-flex justify-content-center">
                    <form action="<?= URLROOT ?>/Admin/showEdit/<?= $user_id ?>" method="POST">
                        <button name="editEmployee" type="submit" class="material-symbols-outlined edit border border-0 bg-white">edit</button>
                    </form>
                    <form action="<?= URLROOT ?>/Admin/deleteEmployee/<?= $user_id ?>" method="POST">
                        <button name="deleteEmployee" type="submit" class="material-symbols-outlined delete border border-0 bg-white">delete</button>
                    </form>
                </div>
            </td>
        </tr>
<?php $i++;
    endforeach;
endif; ?>
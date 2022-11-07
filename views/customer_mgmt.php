<!DOCTYPE html>
<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>
<link rel="stylesheet" href="<?= CSSFILE ?>/product_mgmt.css">

<body>
    <div class="container-fluid p-0">
        <!-- Sidebar -->
        <?php
        require_once APPROOT . '/views/includes/sidebar.php';
        ?>

        <!-- Main content -->
        <div id="main-content" style="min-height: 100vh; margin-left: 340px; right: 0; bottom: 0; left: 0;">
            <!-- Title -->
            <section class="container-fluid shadow-sm">
                <div class="row p-4">
                    <!-- title -->
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start pb-4 pb-lg-0">
                        <a> <span class="material-symbols-outlined align-middle me-3" id="menu-btn" style="font-size: 40px;"> menu
                            </span> </a>
                        <span class="fw-semibold fs-3">Customer Management</span>
                    </div>
                </div>
            </section>

            <!-- Search -->
            <section class="my-4">
                <div class="container">
                    <div class="input-group">
                        <span class="input-group-text material-symbols-outlined">search</span>
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
                    </div>
                </div>
            </section>

            <!-- product -->
            <section class="py-4">
                <div class="container">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">first name</th>
                                <th scope="col">last name</th>
                                <th scope="col">date of birth</th>
                                <th scope="col">phone</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php if (!empty($data['cus'])) :
                                $i = 0;
                                foreach ($data['cus'] as $cus) : extract($cus); ?>
                                    <tr>
                                        <th scope="row"><?= $cus_id ?></th>
                                        <td><?= $firstname ?></td>
                                        <td><?= $lastname ?></td>
                                        <td><?= $birthday ?></td>
                                        <td><?= $phone ?></td>
                                        <td class="text-center utility">
                                            <div class="d-flex justify-content-center">
                                                <form action="<?= URLROOT ?>/Admin/showEdit/<?= $user_id ?>" method="POST">
                                                    <button name="editCustomer" type="submit" class="material-symbols-outlined edit border border-0 bg-white">edit</button>
                                                </form>
                                                <form action="<?= URLROOT ?>/Admin/deleteCustomer/<?= $user_id ?>" method="POST">
                                                    <button name="deleteCustomer" type="submit" class="material-symbols-outlined delete border border-0 bg-white">delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            <?php $i++;
                                endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- page number -->
            <section class="py-4">
                <div class="container d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">&laquo;</a>
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
                            <a class="page-link" href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/sidebar-effect.js"></script>

</html>
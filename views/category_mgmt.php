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
                        <span class="fw-semibold fs-3">Category Management</span>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <!-- button add new -->
                        <div class="dropdown">
                            <button class="btn btn-info d-flex align-items-center fs-5" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                                Add new
                            </button>
                            <form class="dropdown-menu dropdown-menu-end p-3" style="width:200px;" data-popper-placement="bottom-start" action="<?= URLROOT ?>/Admin/addCategory" method="POST">
                                <div class="mb-3">
                                    <label for="name_product" class="form-label">Category name</label>
                                    <input type="text" class="form-control p-2" name="category" placeholder="Enter category ...">
                                </div>
                                <button type="submit" name="addCategory" class="w-100 btn btn-primary p-2">Add Category</button>
                            </form>

                        </div>
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
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php if (!empty($data['category_list'])) :
                                $i = 0;
                                foreach ($data['category_list'] as $category_list) : extract($category_list); ?>
                                    <tr>
                                        <th scope="row"><?= $category_id ?></th>
                                        <td><?= $category_name ?></td>

                                        <?php if ($data['count_prod'][$i][0]['count'] > 0) : ?>
                                            <td><?= $data['count_prod'][$i][0]['count'] ?></td>
                                        <?php else : ?>
                                            <td>0</td>
                                        <?php endif; ?>

                                        <form action="<?= URLROOT ?>/Admin/deleteCategory/<?= $category_id ?>" method="POST">
                                            <td class="text-center utility">
                                                <span class="material-symbols-outlined edit me-3">edit</span>
                                                <button name="deleteCategory" type="submit" class="material-symbols-outlined delete border border-0 bg-white">delete</button>
                                            </td>
                                        </form>
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
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

        <?php if (!empty($data['emp']) && !empty($data['user'])) : ?>
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

                <div class="container-fluid">
                    <?php foreach ($data['emp'] as $emp) : extract($emp); ?>

                        <!-- Employee -->
                        <div class="pt-5 row">
                            <form class="col-12 col-md-6">
                                <div class="px-3 pb-5 pb-md-0">
                                    <input type="hidden" name="update_id" id="update_id">
                                    <!-- Name -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="firstNameInput" value="<?= $firstname ?>" placeholder="First Name" required>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lastNameInput" value="<?= $lastname ?>" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <!-- Birthday -->
                                    <div class="mb-4">
                                        <label class="form-label">Birthday</label>
                                        <input type="date" class="form-control" value="<?= $birthday ?>" name="birthdayInput" required>
                                    </div>
                                    <!-- Phone -->
                                    <div class="mb-4">
                                        <label class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" value="<?= $phone ?>" name="phoneInput" placeholder="Phone Number" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="emailInput" placeholder="name@example.com" required>
                                    </div>
                                    <div class="mt-auto d-inline-flex btn-group gap-3 align-self-center ">
                                        <button type="submit" name="addEmployee" class="btn btn-primary">Update Employee</button>
                                        <button type="button" class="btn btn-outline-primary btn_close">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <form class="col-12 col-md-6">
                                <div class="px-3 pb-3 pb-md-0">
                                    <div class="mb-4">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="passwordInput1" placeholder="Password" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="passwordInput2" placeholder="Password" required>
                                    </div>
                                    <div class="mt-auto d-inline-flex btn-group gap-3 align-self-center ">
                                        <button type="submit" name="addEmployee" class="btn btn-primary">Update Employee</button>
                                        <button type="button" class="btn btn-outline-primary btn_close">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($data['prod'])) : ?>
            <div id="main-content" style="min-height: 100vh; margin-left: 340px; right: 0; bottom: 0; left: 0;">
                <!-- Title -->
                <section class="container-fluid shadow-sm">
                    <div class="row p-4">
                        <!-- title -->
                        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start pb-4 pb-lg-0">
                            <a> <span class="material-symbols-outlined align-middle me-3" id="menu-btn" style="font-size: 40px;"> menu
                                </span> </a>
                            <span class="fw-semibold fs-3">Product Management</span>
                        </div>
                    </div>
                </section>

                <div class="container-fluid">
                    <?php foreach ($data['prod'] as $prod) : extract($prod); ?>

                        <form action="<?= URLROOT ?>/Admin/addProduct" method="POST" class="pt-5" enctype="multipart/form-data">
                            <div class="row py-2 py-md-4 px-3 px-md-4">
                                <div class=" col-12 col-lg-6">
                                    <div class="px-3">
                                        <!-- name product -->
                                        <div class="mb-3">
                                            <label for="name_product" class="form-label">Product name</label>
                                            <input type="text" class="form-control" name="prod_name" id="name_product" placeholder="Enter name of product" required>
                                        </div>
                                        <div class="row mb-3">
                                            <!-- Category -->
                                            <div class="col">
                                                <label class="form-label">Category</label>
                                                <select class="form-select" name="category" aria-label="Default select example" required>
                                                    <?php foreach ($data['category_list'] as $cate) : extract($cate); ?>
                                                        <option value="<?= $category_id ?>"><?= $category_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- Quantity -->
                                            <div class="col">
                                                <label for="quantity_product" class="form-label">Quantity</label>
                                                <input type="number" class="form-control" name="prod_quantity" id="quantity_product" value="1" min="1">
                                            </div>
                                        </div>
                                        <!-- Description -->
                                        <div class="mb-3 mb-lg-0">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;" required></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-lg-6 d-flex flex-column">
                                    <div class="px-3">
                                        <!--  product  images-->
                                        <div class="mb-3">
                                            <label for="file-upload" class="form-label">Product images</label>
                                            <input type="file" id="fileToUpload" name="fileToUpload[]" class="form-control" multiple required>
                                        </div>

                                        <!-- Price product -->
                                        <label class="form-label">Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <input type="number" name="prod_price" class="form-control" min="1" aria-label="Amount (to the nearest dollar)" required>
                                        </div>
                                    </div>
                                    <div class="mt-auto d-inline-flex btn-group gap-3 align-self-center ">
                                        <button type="submit" name="addProduct" class="btn btn-primary">Add product</button>
                                        <button type="button" class="btn btn-outline-primary btn_close">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/sidebar-effect.js"></script>

</html>
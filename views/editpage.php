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

            <div class="container-fluid">
                <?php if (!empty($data['emp']) && !empty($data['user'])) :
                    foreach ($data['emp'] as $emp) : extract($emp);?>

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
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/sidebar-effect.js"></script>

</html>
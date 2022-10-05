<!DOCTYPE html>
<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>

<body style="background-color: whitesmoke;">
    <div class="container-fluid p-0">
        <!-- Header -->
        <?php
        require_once APPROOT . '/views/includes/navbar.php';
        ?>

        <?php
        if (!empty($data['cus'])) :
            foreach ($data['cus'] as $cus) : extract($cus); ?>

                <!-- Profile section -->
                <div class="container">
                    <fieldset class="mx-auto bg-white" style="padding: 45px; margin-top: 100px; min-width: 300px;  max-width: 550px;">
                        <form class="" id="" action="" method="POST">
                            <legend class="mb-5 fw-bold">Profile</legend>
                            <div class="form-group" style="font-size: 16px;">
                                <div class="mb-5 row">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstNameInput" placeholder="First Name" value="<?= $firstname ?>" require>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastNameInput" placeholder="Last Name" value="<?= $lastname ?>" require>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label class="form-label">Birthday</label>
                                    <input type="date" class="form-control" name="birthInput" value="<?= $birthday ?>" require>
                                </div>

                                <div class="mb-5">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phoneInput" placeholder="Phone" value="<?= $phone ?>" require>
                                </div>

                                <div class="mb-5">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="emailInput" placeholder="example@gmail.com" value="<?= $email ?>" require>
                                </div>

                                <div class="mb-5">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="passwordInput1" placeholder="Password" required>
                                </div>
                                <div>
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="passwordInput2" placeholder="Password" required>
                                </div>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary w-100 mt-4 mb-4">Change profile</button>
                        </form>
                    </fieldset>
                </div>

        <?php endforeach;
        endif; ?>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script src="<?= JSFILE ?>/login-effect.js"></script>

</html>
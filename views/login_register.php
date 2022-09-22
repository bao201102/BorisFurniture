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

        <!-- Search offcanvas section -->
        <div class="offcanvas offcanvas-top container" style="height: 500px;" tabindex="-1" id="offcanvasTop"
            aria-labelledby="offcanvasTopLabel">
            <button type="button" class="btn-close mt-3 ms-auto fs-5" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
            <div class="container" style="padding: 100px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasTopLabel">What are you looking for?</h5>
                </div>
                <div class="offcanvas-body">
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Signin section -->
        <form>
            <fieldset class="border mx-auto bg-white" style="padding: 45px; margin-top: 200px; width: 550px;">
                <div class="" id="login-box">
                    <legend class="mb-5 fw-bold">Login</legend>
                    <div class="form-group">
                        <div class="mb-5">
                            <label class="mb-4 align-middle" style="font-size: 18px;" for="emailInput">Email
                                address</label>
                            <span class="float-end align-middle" style="font-size: 15px;">Need an account? <a
                                    class="fw-bold" id="signup-btn">Sign up</a></span>
                            <input type="email" class="form-control" id="emailInput" placeholder="name@example.com"
                                required>
                        </div>
                        <div class="mb-5">
                            <label class="mb-4" style="font-size: 18px;" for="passwordInput">Password</label>
                            <input type="password" class="form-control" id="passwordInput" placeholder="Password"
                                required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-4">Login</button>
                    <a class="fs-5 fw-bold" href="">Forgot your password?</a>
                </div>

                <div class="d-none" id="signup-box">
                    <legend class="mb-5 fw-bold">Sign up</legend>
                    <div class="form-group">
                        <div class="mb-5">
                            <label class="mb-4 align-middle" style="font-size: 18px;" for="emailInput">Email
                                address</label>
                            <span class="float-end align-middle" style="font-size: 15px;">Already have an account? <a
                                    class="fw-bold" id="login-btn">Log in</a></span>
                            <input type="email" class="form-control" id="emailInput" placeholder="name@example.com"
                                required>
                        </div>
                        <div class="mb-5">
                            <label class="mb-4" style="font-size: 18px;" for="passwordInput">Password</label>
                            <input type="password" class="form-control" id="passwordInput" placeholder="Password"
                                required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-4">Sign up</button>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="privacyCheck" required>
                        <label class="form-check-label fs-6 " for="privacyCheck">
                            By checking this and clicking "Sign Up" button, you are creating an acconut, and agree
                            to our Terms of Service and Privacy Policy
                        </label>
                    </div>
                </div>
            </fieldset>
        </form>

        <!-- Footer and client logo section -->
        <?php
            require_once APPROOT .'/views/includes/footer.php';
        ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script src="<?= JSFILE ?>/login-effect.js"></script>

</html>
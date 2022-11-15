<?php if (isset($data['msg'])) : ?>

    <?php switch ($data['msg']):
        case 'success': ?>

            <div class="alert alert-dismissible alert-success mb-5" style="font-size: 14px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                You have signed up successfully!
            </div>

            <?php break; ?>

        <?php

        case 'emailexist': ?>

            <div class="alert alert-dismissible alert-danger mb-5" style="font-size: 14px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                Email is already existed!
            </div>

            <?php break; ?>

        <?php

        case 'wrongpass': ?>

            <div class="alert alert-dismissible alert-danger mb-5" style="font-size: 14px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                Your email or password is not correct!
            </div>

            <?php break; ?>

        <?php

        case 'unmatchedpass': ?>

            <div class="alert alert-dismissible alert-danger mb-5" style="font-size: 14px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                Your password and confirmation password do not match!
            </div>

            <?php break; ?>

    <?php endswitch; ?>
<?php endif; ?>
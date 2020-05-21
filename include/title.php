<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
    <img class="mr-3" src="<?php echo $url; ?>/assets/img/bootstrap-outline.svg" alt="" width="48" height="48">
    <div class="lh-100">
    <h6 class="mb-0 text-white lh-100">Matcha | <small>Match. Chat. Date.</small></h6>
    <small>Since 2020</small>
    </div>
</div>


<!-- putmsg -->
<?php

if (isset($_SESSION['message'])) {
    $message = htmlspecialchars($_SESSION['message']);
    $type = htmlspecialchars($_SESSION['type']);
    ?>
        <div class="alert alert-<?= $type; ?>" role="alert">
            <?= $message; ?>
        </div>
    <?php
    unset($_SESSION['message']);
}
?>
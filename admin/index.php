<?php session_start(); ?>

<?php include __DIR__ . '/../functions.php'; ?>

<?php include __DIR__ . '/inc/header.php'; ?>

<?php include __DIR__ . '/controllers/index.php'; ?>

<?php include __DIR__ . '/inc/nav.php'; ?>

<main>
    <div class="container">

        <div class="alert d-flex justify-content-between align-items-center">
            <h4 class="mb-0">vegestables <i class="fa-solid fa-seedling"></i><i class="fa-solid fa-salad"></i></h4>
            <a href="./add-new-vege.php" class="btn btn-primary">New vege <i class="fa-solid fa-seedling"></i></a>
        </div>

        <div class="alert d-flex justify-content-between align-items-center">
            Total vegestable
            <span class="badge bg-success fs-5"><?php echo count($veges); ?></span>
        </div>

        <?php if ($vege_status) : ?>
            <div class="alert alert-danger alert-dismissible">
                <?php echo $vege_status; ?>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <?php include __DIR__ . '/inc/-product-table.php'; ?>
        </div>
    </div>
</main>



<?php include __DIR__ . '/inc/footer.php'; ?>
<?php session_start(); ?>

<?php include __DIR__ . '/../functions.php'; ?>

<?php include __DIR__ . '/inc/header.php'; ?>

<?php include __DIR__ . '/controllers/add-new-vege.php'; ?>

<div class="container py-4">
    <div class="alert">
        <h1 class="display-4">

            <a href="./index.php" class="text-decoration-none">
                <i class="fa-solid fa-house"></i>
            </a>
            New vegestable
        </h1>
    </div>

    <?php if (count($errors) === 0 && input_get('status')) : ?>
        <div class="alert alert-success alert-dismissible">
            <?php echo input_get('status'); ?>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <?php if ($vege_id) : ?>
            <input type="hidden" name="vege_post_id" value="<?php echo $vege_id; ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="vege-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="vege-name" name="vege-name" value="<?php echo get_input($inputs, 'vege-name'); ?>">
            <small class="text-info"><?php echo get_error($errors, 'vege-name'); ?></small>
        </div>

        <div class="mb-3">
            <label for="vege-price" class="form-label">Price</label>
            <input type="text" class="form-control" id="vege-price" name="vege-price" value="<?php echo get_input($inputs, 'vege-price'); ?>">
            <small class="text-info"><?php echo get_error($errors, 'vege-price'); ?></small>
        </div>

        <?php if ($vege_id) : ?>
            <div class="vege_img p-3">
                <img src="<?php echo IMG_URL . get_input($inputs, 'vege-photo'); ?>" alt="">
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="vege-photo" class="form-label"><?php echo $vege_id ? 'Change' : 'Upload'; ?> photo</label>
            <input type="file" class="form-control" id="vege-photo" name="vege-photo">
            <small class="text-info"><?php echo get_error($errors, 'vege-photo'); ?></small>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Add vege</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>
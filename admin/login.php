<?php session_start(); ?>

<?php include __DIR__ . '/../functions.php'; ?>

<?php include __DIR__ . '/inc/header.php'; ?>

<?php include __DIR__ . '/controllers/login.php'; ?>

<div class="container">
    <div class="alert">
        <h1 class="display-4">
            <i class="fa-solid fa-lock"></i> Login form
        </h1>
    </div>

    <?php if (input_get('status')) : ?>
        <div class="alert alert-danger">
            <?php echo $_GET['status']; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo get_input($inputs, 'username'); ?>">
            <small class="text-danger"><?php echo get_error($errors, 'username'); ?></small>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo get_input($inputs, 'password'); ?>">
            <small class="text-danger"><?php echo get_error($errors, 'password'); ?></small>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>
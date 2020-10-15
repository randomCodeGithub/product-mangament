<!-- Get header file -->
<?php require_once(VIEW_ROOT . '/templates/header.php');  ?>

<main>
    <div class="container">
        <form method="POST" action="<?php echo HOME_ROOT; ?>/delete" id="mass-delete">
            <div class="row">

                <!-- check for product existing -->
                <?php if (!empty($products)) : ?>

                    <!-- render all products -->
                    <?php foreach ($products as $product) : ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card">
                                <div class="form-check-inline position-absolute">
                                    <input class="position-absolute" name="nums[]" type="checkbox" value="<?php echo $product['id'] ?>">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product['sku'] ?></h5>
                                    <p class="card-text">
                                        <p><?= $product['name'] ?></p>
                                        <p><?= $product['price'] ?> $</p>
                                        <p><?php echo ($product['type_id'] == 1) ? $product['size'] . ' MB' : (($product['type_id'] == 2) ? $product['weight'] . ' KG' : $product['dimensions']) ?></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- if product array is empty -->
                <?php else : ?>
                    <div class="col-12 text-center">
                        <h1>No products</h1>
                    </div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</main>

<!-- Get footer file -->
<?php require_once(VIEW_ROOT . '/templates/footer.php');  ?>
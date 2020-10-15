<!-- Get header file -->
<?php require_once(VIEW_ROOT . '/templates/header.php');  ?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-3">
                <form method="POST" action="<?php echo HOME_ROOT; ?>/addProduct/add" id="add" class="mx-auto mx-lg-0">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">SKU</label>
                        <div class="col-sm-8">
                            <input type="text" name="sku" required minlength="14" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" required minlength="3" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Price</label>
                        <div class="col-sm-8">
                            <input type="text" name="price" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Type switcher</label>
                        <div class="col-sm-8">
                            <select id="type" name="select-type" class="form-control" id="typeSwitcher">
                                <option value="" selected disabled>Type switcher</option>
                                <?php foreach ($productTypes as $productType) : ?>
                                    <option value="<?php echo strtolower($productType['type_name']) ?>"><?php echo $productType['type_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="type-filter dvd-disc form-group row">
                        <label class="col-sm-4 col-form-label">Size</label>
                        <div class="col-sm-8">
                            <input type="text" name="size" class="form-control">
                        </div>
                        <div class="col-12">
                            <small class="mt-2">
                                <p>Provide size in MB. Field support only NUMBERS</p>
                            </small>
                        </div>
                    </div>

                    <div class="type-filter book form-group row">
                        <label class="col-sm-4 col-form-label">Weight</label>
                        <div class="col-sm-8">
                            <input type="text" name="weight" class="form-control">
                        </div>
                        <div class="col-12">
                            <small class="mt-2">
                                <p>Provide WEIGHT in MB. Field support only NUMBERS</p>
                            </small>
                        </div>
                    </div>

                    <div class="type-filter furniture form-group row">
                        <label class="col-sm-4 col-form-label">Height</label>
                        <div class="col-sm-8">
                            <input type="text" name="height" class="form-control">
                        </div>
                    </div>
                    <div class="type-filter furniture form-group row">
                        <label class="col-sm-4 col-form-label">Width</label>
                        <div class="col-sm-8">
                            <input type="text" name="width" class="form-control">
                        </div>
                    </div>
                    <div class="type-filter furniture form-group row">
                        <label class="col-sm-4 col-form-label">Length</label>
                        <div class="col-sm-8">
                            <input type="text" name="length" class="form-control">
                        </div>
                        <div class="col-12">
                            <small class="mt-2">
                                <p>Provide dimensions in HxWxD format. Fields support only NUMBERS</p>
                            </small>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center bg-danger text-white">

            <!-- check if session with name 'errors' exist -->
                <?php if (isset($_SESSION['errors'])) : ?>
                    <i id="close" class="fa fa-close position-absolute" style="font-size:24px; cursor: pointer; right: 0.3%;"></i>
                    <ul>
                        <?php
                        // render all error mesagges
                        foreach ($_SESSION['errors'] as $error) {
                            echo '<li>' . $error . '</li>';
                        }
                        ?>
                    </ul>

                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<!-- Get footer file -->
<?php require_once(VIEW_ROOT . '/templates/footer.php');  ?>
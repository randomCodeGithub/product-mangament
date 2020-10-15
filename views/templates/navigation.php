<nav class="fixed-top d-flex align-items-center justify-content-between px-3">
    <a class="text-uppercase dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo ($productAdd) ? 'Add product' : 'Product list' ?>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="<?php echo BASE_ROOT ?>">Product list</a>
        <a class="dropdown-item" href="<?php echo BASE_ROOT ?>/addProduct">Add product</a>
    </div>

    <!-- check uri -->
    <?php if ($productAdd) : ?>
        <button type="submit" form="add" name="submit">Save</button>
    <?php else : ?>
        <div class="d-flex align-items-center">
            <select name="delete-type" form="mass-delete" class="form-control">
                <option value="checkbox">Remove selected products</option>
                <option value="all">Mass delete action</option>
            </select>
            <button type="submit" form="mass-delete" name="apply">Apply</button>
        </div>
    <?php endif; ?>
</nav>
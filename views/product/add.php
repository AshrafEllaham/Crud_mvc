<?php include_once(VIEWS .'include/header.php');?>


<h1 class="text-center mt-5 mb-2 py-3">Add New Product </h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">     

            <form novalidate class="p-5 border mb-5" method="POST" action="<?php url('product/store'); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required name="name" class="form-control" id="name" >
                </div>
                <?php if(isset($errors['name'])): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $errors['name']; ?></h3>
                <?php endif; ?>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" required class="form-control" name="price" id="price">
                </div>
                <?php if(isset($errors['price'])): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $errors['price']; ?></h3>
                <?php endif; ?>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" required class="form-control" name="description" id="description">
                </div>
                <?php if(isset($errors['description'])): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $errors['description']; ?></h3>
                <?php endif; ?>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" required class="form-control" name="quantity" id="quantity">
                </div>
                <?php if(isset($errors['quantity'])): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $errors['quantity']; ?></h3>
                <?php endif; ?>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include_once(VIEWS .'include/footer.php') ?>
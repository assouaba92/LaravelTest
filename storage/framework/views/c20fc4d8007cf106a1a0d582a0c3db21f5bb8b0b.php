<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php $__env->startSection('title','Products'); ?>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
    table{
     margin-top:40px;
    }
    
    .form-group, h4{
     margin-left:20px;   
    }
    
    #productName,#quantity, #price, #newName, #newQuantity, #newPrice{
     width: 400px;   
    }
    
    .btn-info{
     width:200px;   
    }
</style>

<?php $__env->startSection('content'); ?>
<h2 class="text-center">A List of Products</h2>
<?php if(count($products)>0): ?>
        <table class="table table-responsive" >
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price per Item</th>
                <th>Date Submitted</th>
                <th>Total Value Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach( $products as $product): ?>
            <tr>
                <td><?php echo e($product->pname); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->created_at); ?></td>
                <td><?php echo e(($product->price*$product->quantity)); ?></td>
                <td><button class="btn btn-default" data-toggle="modal" data-target="#editModal<?php echo e($product->id); ?>"><span class="glyphicon glyphicon-pencil"></span>Edit</button></td>
                <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo e($product->id); ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button></td>
            </tr>
            
            <!--Edit Modal-->
            <div class="modal fade" id="editModal<?php echo e($product->id); ?>" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <form class="form" role="form" action="products/<?php echo e($product->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <div class="modal-body">
                        <div class="row">
                        <div class="form-group">
                            <label for="name">Name:<span class="text-danger">*</span></label><br/>
                            <input type="text" class="form-control" id="newName" name="newName" value="<?php echo e($product->pname); ?>">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:<span class="text-danger">*</span></label><br/>
                            <input type="text" class="form-control" id="newQuantity" name="newQuantity" value="<?php echo e($product->quantity); ?>">
                        </div>
                            
                        <div class="form-group">
                            <label for="price">Price:<span class="text-danger">*</span></label><br/>
                            <input type="text" class="form-control" id="newPrice" name="newPrice" value="<?php echo e($product->price); ?>">
                        </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button id="editButton<?php echo e($product->id); ?>" type="submit" class="btn btn-info pull-left">Edit</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>

                </div>
              </div>
            
            <!--Delete Modal-->
            <div class="modal fade" id="deleteModal<?php echo e($product->id); ?>" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <form class="form" role="form" action="products/<?php echo e($product->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <div class="modal-body">
                        <div class="row">
                          <h4>Are you sure you want to delete <?php echo e($product->pname); ?>?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button id="deleteButton<?php echo e($product->id); ?>" type="submit" class="btn btn-danger pull-left">Delete</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>

               </div>
            </div>
            <?php endforeach; ?>
            <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><?php echo e($valueSum); ?></th>
            <th></th>
            <th></th>
            </tr>
        </table>
<?php endif; ?>

<button id="add" class="btn btn-default" data-toggle="modal" data-target="#productModal"><span class="glyphicon glyphicon-plus"></span>Add Product</button>
<!--Add Modal-->
<div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Product's Information</h4>
        </div>
    
        <form class="form" role="form" action="products" method="POST">
        <div class="modal-body">
            <div class="row">
            <div class="form-group">
                <label for="name">Name:<span class="text-danger">*</span></label><br/>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product's name" >
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:<span class="text-danger">*</span></label><br/>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter product's quantity" >
            </div>
                
            <div class="form-group">
                <label for="price">Price:<span class="text-danger">*</span></label><br/>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter product's price" >
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button id="addButton" type="submit" class="btn btn-info pull-left">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
            
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php $__env->startSection('title','Celebrities'); ?>

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
    
    #celebName,#age, #newName, #newAge{
     width: 400px;   
    }
    
    .btn-info{
     width:200px;   
    }
</style>

<?php $__env->startSection('content'); ?>
<h2 class="text-center">A List of Celebs</h2>
<?php if(count($celebs)>0): ?>
        <table class="table table-responsive" >
            <?php foreach( $celebs as $celeb): ?>
            <tr>
                <td><a href="celebs/<?php echo e($celeb->id); ?>/questions"><?php echo e($celeb->name); ?></a></td>
                <td><button class="btn btn-default" data-toggle="modal" data-target="#editModal<?php echo e($celeb->id); ?>"><span class="glyphicon glyphicon-pencil"></span>Edit</button></td>
                <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo e($celeb->id); ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button></td>
            </tr>
            
            <!--Edit Modal-->
            <div class="modal fade" id="editModal<?php echo e($celeb->id); ?>" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <form class="form" role="form" action="celebs/<?php echo e($celeb->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <div class="modal-body">
                        <div class="row">
                        <div class="form-group">
                            <label for="address">Name:<span class="text-danger">*</span></label><br/>
                            <input type="text" class="form-control" id="newName" name="newName" value="<?php echo e($celeb->name); ?>">
                        </div>

                        <div class="form-group">
                            <label for="city">Age:</label><br/>
                            <input type="text" class="form-control" id="newAge" name="newAge" value="<?php echo e($celeb->age); ?>">
                        </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button id="editButton<?php echo e($celeb->id); ?>" type="submit" class="btn btn-info pull-left">Edit</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>

                </div>
              </div>
            
            <!--Delete Modal-->
            <div class="modal fade" id="deleteModal<?php echo e($celeb->id); ?>" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <form class="form" role="form" action="celebs/<?php echo e($celeb->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <div class="modal-body">
                        <div class="row">
                          <h4>Are you sure you want to delete <?php echo e($celeb->name); ?>?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button id="deleteButton<?php echo e($celeb->id); ?>" type="submit" class="btn btn-danger pull-left">Delete</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>

               </div>
            </div>
            <?php endforeach; ?>
        </table>
<?php endif; ?>

<button id="add" class="btn btn-default" data-toggle="modal" data-target="#celebModal"><span class="glyphicon glyphicon-plus"></span>Add Celebrity</button>
<!--Add Modal-->
<div class="modal fade" id="celebModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Celebrity's Information</h4>
        </div>
    
        <form class="form" role="form" action="celebs" method="POST">
        <div class="modal-body">
            <div class="row">
            <div class="form-group">
                <label for="address">Name:<span class="text-danger">*</span></label><br/>
                <input type="text" class="form-control" id="celebName" name="celebName" placeholder="Enter celebrity's name" >
            </div>

            <div class="form-group">
                <label for="city">Age:</label><br/>
                <input type="text" class="form-control" id="age" name="age" placeholder="Enter celebrity's age" >
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
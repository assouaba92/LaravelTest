<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php $__env->startSection('title','List of Questions'); ?>

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
    
    #questionDesc, #newQuestion{
     width: 400px;   
    }  
    
    .btn-info{
     width:200px;   
    }
</style>

<?php $__env->startSection('content'); ?>
    <h2 class="text-center"><?php echo e($celebs[$selectedId]->name); ?> (age <?php echo e($celebs[$selectedId]->age); ?>) has <?php echo e(count($artistQuestion)); ?> questions</h2>
<?php if(count($artistQuestion)>0): ?>
        <table class="table table-responsive" >
            <?php foreach( $artistQuestion as $question): ?>
                <tr>
                    <td><?php echo e($question->description); ?></td>
                    <td><button class="btn btn-default" data-toggle="modal" data-target="#editModal<?php echo e($question->id); ?>"><span class="glyphicon glyphicon-pencil"></span>Edit</button></td>
                    <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo e($question->id); ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button></td>
                </tr>
            
            <!--Edit Modal-->
            <div class="modal fade" id="editModal<?php echo e($question->id); ?>" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <form class="form" role="form" action="questions/<?php echo e($question->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <div class="modal-body">
                        <div class="row">
                        <div class="form-group">
                            <label for="address">Question:<span class="text-danger">*</span></label><br/>
                            <input type="text" class="form-control" id="newQuestion" name="newQuestion" value="<?php echo e($question->description); ?>">
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button id="editButton<?php echo e($question->id); ?>" type="submit" class="btn btn-info pull-left">Edit</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>

                </div>
              </div>

            <!--Delete Modal-->
            <div class="modal fade" id="deleteModal<?php echo e($question->id); ?>" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <form class="form" role="form" action="questions/<?php echo e($question->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <div class="modal-body">
                        <div class="row">
                          <h4>Are you sure you want to delete <?php echo e($question->description); ?>?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button id="deleteButton<?php echo e($question->id); ?>" type="submit" class="btn btn-danger pull-left">Delete</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>

               </div>
            </div> 
            <?php endforeach; ?>
        </table>
<?php endif; ?>    


        <button class="btn btn-default" data-toggle="modal" data-target="#questionModal"><span class="glyphicon glyphicon-plus"></span>Add Question</button>

<!--Add Modal-->
<div class="modal fade" id="questionModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Question Information</h4>
        </div>
        <form class="form" role="form" action="questions" method="POST">
        <?php echo e(csrf_field()); ?>    
        <div class="modal-body">
            <div class="row">
            <div class="form-group">
                <label for="address">Description:<span class="text-danger">*</span></label><br/>
                <input type="text" class="form-control" id="questionDesc" name="questionDesc" placeholder="Enter the question description" >
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button id="addQuestion" type="submit" class="btn btn-info pull-left">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
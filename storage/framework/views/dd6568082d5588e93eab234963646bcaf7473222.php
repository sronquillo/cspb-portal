<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white">Welcome! <b><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->middlename); ?> <?php echo e(Auth::user()->lastname); ?> (<?php echo e(Auth::user()->IDno); ?>)</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Notifications</h1></div>
    <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                <div class="panel-body">
                    <table width="100%">
                        <tr style="border-bottom: 3px solid #0d5302">
                            <th width="15%"><div align="Left">Date</div></th>
                            <th width="50%"><div align="Left">Subject</div></th>
                            <th width="35%"><div align="Left">From</div></th>
                        </tr>
                        <?php foreach($notification as $notifications): ?>
                        <tr style="border-bottom: 1px solid #0d5302">
                            <td width="15%"><div align="Left"><?php echo e($notifications->created_at); ?></div></td>
                            <td width="50%"><div align="Left"><a href=/<?php echo e($notifications->anID); ?>><?php echo e($notifications->subject); ?></a></div></td>
                            <td width="35%"><div align="Left"><?php echo e($notifications->firstname); ?> <?php echo e($notifications->lastname); ?></div></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
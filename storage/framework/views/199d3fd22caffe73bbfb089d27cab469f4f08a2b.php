<?php $__env->startSection('content'); ?>
<style>
    tr:nth-child(even){background-color: #f2f2f2}
</style>


<div class="container">
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->middlename); ?> <?php echo e(Auth::user()->lastname); ?> (<?php echo e(Auth::user()->IDno); ?>)</b></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Announcements</h1></div>
            <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                <div class="panel-body">
                    <?php echo e($announcement->links()); ?>

                    <table width="100%">
                        <tr style="border-bottom: 3px solid #0d5302">
                            <th width="20%"><div align="Left">Date</div></th>
                            <th width="50%"><div align="Left">Subject</div></th>
                            
                            <?php if(Auth::user()->userLevel==4 or Auth::user()->userLevel==5): ?>
                            <th width="15%"><div align="Left">From</div></th>
                            <th width="15%"><div align="Left">Action</div></th>
                            <?php else: ?>
                            <th width="30%"><div align="Left">From</div></th>
                            <?php endif; ?>
                        </tr>
                        <?php foreach($announcement as $announcements): ?>
                        <tr style="border-bottom: 1px solid #0d5302; line-height: 40px">
                            <td width="20%"><div align="Left"><?php echo e($announcements->created); ?></div></td>
                            <td width="50%"><div align="Left"><a href="<?php echo e($announcements->anID); ?>"><?php echo e($announcements->subject); ?></a></div></td>
                            
                            <?php if(Auth::user()->userLevel==4 or Auth::user()->userLevel==5): ?>
                            <td width="15%"><div align="Left"><?php echo e($announcements->firstname); ?> <?php echo e($announcements->lastname); ?></div></td>
                            <td width="15%">
                                <div align="Left">
                                    <a href='/announcements/<?php echo e($announcements->anID); ?>'>Update</a> |
                                    <a href='/delete/announcements/<?php echo e($announcements->anID); ?>'>Delete</a>
                                </div>
                            </td>
                            <?php else: ?>
                            <td width="30%"><div align="Left"><?php echo e($announcements->firstname); ?> <?php echo e($announcements->lastname); ?></div></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php echo e($announcement->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
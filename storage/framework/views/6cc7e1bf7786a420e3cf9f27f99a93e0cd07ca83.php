<?php $__env->startSection('content'); ?>
<style>
    tr:nth-child(even){background-color: #f2f2f2}
</style>

<div class="container" style="padding-bottom: 20px">
    <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white">        
        <div class="container-fluid" style="padding-top: 10px; padding-bottom: 10px">
            <table style= "width: 100%; word-wrap:break-word; table-layout: fixed; line-height: 30px">
            <?php foreach($view_announcement as $view_announcements): ?>                
            <tr>
                <th style="border-bottom: 1px solid #0d5302" width="10%">From:</th>
                <td style="border-bottom: 1px solid #0d5302; font-weight: bold"><?php echo e($view_announcements->firstname); ?> <?php echo e($view_announcements->lastname); ?></td>
            </tr>
            <tr>
                <th style="border-bottom: 1px solid #0d5302">Date:</th>
                <td style="border-bottom: 1px solid #0d5302"><?php echo e($view_announcements->created); ?></td>
            </tr>
            <tr>
                <th style="border-bottom: 1px solid #0d5302">Subject:</th>
                <td style="border-bottom: 1px solid #0d5302"><?php echo e($view_announcements->subject); ?></td>
            </tr>
            <tr width="100%">
                <th style="border-bottom: 1px solid #0d5302" colspan="2">Message:</th>
            </tr>
            <tr>
                <td></td>
                <td><div style="text-align: justify"><p><?php echo e($view_announcements->message); ?><br>
                            
                            <?php if($view_announcements->image!=null): ?>
                            <img src='/upload-images/<?php echo e($view_announcements->image); ?>' width="70%"></br>
                                <?php if($view_announcements->video!=null): ?>
                                    <video width="320" height="240" controls>
                                    <source src="/videos/<?php echo e($view_announcements->video); ?>" type="video/mp4">
                                    </video>
                                <?php else: ?>
                                <?php endif; ?>
                            <?php elseif($view_announcements->video!=null): ?>
                                <video width="320" height="240" controls>
                                <source src="/upload-videos/<?php echo e($view_announcements->video); ?>" type="video/mp4">
                                </video>    
                            <?php else: ?>
                            </tr>
                            <?php endif; ?>
                            
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
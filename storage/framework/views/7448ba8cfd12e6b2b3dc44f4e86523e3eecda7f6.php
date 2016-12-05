<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->middlename); ?> <?php echo e(Auth::user()->lastname); ?> (<?php echo e(Auth::user()->IDno); ?>)</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Update Notifications</h1></div>
    <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  

        <?php foreach($update_announcement as $update_announcements): ?>
        
                <div class="panel-body">           
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/update')); ?>" id="announcementform">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group col-md-8">
                        <div class="row">
                        <label for="recipient" class="col-md-2 control-label">Recipient:</label>
                            <div class="col-md-7" style="padding-bottom: 10px">
                                <?php if($update_announcements->recipient_userLevel==1): ?> Student
                                <?php elseif($update_announcements->recipient_userLevel==2): ?> Teacher
                                <?php elseif($update_announcements->recipient_userLevel==3): ?> Academic Chairman, Registrar, Finance
                                <?php elseif($update_announcements->recipient_userLevel==4): ?> Secretary
                                <?php else: ?> Principal, Rector
                                <?php endif; ?><br>
                                
                                <select name="recipient" class="form-horizontal">
                                    <option id="recipient" name="type" value=1>Student</option>
                                    <option id="recipient" name="type" value=2>Teacher</option>
                                    <option id="recipient" name="type" value=3>Academic Chairman, Registrar, Finance</option>
                                    <option id="recipient" name="type" value=4>Secretary</option>
                                    <option id="recipient" name="type" value=5>Principal/Rector</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                        <label for="subject" class="col-md-2 control-label">Subject:</label>
                            <div class="col-md-7" style="padding-bottom: 10px">
                                <input id="subject" type="text" class="form-horizontal" name="subject" placeholder="Subject"required="required" value="<?php echo e($update_announcements->subject); ?>">
                            </div>
                        </div>
                        
                        <div class="row">
                        <label for="message" class="col-md-2 control-label">Message:</label>
                            <div class="col-md-7" style="padding-bottom: 10px">
                                <textarea id="message" rows="10" cols="36" name="message" form="announcementform" placeholder="Enter your message here." required><?php echo e($update_announcements->message); ?></textarea>
                            </div>
                        </div>
                        
                        <input id="anID" type="hidden" class="form-control" name="anID" value="<?php echo e($update_announcements->anID); ?>">
                        <input id="is_approved" type="hidden" class="form-control" name="is_approved" value="0">
                        <input id="status" type="hidden" class="form-control" name="status" value="1">
                        <input id="type" type="hidden" class="form-control" name="type" value="1">
                        <input id="action" type="hidden" class="form-control" name="action" value="HomeController@notifications">
                        
                        <div class="row">
                        <label for="message" class="col-md-2 control-label">Image:</label>
                            <div class="col-md-7">
                                <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo e($update_announcements->image); ?>">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5"></div>
                            <button type="reset" class="btn-outline col-md-2">Reset</button>
                            <button type="submit" class="btn-outline col-md-2" onclick="myFunction()">Update</button>
                        </div>
                    </div>
                    </form>
                    
                    <div class="container col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Reminder!</div>
                            <div class="panel-body">Your created announcement will be subject for validation by the school secretary or principal</div>
                        </div>
                    </div>
                    <div class="container col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Reminder!</div>
                            <div class="panel-body">Your created announcement will be subject for validation by the school secretary or principal</div>
                        </div>
                    </div>
                    
                </div>
        <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>

<script>
function myFunction() {
    alert("Confirm your submission.");
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
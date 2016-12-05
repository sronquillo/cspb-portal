<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <?php /*ID number*/ ?>
                        <div class="form-group<?php echo e($errors->has('IDno') ? ' has-error' : ''); ?>">
                            <label for="IDno" class="col-md-4 control-label">ID number</label>

                            <div class="col-md-6">
                                <input id="IDno" type="text" class="form-control" name="IDno" value="<?php echo e(old('IDno')); ?>">

                                <?php if($errors->has('IDno')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('IDno')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php /*First Name */ ?>
                        <div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname')); ?>">

                                <?php if($errors->has('firstname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php /*Middle Name */ ?>
                        <div class="form-group<?php echo e($errors->has('middlename') ? ' has-error' : ''); ?>">
                            <label for="middlename" class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control" name="middlename" value="<?php echo e(old('middlename')); ?>">

                                <?php if($errors->has('middlename')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('middlename')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php /*Last Name */ ?>
                        <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>">

                                <?php if($errors->has('lastname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php /*Status*/ ?>
                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            
                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option id="status" name="status" value=NULL></option>
                                    <option id="status" name="status" value="Student">Student</option>
                                    <option id="status" name="status" value="Employee">Employee</option>
                                </select>                            
                                <?php if($errors->has('status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php /*User Group*/ ?>
                        <div class="form-group<?php echo e($errors->has('userLevel') ? ' has-error' : ''); ?>">
                            <label for="userLevel" class="col-md-4 control-label">User Group</label>
                            
                            <div class="col-md-6">
                                <select name="userLevel" class="form-control">
                                    <option id="userLevel" name="userLevel" value="1">Student</option>
                                    <option id="userLevel" name="userLevel" value="2">Teacher</option>
                                    <option id="userLevel" name="userLevel" value="3">Academic Chairman</option>
                                    <option id="userLevel" name="userLevel" value="3">Registrar</option>
                                    <option id="userLevel" name="userLevel" value="3">Finance</option>
                                    <option id="userLevel" name="userLevel" value="4">Secretary</option>
                                    <option id="userLevel" name="userLevel" value="5">Principal</option>
                                    <option id="userLevel" name="userLevel" value="5">Rector</option>
                                </select>                            
                                <?php if($errors->has('userLevel')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('userLevel')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                
                        <?php /*Email*/ ?>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php /*Password*/ ?>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php /*Password Confirmation*/ ?>
                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php /*Hidden*/ ?>
                        <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?>">
                            <div class="col-md-6">
                                <input id="is_active" type="hidden" class="form-control" name="is_active" value="1">
                            </div>
                        </div>
                        
                        <?php /*Submit*/ ?>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->middlename); ?> <?php echo e(Auth::user()->lastname); ?> (<?php echo e(Auth::user()->IDno); ?>)</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Grades</h1></div>
            <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 20px">  
<?php /*table*/ ?>
<b><h4>REPORT ON LEARNING PROGRESS</h4></b>

<table width="50%">
    <tr>
        <td>Name:</td>
        <td><u><b><?php echo e(strtoupper($userInfo->lastname)); ?>, <?php echo e(strtoupper($userInfo->firstname)); ?> <?php echo e(strtoupper($userInfo->middlename)); ?></b></u><br></td>
    </tr>
    <tr>
        <td>Student No.:</td>
        <td><u><b><?php echo e(strtoupper($userInfo->IDno)); ?></b></u><br></td>
    </tr>
    <tr>
        <td>Gr. & Sec.:</td>
        <td><u><?php echo e($userInfo->level); ?> <?php echo e($userInfo->section); ?></u><br></td>
    </tr>
    <tr>
        <td>Curricumlum:</td>
        <td><u>K to 12 Basic Education Curriculum</u></td>
    </tr>
</table>
 
<hr>

<table border=1 width="70%" align="center">
    <tr style="text-align: center; font-weight: bold">
        <td rowspan=2   >SUBJECTS</td>
	<td colspan=4>QUARTER</td>
        <td rowspan=2 width="80">Final<br> Rating</td>
	<td rowspan=2>Remark</td>
        <td rowspan=2>Action</td>
</tr>
<tr  style="text-align: center; font-weight: bold">
	<td>1</td>
	<td>2</td>
	<td>3</td>
	<td>4</td>
</tr>
<style>
    input[type=text] { text-align:center }
</style>


<?php foreach($grade as $grades): ?>
<form method="POST" role="form" action="<?php echo e(url('/confirm/modify')); ?>" class='form-horizontal'>
  <input type='hidden' value='<?php echo e($grades->IDno); ?>' name='IDno'>
  <input type='hidden' value='<?php echo e($grades->subjectName); ?>' name='subject'>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<tr>
	<td><?php echo e($grades->subjectName); ?></td>
        <td style="text-align: center"><input class='form-control' type='text' value='<?php echo e($grades->q1); ?>' name='q1'></td>
	<td style="text-align: center"><input class='form-control' type='text' value='<?php echo e($grades->q2); ?>' name='q2'></td>
	<td style="text-align: center"><input class='form-control' type='text' value='<?php echo e($grades->q3); ?>' name='q3'></td>
	<td style="text-align: center"><input class='form-control' type='text' value='<?php echo e($grades->q4); ?>' name='q4'></td>
	<td style="text-align: center"><?php echo $avg=ROUND($grades->avg); ?></td>
        <td style="text-align: center">
           <?php if(($avg)>=75): ?> Passed
           <?php else: ?> Failed
           <?php endif; ?>
        </td>
        <td><button type='submit'>Modify</button></td>
</tr>
</form>
<?php endforeach; ?>
<tr>
    <td colspan=8>Grading Plan Used: Averaging</td>
</tr>
</table>
            </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
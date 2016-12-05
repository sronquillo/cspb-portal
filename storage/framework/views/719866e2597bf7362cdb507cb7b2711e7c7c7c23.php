<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php if(Auth::user()): ?>
    <title><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->lastname); ?> - Colegio de San Pascual Baylon</title>
    <?php else: ?>
    <title>Colegio de San Pascual Baylon</title>
    <?php endif; ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/bootstrap-3.3.7/dist/css/bootstrap-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/bootstrap-3.3.7/dist/css/bootstrap.css')); ?>">
    
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>

<body id="app-layout">
    <div class= "container-fluid" style="padding-bottom:20px">
        <div class="col-md-12">
         <div class="col-md-1">   
          <img class ="img-responsive" style ="margin-top:10px;" src = "<?php echo e(asset('/images/cspblogo.png')); ?>" alt="CSPB" />
         </div>
         <div class="col-md-11" style="padding-top: 20px">
             <span style="font-size: 14pt; font-weight: bold">Colegio de San Pascual Baylon</span>
             <br>
             Pag-asa, Obando, Bulacan
             <br>
             Tel No: 292-4534
         </div>   
        </div>
</div>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Branding Image -->
                <a class="navbar-brand" href="/home">
                    Colegio de San Pascual Baylon
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">    
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/home')); ?>">My Portal</a></li>
                        <?php /*<li><a href="<?php echo e(url('/register')); ?>">Register</a></li>*/ ?>
                        <?php /* <li><a href="<?php echo e(url('/login')); ?>">Login</a></li> */ ?>
                    <?php else: ?>
                        <!--student-->
                        <?php if(Auth::user()->userLevel==1): ?>
                            <li><a href="<?php echo e(url('/announcements')); ?>">Announcements</a></li>
                            <li><a href="<?php echo e(url('/notifications')); ?>">Notifications</a></li>
                            <li><a href="<?php echo e(url('/grades')); ?>">Grades</a></li>
                        <?php else: ?>
                        <?php endif; ?>
                        
                        <!--teacher-->
                        <?php if(Auth::user()->userLevel==2): ?>
                            <li><a href="<?php echo e(url('/announcements')); ?>">Announcements</a></li>
                            <li><a href="<?php echo e(url('/notifications')); ?>">Notifications</a></li>
                            <li><a href="<?php echo e(url('/view/grades')); ?>">Grades</a></li>
                        <?php else: ?>
                        <?php endif; ?>
                        
                        <!--Acad, Registrar, Finance-->
                        <?php if(Auth::user()->userLevel==3): ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Announcements <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="<?php echo e(url('/announcements')); ?>">View Announcements</a></li>
                                    <li><a href="<?php echo e(url('/create/announcements')); ?>">Create Announcements</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notifications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="<?php echo e(url('/notifications')); ?>">View Notifications</a></li>
                                    <li><a href="<?php echo e(url('/create/notifications')); ?>">Create Notifications</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(url('/users')); ?>">Users</a></li>
                        <?php else: ?>
                        <?php endif; ?>
                        
                        <!--Secretary-->
                        <?php if(Auth::user()->userLevel==4): ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Announcements <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="<?php echo e(url('/announcements')); ?>">View Announcements</a></li>
                                    <li><a href="<?php echo e(url('create/announcements')); ?>">Create Announcements</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notifications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="<?php echo e(url('/notifications')); ?>">My Notifications</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li><a href="<?php echo e(url('/approved/notifications')); ?>">View Notifications</a></li>
                                    <li><a href="<?php echo e(url('/create/notifications')); ?>">Create Notifications</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(url('/grades/view')); ?>">Grades</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="<?php echo e(url('/users')); ?>">View Users</a></li>
                                    <li><a href="<?php echo e(url('/password/reset')); ?>">Password Reset</a></li>
                                    <li><a href="<?php echo e(url('/register')); ?>">Register User</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                        <?php endif; ?>
                        
                        <!--Principal, Rector-->
                        <?php if(Auth::user()->userLevel==5): ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Announcements <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="<?php echo e(url('/announcements')); ?>">View Announcements</a></li>
                                    <li><a href="<?php echo e(url('/create/announcements')); ?>">Create Announcements</a></li>
                                    <li><a href="<?php echo e(url('/pending/announcements')); ?>">Pending Announcements</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notifications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="<?php echo e(url('/notifications')); ?>">My Notifications</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li><a href="<?php echo e(url('/view/notifications')); ?>">View Notifications</a></li>
                                    <li><a href="<?php echo e(url('/create/notifications')); ?>">Create Notifications</a></li>
                                    <li><a href="<?php echo e(url('/pending/notifications')); ?>">Pending Notifications</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="<?php echo e(url('/grades/view')); ?>">Grades</a></li>
                            <li><a href="<?php echo e(url('/users')); ?>">Users</a></li>
                           
                        <?php else: ?>
                        <?php endif; ?>
                        
                        <li>
                        <a href="<?php echo e(url('/logout')); ?>">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

<!--<script src="bootstrap/bootstrap-3.3.7/dist/js/jquery-1.11.0.min.js"></script>
<script src="bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>-->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<footer class="footer">
    <div class="container-fluid" style="padding-top: 20px">
        <p class="text-muted"> Copyright 2016. Colegio de San Pascual Baylon. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ODMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/square/blue.css')); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>ODMS</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">

            <?php if(Auth::user()->user_type != ''): ?>
            
            <li class="<?php echo e((request()->is('donations*')) ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/donations')); ?>">Advertisements </a></li>
            <?php if( Auth::user()->is_admin || Auth::user()->user_type == 'donee'): ?>
            <li class="<?php echo e((request()->is('donees*')) ? 'active' : ''); ?>"><a href="<?php echo e(url('/donees')); ?>">Donees</a></li>
            <?php endif; ?>
            <?php if( Auth::user()->is_admin || Auth::user()->user_type == 'hospital'): ?>
            
            <li class="<?php echo e((request()->is('records*')) ? 'active' : ''); ?>"><a href="<?php echo e(url('/records')); ?>">Hospital Records</a></li>
            <?php endif; ?>
            <li class="<?php echo e((request()->is('doctor*')) ? 'active' : ''); ?>"><a href="<?php echo e(url('/doctor')); ?>">Doctors</a></li>
            <li class="<?php echo e((request()->is('donors*')) ? 'active' : ''); ?>"><a href="<?php echo e(url('/donors')); ?>">Donors</a></li>
            
            <?php if( Auth::user()->is_admin ): ?>

            <li class="dropdown">
              <a href="<?php echo e(url('users')); ?>" class="<?php echo e((request()->is('users*')) ? 'active' : ''); ?> dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="<?php echo e((request()->is('hospitals*')) ? 'active' : ''); ?>"><a href="<?php echo e(url('/hospitals')); ?>">Hospitals</a></li>
                <li class="divider"></li>
                <li class="<?php echo e((request()->is('banks*')) ? 'active' : ''); ?>"><a href="<?php echo e(url('/banks')); ?>">Banks</a></li>
                <li class="divider"></li>
                
              </ul>
            </li>
            
            
            <?php endif; ?>
            <?php endif; ?>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
          <!--<form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form> -->
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if(Auth::user()->user_type != ''): ?>
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="<?php echo e(asset('dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="<?php echo e(url('/chats')); ?>">See All Messages</a></li>
                
              </ul>
            </li>
            <!-- /.messages-menu -->
            <?php endif; ?>

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <?php if(Auth::user()->user_type != ''): ?>
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
              <?php if(count($feedbacks) == 0): ?>
              <span class="label label-warning"> 0 </span>
              <?php elseif(count($feedbacks) > 0): ?>
              <span class="label label-warning"><?php echo e(count($feedbacks)); ?></span>
              <?php endif; ?>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have <?php echo e(count($feedbacks)); ?> notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <!-- start notification -->
                    <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <li>
                    <a href="<?php echo e(route('donations.show', $feedback->donation_id)); ?>">
                      <i class="fa fa-users text-aqua"></i> <?php echo e($feedback->feedback_detail); ?>

                    </a>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </ul>
                </li>
                
              </ul>
              <?php endif; ?>
            </li>
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo e(asset('dist/img/user2-160x160.jpg')); ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo e(asset('dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">

                  <p>
                  <?php echo e(Auth::user()->name); ?> - <?php echo e(Auth::user()->user_type); ?>

                  <small>Member since <?php echo e(date_format(Auth::user()->created_at, 'jS M Y')); ?></small>
                </p>
                </li>
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo e(url('/userProfile')); ?>" class="btn btn-default btn-flat">Profile</a>
                    <!--<a href="<?php echo e(url('/user/profile')); ?>" class="btn btn-default btn-flat">Profile</a>-->
                  </div>
                  <div class="pull-right">
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" >
                                        <?php echo csrf_field(); ?>
                                    
                                    <button type="submit" class="btn btn-default btn-flat"><?php echo e(__('Logout')); ?></button>
                  <!--<a href="<?php echo e(route('logout')); ?>" ></a> 
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  -->
                </form>
                    
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) 
      <section class="content-header">
        <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>-->

      <!-- Main content -->
      <section class="content">
        <?php echo $__env->yieldContent('content'); ?>
        <!--<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Blank Box </h3>
          </div>
          <div class="box-body">
            
          </div>
           /.box-body --
        </div> -->
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper 
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>-->
    <!-- /.container 
  </footer>
</div>-->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="<?php echo e(asset('js/jquery.dependent.fields.js')); ?>"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<script type="text/javascript">
  $('#dependent-dropdown').dependsOn('#master-dropdown', ['company', 'donee']);
</script>
</body>
</html>
<?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/header.blade.php ENDPATH**/ ?>
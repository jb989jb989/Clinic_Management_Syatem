<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Clinic Management System')); ?></title>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" crossorigin="anonymous">
    <link href="<?php echo e(asset('css/datepicker3.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap-table.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/fontawesome/css/all.css')); ?>" rel="stylesheet">
    <!-- <link href="<?php echo e(asset('css/nepali.datepicker.min.css')); ?>" rel="stylesheet"> -->
    <link href="<?php echo e(asset('css/datatable.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/buttons.dataTables.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/timepicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/numpad.css')); ?>" rel="stylesheet">
    <link rel="favicon" sizes="32x32" href="/favicon-32x32.png">
    <link rel="favicon" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--Icons-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
    <script src="<?php echo e(asset('js/lumino.glyphs.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-1.11.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/easypiechart.js')); ?>"></script>
    <script src="<?php echo e(asset('js/easypiechart-data.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-table.js')); ?>"></script>
    <script src="<?php echo e(asset('js/nepali.datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttonPrint.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/numpad.js')); ?>"></script>
  
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>



    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
        $('.example').DataTable();
        $('.datepicker').datepicker();
        $('.datepicker1').datepicker({

            format: "mm/dd/yyyy",
            todayHighlight:true,
            autoclose: true,
        });
        $('.datepicker').change(function(){
            $(".datepicker").datepicker('hide');
        });
        $('.datepicker1').change(function(){
            $(".datepicker1").datepicker('hide')
        });
} );
</script>
    <script>
    $(document).ready(function(){

        $('input.timepicker').timepicker({dropdown: true,
    scrollbar: true});
        
        $('#nepaliDateD').nepaliDatePicker({
            disableBefore: '12/08/2073',
            disableAfter: '12/20/2073'
        });
        $('#nepaliDateD1').nepaliDatePicker({
            disableDaysBefore: '10',
            disableDaysAfter: '10'
        });

        $('#nepaliDate5').nepaliDatePicker({
            npdMonth: true,
            npdYear: true,


        });
        $('#nepaliDate').nepaliDatePicker({
            onFocus: false,
            npdMonth: true,
            npdYear: true,
            ndpEnglishInput: 'englishDate',
            ndpTriggerButtonText: 'Date',
            ndpTriggerButtonClass: 'btn btn-primary btn-sm'
        });
        $('#nepaliDate1').nepaliDatePicker({
            onChange: function(){
                alert($('#nepaliDate1').val());
            }
        });
        $('#nepaliDate2').nepaliDatePicker();
        $('#nepaliDate3').nepaliDatePicker({
            onFocus: false,
            npdMonth: true,
            npdYear: true,
            ndpTriggerButton: true,
            ndpTriggerButtonText: 'Date',
            ndpTriggerButtonClass: 'btn btn-primary btn-sm'
        });

        $('#englishDate').change(function(){
            $('#nepaliDate').val(AD2BS($('#englishDate').val()));
        });

        $('#englishDate9').change(function(){
            $('#nepaliDate9').val(AD2BS($('#englishDate9').val()));
        });

        $('#nepaliDate9').change(function(){
            $('#englishDate9').val(BS2AD($('#nepaliDate9').val()));
        });
    });
</script>
    <script type="text/javascript">
         $(document).ready(function() {
  $(".select2").select2();

});
    </script>
    <script type="text/javascript">
$(document).ready(function() {
  $(".select").select2();
});
</script>


    <?php echo $__env->yieldContent('script'); ?>
    <style type="text/css">
       li  {
        margin-right: 10px;
       }

    </style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="<?php echo e(route('dashboard.index')); ?>"><i class="fas fa-clinic-medical"></i> Clinic Management System</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="<?php echo e(request()->is('/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fas fa-home"></i> Dashboard</a></li>
       <?php if ( Auth::check() && in_array('department.index', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
        <li class="dropdown <?php echo e(request()->is('department*') || request()->is('service*') || request()->is('package') || request()->is('employee*') || request()->is('doctor*') || request()->is('invoice/report') ? 'active' : ''); ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users-cog"></i> Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
            
                <li><a href="<?php echo e(route('department.index')); ?>">Departments</a></li>

                <li><a href="<?php echo e(route('service.index')); ?>"> Services</a></li>

               
                <li><a href="<?php echo e(route('package.index')); ?>"> Package</a></li>
                <li><a href="<?php echo e(route('employee.index')); ?>">Employees</a></li>

                <li><a href="<?php echo e(route('doctor.index')); ?>">Doctor OPD</a></li>
                <li><a href="<?php echo e(route('invoice.report')); ?>">Invoice Report</a></li>

          </ul>
        </li>
        <?php endif; ?>

        <?php if ( Auth::check() && in_array('patient.index', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
        <li class="dropdown <?php echo e(request()->is('patient*') || request()->is('appointment*') ? 'active' : ''); ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-hospital-user"></i> Patient <span class="caret"></span></a>
           <ul class="dropdown-menu">
                <li><a href="<?php echo e(route('patient.index')); ?>"> Patient</a></li>
                <li><a href="<?php echo e(route('appointment.index')); ?>"> Appointment</a></li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if ( Auth::check() && in_array('invoice.report', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
        <li class="dropdown <?php echo e(request()->is('account/*') ? 'active' : ''); ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-medical-alt"></i> Report <span class="caret"></span></a>
           <ul class="dropdown-menu">
                <li><a href="<?php echo e(route('account.service')); ?>">Service Sale Report</a></li>
                <li><a href="<?php echo e(route('account.opd')); ?>"> Opd Sale Report</a></li>
                <li><a href="<?php echo e(route('account.package')); ?>"> Package Sale Report</a></li>
               
            </ul>
        </li>
        <?php endif; ?>

        <li class="dropdown <?php echo e(request()->is('invoice*') || request()->is('opd*') || request()->is('package/sale') || request()->is('search/invoice') ? 'active' : ''); ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-receipt"></i> Invoice/Bill <span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="<?php echo e(route('invoice.index')); ?>">Service Bill</a></li>
          <li><a href="<?php echo e(route('opd.index')); ?>"> OPD Bill</a></li>
          <li><a href="<?php echo e(url('package/sale')); ?>"> Package Bill</a></li>
        <?php if ( Auth::check() && in_array('search.invoice', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
          <li><a href="<?php echo e(route('search.invoice')); ?>">Invoice Report</a></li>
        <?php endif; ?>
           
        </ul>
        </li>

        <?php if ( Auth::check() && in_array('test.index', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
        <li class="dropdown <?php echo e(request()->is('test') || request()->is('reference') || request()->is('haematology') || request()->is('biochemistry') || request()->is('immunology') || request()->is('microbiology') || request()->is('examination') || request()->is('stain') || request()->is('report')  ? 'active' : ''); ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-flask"></i> Lab Test <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo e(route('test.index')); ?>"> Manage Test</a></li>
                <li><a href="<?php echo e(route('reference.index')); ?>"> Test References </a> </li>
                <li><a href="<?php echo e(route('haematology.index')); ?>"> Haematology Report </a> </li>
                <li><a href="<?php echo e(route('biochemistry.index')); ?>"> Biochemistry Report </a> </li>
                <li><a href="<?php echo e(route('immunology.index')); ?>"> Immunology Report </a> </li>
                <li><a href="<?php echo e(route('microbiology.index')); ?>"> Microbiology Report </a> </li>
                <li><a href="<?php echo e(route('examination.index')); ?>"> Examination Report </a> </li>
                <li><a href="<?php echo e(route('stain.index')); ?>"> Stain Report </a> </li>
                <li><a href="<?php echo e(route('report.index')); ?>">Report</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if ( Auth::check() && in_array('hospital.setting', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
        <li class="dropdown <?php echo e(request()->is('user*') || request()->is('role*') || request()->is('setting') || request()->is('backup') ? 'active' : ''); ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tools"></i> Setting<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <?php if ( Auth::check() && in_array('user.index', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
                <li><a href="<?php echo e(route('user.index')); ?>"> Users</a></li>
                <?php if ( Auth::check() && in_array('role.index', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
                <li><a href="<?php echo e(route('role.index')); ?>">Roles</a></li>
                <?php endif; ?>
                <li><a href="<?php echo e(route('hospital.setting')); ?>"> Settings</a></li>
                <li><a href="<?php echo e(route('hospital.backup')); ?>"> Backup</a></li>
            <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <li class="dropdown active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
            <ul class="dropdown-menu" >
                <li><a id="password_change">Change Password</a></li>
                <li> <a href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>
            </ul>
        </li>
        </ul>
  </div>
</nav>


<?php if(count($errors)): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <strong><?php echo e($error); ?></strong>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php echo $__env->make('change', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>



</body>

</html>

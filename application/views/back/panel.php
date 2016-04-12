<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Pixtox | Dashboard</title>

     <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->

    <link rel="stylesheet" href="<?php echo  base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="<?php echo  base_url();?>assets/admin/dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins

         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="<?php echo  base_url();?>assets/admin/dist/css/skins/_all-skins.min.css">

    <!-- iCheck -->

    <link rel="stylesheet" href="<?php echo  base_url();?>assets/admin/plugins/iCheck/flat/blue.css">

    <!-- Morris chart -->

    <link rel="stylesheet" href="<?php echo  base_url();?>assets/admin/plugins/morris/morris.css">

    <!-- jvectormap -->

    <link rel="stylesheet" href="<?php echo  base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo  base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <style type="text/css">
      html {
        overflow: hidden;
        height: 100%;
      }
      body {
        overflow: auto;
        height: 100%;
        padding-right: 0px;
      }

      /* unset bs3 setting */
      .modal-open {
       overflow: auto; 
      }
      </style>
 

    

    <script type="text/javascript">

      $(document).ready(function  () {

        $('ul li a').click(function() {

            $('ul li.active').removeClass('active');

            $(this).closest('li').addClass('active');

        });

      });

    </script>
    <script type="text/javascript">
      $(document).ready(function  () {
        $('#konten').load('<?php echo base_url("pxadmin/all_notif");?>')
        $('.link').click(function  () {
          var link=$(this).attr('id');
            $('#konten').load(link);
            return false;
        })
      })
    </script>
  </head>

  <body class="skin-blue sidebar-mini sidebar-collapse" style="none">

    <div class="wrapper">



      <header class="main-header">

        <!-- Logo -->

        <a href="<?php echo base_url("pxadmin"); ?>" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini">Pixtox</span>

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg"><b>Admin</b>Pixtox</span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->

          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

            <span class="sr-only">Toggle navigation</span>

          </a>

          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              <!-- Messages: style can be found in dropdown.less-->

              

              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <span class="hidden-xs">Hallo, <?=$username;?></span>

                </a>

              </li>

               <li class="dropdown user user-menu">

                <a href="<?=base_url("logout/index");?>" >

                  <span class="hidden-xs">

                    <i class='fa fa-sign-out'></i> Logout

                  </span>

                </a>

              </li>

              <!-- Control Sidebar Toggle Button -->

              <li>

                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

              </li>

            </ul>

          </div>

        </nav>

      </header>

      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section id='side' class="sidebar">

          <!-- Sidebar user panel -->

         

          <!-- search form -->

          <!-- <form action="#" method="get" class="sidebar-form">

            <div class="input-group">

              <input type="text" name="q" class="form-control" placeholder="Search...">

              <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>

              </span>

            </div>

          </form> -->

          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>

            

            <li class="treeview">

              <a  href="#">

                <i class="fa fa-user"></i>

                <span>User</span><i class="fa fa-angle-left pull-right"></i>

              </a>

               <ul class="treeview-menu">

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_user');?>"><i class="fa fa-circle-o"></i> Admin</a></li>

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_member');?>"><i class="fa fa-circle-o"></i> Member</a></li>

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_contributor');?>"><i class="fa fa-circle-o"></i> Contributor</a></li>

                

                

              </ul>

            </li>

             <li class="treeview">

              <a  href="#">

                <i class="fa fa-money"></i>

                <span>Billing & Finance</span><i class="fa fa-angle-left pull-right"></i>

              </a>

               <ul class="treeview-menu">

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_deposit');?>"><i class="fa fa-circle-o"></i> Deposit</a></li>

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_invoice');?>"><i class="fa fa-circle-o"></i> Invoice</a></li>

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_konfirmasi');?>"><i class="fa fa-circle-o"></i> Konfirmasi</a></li>

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_bank');?>"><i class="fa fa-circle-o"></i> Bank List</a></li>


              

              </ul>

            </li>

              <li class="treeview">

              <a  href="#">

                <i class="fa fa-download"></i>

                <span>Download & Redeem</span><i class="fa fa-angle-left pull-right"></i>

              </a>

               <ul class="treeview-menu">

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_download');?>"><i class="fa fa-download"></i> Download</a></li>

                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_redeem');?>"><i class="fa fa-dollar"></i> Redeem</a></li>
                <li><a class="link" href="#" id="<?=base_url('pxadmin/page_set_redeem');?>"><i class="fa fa-dollar"></i> Set Redeem</a></li>

              

              </ul>

            </li>

            <li class="treeview">

              <a href="#">

                <i class="fa fa-image"></i>

                <span>Image</span><i class="fa fa-angle-left pull-right"></i>

               

              </a>

              <ul class="treeview-menu">

                <li><a class="link" href="#" id="<?=base_url("pxadmin/page_newImage");?>"><i class="fa fa-circle-o"></i> New Image</a></li>

                <li><a class="link" id="<?=base_url("pxadmin/page_image");?>" href="#" ><i class="fa fa-circle-o"></i> Resize Setting</a></li>

                <li><a class="link" id="<?=base_url("pxadmin/page_freeImage");?>" href="#" ><i class="fa fa-circle-o"></i> Free Image</a></li>

                <li><a class="link" id="<?=base_url("pxadmin/page_upload_setting");?>" href="#" ><i class="fa fa-circle-o"></i> Upload Setting</a></li>
 <li><a target="__blank" href="<?=base_url("bk/page_background");?>" href="#" ><i class="fa fa-circle-o"></i> Background Setting</a></li>

               

              </ul>

            </li>

            <li>

              <a class="link" href="#" id="<?=base_url("pxadmin/page_score");?>">

                <i class="fa fa-th"></i> <span>Score Setting</span>

              </a>

            </li>

           

           

            <li class="treeview">

              <a href="#">

                <i class="fa fa-edit"></i> <span>Tags</span>

                <i class="fa fa-angle-left pull-right"></i>

              </a>

              <ul class="treeview-menu">

                <li><a href="#" class="link" id="<?=base_url("pxadmin/page_kategori");?>"><i class="fa fa-circle-o"></i> Kategory Setting</a></li>

                

              </ul>

            </li>

            <li class="treeview">

              <a href="#"  class="link" id="<?=base_url("pxadmin/page_paket");?>">

                <i class="fa fa-table"></i> <span>Pricing Table</span>
                
                <i class="fa fa-angle-left pull-right"></i>

              </a>

            </li>

            <li>

              <a class="link" href="#" id="<?php echo base_url('pxadmin/page_request'); ?>">

                <i class="fa fa-comment"></i> <span> Special Request</span>

                

              </a>

            </li>

          <!--   <li>
              <a href="<?php echo base_url("email/page_templateEmail");?>">
                <i class="fa fa-envelope"></i><span>Email</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li> -->
            <li class="treeview">

              <a href="#">

                <i class="fa fa-file-o"></i> <span>Info Page</span>

                <i class="fa fa-angle-left pull-right"></i>

              </a>

              <ul class="treeview-menu">

                <li><a class="link" id="<?=base_url("pxadmin/page_story");?>" href="#"><i class="fa fa-circle-o"></i> Story</a></li>

                <li><a class="link" id="<?=base_url("pxadmin/page_profile");?>" href="#"><i class="fa fa-circle-o"></i> Profile</a></li>

                <li><a class="link" id="<?=base_url("pxadmin/page_faq");?>" href="#"><i class="fa fa-circle-o"></i> FAQ</a></li>

                <li><a class="link" id="<?=base_url("pxadmin/page_profile");?>" href="#"><i class="fa fa-circle-o"></i> Login</a></li>

                <li><a class="link" id="<?=base_url("pxadmin/page_career");?>" href="#"><i class="fa fa-circle-o"></i> Career</a></li>

                </ul>

            </li>

            

            <li><a class="link" href="#" id="<?=base_url("pxadmin/page_term");?>"><i class="fa fa-book"></i> <span>Term And Condition</span></a></li>

            <li><a class="link" href="#" id="<?=base_url("pxadmin/page_file");?>"><i class="fa fa-file"></i> <span> File List </span></a></li>

           

            

          </ul>

        </section>

        <!-- /.sidebar -->

      </aside>



      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section id='konten'></section>

        <!-- /.content -->

      </div><!-- /.content-wrapper -->

      <footer class="main-footer">

        <div class="pull-right hidden-xs">

          <b>Version</b>1.0 Beta

        </div>

        <strong>Copyright &copy; 2015-2016 <a href="http://pixtox.com">PIxtox</a>.</strong> All rights reserved.

      </footer>



      <!-- Control Sidebar -->

      <aside class="control-sidebar control-sidebar-dark">

        <!-- Create the tabs -->

        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

        </ul>

        <!-- Tab panes -->

        <div class="tab-content">

          <!-- Home tab content -->

          <div class="tab-pane" id="control-sidebar-home-tab">

            <h3 class="control-sidebar-heading">Recent Activity</h3>

            <ul class="control-sidebar-menu">

              <li>

                <a href="javascript::;">

                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                    <p>Will be 23 on April 24th</p>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript::;">

                  <i class="menu-icon fa fa-user bg-yellow"></i>

                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                    <p>New phone +1(800)555-1234</p>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript::;">

                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                    <p>nora@example.com</p>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript::;">

                  <i class="menu-icon fa fa-file-code-o bg-green"></i>

                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                    <p>Execution time 5 seconds</p>

                  </div>

                </a>

              </li>

            </ul><!-- /.control-sidebar-menu -->



            <h3 class="control-sidebar-heading">Tasks Progress</h3>

            <ul class="control-sidebar-menu">

              <li>

                <a href="javascript::;">

                  <h4 class="control-sidebar-subheading">

                    Custom Template Design

                    <span class="label label-danger pull-right">70%</span>

                  </h4>

                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript::;">

                  <h4 class="control-sidebar-subheading">

                    Update Resume

                    <span class="label label-success pull-right">95%</span>

                  </h4>

                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript::;">

                  <h4 class="control-sidebar-subheading">

                    Laravel Integration

                    <span class="label label-warning pull-right">50%</span>

                  </h4>

                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript::;">

                  <h4 class="control-sidebar-subheading">

                    Back End Framework

                    <span class="label label-primary pull-right">68%</span>

                  </h4>

                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>

                  </div>

                </a>

              </li>

            </ul><!-- /.control-sidebar-menu -->



          </div><!-- /.tab-pane -->

          <!-- Stats tab content -->

          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->

          <!-- Settings tab content -->

          <div class="tab-pane" id="control-sidebar-settings-tab">

            <form method="post">

              <h3 class="control-sidebar-heading">General Settings</h3>

              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Report panel usage

                  <input type="checkbox" class="pull-right" checked>

                </label>

                <p>

                  Some information about this general settings option

                </p>

              </div><!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Allow mail redirect

                  <input type="checkbox" class="pull-right" checked>

                </label>

                <p>

                  Other sets of options are available

                </p>

              </div><!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Expose author name in posts

                  <input type="checkbox" class="pull-right" checked>

                </label>

                <p>

                  Allow the user to show his name in blog posts

                </p>

              </div><!-- /.form-group -->



              <h3 class="control-sidebar-heading">Chat Settings</h3>



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Show me as online

                  <input type="checkbox" class="pull-right" checked>

                </label>

              </div><!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Turn off notifications

                  <input type="checkbox" class="pull-right">

                </label>

              </div><!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Delete chat history

                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>

                </label>

              </div><!-- /.form-group -->

            </form>

          </div><!-- /.tab-pane -->

        </div>

      </aside><!-- /.control-sidebar -->

      <!-- Add the sidebar's background. This div must be placed

           immediately after the control sidebar -->

      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->



    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
       <!-- AdminLTE App -->
    <script src="<?php echo  base_url();?>assets/admin/dist/js/app.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo  base_url();?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    -->
    <script src="<?php echo  base_url();?>assets/admin/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo  base_url();?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo  base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo  base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo  base_url();?>assets/admin/plugins/knob/jquery.knob.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo  base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo  base_url();?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo  base_url();?>assets/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo  base_url();?>assets/admin/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  </body>

</html>


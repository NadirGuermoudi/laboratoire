<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LRI | Profile Membre</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="position: fixed; width: 100%">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="logo.png" style="width: 50px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="logo.png"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Membre</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">

                <p>
                Membre
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="userProfil.php" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="Login_page/login.php" class="btn btn-default btn-flat">Déconnexion</a>
                </div>
              </li>
            </ul>
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
  <aside class="main-sidebar" style="position: fixed;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="padding-top: 50px;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Membre<br>  <smal>Prénom </smal> </p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="trombino.php"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="liste.php"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
        <li>
          <a href="equipes.php">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        <li>
          <a href="projtes.php">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        
        <li>
          <a href="thèses.php">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>

        <li>
          <a href="articles.php">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

          <li>
          <a href="parametre.php">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper" style="padding-top: 50px">
    <section class="content-header" >
          <h1>
             Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="liste.php"></i>Membres</a></li>
            <li class="active">Profil</li>
          </ol>
    </section>

    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/avatar04.png" alt="User profile picture">

              <h3 class="profile-username text-center">NOM Prénom</h3>

              <p class="text-muted text-center">Grad</p>
              <div class="text-center">
                <div class="btn-group">
              <a href="#" class="btn btn-social-icon btn-linkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="#" class="btn btn-social-icon" title="Researchgate"><img src="dist/img/téléchargé.png"></a>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">A propos</a></li>
              <li><a href="#timeline" data-toggle="tab">Article</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body">
                  <div class="col-md-3">
                    <strong>Nom</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      Le nom ici
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>Prénom</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      Le prénom ici
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>Grade</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      Le grade ici
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>Date de naissance</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      jj/mm/aa ici
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>N° de télépone</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      (---)--- -- --
                    </p>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Groupe</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">Le nom du groupe ici</a>
                  </div>


              <strong><i class="margin-r-5"></i></strong>
              <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-graduation-cap margin-r-5"></i> Thèse </strong>                
                 </div>
                  <div class="col-md-9">
                    <h5>Titre</h5>
                    <p class="text-muted">
                      
                      Résumé:  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                    </p>
                  </div>

            </div>
              </div>
            
              <div class="tab-pane" id="timeline">
                 <ul class="mailbox-attachments clearfix">
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                          <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i></a>
                          </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                          <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i></a>
                          </span>
                    </div>
                  </li>
                 <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                          <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i></a>
                          </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                          <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i></a>
                          </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                          <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i></a>
                          </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                          <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i></a>
                          </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                          <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i></a>
                          </span>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
    </section>


  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark " style="position: fixed;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

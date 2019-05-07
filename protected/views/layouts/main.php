<?php $base_url=Yii::app()->request->baseUrl."/";
   $base_url_app='index.php?r=';
   $controller=Yii::app()->controller->id;
   $action=Yii::app()->controller->action->id; 
   $curUrluser_id = Yii::app()->request->getParam('id');
   
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="<?php echo $base_url; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $base_url; ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $base_url; ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $base_url; ?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $base_url; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $base_url; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/select2/select2_metro.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
<link href="<?php echo $base_url; ?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $base_url; ?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $base_url; ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>

<title>To-Do Application</title>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="<?php echo $base_url; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/plugins/bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

<script src="<?php echo $base_url; ?>assets/plugins/fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo $base_url?>assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo $base_url?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo $base_url?>assets/plugins/select2/select2.min.js"></script>
<script>
               jQuery(document).ready(function() {
               
                jQuery(".fancybox").fancybox({
               
                 maxWidth : 800,
               
                 maxHeight : 600,
               
                 fitToView : false,
               
                 width  : '70%',
               
                 height  : '70%',
               
                 autoSize : false,
               
                 closeClick : false,
               
                 openEffect : 'none',
               
                 closeEffect : 'none'
               
                });
               
               });
               
      </script>
</head>
<script>
   var project_path='<?php echo $base_url; ?><?php echo $base_url_app; ?>';
</script>
<!-- END GLOBAL MANDATORY STYLES -->
      <?php
       if(Yii::app()->user->isGuest){ 
      $class="login"; 
    }  else{
       $class="page-default-bg";  
    }
   ?>

<body class="<?php echo  $class;?>">
        <?php
            if(!Yii::app()->user->isGuest){
        ?>
            <div class="header navbar" > 
            
              <div class="navbar-inner primary-color-dark"> <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"> <img src="<?php echo $base_url; ?>assets/img/menu-toggler.png" alt="" /> </a> 
            
                <ul class="nav pull-right">
                  <li class="dropdown user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <span class="username"><?php echo $_SESSION['loginname'];?><span></span></span> <i class="icon-caret-down"></i> </a>
                    <ul class="dropdown-menu user-dropdown">
              <li><a href="<?php echo $base_url; ?><?php echo $base_url_app; ?>user/Logout"><i class="icon-4"></i> Log Out</a></li>
                    </ul>
                  </li>
                </ul>
            
              </div>  
            </div>

    <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid"> 
          <!-- BEGIN SIDEBAR -->
          <div class="page-sidebar nav-collapse collapse"> <a class="sidebar-logo" href="<?php echo $base_url; ?><?php echo $base_url_app; ?>taskgroup"> </a> 
        <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu">
             <li <?php if($controller=='adminDashboard'){echo 'class="active"';} ?>> 
              <a href="<?php echo $base_url; ?><?php echo $base_url_app; ?>taskgroup"><i class="icon-8"> </i>To-Do List</a> 
           </li>
        </ul>
        
          </div>
           <div class="page-content">
            <?php } ?>
         <?php
          echo $content;
        ?>
    </div>
    <?php
     if(!Yii::app()->user->isGuest){  ?>
</div>
<?php }?>
</body>


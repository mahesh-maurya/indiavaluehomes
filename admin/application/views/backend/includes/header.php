<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Indiavaluehomes | <?php echo $title; ?></title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-reset.css'); ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/tinyscrollbar.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>" type="text/css">
	<link href="<?php echo base_url('assets/css/TableTools.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/demo_table.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-datepicker/css/datepicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-colorpicker/css/colorpicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-daterangepicker/daterangepicker.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css'); ?>" type="text/css" />
	<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/tinyscrollbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
	 <script src="<?php echo base_url('assets/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?> "></script>
	 <script src="<?php echo base_url('assets/js/sparkline-chart.js'); ?>"></script>
   <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="<?php echo base_url('assets/js/easy-pie-chart.js'); ?>"></script>
<script>
$(document).ready(function(){
		$('.datetime').datepicker({
		 format: 'yyyy-mm-dd'
	 });
	 $("#select1").select2({
		
		allowClear: true,
		//minimumInputLength: 3,
		
	 });
	 $("#select2").select2({
		
		allowClear: true,
		//minimumInputLength: 3,
		
	 });
	 $("#select3").select2({
		
		allowClear: true,
		//minimumInputLength: 3,
		
	 });
	  $("#select4").select2({
		
		allowClear: true,
		//minimumInputLength: 3,
		
	 });
	 $("#select5").select2({
		
		allowClear: true,
		//minimumInputLength: 3,
		
	 });
});
</script>

</head>
<body>
<section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo">Indiavaluehomes</a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <!--<img alt="" src="img/avatar1_small.jpg">-->
                            <span class="username"><?php echo $this->session->userdata( 'name' ); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                            <li><a href="<?php echo site_url('login/logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
			  <ul class="sidebar-menu">
			  <?php   $accesslevel = $this->session->userdata('accesslevel');
			  $menus = $this->menu_model->viewmenus(); 	  ?>
			  <ul class="sidebar-menu">
				<?php  
				foreach($menus as $row)
				{  
				
					
					$pieces = explode("/", $row->url);
					$page2="";
					if(empty($pieces) || !isset($pieces[1]))
					{
						$page2="";
					}
					else
						$page2=$pieces[1];
					$submenus = $this->menu_model->getsubmenus($row->id);
					$menuaccess = $this->menu_model->getmenuaccess($row->id);
					if(in_array($accesslevel,$menuaccess))
					{
					?>
						<li class="<?php if($page==$page2 || $page == strtolower($row->name)) { echo 'active'; } //echo $page2;
						if(count($submenus > 0)) 
						{ 
							$pages =  $this->menu_model->getpages($row->id);
							//echo $page2; 
							//print_r($pages);
							echo ' sub-menu'; 
							if(in_array($page, $pages,TRUE))
								echo ' active';
						}
						?> ">
							<a class="" href="<?php 
							if($row->url == "")
								echo "javascript:;";
							else if($row->linktype == 1) echo site_url($row->url);
							else if($row->linktype == 2) echo base_url($row->url);
							else if($row->linktype == 3) echo ($row->url);						
							?>" <?php if($row->linktype == 3) echo "target='_blank'"; ?>>
								<?php  
								if($row->icon != "")
								{  ?>
									<i class="<?php echo $row->icon; ?>"></i>
						<?php	}
								?>
								<span><?php echo $row->name;  ?></span>
								<span class="arrow"></span>
							</a>
							<?php
							if(count($submenus) > 0)
							{  ?>
								<ul class="sub">
									<?php
									foreach($submenus as $row2)
									{ 
										$pieces2 = explode("/", $row2->url);
						
										if(empty($pieces2) || !isset($pieces2[1]))
										{
											$page3="";
										}
										else
											$page3=$pieces2[1];
										$menuaccess2 = $this->menu_model->getmenuaccess($row->id);
										if(in_array($accesslevel,$menuaccess2))
										{
									?>
											<li class="<?php if($page==$page3 || $page == strtolower($row2->name)) { echo 'active'; } ?>">
												<a href="<?php 
													if($row2->url == "")
														echo "javascript:;";
													else if($row2->linktype == 1) echo site_url($row2->url);
													else if($row2->linktype == 2) echo base_url($row2->url);
													else if($row2->linktype == 3) echo ($row2->url);		
												?>">
													<?php  
													if($row2->icon != "")
													{  ?>
														<i class="<?php echo $row2->icon; ?>" <?php if($row2->linktype == 3) echo "target='_blank'"; ?>></i>
											<?php	}
													?>
													<?php echo $row2->name;  ?>
												</a>
											</li>
							<?php		}
								}
									?>
								</ul>
					<?php	}
							?>
						</li>
			<?php	}
				}
				?>
              
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
<div class="container">
            <?php if(isset($alertsuccess)) { ?>
<div class="alert alert-success"> <?php echo $alertsuccess;	?> </div>
<?php } ?>
<?php if(isset($alerterror)) { ?>
<div class="alert alert-danger"> <?php echo $alerterror;	?> </div>
<?php } ?>
<?php if(isset($alert)) { ?>
<div class="alert"> <?php echo $alert;	?> </div>
<?php } ?>
<?php if(isset($_REQUEST['alertsuccess'])) { ?>
<div class="alert alert-success"> <?php echo $_REQUEST['alertsuccess'];	?> </div>
<?php } ?>
<?php if(isset($_REQUEST['alerterror'])) { ?>
<div class="alert alert-danger"> <?php echo $_REQUEST['alerterror'];	?> </div>
<?php } ?>
<?php if(isset($_REQUEST['alert'])) { ?>
<div class="alert"> <?php echo $_REQUEST['alert'];	?> </div>
<?php } ?>
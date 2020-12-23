<?php
$ID=$this->session->userdata('email');
$sql = "SELECT `user_img` FROM `authentication`
            WHERE `user_email`='$ID'";
      $query=$this->db->query($sql);
      $userImage = $query->result_Array();
?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Books Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.min.css">
  <!-- Additional CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/customization.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url();?>assets/img/favicon.ico' />

  <link rel="stylesheet" href="<?php echo base_url();?>assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <script type="text/javascript">
    function FlatId()
       {
           var a = Math.floor(100000 + Math.random() * 900000);   
            a = String(a);
            a = a.substring(0,5);
          document.getElementById("cat_id").value = "CAT"+a;
          
       }

  </script>
  <script type="text/javascript" >
          window.setTimeout(function() {
            $(".alert21").fadeTo(500, 0).slideUp(800, function(){
                $(this).remove(); 
            });
        }, 3000);
   </script>
  <style type="text/css">
    #infoi {
      position:fixed;
        bottom:5px;
        margin-left: 79%;
        z-index: 10;
        opacity: 0.85;
        background-color: #27ae60 !important;
        border:1px solid #27ae60; 
        font-weight: normal;
        color: white;
      }
    #star{color:red;}
  </style>
<!-- <script type="text/javascript">window.history.pushState({},document.title,"/"+"smsapp/id=<?php echo md5(date('Y-m-d'));?>");</script> -->
</head>

<body onload="FlatId()">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <!--<form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form> -->
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url('upload/profilepics')."/".$userImage[0]['user_img']?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"><?php echo $this->session->userdata('username'); ?></div>
              <?php $encid=$this->session->userdata('email');?>
              <a href="<?php echo base_url('index.php/Welcome/showprofile');?>?id=<?php echo $encid; ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> 
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('logout');?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <!-- <img alt="image" src="<?php echo base_url();?>assets/img/logo.png" class="header-logo" /> --> <span
                class="logo-name">WEBSITE Logo</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="<?php echo base_url('load_dashboard')?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <?php if($this->session->userdata('role') == "SUPERADMIN"){?>
             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user"></i><span>Admin</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('addbookcategory');?>">Add Books Category</a></li>
                <li><a class="nav-link" href="<?php echo base_url('addbook');?>">Add Books</a></li>
              </ul>
            </li>

          <?php } ?>
          
          </ul>
        </aside>
      </div>
<!--Header Ends -->
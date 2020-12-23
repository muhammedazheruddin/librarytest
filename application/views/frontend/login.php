<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Books Management System</title>
  <!-- General CSS Files --> 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Additional CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/customization.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url();?>assets/img/favicon.ico' />
  <style type="text/css">
    body{background-image:url('<?php echo base_url();?>assets/img/login.jpg'); height: 600px; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; 
  background-size: cover; /* Resize the background image to cover the entire container */}
  </style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-6 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Admin Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url('user_auth');?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email / Mobile No.</label>
                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email / mobile no.
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <!--<a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a> -->
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                    <br>
                     <a href="<?php echo base_url()?>">Go To Website</a>
                    
                    </button>
                  </div>
                </form>
                <center><p style="color:black; font-weight: bolder"><?php echo $this->session->flashdata('Error_Login');?></p></center> 
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url();?>assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>
  <script src="<?php echo base_url();?>assets/js/nbb.js"></script>

</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
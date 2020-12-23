<?php $this->load->view('frontend/header'); ?>
<style type="text/css">
  .table:not(.table-sm):not(.table-md):not(.dataTable) td, .table:not(.table-sm):not(.table-md):not(.dataTable) th {
  padding: 0 5px;
  height: 35px;
  vertical-align: middle;
}
</style>
<!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="col-12 col-md-12 col-lg-12">


               <div class="row">
                <!-- Card Start -->
                    <!-- Individual Card -->
                     <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                        <div class="card-body text-center">
                          <div class="mb-2">Add Book Category</div>
                         <a class="nav-link" href="<?php echo base_url('addbookcategory');?>"> <button class="btn btn-primary" id="toastr-3">Add</button></a>
                        </div>
                      </div>
                    </div>
                    <!-- Individual card End -->
                    <!-- Individual Card -->
                     <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                        <div class="card-body text-center">
                          <div class="mb-2">Add Book</div>
                          <a class="nav-link" href="<?php echo base_url('addbook');?>"><button class="btn btn-primary" id="toastr-3">Add</button></a>
                        </div>
                      </div>
                    </div>
                    <!-- Individual card End -->
                    <!-- Individual Card -->
                     <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                        <div class="card-body text-center">
                          <div class="mb-2">Manage Book</div>
                          <a class="nav-link" href="<?php echo base_url('#');?>"><button class="btn btn-primary" id="toastr-3">Manage</button></a>
                        </div>
                      </div>
                    </div>
                    <!-- Individual card End -->
                    <!-- Individual Card -->
                     <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                        <div class="card-body text-center">
                          <div class="mb-2">Delete Book</div>
                         <a class="nav-link" href="<?php echo base_url('index.php/Welcome/#');?>"> <button class="btn btn-primary" id="toastr-3">Delete</button></a>
                        </div>
                      </div>
                    </div>
                    <!-- Individual card End -->
     
                    <!-- Card End -->
               </div> 
             </div>

               </section>
<?php $this->load->view('frontend/footer'); ?>


       
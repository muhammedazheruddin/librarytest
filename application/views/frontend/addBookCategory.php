<?php $this->load->view('frontend/header'); ?>
<?php if($this->session->flashdata('book_add') != ""){?>
 <span class="alert bg-green alert21" id="infoi">
  <?php echo $this->session->flashdata('book_add');?>
 </span> 
<?php }?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="col-12 col-md-12 col-lg-12">
   <div class="card">
                  <div class="card-header">
                    <h4>Add Category</h4>
                  </div>
                  <div class="card-body">
                  	<form action="<?php echo base_url('index.php/Books/addCategory');?>" method="POST">
                    <div class="form-row">
                    	<div class="form-group col-md-6" style="display:">
                        <label for="inputEmail4">Category Id</label><span id="star">*</span>
                        <input type="text" class="form-control" id="cat_id" name="cat_id" required readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Category</label><span id="star">*</span>
                        <input type="text" class="form-control" id="" placeholder="Category Name" name="category_name" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="inputPassword4">Comments</label><span id="star">*</span>
                        <textarea class="form-control" id="" placeholder="Category Commments" name="cat_comments" cols="10" rows="5" ></textarea>
                        
                      </div>
                    </div> 
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                   </form>
                </div>
               </div>
          </section>
<?php $this->load->view('frontend/footer'); ?>


       
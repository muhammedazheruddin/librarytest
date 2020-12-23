<?php $this->load->view('frontend/header'); ?>
<?php if($this->session->flashdata('book_added') != ""){?>
 <span class="alert bg-orange alert21" id="infoi">
  <?php echo $this->session->flashdata('book_added');?>
 </span> 
<?php }?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Book Details</h4>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo base_url('index.php/Books/addnewbooks')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="book_title" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category_id" required>
                         <option value="">---Select Category---</option>
                                                <?php if(! empty($allCategories)){
                                                for($i=0; $i< sizeof($allCategories); $i++){?>
                                                <option value="<?php echo $allCategories[$i]['category_name'];?>"><?php echo $allCategories[$i]['category_name'];?></option>
                                            <?php }}?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" name="book_description" required></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Book Image</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" class="form-control" name="book_image" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Book URL</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="book_url" placeholder="https://" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
<?php $this->load->view('frontend/footer'); ?>


       
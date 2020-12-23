<?php $this->load->view('frontend/header'); ?>
<?php if($this->session->flashdata('flat_add') != ""){?>
 <span class="alert bg-orange alert21" id="infoi">
  <?php echo $this->session->flashdata('flat_add');?>
 </span> 
<?php }?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="col-12 col-md-6 col-lg-6">
   <div class="card">
                  <div class="card-header">
                    <h4>Manage Flats</h4>
                  </div>
                  <div class="card-body">
                  	<form action="<?php echo base_url('index.php/Flat/addFlat');?>" method="POST">
                    <div class="form-row">
                    	<div class="form-group col-md-6" style="display:none">
                        <label for="inputEmail4">Flat Id</label><span id="star">*</span>
                        <input type="text" class="form-control" id="flat_id" name="flat_id" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Flat No</label><span id="star">*</span>
                        <input type="number" class="form-control" id="" placeholder="Flat No" name="flat_no" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Floor</label><span id="star">*</span>
                        <input type="text" class="form-control" id="" placeholder="Floor" name="floor" required >
                      </div>
                    </div> 
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">Block</label><span id="star">*</span>
                       <select id="block" class="form-control" name="block" required>
                          <option value="">Choose...</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
							<option value="E">E</option>
							<option value="F">F</option>
							<option value="G">G</option>
							<option value="H">H</option>
							<option value="I">I</option>
							<option value="J">J</option>
							<option value="K">K</option>
							<option value="L">L</option>
							<option value="M">M</option>
							<option value="N">N</option>
							<option value="O">O</option>
							<option value="P">P</option>
							<option value="Q">Q</option>
							<option value="R">R</option>
							<option value="S">S</option>
							<option value="T">T</option>
							<option value="U">U</option>
							<option value="V">V</option>
							<option value="W">W</option>
							<option value="X">X</option>
							<option value="Y">Y</option>
							<option value="Z">Z</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">Flat Type</label><span id="star">*</span>
                        <select id="" class="form-control" name="flat_type" required>
                          <option value="">Choose...</option>
                          <option value="1BHK">1BHK</option>
							<option value="2BHK">2BHK</option>
							<option value="3BHK">3BHK</option>
							<option value="4BHK">4BHK</option>
							<option value="5BHK">5BHK</option>
							<option value="Duplex">Duplex</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                          <label for="inputEmail4">Maintenance Charge (&#8377;)</label>
                          <input type="number" class="form-control" id="" placeholder="maintenance charge" name="maintenance_charge" >
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


       
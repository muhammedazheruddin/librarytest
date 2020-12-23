<?php $this->load->view('frontend/header'); ?>
<?php if($this->session->flashdata('flat_list') != ""){?>
 <span class="alert bg-orange alert21" id="infoi">
  <?php echo $this->session->flashdata('flat_list');?>
 </span> 
<?php }?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <a href="<?php echo base_url('index.php/Welcome/addallotmentview');?>"><button class="btn btn-dark"><i data-feather="plus-circle"></i>&nbsp;Add Allotment</button></a>
      
            <div class="row" style="margin-top: 5px;">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Allotment List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Flat No</th>
                            <th>Block</th>
                            <th>Floor</th>
                            <th>Contact</th>
                            <th>Family Members</th>
                            <th>Permanent Address</th>
                            <th>Maintenance Charge (&#8377;)</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody >
                          <?php
                          foreach($allotment_details as $value): ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td><?php echo $value->flat_no; ?></td>
                                            <td><?php echo $value->block; ?></td>
                                            <td><?php echo $value->floor; ?></td>
                                            <td><?php echo $value->emc_contact; ?></td>
                                            <td><?php echo $value->family_members; ?></td>
                                            <td><?php echo $value->permanent_address; ?></td>
                                            <td><?php echo $value->maintenance_charges; ?></td>
                                            <td align="center"><a href="<?php echo base_url('index.php/Flat/updateAllotment');?>?FID=<?php echo $value->flat_id;?>"><button class="btn btn-icon btn-sm btn-dark"><i data-feather="arrow-right-circle"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
 
 <?php $this->load->view('frontend/footer'); ?>
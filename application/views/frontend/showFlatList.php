<?php $this->load->view('frontend/header'); ?>
<?php if($this->session->flashdata('visitor_add') != ""){?>
 <span class="alert bg-orange alert21" id="infoi">
  <?php echo $this->session->flashdata('visitor_add');?>
 </span> 
<?php }?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <a href="<?php echo base_url('index.php/Welcome/addflatview');?>"><button class="btn btn-dark"><i data-feather="plus-circle"></i>&nbsp;Add Flat</button></a>
      
            <div class="row" style="margin-top: 5px;">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Flat List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Flat No</th>
                            <th>Block</th>
                            <th>Flat Type</th>
                            <th>Floor</th>
                            <th>Maintenance Fee</th>
                            <th>Status</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody >
                          <?php
                          foreach($flat_details as $value): ?>
                                        <tr style="height: 5px;">
                                            <td><?php echo $value->flat_no; ?></td>
                                            <td><?php echo $value->block; ?></td>
                                            <td><?php echo $value->flat_type; ?></td>
                                            <td><?php echo $value->floor; ?></td>
                                            <td><?php echo $value->maintenance_charges; ?></td>
                                            <td><?php
                                            if($value->status == '0')
                                                echo "Free"; 
                                            else
                                                echo "Occupied";
                                            ?></td>
                              
                                            <td align="center"><a href="<?php echo base_url('index.php/Flat/updateFlat');?>?FID=<?php echo $value->flat_id;?>"><button class="btn btn-icon btn-sm btn-dark"><i data-feather="arrow-right-circle"></i></button></a>
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
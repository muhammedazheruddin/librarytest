<?php $this->load->view('frontend/header'); ?>
<style type="text/css">
  table{width:100%; border: 2px solid lightgrey; padding: 10px}
  tr,td{border: 1px solid lightgrey;padding: 5px;}
  #nameHeader{ padding: 5px; color:black; font-weight:lighter; }
  #nameHeader2{ padding: 5px; color:#6777ef; font-weight: bolder; font-size: 18px;}
  #nameHeader3{ padding: 5px; color:red; font-weight: bolder; font-size: 18px;}
  #allotDate{color:red;}

</style>
      <!-- Main Content -->
     
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row" style="margin-top: 5px;">
            <!--Single Blocks-->
     
            <?php foreach( $flats_and_blocks as $values):?>
              <div class="col-12">
                <div class="card">
                  <div class="card-body"> 
                   <div class="card-header">
                   </div>
                    <div class="table-responsive">
                   <table>
                      <tr>
                        <td colspan="4" align="center" id="nameHeader2"><?php echo $values->block."-".$values->flat_no;?> (Bill For: <?php echo date('M-Y')?>) </td>
                      </tr>
                      <tr>
                        <td id="nameHeader"> First Name</td>
                        <td><?php echo $values->first_name;?> </td>
                        <td id="nameHeader"> Last Name</td>
                        <td><?php echo $values->last_name;?> </td>
                      </tr>
                      <tr>
                        <td id="nameHeader"> Block</td>
                        <td><?php echo$values->block;?> </td>
                        <td id="nameHeader"> Flat Type</td>
                        <td><?php echo $values->flat_type;?> </td>
                      </tr>
                      <tr>
                        <td id="nameHeader"> Permanent Address</td>
                        <td colspan="3"> <?php echo $values->permanent_address;?> </td>
                        
                      </tr>
                      <tr>
                        <td id="nameHeader"> Emergency Contact</td>
                        <td> <?php echo $values->emc_contact;?></td>
                        <td id="nameHeader"> Family Members</td>
                        <td><?php echo $values->family_members;?> </td>
                      </tr>
                      <tr>
                        <td id="nameHeader"> Maintenance Charges</td>
                        <td> <?php echo $values->maintenance_charges;?></td>
                        <td id="nameHeader"> Allotted On</td>
                        <td id="allotDate"> <?php echo $values->allotted_on;?></td>
                      </tr>
                      <tr>
                        <td id="nameHeader"> Maintenance Status</td>
                        <?php if($values->maintenance_status == "" || $values->maintenance_status == "PENDING"){?>
                        <td colspan="3" style="color:red"> NOT PAID</td>
                        <?php } else { ?>
                          <td colspan="2" style="color:limegreen;"> <?php echo $values->maintenance_status;?></td>
                          <td><i data-feather="download"></i><a href=""> Invoice</a></td>
                        <?php }?>
                      </tr>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
            <?php endforeach?>
              <!--Single Blocks-->
            </div>
          </div>
        </section>
 
 <?php $this->load->view('frontend/footer'); ?>
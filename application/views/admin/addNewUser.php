                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <div class="col-md-6">
                                        <h4 class="page-title"><?=$pageTitle;?> </h4>
                                        <p><br><small>(Add / Edit User)</small></p>
                                    </div>
                                    <div class="col-md-6" align="right">
                                        <a href="<?=BASE_URL.ADMIN_PANEL;?>userListing">   

                                          <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Admin Users Listing</button>    </a>

                                          
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <!-- end row -->

                              <div class="row">
                                <div class="col-sm-12">
                                   <div class="col-xs-12">
                                    <?php
                                    $this->load->helper('form');
                                    $error = $this->session->flashdata('error');
                                    if($error)
                                    {
                                        ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <?php echo $this->session->flashdata('error'); ?>                    
                                        </div>
                                    <?php } ?>
                                    <?php  
                                    $success = $this->session->flashdata('success');
                                    if($success)
                                    {
                                        ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-box table-responsive">
                                    <!--<h4 class="m-t-0 header-title"><b><?=$page_title;?></b></h4>-->

                                    <form name="forminput" class="row form-horizontal" method="post" action="<?=BASE_URL.ADMIN_PANEL;?>addingNewUser"  enctype="multipart/form-data">

                                        <input type="hidden" name='<?=$this->security->get_csrf_token_name();?>' value="<?=$this->security->get_csrf_hash();?>">




                                        <div class="col-md-6">                                
                                            <div class="form-group">
                                                <label for="fname">Full Name</label>
                                                <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control required" id="password" name="password" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cpassword">Confirm Password</label>
                                                <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile Number</label>
                                                <input type="text" class="form-control required digits" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control required" id="role" name="role">
                                                    <option value="0">Select Role</option>
                                                    <?php
                                                    if(!empty($roles))
                                                    {
                                                        foreach ($roles as $rl)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>    



                                        <div class="box-footer">
                                            <input type="submit" class="btn btn-primary" value="Submit" />
                                            <input type="reset" class="btn btn-default" value="Reset" />
                                        </div>



                                    </form>
                                </div>
                            </div>
                        </div>



                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->





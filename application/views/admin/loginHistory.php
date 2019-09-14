                <!-- Start content -->
                <div class="content">
                  <div class="container">
                    <?php //echo phpinfo(); ?>

                    <div class="row">
                      <div class="col-xs-12">
                        <div class="page-title-box">
                          <h1>
                            <i class="fa fa-users"></i> Login History
                            <small>track login history</small>
                          </h1>
                          <h4 class="page-title"><?=$pageTitle;?> </h4>
                          <div class="col-md-12" align="right">
                            <a href="<?=BASE_URL.ADMIN_PANEL;?>userListing">   

                              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Admin Users Listing</button>    </a>


                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <div class="col-sm-12">

                            <?php if(!empty($_SESSION['sessionMsg'])){ ?>
                              <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                                <?php echo display_session_msg();?>
                              </div>
                            <?php } ?>  
                            <div class="card-box table-responsive">
                              <h4 class="m-t-0 header-title"><b><?=$pageTitle;?></b></h4>
                              <?php

                              if(!empty($_SERVER['REQUEST_URI'])){
                                $ruri_uid=substr($_SERVER['REQUEST_URI'],-1);
                              }
                              ?>
                              <div class="row">
                                <form action="<?=BASE_URL.ADMIN_PANEL;?>login-history/<?=$ruri_uid; ?>" method="POST" id="searchList">
                                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                  value="<?=$this->security->get_csrf_hash();?>" />

                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
                                    <div class="input-group">
                                      <input id="datepicker-autoclose" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control" placeholder="From Date" autocomplete="off" />
                                      <span class="input-group-addon"><label for="fromDate"><i class="fa fa-calendar"></i></label></span>
                                    </div> 
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
                                    <div class="input-group">
                                      <input id="dpacto" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control" placeholder="To Date" autocomplete="off" />
                                      <span class="input-group-addon"><label for="toDate"><i class="fa fa-calendar"></i></label></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                    <input id="searchText" type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control" placeholder="Search Text"/>
                                  </div>
                                  <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
                                    <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
                                  </div>
                                  <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">

                                  </div>
                                </form>
                              </div>
                              <br>
                              <h3 class="box-title"><?= !empty($userInfo) ? $userInfo->name." : ".$userInfo->email : "All users" ?></h3>
                              <form name="form1" method="post" action="<?=BASE_URL.ADMIN_PANEL;?>delete_all_history/<?=$ruri_uid; ?>"> 
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                value="<?=$this->security->get_csrf_hash();?>" />
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                     <th><input name="check_all" type="checkbox" class="all" id="check_all" value="1"></th>
                                     <th>Session Data</th>
                                     <th>Ip Address</th>
                                     <th>User Agent</th>
                                     <th>Agent Full String</th>
                                     <th>Platform</th>
                                     <th>Date Time</th>
                                     <th></th>
                                   </tr>
                                 </thead> 


                                 <tbody>
                                  <?php 
                                  if(!empty($userRecords))
                                  {
                                    foreach($userRecords as $result)
                                    {
                                      ?>   <tr>
                                        <td><input name="arr_cat_ids[]" class="check" type="checkbox" id="arr_cat_ids[]" 
                                          value="<?php echo $result->id;?>"></td>   



                                          <td><?=$result->sessionData;?></td>
                                          <td><?=$result->machineIp;?></td>
                                          <td><?=$result->userAgent;?></td>
                                          <td><?=$result->agentString;?></td>
                                          <td><?=$result->platform;?></td>
                                          <td><?=$result->createdDtm;?></td>


                                          <td><a class="deleteUser" href="javascript:void(0)" data-lastlogid="<?php echo $result->id;?>" title="Delete" style="color:#d73925;"><i class="fa fa-trash-o"></i></a> 

                                          </td>
                                        </tr>
                                      <?php } } ?>

                                    </tbody>
                                  </table>
                                  <table width="98%" border="0" cellpadding="0" cellspacing="0" class="mrg10T mrg10B"><tr>


                                    <td align="right">
                                      <input name="Delete" type="submit" id="Delete" value="Delete" class="btn btn-danger btn-sm" onClick="return confdel();">        </td>

                                    </tr> 


                                    <tr>

                                      <td align="left" > <br> <span class="disable_row" style="height:20px;">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Disabled.  </td>
                                    </tr>

                                  </table>
                                </form>
                              </div>
                            </div>
                          </div>



                          <!-- end row -->



                        </div> <!-- container -->

                      </div> <!-- content -->


                      <script>

                        jQuery(document).ready(function(){



                          jQuery(document).on("click", ".deleteUser", function(){
                            var lastlogid = $(this).data("lastlogid"),
                            hitURL = baseURL + adminPanel + "Delete/user_last_login/id/"+lastlogid,
                            currentRow = $(this);
                            var csrf_t_n="<?php echo $this->security->get_csrf_token_name(); ?>";
                            var csrf_t_h="<?php echo $this->security->get_csrf_hash(); ?>";
                            // alert(hitURL);
                            var confirmation = confirm("Are you sure to delete this data ?");

                            if(confirmation)
                            {
                              jQuery.ajax({
                                type : "POST",
                                dataType : "json",
                                url : hitURL,
                                data : {csrf_t_n : csrf_t_h }  
                              }).done(function(data){
                                console.log(data);
                                currentRow.parents('tr').remove();
                                if(data.status = true) { 
                                  alert("User successfully deleted");
                                  window.location.reload(); 
                                }
                                else if(data.status = false) { alert("User deletion failed"); }
                                else { alert("Access denied..!"); }
                              });
                            }
                          });


                          jQuery(document).on("click", ".searchList", function(){

                          });

                        });


                      </script>




























                    <!-- <script type="text/javascript">
                      jQuery(document).ready(function(){
                        jQuery('ul.pagination li a').click(function (e) {
                          e.preventDefault();            
                          var link = jQuery(this).get(0).href;
                          jQuery("#searchList").attr("action", link);
                          jQuery("#searchList").submit();
                        });

                        jQuery('.datepicker').datepicker({
                          autoclose: true,
                          format : "dd-mm-yyyy"
                        });
                        jQuery('.resetFilters').click(function(){
                          $(this).closest('form').find("input[type=text]").val("");
                        })
                      });
                    </script>
 -->
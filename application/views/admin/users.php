                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <?php //echo phpinfo(); ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"><?=$pageTitle;?> </h4>
                                    <div align="right">
                                        <a href="<?=BASE_URL.ADMIN_PANEL;?>addNewUser">   

                                          <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-plus"></i> New User</button>    </a>

                                          <div class="clearfix"></div>
                                      </div>
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

                                        <form name="form1" method="post" action="<?=BASE_URL.ADMIN_PANEL;?>activeDeactiveOrDeleteAllUsers">
                                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                            value="<?=$this->security->get_csrf_hash();?>" />
                                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                     <th><input name="check_all" type="checkbox" class="all" id="check_all" value="1"></th>
                                                     <th>Name</th>
                                                     <th>Email</th>
                                                     <th>Mobile</th>
                                                     <th>Role</th>
                                                     <th>Status</th>
                                                     <th>Added date</th>
                                                     <th>Updated date</th>
                                                     <th></th>
                                                 </tr>
                                             </thead> 


                                             <tbody>
                                                <?php 
                                                if(!empty($userRecords))
                                                {
                                                    foreach($userRecords as $result)
                                                    {
                                                    if($result->status == 0) { $css="disable_row"; /*$css="bg-orange";*/ } else {$css=" ";}
                                                    ?>   <tr class="<?php echo $css?>">
                                                        <td><input name="arr_cat_ids[]" class="check" type="checkbox" id="arr_cat_ids[]" value="<?php echo $result->userId;?>"></td> 
                                                        <td><?=$result->name;?></td>
                                                        <td><?=$result->email;?></td>
                                                        <td><?=$result->mobile;?></td>
                                                        <td><?=$result->role;?></td>
                                                        <td><?php if($result->status==1){echo "Active";}else{echo "Inactive";}?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($result->createdDtm)) ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($result->updatedDtm)) ?></td>

                                                        <td><a class="" href="<?=BASE_URL.ADMIN_PANEL.'login-history/'.$result->userId; ?>" title="Login history"><i class="fa fa-history"></i></a> | 
                                                            <a href="<?=BASE_URL.ADMIN_PANEL;?>editUser/<?php echo $result->userId;?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                                            &nbsp;
                                                            |&nbsp;
                                                            <a class="deleteUser" href="#" data-userid="<?php echo $result->userId; ?>" title="Delete" style="color:#d73925;"><i class="fa fa-trash-o"></i></a>

                                                        </td>
                                                    </tr>
                                                <?php } } ?>

                                            </tbody>
                                        </table>
                                        <table width="98%" border="0" cellpadding="0" cellspacing="0" class="mrg10T mrg10B"><tr>


                                          <td align="right">
                                              <input type="submit" name="Activate" value="Activate" class="btn btn-success btn-sm" onClick="return confact();"/>
                                              | <input type="submit" name="Deactivate" value="Deactivate" class="btn btn-success btn-sm Deactivate" 
                                              onclick="return confdeact();"/> 

                                              | <input name="Delete" type="submit" id="Delete" value="Delete" class="btn btn-danger btn-sm" onClick="return confdel();">        </td>

                                          </tr> 


                                          <tr>

                                            <td align="left" > <br> <span class="disable_row" style="height:20px;">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Disabled Users.  </td>
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
                        var userId = $(this).data("userid"),
                        hitURL = baseURL + adminPanel + "deleteUser",
                        currentRow = $(this);
                        var csrf_t_n="<?php echo $this->security->get_csrf_token_name(); ?>";
                        var csrf_t_h="<?php echo $this->security->get_csrf_hash(); ?>";

                        var confirmation = confirm("Are you sure to delete this user ?");

                        if(confirmation)
                        {
                            jQuery.ajax({
                                type : "POST",
                                dataType : "json",
                                url : hitURL,
                                data : { userId : userId, csrf_t_n : csrf_t_h }  
                            }).done(function(data){
                                console.log(data);
                                currentRow.parents('tr').remove();
                                if(data.status = true) { alert("User successfully deleted"); }
                                else if(data.status = false) { alert("User deletion failed"); }
                                else { alert("Access denied..!"); }
                            });
                        }
                    });


                    jQuery(document).on("click", ".searchList", function(){

                    });

                });


            </script>


                <!-- Start content -->
                <div class="content">
                    <div class="container">   


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <div class="col-md-6">
                                        <h4 class="page-title"><?=$pageTitle;?> </h4>
                                        <p><br><small>(Add / Edit File)</small></p>
                                    </div>
                                    <div class="col-md-6" align="right">
                                        <a href="#">   

                                            <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Admin File Upload</button>    </a>


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

                                        <form name="forminput" class="row form-horizontal" method="post" action="<?=BASE_URL.ADMIN_PANEL;?>fileuploading"  enctype="multipart/form-data">

                                            <input type="hidden" name='<?=$this->security->get_csrf_token_name();?>' value="<?=$this->security->get_csrf_hash();?>">




                                            <div class="col-md-6">                                
                                                <div class="form-group">
                                                    <label for="fname">Single File</label>
                                                    <input type="file" name="s_file">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Multiple File</label>
                                                    <input type="file" name="m_file[]" multiple="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Multiple File</label>
                                                    <input type="file" name="m_file[]" multiple="">
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





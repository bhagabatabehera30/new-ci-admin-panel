 <!-- ========== Left Sidebar Start ========== -->
 <div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="<?=BASE_URL.ADMIN_PANEL?>dashboard" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>

                <?php
                if($role == ROLE_ADMIN || $role == ROLE_MANAGER || $role == ROLE_EMPLOYEE)
                {
                  ?>

                  <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account"></i> <span> My Account</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?=BASE_URL.ADMIN_PANEL;?>profile">Profile</a></li>
                        <li><a href="<?=BASE_URL.ADMIN_PANEL;?>profile/changepass">Change Password</a></li>


                    </ul>
                </li>

                <?php
            }
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
              ?>
              
              <?php
          }
          if($role == ROLE_ADMIN)
          {
              ?>


              <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="<?=BASE_URL.ADMIN_PANEL;?>userListing">User Listing</a></li>
                    <li><a href="<?=BASE_URL.ADMIN_PANEL;?>addNewUser">Add New User</a></li>
                </ul>
            </li>

            <?php
        }
        ?>



        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Admin UI </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled">
                <li><a href="javascript:void(0);">Link1</a></li>
                <li><a href="javascript:void(0);">Link2</a></li>
            </ul>
        </li>

        <li>
            <a href="#" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Calendar </span></a>
        </li>







        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled">
                <li><a href="javascript:void(0);">Link1</a></li>
                <li><a href="javascript:void(0);">Link2</a></li>
            </ul>
        </li>

        <li class="menu-title">Extra</li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-arc"></i><span> Charts </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled">
                <li><a href="javascript:void(0);">Link1</a></li>
                <li><a href="javascript:void(0);">Link2</a></li>
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar -->
<div class="clearfix"></div>

<div class="help-box">
    <h5 class="text-muted m-t-0">For Help ?</h5>
    <p class=""><span class="text-custom">Email:</span> <br/> support@support.com</p>
    <p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+123) 123 456 789</p>
</div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
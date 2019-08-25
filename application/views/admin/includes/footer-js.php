   </div>
   <!-- END wrapper -->

   <script>
    var resizefunc = [];
  </script> 

  <!-- jQuery  --> 
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <!--<script src="<?=ASSETS_ADMIN?>assets/js/jquery.min.js"></script>-->
  <script src="<?=ASSETS_ADMIN?>assets/js/bootstrap.min.js"></script>
  <script src="<?=ASSETS_ADMIN?>assets/js/detect.js"></script>
  <script src="<?=ASSETS_ADMIN?>assets/js/fastclick.js"></script>
  <script src="<?=ASSETS_ADMIN?>assets/js/jquery.blockUI.js"></script>
  <script src="<?=ASSETS_ADMIN?>assets/js/waves.js"></script>
  <script src="<?=ASSETS_ADMIN?>assets/js/jquery.slimscroll.js"></script>
  <script src="<?=ASSETS_ADMIN?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?=ASSETS?>plugins/switchery/switchery.min.js"></script>

  <!-- Counter js  --> 
  <script src="<?=ASSETS?>plugins/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?=ASSETS?>plugins/counterup/jquery.counterup.min.js"></script>

  <!--Morris Chart-->
  <script src="<?=ASSETS?>plugins/morris/morris.min.js"></script>
  <script src="<?=ASSETS?>plugins/raphael/raphael-min.js"></script>
  <?php if(js_for_dashboard == 'Y'){ ?>
    <!-- Dashboard init -->
    <script src="<?=ASSETS_ADMIN?>assets/pages/jquery.dashboard.js"></script>
  <?php } ?>
  <?php if(css_for_add_edit_pages=='Y'){ ?>
   <script src="<?=ASSETS?>plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
   <script src="<?=ASSETS?>plugins/multiselect/js/jquery.multi-select.js"></script>
   <script src="<?=ASSETS?>plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
   <script src="<?=ASSETS?>plugins/select2/js/select2.min.js"></script> 
   <script src="<?=ASSETS?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
   <script src="<?=ASSETS?>plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
   <script src="<?=ASSETS?>plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
   <script src="<?=ASSETS?>plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
   <script src="<?=ASSETS?>plugins/autocomplete/jquery.mockjax.js"></script>
   <script src="<?=ASSETS?>plugins/autocomplete/jquery.autocomplete.min.js"></script>  
   <script src="<?=ASSETS?>plugins/autocomplete/countries.js"></script> 
   <script src="<?=ASSETS_ADMIN?>assets/pages/jquery.autocomplete.init.js"></script> 
   <script src="<?=ASSETS_ADMIN?>assets/pages/jquery.form-advanced.init.js"></script>   
   
   <!--<script src="<?=ASSETS?>plugins/ckeditor/ckeditor.js"></script>-->  

 <?php } ?>  
 <?php if(js_for_list_pages=='Y'){ ?>
  <script src="<?=ASSETS?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/dataTables.bootstrap.js"></script>

  <script src="<?=ASSETS?>plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/buttons.bootstrap.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/jszip.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/pdfmake.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/vfs_fonts.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/buttons.html5.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/buttons.print.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/dataTables.fixedHeader.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/dataTables.keyTable.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/responsive.bootstrap.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/dataTables.scroller.min.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/dataTables.colVis.js"></script>
  <script src="<?=ASSETS?>plugins/datatables/dataTables.fixedColumns.min.js"></script>

  <!-- init -->
  <script src="<?=ASSETS_ADMIN?>assets/pages/jquery.datatables.init.js"></script>
  <!--<script src="<?=ASSETS_ADMIN?>assets/js/icheck.min.js"></script>-->
<?php } ?>
<script src="<?=ASSETS?>plugins/tooltipster/tooltipster.bundle.min.js"></script>
<script src="<?=ASSETS_ADMIN?>assets/pages/jquery.tooltipster.js"></script>
<!-- App js -->
<script src="<?=ASSETS_ADMIN?>assets/js/jquery.core.js"></script>
<script src="<?=ASSETS_ADMIN?>assets/js/jquery.app.js"></script>
<?php if(js_for_list_pages=='Y'){ ?>
  <script>
    $(document).ready(function () { 
      $('#datatable').dataTable();
                 /*$('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
               $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "<?=ASSETS?>plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                  });*/ 
                  
                  
                });
    TableManageButtons.init();

/* $(document).ready(function () { 
 // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });
   
     $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         }
      });
   });
				
 });*/
 
</script>

<script type="text/javascript"  language="javascript"> 
  $('#check_all').click(function () {    
   $('input:checkbox').prop('checked', this.checked);    
 });
  
		/*function checkall(obj_frm,obj) {
	for(i=0;i<obj_frm.elements.length;i++)	{
		if(obj_frm.elements[i].type == "checkbox"){
		obj_frm.elements[i].checked = obj.checked;
		}
	}
}
function  del_prompt(obj_frm,val,act) {
	if(confirm("Are you sure you want to change the status to "+val)) {
		if(act!="") {
		obj_frm.action = act;
		}
		obj_frm.what.value=val;	
		obj_frm.submit();
	}
}*/


function confdel()
{ 

	var fl = 0;
	for(i = 0; i < (document.form1.elements.length); i++)
	{
   
		if((document.form1.elements[i].type=="checkbox") && (document.form1.elements[i].checked==true))
		{
			fl = 1;
			break;
		}
	}
	if(fl == 1)
	{
		if(confirm("Are you sure you want to delete?"))
		{
			fl = 1;
		}
		else
		{
			fl = 0;
		}
	}
	else
	{
		alert("Nothing to delete. To delete it you should first click on ckeck box!!!!!!");
		fl = 0;
	}
	if(fl == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}



function confact()
{ 

	var fl = 0;
	for(i = 0; i < (document.form1.elements.length); i++)
	{
   
		if((document.form1.elements[i].type=="checkbox") && (document.form1.elements[i].checked==true))
		{
			fl = 1;
			break;
		}
	}
	if(fl == 1)
	{
		if(confirm("Are you sure you want to Activate?"))
		{
			fl = 1;
		}
		else
		{
			fl = 0;
		}
	}
	else
	{
		alert("Nothing to Activate. To activate it you should first click on ckeck box!!!!!!");
		fl = 0;
	}
	if(fl == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}



function confdeact()
{ 

	var fl = 0;
	for(i = 0; i < (document.form1.elements.length); i++)
	{
   
		if((document.form1.elements[i].type=="checkbox") && (document.form1.elements[i].checked==true))
		{
			fl = 1;
			break;
		}
	}
	if(fl == 1)  
	{
		if(confirm("Are you sure you want to Deactivate?"))
		{
			fl = 1;
		}
		else
		{
			fl = 0;
		}
	}
	else
	{
		alert("Nothing to Deactivate. To deactivate it you should  first click on ckeck box!!!!!!");
		fl = 0;
	}
	if(fl == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}


</script>  

        <!--<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '10%' // optional
    });
	
	
   //  $('input').iCheck();
    $('input.all').on('ifChecked ifUnchecked', function(event) {
        if (event.type == 'ifChecked') {
            $('input.check').iCheck('check');
        } else {
            $('input.check').iCheck('uncheck');
        }
    });
   /* $('input.check').on('ifUnchecked', function(event) {
        $('input.all').iCheck('uncheck');
    });
	
	$('input.all').on('ifChecked', function(event) {
    $('input.check').iCheck('check');
});*/

/*$('input.all').on('ifUnchecked', function(event) {
    $('input.check').iCheck('uncheck');
});  */   
// Removed the checked state from "All" if any checkbox is unchecked
$('input.all').on('ifChanged', function(event){
    if(!this.changed) {
        this.changed=true;
        $('input.all').iCheck('check');
    } else {
        this.changed=false;
        $('input.all').iCheck('uncheck');
    }
    $('input.all').iCheck('update');
});
  

	
  });
</script>-->   
<?php } ?>



        <!--<script type="text/javascript">
var roxyFileman = '<?=CDN_PATH?>fileman/roxy-file-manager.html?integration=ckeditor';
$(function(){
  CKEDITOR.replace( 'Cms_Description1',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'}); 
});



	
</script>--> 

    <!-- <script type="text/javascript">
    var windowURL = window.location.href;
    pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
    var x= $('a[href="'+pageURL+'"]');
    x.addClass('active');
    x.parent().addClass('active');
    var y= $('a[href="'+windowURL+'"]');
    y.addClass('active');
    y.parent().addClass('active');
</script>
-->    











</body> 

</html>








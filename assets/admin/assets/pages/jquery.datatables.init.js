var handleDataTableButtons = function() {
        "use strict";
        0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
			 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: "lBfrtip",  //lBfrtip Bfrtip
            buttons: [{
                extend: "copy",
                className: "btn-sm"
            }, {
                extend: "csv",
                className: "btn-sm"
            }, {
                extend: "excel",
                className: "btn-sm"
            }, {
                extend: "pdf",
                className: "btn-sm"
            }, {
                extend: "print",
                className: "btn-sm"
            }],
			"columnDefs": [ {
          'targets': 0,
         'searchable': false,
         'orderable': false,
         'className': 'dt-body-center',
    } ],
			
            responsive: !0
        })
    },
    TableManageButtons = function() {
        "use strict";
        return {
            init: function() {
                handleDataTableButtons()
            }
        }
    }();
	
	
	
	
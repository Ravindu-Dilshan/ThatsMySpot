// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});
$(document).ready(function() {
  $('#dataTableReport').DataTable( {
      dom: 'Bfrtip',
      "paging": false,
      "info": false,
      buttons: [
          'pdf',
	  'csv'	
      ],
  } );
});

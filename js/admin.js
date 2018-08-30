$(document).ready(function(){
$('#sidebarCollapse').on('click', function(){
    $('#sidebar').toggleClass('active');
  })

  $('[data-toggle="tooltip"]').tooltip()

  //DataTable
  $('#example').DataTable({
    dom: 'Bfrtip',
    searching: false,
    columnDefs: [
      { "width": "15%", "targets": 3 },
      { "width": "10%", "targets": 5 }
    ]
  });

  $('#example1').DataTable({
    dom: 'Bfrtip',
    searching: false,
    columnDefs: [
      { "width": "15%", "targets": 3 },
      { "width": "10%", "targets": 5 }
    ]
  });

  $('#adminTab').click(function(){
    $('.admincls').show();
    $('.addDrivercls').hide();
    $('.viewDrivercls').hide();
  })
  $('#addDriverTab').click(function(){
    $('.addDrivercls').show();
    $('.viewDrivercls').hide();
    $('.admincls').hide();
  })
  $('#viewDriverTab').click(function(){
    $('.viewDrivercls').show();
    $('.addDrivercls').hide();
    $('.admincls').hide();
  })
  

  // $('adminTab').click(function(){
  //   $('adminContent').show();
  //   $('addDriver').hide();
  //   $('viewDriver').hide();
  // });
  // $('addDriverTab').click(function(){
  //   $('adminContent').hide();
  //   $('addDriver').show();
  //   $('viewDriver').hide();
  // });
  // $('viewDriverTab').click(function(){
  //   $('adminContent').hide();
  //   $('addDriver').hide();
  //   $('viewDriver').show();
  // });
});
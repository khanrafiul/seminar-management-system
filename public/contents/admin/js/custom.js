/* Datatable Js */
$(document).ready(function() {
  $('#datatable').dataTable( {
    "ordering": false
  } );
});
/* End Datatable Js */

// wizard form pic upload
$(document).ready(function() {
  // Initialise the wizard
  demo.initWizard();
  setTimeout(function() {
    $('.card.card-wizard').addClass('active');
  }, 600);
});
// wizard form pic upload end

// User soft delete
$(document).ready(function(){
  $(".softdelete").click(function(){
    var url=$(this).data('softdelete');
    $('#softdelete').attr('action',url);
  });
});
// User soft delete end

// User status approve
$(document).ready(function(){
  $(".userapprove").click(function(){
    var url=$(this).data('userstatus');
    $('#userapprove').attr('action',url);
  });
});
// User status approve end

// User status reject
$(document).ready(function(){
  $(".userreject").click(function(){
    var url=$(this).data('userstatus');
    $('#userreject').attr('action',url);
  });
});
// User status reject end

// User restore
$(document).ready(function(){
  $(".userrestore").click(function(){
    var url=$(this).data('userrestore');
    $('#userrestore').attr('action',url);
  });
});
// User restore end

// User hard delete
$(document).ready(function(){
  $(".harddelete").click(function(){
    var url=$(this).data('harddelete');
    $('#harddelete').attr('action',url);
  });
});
// User hard delete end

// Course hard delete
$(document).ready(function(){
  $(".coursedelete").click(function(){
    var url=$(this).data('coursedelete');
    $('#coursedelete').attr('action',url);
  });
});
// Course hard delete end

// Teacher hard delete
$(document).ready(function(){
  $(".teacherdelete").click(function(){
    var url=$(this).data('teacherdelete');
    $('#teacherdelete').attr('action',url);
  });
});
// Teacher hard delete end

// Teacher status approve
$(document).ready(function(){
  $(".teacherapprove").click(function(){
    var url=$(this).data('teacherstatus');
    $('#teacherapprove').attr('action',url);
  });
});
// Teacher status approve end

// Teacher status reject
$(document).ready(function(){
  $(".teacherreject").click(function(){
    var url=$(this).data('teacherstatus');
    $('#teacherreject').attr('action',url);
  });
});
// Teacher status reject end

// Seminar hard delete
$(document).ready(function(){
  $(".seminardelete").click(function(){
    var url=$(this).data('seminardelete');
    $('#seminardelete').attr('action',url);
  });
});
// Seminar hard delete end

// student status approve
$(document).ready(function(){
  $(".studentapprove").click(function(){
    var url=$(this).data('studentstatus');
    $('#studentapprove').attr('action',url);
  });
});
// student status approve end

// student status reject
$(document).ready(function(){
  $(".studentreject").click(function(){
    var url=$(this).data('studentstatus');
    $('#studentreject').attr('action',url);
  });
});
// student status reject end

// Student hard delete
$(document).ready(function(){
  $(".studentdelete").click(function(){
    var url=$(this).data('studentdelete');
    $('#studentdelete').attr('action',url);
  });
});
// Student hard delete end



// Date and Time picker
$(document).ready(function() {
  // initialise Datetimepicker and Sliders
  demo.initDateTimePicker();
  if ($('.slider').length != 0) {
    demo.initSliders();
  }
});
// Date and Time picker end

  
var parms = {
    "response": "true",
    "fields": [
      { name: "end_year", title: "END YEAR", type: "text" },
      { name: "intensity", title: "Intensity", type: "text" },
      { name: "sector", title: "Sector", type: "text" },
      { name: "insight", title: "Insight/SWOT", type: "text" },
      { name: "topic", title: "Topic", type: "text" },
      { name: "title", title: "Title", type: "text" },
      { name: "url", title: "URL", type: "text" },
      { name: "region", title: "Region", type: "text" },
      { name: "pestle", title: "Pestle", type: "text" }
    ],
    "rows": [],
    "pagination": { //For Pagination
      "ispagination": true,
      "totalrows": 99,
      "currentpage": 1,
      "showdatalimit": 10,
      "isselect": true,
      "selectoption": [10, 20, 50, 100]
    }
  };
  
  /***************************************************************** Filter Section *********************************************/
  /*Filters 
  var uid = '';
  var pid = '';
  var qty = '';
  var status= '';
  */
  
  /*
  function filter_val() {
    uid = $("#filter_uid").val();
    pid = $("#filter_pid").val();
    qty = $("#filter_qty").val();
    status = $("#filter_status").val();
  
  
  
  }
  
  $(document).on('click', '.apply_filter', function () {
    // filter_val();
    DocumentGrid();
  })
  $(document).on('click', '.clear_filter', function () {
    // $('#filter')[0].reset();
    // filter_val();
    DocumentGrid();
  })*/
  
  /***************************************************************** Filter Section END *********************************************/
  
  
  function DocumentGrid() {
    $.ajax({
        url: "Api.php/getdetails",
        method: "POST",
        data: {
            currentpage: parms.pagination.currentpage,
            showdatalimit: parms.pagination.showdatalimit
        },
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.response = true) {
                parms['rows'] = obj.details;
                parms['pagination']['totalrows'] = obj.totalrows;
                console.log(parms);
                $("#jsGrid").jsGrid({
                    width: "100%",
                    height: "auto",
                    filtering: false,
                    inserting: false,
                    editing: false,
                    sorting: true,
                    paging: true,
                    autoload: true,
                    pageSize: parms['pagination']['showdatalimit'],
                    pageButtonCount: 5,
                    deleteConfirm: "Are you sure?",
                    data: parms.rows,
                    fields: parms.fields,
                });
            } else {
                sweetalert("Error", obj.message, "error", "OK", "")
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
            Swal.fire({
                title: "Error",
                text: "An error occurred while retrieving data.",
                icon: "error",
                confirmButtonText: "OK",
            });
        }
    })
}
$(document).on('click', '#prevButton', function () {

    parms['pagination']['currentpage'] -=1;
    DocumentGrid();
  });
  $(document).on('click', '#nextButton', function () {
    parms['pagination']['currentpage'] += 1;
    DocumentGrid();
  });
  
  $(document).on('change', '.selectnumber', function () {
    parms['pagination']['showdatalimit'] = $(this).val();
    DocumentGrid();
});

// Call DocumentGrid function on page load
$(function() {
    DocumentGrid();
});



/******************************************************* Function Scripts ****************************************** */
jQuery(document).ready(function() {
    analatics();
    setInterval(() => {
        analatics();
    }, 5000);
})

function analatics() {
    jQuery.ajax({
        url: "Api.php/getanalatics",
        method: "POST",
        data: {},
        success: function(data) {
            var obj = JSON.parse(data);
           // console.log(obj);
            if (obj.response == true) {

                $(".totalenteries").html(obj.totalenteries);
                $(".lastyears").html(obj.lastyears);
                $(".total_countries").html(obj.total_countries);
                $(".asiancountries").html(obj.asiancountries);
            } else {
                $('#grid').html("No Record Found.");
            }
        }
    })
}

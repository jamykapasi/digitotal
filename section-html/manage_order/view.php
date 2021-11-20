<div class="col py-3 content">
<h2 class="heading" style="letter-spacing: 2px;">MANAGE ORDERS</h2>
<div class="row">
<div class="operation4">

   <div id="datepicker" class="input-group col-lg-3 date date_manage" data-date-format="dd-mm-yyyy">
      <input class="form-control filter1" id="created_date" name="created_date" type="text" placeholder="Filter by [Date]" />
      <span class="input-group-addon calendar"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
   <div class="filter2 col-lg-3">
      <select name="filter" id="managefilter">
         <option value="">Status</option>
         <option value="p">Pending</option>
         <option value="c">Completed</option>
      </select>
   </div>
   <div class="input-group search_cust3 col-lg-3">
      <div class="input-group-btn search-panel">
         <button type="button" class="btn btn-default dropdown-toggle searchbtn" data-toggle="dropdown">
         <span id="search_concept">Search by</span> <i class="fas fa-caret-down caret_style"></i></span>
         </button>
         <ul class="dropdown-menu scrollable-dropdown" role="menu">
            <li><a href="#">Automotive Accesories</a></li>
            <li><a href="#">Cell Phone Accesories</a></li>
            <li><a href="#">Computer Accesories</a></li>
            <li><a href="#">Health and Personal Care</a></li>
         </ul>
      </div>
      <input type="hidden" name="search_param" value="all"
         id="search_param">
      <input type="text" class="form-control search3" name="search" id="search" placeholder="Search">
      <span class="input-group-btn">
      <button class="btn btn-default search_icon" type="button">
      <span class="glyphicon glyphicon-search"></span>
      </button>
      </span>
   </div>

   <div class=" ship1 col-lg-3">
      <button class="btn1">SHIP</button>
      <button class="btn1">CANCEL</button>
   </div>
</div>
<!-----second main div start ---->
<div class="second-row col-lg-10">
   <label class="show">Show</label>
   <select name="page_rec" id="page_rec">
      <option value="10" selected>10</option>
      <option value="20">20</option>
      <option value="30">30</option>
   </select>
   <label class="show">Result</label>
   <div class="pagination1 pagination:number active"></div>
   <!-- <div class="pagination:number arrow">
      <svg width="18" height="18">
        <use xlink:href="#right" />
      </svg>
      </div> -->
   <svg class="hide">
      <symbol id="left" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
      </symbol>
      <symbol id="right" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </symbol>
   </svg>
</div>
<!------------------code for table ----------------------- -->
<table id="t01" class="table2 table-style  manage-table col-lg-10">
</table>
<div>
   <div class="modal fade edit-record-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <div class="text-center">
                  <h5 class="modal-title" id="exampleModalLongTitle">VIEW / EDIT ORDERS</h5>
                  <p class="modal-description">Please preview you customer's address.</p>
                  <p class="modal-description">Fix it to avoid delay/failure in delivery.</p>
                  <form action="{SITE_URL}manage_order" method="post" enctype="multipart/form-data">
                     <div class="customer-details-content">
                        <div class="row">
                           <div class="col col-12 col-md-6">
                              <input type="text" id="customer_name" name="customer_name"class="form-control" placeholder="Customer Name*" value="">
                           </div>
                           <div class="col col-12 col-md-6">
                              <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Customer Phone*" value="">
                           </div>
                           <div class="col col-12 col-md-6">
                              <input type="text" id="customer_email" name="customer_email" class="form-control" placeholder="Customer Email Address" value="">
                           </div>
                           <div class="col col-12 col-md-6">
                              <input type="text" id="customer_address" name="customer_address" class="form-control" placeholder="Address*" value="">
                           </div>
                           <div class="col col-12 col-md-6">
                              <input type="text" id="customer_pincode" name="customer_pincode" class="form-control" placeholder="Pincode*" value="">
                           </div>
                           <div class="col col-12 col-md-6">
                              <input type="text" id="customer_city" name="customer_city" class="form-control" placeholder="City*" value="">
                           </div>
                           <div class="col col-12 col-md-6">
                              <input type="text" id="customer_state" name="customer_state" class="form-control" placeholder="State*" value="">
                           </div>
                           <div class="col col-12 col-md-12">
                              <input type="hidden" id="customer_id" name="customer_id" class="form-control" value="">
                              <input type="hidden" id="action" name="action" class="form-control" value="editUser">
                              <button type="submit" id="edit" name="edit" class="btn2">UPDATE</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(function () {
       $("#datepicker").datepicker({ 
             autoclose: true, 
             todayHighlight: true
       })
   });
   
   $(document).on("click","#userData",function() {
       var id = $(this).data('id');
       $.ajax({
           type:"POST",
           dataType : 'json',
           url: window.location,
           data : {"action":"viewUser",id},
           success: function(res)
           {
             $("#customer_name").val(res.customer_name);
             $("#customer_phone").val(res.customer_phone);
             $("#customer_email").val(res.customer_email);
             $("#customer_address").val(res.customer_address);
             $("#customer_pincode").val(res.customer_pincode);
             $("#customer_city").val(res.customer_city);
             $("#customer_state").val(res.customer_state);
             $("#customer_id").val(res.customer_id);
           }
       });
   });
   
    $(document).on("click","#deleteOrder",function() {
       var id = $(this).data('id');
   
       var del = confirm("Are you sure you want to delete?");
         if (del)
         $.ajax({
             type:"POST",
             dataType : 'json',
             url: window.location,
             data : {"action":"deleteOrder",id},
             success: function (response) 
             {
              if(response.status == 1)
               { 
                 window.location = "{SITE_URL}manage_order";   
               } 
               else 
               {
                 toastr['error'](response.message);
               }
             },
         }); 
    });
   
    $(document).on("click","#ship",function() {
       var id = $(this).data('id');
   
       $.ajax({
           type:"POST",
           dataType : 'json',
           url: window.location,
           data : {"action":"changeStatus",id},
           success: function(res)
           {
            window.location = "{SITE_URL}manage_order";
           }
       }); 
    });
   
     $(document).ready(function()
     {
       loadRecord();
     });
   
     function loadRecord(viewall)
     {   

      var date = $('#created_date').val();
      var status = $('#managefilter').val();
      var keyword = $('#search').val();
      var page_rec = $('#page_rec').val();

      if(viewall == 'viewall'){
         var page_rec = 0;
      }

       $.ajax({
           type:"POST",
           dataType : 'json',
           url: window.location,
           data : {"action":"getRecord",'date':date,'status':status,'keyword':keyword,'page_rec':page_rec},
           success: function(res)
           {  
             $('.manage-table').html(res.userTable);
             // $(".ProductOrderPagination").empty();
             // $('.ProductOrderPagination').unbind('page');
             //ProductOrderPagination(res.total_page, page);
           }
       });

         $('#created_date,#managefilter,#page_rec').on('change', function(){
           //alert();
           loadRecord();
         });

         $('#search').on('keyup', function(){
           //alert();
           loadRecord();
         });
         
         $('document').on('click','#viewall', function(){
           //alert();
           loadRecord('all');
         });
     }
</script>
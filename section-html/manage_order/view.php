<div class="col py-3 content">
<h2 class="heading" style="letter-spacing: 2px;">MANAGE ORDERS</h2>
<div class="row">
<div class="operation4">

   <div id="datepicker" class="input-group col-lg-3 date" data-date-format="dd-mm-yyyy">
      <input class="form-control filter1" id="created_date" name="created_date" type="text" placeholder="Filter by [Date]" />
      <span class="input-group-addon calendar"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
   <div class="col-lg-2">
      <select name="filter" id="managefilter">
         <option value="">Status</option>
         <option value="p">Pending</option>
         <option value="c">Completed</option>
      </select>
   </div>

    <div class="col-lg-4" style="display: flex;">
        <div class="input-group-btn search-panel search-by-panel" style="border-bottom: cyan solid 2px !important;  margin: 0 !important;">
            <button type="button" class="btn btn-default dropdown-toggle searchbtn" data-toggle="dropdown" style="height: 100%;background-color: #fff;">
                <span id="search_concept">Search by</span>
            </button>
            <ul class="dropdown-menu scrollable-dropdown" role="menu" style="margin: 0;">
            <li><a href="#">Order ID</a></li>
            <li><a href="#">Customer Name</a></li>
            <li><a href="#">Order Date & Time</a></li>
            <li><a href="#">Customer Details</a></li>
          </ul>
        </div>
        <div class="input-group" style="width: 100%; border-bottom: cyan solid 2px !important;">
      
          <input type="hidden" name="search_param" value="all"
             id="search_param">
          <input type="text" class="form-control search3" name="search" id="search" placeholder="Search">
          <span class="input-group-btn">
          <button class="btn btn-default search_icon" type="button">
          <span class="glyphicon glyphicon-search"></span>
          </button>
          </span>
       </div>
    </div>

    <script>
        $(document).ready(function(e){
            $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            
            $('.input-group #search_param').val(param);
            });
            $('.search-panel1 .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();

            var param1 = $(this).attr("href").replace("#","");
            var concept1 = $(this).text();
            $('.search-panel1 span#status').text(concept1);
            
            $('.input-group #search_param1').val(param1);
            
            });
        });
        var a = document.getElementsByTagName('a').item(0);
        $(a).on('keyup', function(evt){
        console.log(evt);
        if(evt.keycode === 13){

        alert('search?');
        } 
        }); 
    </script>

   <div class=" ship1 col-lg-3">
      <button class="btn1" data-toggle="modal" id="orderShip" data-target="#SelectAddressModalCenter">SHIP</button>
      <button class="btn1">CANCEL</button>
   </div>
</div>
<!-----second main div start ---->
<div class="second-row col-lg-10" style="align-items: center;">
   <label class="show">Show</label>
   <select name="page_rec" id="page_rec">
      <option value="10" selected>10</option>
      <option value="20">20</option>
      <option value="30">30</option>
      <option value="all">All</option>
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
<div class="manage-order-content">
    <table id="t01" class="table2 table-style  manage-table col-lg-10">
    </table>
</div>
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


<!-- Adress Select Modal  -->
    <div class="modal fade edit-record-modal select-address-modal" id="SelectAddressModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header border-0">
                        <span class="cross-circle1 close ms-auto" data-dismiss="modal">
                            <a href="#" class="cross-icon"> 
                            <i class="fas fa-times-circle"></i></a>
                        </span>
                    </div>
                    <form class="selectAddress" id="selectAddress" action="{SITE_URL}manage_order" method="post" enctype="multipart/form-data">
                        <h3 class="modal-title text-center w-100 m-0">SELECT PICKUP ADDRESS</h3>
                        <div class="row custfields style2 " style="margin-top: 5%;">
                            <label class="col-4" style="font-size:0.9rem;font-weight: 500;">Add New Address?</label>
                            <button class="btn2 btn-next update-btn btn-hv col-4" data-dismiss="modal" data-toggle="modal" data-target="#SelectModalCenter" style="    padding: 5px; width: 18%;margin: -5px 10px 0px auto;">SELECT</button>
                             %ADDRESS%
                            <div>
                                <label class="cod">
                                <input type="radio" class="cod" name="payment_method" value="c" required>COD</label>
                                <label class="prepaid">
                                <input type="radio" class="prepaid" name="payment_method" value="p" required>Prepaid</label>
                            </div>
                            <input type="hidden" name="ids[]" id="ids" value="">
                            <input type="hidden" name="order_id" id="order_id" value="">
                            <input type="hidden" name="action" value="orderShip">
                            <button type="submit" class="btn2 btn-next update-btn btn-hv col-4" style="width: 18%;margin: 20px auto 0px auto;" name="submitAddress">DONE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Add New Adreess Modal -->
    <div class="modal fade edit-record-modal" id="SelectModalCenter" tabindex="-1" role="dialog" aria-labelledby="SelectModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <span class="cross-circle1 close ms-auto" data-dismiss="modal">
                        <a href="#" class="cross-icon"> 
                        <i class="fas fa-times-circle"></i></a>
                    </span>
                </div>
                <form class="addAddress" id="addAddress" action="{SITE_URL}create_order" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text-center">
                            <h5 class="modal-title" >ADD NEW PICKUP ADDRESS</h5>
                            <div class="customer-details-content">
                                <div class="row">
                                     <div class="col col-12 col-md-6">
                                         <input type="text" id="name" name="name" class="form-control" placeholder="Full Name*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Phone*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" class="form-control" id="flat_no" name="flat_no" placeholder="Flat No.& Building Name*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" class="form-control" id="locality" name="locality" placeholder="Road, Locality">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" class="form-control" id="Pincode" name="pincode" placeholder="Pincode*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" class="form-control" id="area" name="area" placeholder="Area*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="checkbox"  id="SaveDefault"  name="default_address" style="margin-left: -30px;">
                                         <label for="SaveDefault">Save as default address</label>
                                     </div>
                                     <div class="col col-12 col-md-12">
                                        <input type="hidden" name="action" value="AddNewAddress">
                                        <button class="btn2" type="submit"  id="submitAddress" name="submitAddress">SAVE</button>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <!-- Edit Adreess Modal -->
    <div class="modal fade edit-record-modal " id="editAddressModalCenter" tabindex="-1" role="dialog" aria-labelledby="editAddressModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <span class="cross-circle1 close ms-auto" data-dismiss="modal">
                        <a href="#" class="cross-icon"> 
                        <i class="fas fa-times-circle"></i></a>
                    </span>
                </div>
                <form class="editAddress" id="editAddress" action="{SITE_URL}create_order" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text-center">
                            <h5 class="modal-title" >EDIT PICKUP ADDRESS</h5>
                            <div class="customer-details-content">
                                <div class="row">
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="name" id="editName" class="form-control" placeholder="Full Name*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="phone_no" id="editPhone_no" class="form-control" placeholder="Phone*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" name="flat_no" id="editFlat_no" class="form-control" placeholder="Flat No.& Building Name*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" name="locality" id="editLocality" class="form-control" placeholder="Road, Locality">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" name="landmark" id="editLandmark" class="form-control" placeholder="Landmark*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="pincode" id="editPincode" class="form-control" placeholder="Pincode*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="area" id="editArea" class="form-control" placeholder="Area*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="checkbox" name="editDefault_address" id="default_address" placeholder="Area*" id="SaveDefault" style="margin-left: -30px;">
                                         <label for="SaveDefault">Save as default address</label>
                                     </div>
                                     <div class="col col-12 col-md-12">
                                        <input type="hidden" name="id" id="editAddress_id">
                                        <input type="hidden" name="action" value="editAddress">
                                        <button class="btn2" type="submit"  id="editAddress" name="editAddress">SAVE</button>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
   
    $(document).on("click","#orderShip",function() {
      var myCheckboxes = new Array();

        $("input:checked").each(function() {
           myCheckboxes.push($(this).attr('data-id'));
        });

        $.ajax({
           type:"POST",
           dataType : 'json',
           url: window.location,
           data : {"action":"orderTotal",myCheckboxes},
           success: function(response)
           {
                if(response.status == 1)
                { 
                  if (response.total >= 5000) 
                  {
                    $('.cod').hide();
                    $('#ids').val(response.orderid);
                  }
                  else
                  {
                    $('#ids').val(response.orderid);
                  }  
                } 
                else 
                {
                  window.location = "{SITE_URL}manage_order";
                }
           }
       });
    });

    $(document).on("click","#ship",function() {
       var id = $(this).data('id');

       $.ajax({
           type:"POST",
           dataType : 'json',
           url: window.location,
           data : {"action":"changeStatus",id},
           success: function(response)
           {
                if(response.status == 1)
                { 
                  if (response.total >= 5000) 
                  {
                    $('.cod').hide();
                    $('#order_id').val(response.id);
                  }
                  else
                  {
                    $('#order_id').val(response.id);
                  } 
                } 
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
      var category = $('#category').val();

      if(viewall == 'viewall'){
         var page_rec = 0;
      }

       $.ajax({
           type:"POST",
           dataType : 'json',
           url: window.location,
           data : {"action":"getRecord",'date':date,'status':status,'keyword':keyword,'category':category,'page_rec':page_rec},
           success: function(res)
           {  
             $('.manage-table').html(res.userTable);
             // $(".ProductOrderPagination").empty();
             // $('.ProductOrderPagination').unbind('page');
             //ProductOrderPagination(res.total_page, page);
           }
       });
     }
     $('#created_date,#managefilter,#page_rec,#category').on('change', function(){
      //alert();
      loadRecord();
   });

   $('#search').on('keyup', function(){
      //alert();
      loadRecord();
   });
   
   $('#product_category').on('click', function(){
      //alert();
      loadRecord();
   });
</script>
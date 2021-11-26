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

   <div class="col-lg-2">
      <select name="category" id="category">
         <option value="">Category</option>
         %HTML%
      </select>
   </div>
   
   <div class="input-group col-lg-3">
      
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
      <button class="btn1" data-toggle="modal" data-target="#SelectAddressModalCenter">SHIP</button>
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
                    <h3 class="modal-title text-center w-100 m-0">SELECT PICKUP ADDRESS</h3>
                    <div class="row custfields style2 " style="margin-top: 5%;">
                        <label class="col-4" style="font-size:0.9rem;font-weight: 500;">Add New Address?</label>
                        <button class="btn2 btn-next update-btn btn-hv col-4" data-dismiss="modal" data-toggle="modal" data-target="#SelectModalCenter" style="    padding: 5px; width: 18%;margin: -5px 10px 0px auto;">SELECT</button>
                            <div style="display: flex; padding: 10px 15px 60px 15px; border: 1px solid #9ce1d0;margin: 2% 0% 0% 0%; align-items: flex-start;">
                                <span class="checkmark">
                            <input type="radio" id="4" class="pickup_address" name="pickup_address" style="margin: 10px -23px 0px 3px;" value="4">
                            </span><label for="4" class="custinput placeholder col-2" style="margin-left: 20px !important;padding-top:5px;    cursor: pointer;">Address4</label>
                            <label class="placeholder col-2" style="margin: 5px 2px 2px 8px !important;">+918128430482</label>
                            	
                            <a href="#editAddressModalCenter?id=4" class="edt-btn view" id="editAddress" data-id="4" data-dismiss="modal" data-toggle="modal" data-target="#editAddressModalCenter" style="margin-left: auto; padding-left: 10px;">EDIT | </a>
                            <a href="javascript:void()" data-id="4" id="deleteAddress" style="padding-left: 5px;" class="text-danger view"> REMOVE</a>
                        </div>
                        <p style="    position: relative; width: calc(100% - 40px); top: -44px; left: 10px; font-size: 14px; margin-bottom: 0;" class="placeholder">20 Near PostOffice, Fedra Road, Limbdi, Limbdi, 363421</p><div style="display: flex; padding: 10px 15px 60px 15px; border: 1px solid #9ce1d0;margin: 2% 0% 0% 0%; align-items: flex-start;">
                            <span class="checkmark">
                            <input type="radio" id="5" class="pickup_address" name="pickup_address" style="margin: 10px -23px 0px 3px;" value="5">
                            </span><label for="5" class="custinput placeholder col-2" style="margin-left: 20px !important;padding-top:5px;    cursor: pointer;">Address5</label>
                            <label class="placeholder col-2" style="margin: 5px 2px 2px 8px !important;">+918457968545</label>
                            	<button class="btn2 btn-next update-btn btn-hv dft-btn col-2" style="margin: 0 10px 0px auto;">DEFAULT</button>
                            <a href="#editAddressModalCenter?id=5" class="edt-btn view" id="editAddress" data-id="5" data-dismiss="modal" data-toggle="modal" data-target="#editAddressModalCenter" style="margin-left: auto; padding-left: 10px;">EDIT | </a>
                            <a href="javascript:void()" data-id="5" id="deleteAddress" style="padding-left: 5px;" class="text-danger view"> REMOVE</a>
                        </div>
                        <p style="    position: relative; width: calc(100% - 40px); top: -44px; left: 10px; font-size: 14px; margin-bottom: 0;" class="placeholder">20, naroda road, new naroda, new naroda, 363521</p>
                        
                        <div>
                            <label class="cod">
                            <input type="radio" name="payment_method" value="c">COD</label>
                            <label class="cod">
                            <input type="radio" name="payment_method" value="p">Prepaid</label>
                        </div>
                        
                        <button class="btn2 btn-next update-btn btn-hv col-4" data-dismiss="modal" data-toggle="modal" data-target="" style="width: 18%;margin: 20px auto 0px auto;">Done</button>
                    </div>
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
      alert();
      loadRecord();
   });
</script>
<nav class="navbar">
    <div class="container">
      <a class="navbar-brand" href="{SITE_URL}dashboard">
        <img src="{SITE_IMG}Bhejooo_logo_dashboard.png" alt="" class="logo" width="90%">
      </a>
      <div class="right">
        <button type="button" class="btn wallet-btn me-md-2"><img src="{SITE_IMG}wallet.png" width="16px" class="d-inline-block align-text-top">&#8203; &#8203; ₹ %WALLET_BALANCE%</button>
        <a href="#" data-toggle="modal" data-target="#rechargeModalCenter" class="btn btn-outline white-btn">+ RECHARGE</a>
        <a class="navbar-brand" href="#">
          <img src="{SITE_IMG}user.png" alt="" width="35px" class="">
          <span><?php echo ucfirst($_SESSION["name"]);?></span>
        </a>
      </div>
    </div>
 </nav>

<div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-4 col-xl-2 px-sm-2 px-0 sidebar">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <div class="channel">
            <div class="module">
              <h6>CHANNEL <br> INTEGRATION</h6>
            </div>
          </div>
         
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <!-- 
             -->
            <li>
              <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <img src="{SITE_IMG}approval.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline">Orders</span> </a>
              <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="w-100 ms-4">
                  <a href="{SITE_URL}manage_order" class="nav-link px-0"> <span class="d-none d-sm-inline sub-text">Manage Orders</span></a>
                </li>
                <li class="ms-4">
                  <a href="{SITE_URL}create_order" class="nav-link px-0"> <span class="d-none d-sm-inline sub-text">Create Orders</span></a>
                </li>
              </ul>
            </li>

            <li>
              <a href="{SITE_URL}weight_discrepancy" class="nav-link px-0 align-middle">
                <img src="{SITE_IMG}weight-balance-green.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline main-text">Weight Discrepancy</span></a>
            </li>
            <li>
              <a href="{SITE_URL}product_category" class="nav-link px-0 align-middle">
                <img src="{SITE_IMG}weight-balance-green.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline main-text">Product Category</span></a>
            </li>
            <li>
              <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                <img src="{SITE_IMG}money-flow-green.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline main-text">Pricing and Billing</span></a>
              <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <li class="w-100 ms-4">
                  <a href="{SITE_URL}shipping_rate" class="nav-link px-0 sub-menu-text"> <span class="d-none d-sm-inline sub-text">Shipping Rate</span></a>
                </li>
                <li class="ms-4">
                  <a href="{SITE_URL}shipping_rate_calculator" class="nav-link px-0 sub-menu-text"> <span class="d-none d-sm-inline sub-text">Shipping Rate Calculator</span></a>
                </li>
                <li class="ms-4">
                  <a href="{SITE_URL}credits_summary" class="nav-link px-0 sub-menu-text"> <span class="d-none d-sm-inline sub-text">Credits Summary</span></a>
                </li>
                <li class="ms-4">
                  <a href="{SITE_URL}payment_history" class="nav-link px-0 sub-menu-text"> <span class="d-none d-sm-inline sub-text">Payment History</span></a>
                </li>
              </ul>
            </li>
            <li>
              <a href="{SITE_URL}report" class="nav-link px-0 align-middle">
                <img src="{SITE_IMG}statistics-green.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline main-text">Reports</span></a>
            </li>
            <li>
              <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <img src="{SITE_IMG}setting-green.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline">Settings</span> </a>
              <ul class="collapse show nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                <li class="w-100 ms-4">
                  <a href="{SITE_URL}courier_partner_priority" class="nav-link px-0"> <span class="d-none d-sm-inline sub-text">Courier Partner Priority</span></a>
                </li>
                <li class="ms-4">
                  <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline sub-text">Shipping Label</span></a>
                </li>
                <li class="ms-4">
                  <a href="{SITE_URL}notification" class="nav-link px-0"> <span class="d-none d-sm-inline sub-text">Notifications</span></a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#" class="nav-link px-0 align-middle">
                <img src="{SITE_IMG}distributed-green.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline">API Integration</span> </a>
            </li>

            <li>
              <a href="{SITE_URL}logout" class="nav-link px-0 align-middle">
                <img src="{SITE_IMG}distributed-green.svg" alt="" width="25px" class="svg"> <span class="ms-1 d-none d-sm-inline">Logout</span> </a>
            </li>

          </ul>
          <hr>
        </div>
      </div>

      <div class="modal fade recharge-record-modal" id="rechargeModalCenter" tabindex="-1" role="dialog" aria-labelledby="rechargeModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5 class="modal-title" id="rechargeModalLongTitle">RECHARGE ACCOUNT</h5>
                          <form action="{SITE_URL}dashboard" method="post" name="frmCont" id="frmCont" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">
                            <div class="customer-details-content">
                                <div class="row">
                                     <div class="col col-12 col-md-6">
                                         <input type="text" id="amount" name="amount"class="form-control" placeholder="Enter Amount*" value="">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                        <input type="hidden" name="action" value="payment">
                                        <button type="submit" id="recharge" name="recharge" class="btn2">RECHARGE</button>
                                     </div>
                                </div>
                            </div>
                          </form>  
                    </div>
                </div>
            </div>
        </div>
      </div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!-- <button id="rzp-button1">Pay</button> -->
<script type="text/javascript">

  $(document).on('submit', '#frmCont', function (e) {
      
      $("#frmCont").validate({
          ignore: [],
          errorClass: 'help-block',
          errorElement: 'span',
          rules: {
            amount:
            {
              required:true,
              min:500,
              digits: true,
            },
          },
          messages: {
              amount:{
                required:"Please enter amount.",
                min:"Please enter minimum 500"
              },
          },
          highlight: function (element) {
              $(element).closest('.form-control').addClass('has-error');
          },
          unhighlight: function (element) {
              $(element).closest('.form-group').removeClass('has-error');
          },
          errorPlacement: function (error, element) {
              if (element.attr("data-error-container")) {
                  error.appendTo(element.attr("data-error-container"));
              } else {
                  error.insertAfter(element);
              }
          }
      });

      if ($("#frmCont").valid()) {
          return true;
      } else {
          return false;
      }
  });

  // var options = {
  //   "key": "rzp_test_mAVEYHRfcV2jOh", // Enter the Key ID generated from the Dashboard
  //   "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
  //   "currency": "INR",
  //   "name": "Acme Corp",
  //   "description": "Test Transaction",
  //   "image": "https://example.com/your_logo",
  //   "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
  //   "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
  //   "prefill": {
  //       "name": "Gaurav Kumar",
  //       "email": "gaurav.kumar@example.com",
  //       "contact": "9999999999"
  //   },
  //   "notes": {
  //       "address": "Razorpay Corporate Office"
  //   },
  //   "theme": {
  //       "color": "#3399cc"
  //     }
  // };
  
  // var rzp1 = new Razorpay(options);
  // document.getElementById('recharge').onclick = function(e){
  //     rzp1.open();
  //     e.preventDefault();
  // }
</script>
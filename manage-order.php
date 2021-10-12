<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    

  <link rel="stylesheet" href="css/channel-styles.css">
	
<link rel="stylesheet" type="text/css" href="css/style2.css">	

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>





  
  	
<title>Manage Orders</title>
</head>
<body>
	<?php  include("inc/header.php"); ?> 

  <?php  include("inc/sidebar.php"); ?>

	
	 <div class="col py-3 content">
	 
	<h2 class="heading" style="letter-spacing: 2px;">MANAGE ORDERS</h2>

	<div class="row">
	
		<div class="operation4">
		
			<div id="datepicker" class="input-group col-lg-3 date date_manage" data-date-format="dd-mm-yyyy">
        			<input class="form-control filter1" type="text" value="Filter by [Date]" />
        			<span class="input-group-addon calendar"><i class="glyphicon glyphicon-calendar"></i></span>
    			</div>
	
			<div class="filter2 col-lg-3">
		
			    <select name="filter" id="managefilter">
						<option value="">Status</option>
						<option value="approve">Approve</option>
						<option value="Rejected">Rejected</option>
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
     				<input type="text" class="form-control search3" name="x" id="search" placeholder="Search">
    				<span class="input-group-btn">
	     			<button class="btn btn-default search_icon" type="button">
	       			<span class="glyphicon glyphicon-search"></span>
	     			</button>
	 	 		</span>
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
	      		});
			var a = document.getElementByTagName('a').item(0);
			$(a).on('keyup', function(evt){
			console.log(evt);
			if(evt.keycode === 13){
    
			alert('search?');
			} 
			}); 
			</script>

			<div class=" ship1 col-lg-3">
				<button class="btn1">SHIP</button>
				<button class="btn1">CANCEL</button>
			</div>
   
		</div>

<!-----second main div start ---->

	<div class="second-row col-lg-10">
					<label class="show">Show</label>
			    <select name="filter" class="record">
						
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
					<label class="show">Result</label>
					

            <div class=" pagination1 pagination:number active"> 1</div>

					<div class="pagination:number arrow">
            <svg width="18" height="18">
              <use xlink:href="#right" />
            </svg>
          </div>


          <svg class="hide">
            <symbol id="left" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></symbol>
            <symbol id="right" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></symbol>
          </svg>
      </div>


	<!------------------code for table ----------------------- -->


	<table id="t01" class="table2 table-style  manage-table col-lg-10">
                  <tr class="row1">
                    <th class=" table-style table-heading">ORDER ID</th>
                    <th class=" table-style table-heading">ORDER DATE AND TIME</th>
                    <th class=" table-style table-heading">CHANNEL INTEGRATION<span><a href=""><i class="fas fa-filter filter_img"></i></a></span></th>

                    <th class=" table-style table-heading">PRODUCT DETAILS</th>
                    <th class=" table-style table-heading">PAYMENT<span><a href=""><i class="fas fa-filter filter_img"></i></a></span></th>
                    <th class=" table-style table-heading">CUSTOMER DETAILS<span><a href=""><i class="fas fa-filter filter_img"></i></a></span></th>
                    <th class=" table-style table-heading">STATUS</th>
                    <th class=" table-style table-heading">ACTIONS</th>
                  </tr>

                  <tr class="row1">
                    <td class="table-style pad"><input type="checkbox" class="check">
  					<span class="checkmark"></span>1234</td>
                    <td class="table-style pad">aa</td>
                    <td class="table-style pad">aa wjiej eieiei</td>
                    <td class="table-style pad">
						<p style="float:left">aaa</p>
						<img src="images/dashboard.svg" style="float:right">
					</td>
                    <td class="table-style pad">aaa sdsdi</td>
                    <td class="table-style pad">aaa<br><a href="" class="view">VIEW</a>/<a href="" class="view">EDIT</a>
						</td>
                    <td class="table-style pad">aaa</td>
                    
					<td class="table-style pad"><button class="btn2" style="float:left;">SHIP</button>
					<span style="float:right;" class="circle-cross">
					<a href="#" class="cross-icon"> 
					<i class="fas fa-times-circle"></i></a></span>
					</td>
                  
                  </tr>
				  <tr class="row1">
                    <td class="table-style pad"><input type="checkbox" class="check">
  					<span class="checkmark"></span>1234</td>
                    <td class="table-style pad">aa</td>
                    <td class="table-style pad">aa wjiej eieiei</td>
                    <td class="table-style pad">
						<p style="float:left">aaa</p>
						<img src="images/dashboard.svg" style="float:right">
					</td>
                    <td class="table-style pad">aaa sdsdi</td>
                    <td class="table-style pad">aaa<br><a href="" class="view">VIEW</a>/<a href="" class="view">EDIT</a>
						</td>
                    <td class="table-style pad">aaa</td>
                    <td class="table-style pad"><button class='btn2'style="float:left">SHIP</button>
						<span style="float:right;" class="circle-cross">
						<a href="#"class="cross-icon"> 
						<i class="fas fa-times-circle "></i></a></span>
					</td>
                    
                  </tr>
				  
				  <tr class="row1">
                    <td class="table-style pad"><input type="checkbox" class="check">
  					<span class="checkmark"></span>1234</td>
                    <td class="table-style pad">aa</td>
                    <td class="table-style pad">aa wjiej eieiei</td>
                    <td class="table-style pad">
						<p style="float:left">aaa</p>
						<img src="images/dashboard.svg" style="float:right">
					</td>
                    <td class="table-style pad">aaa sdsdi</td>
                    <td class="table-style pad">aaa<br><a href="" class="view">VIEW</a>/<a href="" class="view">EDIT</a>
						</td>
                    <td class="table-style pad">aaa</td>
                    <td class="table-style pad"><button class='btn2'style="float:left">SHIP</button>
						<span style="float:right;" class="circle-cross">
						<a href="#"class="cross-icon"> 
						<i class="fas fa-times-circle "></i></a></span>
					</td>
                    
                  </tr>
				  
				  <tr class="row1">
                    <td class="table-style pad"><input type="checkbox" class="check">
  					<span class="checkmark"></span>1234</td>
                    <td class="table-style pad">aa</td>
                    <td class="table-style pad">aa wjiej eieiei</td>
                    <td class="table-style pad">
						<p style="float:left">aaa</p>
						<img src="images/dashboard.svg" style="float:right">
					</td>
                    <td class="table-style pad">aaa sdsdi</td>
                    <td class="table-style pad">aaa<br><a href="" class="view">VIEW</a>/<a href="" class="view">EDIT</a>
						</td>
                    <td class="table-style pad">aaa</td>
                    <td class="table-style pad"><button class='btn2'style="float:left">SHIP</button>
						<span style="float:right;" class="circle-cross">
						<a href="#"class="cross-icon"> 
						<i class="fas fa-times-circle "></i></a></span>
					</td>
                    
                  </tr>
				  
				  <tr class="row1">
                    <td class="table-style pad"><input type="checkbox" class="check">
  					<span class="checkmark"></span>1234</td>
                    <td class="table-style pad">aa</td>
                    <td class="table-style pad">aa wjiej eieiei</td>
                    <td class="table-style pad">
						<p style="float:left">aaa</p>
						<img src="images/dashboard.svg" style="float:right">
					</td>
                    <td class="table-style pad">aaa sdsdi</td>
                    <td class="table-style pad">aaa<br><a href="" class="view">VIEW</a>/<a href="" class="view">EDIT</a>
						</td>
                    <td class="table-style pad">aaa</td>
                    <td class="table-style pad"><button class='btn2'style="float:left">SHIP</button>
						<span style="float:right;" class="circle-cross">
						<a href="#"class="cross-icon"> 
						<i class="fas fa-times-circle "></i></a></span>
					</td>
                    
                  </tr>
				  
				  <tr class="row1">
                    <td class="table-style pad"><input type="checkbox" class="check">
  					<span class="checkmark"></span>1234</td>
                    <td class="table-style pad">aa</td>
                    <td class="table-style pad">aa wjiej eieiei</td>
                    <td class="table-style pad">
						<p style="float:left">aaa</p>
						<img src="images/dashboard.svg" style="float:right">
					</td>
                    <td class="table-style pad">aaa sdsdi</td>
                    <td class="table-style pad">aaa<br><a href="" class="view">VIEW</a>/<a href="" class="view">EDIT</a>
						</td>
                    <td class="table-style pad">aaa</td>
                    <td class="table-style pad"><button class='btn2'style="float:left">SHIP</button>
						<span style="float:right;" class="circle-cross">
						<a href="#"class="cross-icon"> 
						<i class="fas fa-times-circle "></i></a></span>
					</td>
                    
                  </tr>
                 </table>
 <div>

<script>
	    $(function () {
          $("#datepicker").datepicker({ 
                autoclose: true, 
                todayHighlight: true
          })
        });
</script>
</div>

</body>
</html>
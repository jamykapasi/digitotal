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

<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
  <link rel="stylesheet" href="css/styles.css">
	

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>





  
  	
<title>Manage Orders</title>
</head>
<body class="overflow-page">
	<?php  include("inc/header.php"); ?> 

  <?php  include("inc/sidebar.php"); ?>

	
	 <div class="col py-3 content" id="content">
	 
	<h2 class="heading" style="letter-spacing: 2px;">MANAGE ORDERS</h2>

	<div class="row">
	
		<div class="operation4">
		
			<div id="datepicker" class="input-group col-lg-3 date date_manage" data-date-format="dd-mm-yyyy">
        			<input class="form-control filter1" type="text" value="Filter by [Date]" />
        			<span class="input-group-addon calendar"><i class="fas fa-calendar-alt"></i></span>
    			</div>
	
	<!--		<div class="filter2 col-lg-3">
		
			    <select name="filter" id="managefilter">
						<option value="">Status</option>
						<option value="approve">Approve</option>
						<option value="Rejected">Rejected</option>
					</select>
			</div>
	-->

			<div class="input-group  filter2 search_cust5 col-lg-3">
     			<div class="input-group-btn search-panel">
      				<button type="button" class="btn btn-default dropdown-toggle searchbtn" data-toggle="dropdown">
        			<span id="status">Status</span> <i class="fas fa-chevron-circle-down caret_style3"></i>
      				</button>
      
      				<ul class="dropdown-menu scrollable-dropdown" role="menu">
        			<li><a href="#">Approve</a></li>
        			<li><a href="#">Reject</a></li>
        
      				</ul>
     			</div>
     
    			</div>
	
	 		<div class="input-group search_cust3 col-lg-3">
     				<div class="input-group-btn search-panel">
      					<button type="button" class="btn btn-default dropdown-toggle searchbtn" data-toggle="dropdown">
       						<span id="search_concept">Search by</span><i class="fas fa-chevron-circle-down caret_style"></i>
      					</button>
      
      					<ul class="dropdown-menu scrollable-dropdown" role="menu">
        <li><a href="#">Order ID</a></li>
        <li><a href="#">Customer Name</a></li>
        <li><a href="#">Order Date & Time</a></li>
        <li><a href="#">Customer Details</a></li>
      </ul>
     				</div>
     				<input type="hidden" name="search_param" value="all"
      				id="search_param">
     				<input type="text" class="form-control search3" name="x" id="search">
    				<span class="input-group-btn">
	     			<button class="btn btn-default search_icon" type="button">
	       			<span class="glyphicon glyphicon-search"><i class="fas fa-search search_icon_style"></i></span>
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
			var a = document.getElementsByTagName('a').item(0);
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
	<div id="table_box_bootstrap"></div>
	

	<!------------------code for table ----------------------- -->


	<table  class="table2 table-style  manage-table col-lg-10">
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
<script>
  

var box = paginator({
    table: document.getElementById("content").getElementsByTagName("table")[0],
    box_mode: "list",
});
box.className = "box1";
document.getElementById("table_box_bootstrap").appendChild(box);

function paginator(config) {
    // throw errors if insufficient parameters were given
    if (typeof config != "object")
        throw "Paginator was expecting a config object!";
    if (typeof config.get_rows != "function" && !(config.table instanceof Element))
        throw "Paginator was expecting a table or get_row function!";

    // get/make an element for storing the page numbers in
    var box;
    if (!(config.box instanceof Element)) {
        config.box = document.createElement("div");
    }
    box = config.box;

    // get/make function for getting table's rows
    if (typeof config.get_rows != "function") {
        config.get_rows = function () {
            var table = config.table
            var tbody = table.getElementsByTagName("tbody")[0]||table;

            // get all the possible rows for paging
            // exclude any rows that are just headers or empty
            children = tbody.children;
            var trs = [];
            for (var i=0;i<children.length;i++) {
                if (children[i].nodeType = "tr") {
                    if (children[i].getElementsByTagName("td").length > 0) {
                        trs.push(children[i]);
                    }
                }
            }

            return trs;
        }
    }
    var get_rows = config.get_rows;
    var trs = get_rows();

    // get/set rows per page
    if (typeof config.rows_per_page == "undefined") {
        var selects = box.getElementsByTagName("select");
        if (typeof selects != "undefined" && (selects.length > 0 && typeof selects[0].selectedIndex != "undefined")) {
            config.rows_per_page = selects[0].options[selects[0].selectedIndex].value;
        } else {
            config.rows_per_page = 10;
        }
    }
    var rows_per_page = config.rows_per_page;

    // get/set current page
    if (typeof config.page == "undefined") {
        config.page = 1;
    }
    var page = config.page;

    // get page count
    var pages = (rows_per_page > 0)? Math.ceil(trs.length / rows_per_page):1;

    // check that page and page count are sensible values
    if (pages < 1) {
        pages = 1;
    }
    if (page > pages) {
        page = pages;
    }
    if (page < 1) {
        page = 1;
    }
    config.page = page;
 
    // hide rows not on current page and show the rows that are
    for (var i=0;i<trs.length;i++) {
        if (typeof trs[i]["data-display"] == "undefined") {
            trs[i]["data-display"] = trs[i].style.display||"";
        }
        if (rows_per_page > 0) {
            if (i < page*rows_per_page && i >= (page-1)*rows_per_page) {
                trs[i].style.display = trs[i]["data-display"];
            } else {
                trs[i].style.display = "none";
            }
        } else {
            trs[i].style.display = trs[i]["data-display"];
        }
    }

    // page button maker functions
    config.active_class = config.active_class||"active";
    if (typeof config.box_mode != "function" && config.box_mode != "list" && config.box_mode != "buttons") {
        config.box_mode = "button";
    }
    if (typeof config.box_mode == "function") {
        config.box_mode(config);
    } else {
        var make_button;
        if (config.box_mode == "list") {
            make_button = function (symbol, index, config, disabled, active) {
                var li = document.createElement("li");
                var a  = document.createElement("a");
                a.href = "#";
                a.innerHTML = symbol;
                a.addEventListener("click", function (event) {
                    event.preventDefault();
                    this.parentNode.click();
                    return false;
                }, false);
                li.appendChild(a);

                var classes = [];
                if (disabled) {
                    classes.push("disabled");

                }
                if (active) {
                    classes.push(config.active_class);
                }
                li.className = classes.join(" ");
                li.addEventListener("click", function () {
                    if (this.className.split(" ").indexOf("disabled") == -1) {
                        config.page = index;
                        paginator(config);
                    }
                }, false);
                return li;
            }
        } else {
            make_button = function (symbol, index, config, disabled, active) {
                var button = document.createElement("button");
                button.innerHTML = symbol;
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    if (this.disabled != true) {
                        config.page = index;
                        paginator(config);
                    }
                    return false;
                }, false);
                if (disabled) {
                    button.disabled = true;
                    button.style.visibility ="hidden";
                    var i =document.getElementsByClassName("pagination");

                  
                }
                if (active) {
                    button.className = config.active_class;
                }
                return button;
            }
        }

        // make page button collection
        var page_box = document.createElement(config.box_mode == "list"?"ul":"div");
        if (config.box_mode == "list") {
            page_box.className = "pagination";
        }

        var left = make_button( "<", (page>1?page-1:1), config, (page == 1), false);

        page_box.appendChild(left);
    

        for (var i=1;i<=pages;i++) {
            var li = make_button(i, i, config, false, (page == i));
           page_box.appendChild(li);
        }

        var right = make_button(">", (pages>page?page+1:page), config, (page == pages), false);
        page_box.appendChild(right);
        if (box.childNodes.length) {
            while (box.childNodes.length > 1) {
                box.removeChild(box.childNodes[0]);
            }
            box.replaceChild(page_box, box.childNodes[0]);
        } else {
            box.appendChild(page_box);
        }
    }
  
  var dvRecords = document.createElement("div");
  dvRecords.className = "dvrecords";
  box.appendChild(dvRecords);



  var stat1 = document.createElement("span");
    stat1.className = "stats1";
    stat1.innerHTML = "Show";
    
    dvRecords.appendChild(stat1);

    // make rows per page selector
    if (!(typeof config.page_options == "boolean" && !config.page_options)) {
        if (typeof config.page_options == "undefined") {
            config.page_options = [
                { value: 5,  text: '5'   },
                { value: 10, text: '10'  },
                { value: 20, text: '20'  },
                { value: 50, text: '50'  },
                { value: 100,text: '100' },
                { value: 0,  text: 'All' }
            ];
        }
        var options = config.page_options;
        var select = document.createElement("select");

        select.className = "records";
        for (var i=0;i<options.length;i++) {
            var o = document.createElement("option");
            o.value = options[i].value;
            o.text = options[i].text;
            select.appendChild(o);
        }
        select.value = rows_per_page;
        select.addEventListener("change", function () {
            config.rows_per_page = this.value;
            paginator(config);
        }, false);
        dvRecords.appendChild(select);
          // adding icon to select
    var icon = document.createElement("span");
    icon.className = "icon5";
         icon.innerHTML='<i class="fas fa-chevron-circle-down"></i>';
         dvRecords.appendChild(icon);
    }

    // status message
    var stat = document.createElement("span");
    stat.className = "stats";
    stat.innerHTML = "Result ";
    
    dvRecords.appendChild(stat);

    // run tail function
    if (typeof config.tail_call == "function") {
        config.tail_call(config);

    }

    return box;
}


jQuery.fn.sortElements = (function(){
    
    var sort = [].sort;
    
    return function(comparator, getSortable) {
        
        getSortable = getSortable || function(){return this;};
        
        var placements = this.map(function(){
            
            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,
                
                // Since the element itself will change position, we have
                // to have some way of storing it's original position in
                // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );
            
            return function() {
                
                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }
                
                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);
                
            };
            
        });
       
        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });
        
    };
    
})();

    var table = $('table');
    
    $('th')
        .wrapInner('<span title="sort this column"/>')
        .each(function(){
            
            var th = $(this),
                thIndex = th.index(),
                inverse = false;
            
            th.click(function(){
                
                table.find('td').filter(function(){
                    
                    return $(this).index() === thIndex;
                    
                }).sortElements(function(a, b){
                    
                    return $.text([a]) > $.text([b]) ?
                        inverse ? -1 : 1
                        : inverse ? 1 : -1;
                    
                }, function(){
                    
                    // parentNode is the element we want to move
                    return this.parentNode; 
                    
                });
                
                inverse = !inverse;
                    
            });
                
        });


</script>


</body>
</html>
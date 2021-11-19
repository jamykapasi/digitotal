
    <style>
        .notification-content .container-fluid {
            width: 100%;
        }
        .table_box_bootstrap1 .box3 {
            display: flex;
            align-items: flex-end;
            flex-direction: row-reverse;
        }
        .table_box_bootstrap1 .box3 .records {
            width: 70px;
            margin-bottom: 0;
        }
        .table_box_bootstrap1 .box3 .pagination {
            margin: 0;
        }
        .table_box_bootstrap1 .dvrecords {
            display: flex;
            align-items: flex-end;
        }
        .table_box_bootstrap1 .icon5 {
            bottom: 4px;
            border-radius: 50%;
            line-height: 0;
        }
        .dropdown-menu li a {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 20px;
            color: #333333;
            white-space: nowrap;
        }
        .notification-content a.navbar-brand {
            margin-right: auto;
        }
        .modal-content {
            width: 650px;
            max-width: 100%;
            margin: auto;
        }
        .modal-content .close {
            margin-left: auto;
            margin-right: 20px;
            font-size: 30px;
            padding: 0;
        }   
        .modal-content .modal-header {
            padding-top: 0;
        }
        @media (min-width: 1024px) {

            .sidebar {
                min-width: 300px;
            }
        }
    </style>
  	

<div class="col py-3 content" id="content">	     
	<h3 class="main-heading">MANAGE CATEGORIES</h3>
	<div class="row">
		<div class="operation4" style="margin:0% 2%;">
	 		<div class="input-group search-cate col-lg-5" style="width: 40%;">
                <div class="input-group-btn search-panel" style="width: 150px;">
                    <button type="button" class="btn btn-default dropdown-toggle searchbtn" data-toggle="dropdown" style="padding-top: 5px;">
                        <span id="search_concept">Search by</span><i class="fas fa-chevron-circle-down caret_style"></i>
                    </button>
                    <ul class="dropdown-menu scrollable-dropdown" role="menu">
                        <li><a href="#">Order ID</a></li>
                        <li><a href="#">Customer Name</a></li>
                        <li><a href="#">Order Date & Time</a></li>
                        <li><a href="#">Customer Details</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">
                <input type="text" class="form-control search3" name="x" id="search" style="margin: 0;">
                <span class="input-group-btn">
                    <button class="btn btn-default search_icon" type="button" style="padding-top: 0;">
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
			
        <div id="table_box_bootstrap1" class="table_box_bootstrap1"></div>
			<div class=" ship2 col-lg-3">
				<button class="btn1 btn-hv" id="myBtn" name="action1" value="update1" onclick="myModal()">ADD CATEGORY</button>
			</div>
		</div>

<!-----second main div start ---->
<!--	<div id="table_box_bootstrap"></div>-->
	
	<!------------------code for table ----------------------- -->
        <table  class="table2 table-style col-lg-10"style="width:40% !important;margin:0% 4% !important;">
          <tr class="row1">
            <th class=" table-style table-heading">CATEGORY NAME</th>
            <th class=" table-style table-heading">OPERATIONS</th>
          </tr>
            %HTML%
        </table>
<script>
var box = paginator({
    table: document.getElementById("content").getElementsByTagName("table")[0],
    box_mode: "list",
});
box.className = "box3";
document.getElementById("table_box_bootstrap1").appendChild(box);

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
    stat1.className = "stats";
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

</script>
<div>
<!-- The Modal -->
<div id="myModal" class="modal" style="height: auto;">
  <div class="modal-content" >
    <span class="close close2 cross-circle1">&times;</span>
    <div class="modal-header">    
    <h3 class="main-heading" id="exampleModalLabel">ADD CATEGORY</h3>
    <!-- <h2>Modal Header</h2>-->
    </div>
    <div class="modal-body">
        <form action="{SITE_URL}product_category" name="category" method="post" id="category" class="category">
            <div class="popup" style="margin-top:5%;">
                <div class=" custfields">
                    <label class="col-4 " style="font-size:0.9rem;font-weight: 500;display: inline-block;">Category Name</label>
                    
                    <input type="text" name="category_name" id="category_name" class="custinput col-5"  required/>
                   
                    <div class="text-center mt-4">
                        <input type="hidden" name="action" value="category">
                        <button class="btn2 btn-next submit-btn btn-hv" type="submit" id="submit" name="submit">SUBMIT</button>
                        <button id="cancel" class="btn2 btn-next submit-btn btn-hv" >CANCEL</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

<div id="editModal" class="modal" style="height: auto;">
  <div class="modal-content" >
    <span class="close close2 cross-circle1">&times;</span>
    <div class="modal-header">    
    <h3 class="main-heading" id="exampleModalLabel">EDIT CATEGORY</h3>
    <!-- <h2>Modal Header</h2>-->
    </div>
    <div class="modal-body">
        <form action="{SITE_URL}product_category" name="editCategory" method="post" id="editCategory" class="editCategory">
            <div class="popup" style="margin-top:5%;">
                <div class=" custfields">
                    <label class="col-4 " style="font-size:0.9rem;font-weight: 500;display: inline-block;">Category Name</label>
                    
                    <input type="text" name="category_name" id="edit_Category" class="custinput col-5"  required/>
                   
                    <div class="text-center mt-4">
                        <input type="hidden" name="action" value="editCategory">
                        <input type="hidden" id="cat_id" name="id" value="">
                        <button class="btn2 btn-next submit-btn btn-hv" type="submit" id="edit" name="edit">EDIT</button>
                        <button id="canceledit" class="btn2 btn-next submit-btn btn-hv" >CANCEL</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
<!--The Modal End -->
<script>
    function myModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    function editModal() {
        var editmodal = document.getElementById("editModal");
        editmodal.style.display = "block";
    }
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the button that opens the modal
var btn2 = document.getElementById("cancel");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
// Get the modal
var editmodal = document.getElementById("editModal");
// Get the button that opens the modal
var editBtn = document.getElementById("editBtn");
// Get the button that opens the modal
var canceledit = document.getElementById("canceledit");

// Get the <span> element that closes the modal
var closespan = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
editBtn.onclick = function() {
  editmodal.style.display = "block";
}
// When the user clicks the button, open the modal 
canceledit.onclick = function() {
  editmodal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
closespan.onclick = function() {
  editmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == editmodal) {
    editmodal.style.display = "none";
  }
}
</script>
</div>

<script type="text/javascript">
    $(document).on("submit",".category",function(){
      $(".category").validate({
        ignore: [],
        errorClass: 'help-block',
        errorElement: 'span',
        rules: {
          category_name:{required:true},
        },
        messages: {
          category_name:{required:"Please Enter Category"},
        },
        highlight: function (element) {
            $(element).closest('.custinput').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.custinput').removeClass('has-error');
        },
        errorPlacement: function (error, element) {
          if(element.attr('id') == 'category_name'){
              error.insertAfter(element.closest('.custinput'));
          }else{
              error.insertAfter(element.closest('.custinput'));
          }
        }
      });
      if ($(".category").valid()) {
          return true;
      } else {
          return false;
      }
    });

    $(document).on("click","#editBtn",function() {
      var id = $(this).data('id');

      $.ajax({
          type:"POST",
          dataType : 'json',
          url: window.location,
          data : {"action":"viewCategory",id},
          success: function(res)
          {
            $("#edit_Category").val(res.category);
            $("#cat_id").val(res.id); 
          }
      });

    });

    $(document).on("click","#deleteCategory",function() {
      var id = $(this).data('id');

      var del = confirm("Are you sure you want to delete?");
        if (del)
        $.ajax({
            type:"POST",
            dataType : 'json',
            url: window.location,
            data : {"action":"deleteCategory",id},
            success: function (response) 
            {
             if(response.status == 1)
              { 
                window.location = "{SITE_URL}product_category";   
              } 
              else 
              {
                toastr['error'](response.message);
              }
            },
        }); 
    });
</script>
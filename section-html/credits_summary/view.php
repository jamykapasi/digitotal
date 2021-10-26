<body class="overflow-page notification-content" onload="pagi()">

<div class="col py-3 content" id="content">


  <h2 class="heading" style="letter-spacing: 2px;">CREDITS SUMMARY</h2>
<!--$$$$$$$$$$$$$$$$ tabs $$$$$$$$$$$$-->
    

<div class="tab">
  <button id="tab1" class="tablinks active" onclick="myfunction(event, 'prepaid')">PREPAID</button>
  <button  id="tab2" class="tablinks" onclick="myfunction(event, 'cod')">COD</button>
  <button  class="tablinks" onclick="myfunction(event, 'final')">FINAL</button>

</div>


    <div class="operation3" id="operation2" style="background-color:#ffffff;">

      <div id="datepicker" class="input-group date col-lg-4 date6 " data-date-format="dd-mm-yyyy">
        <input class="form-control filter1" type="text" value="Filter by [ Date]" />
        <span class="input-group-addon calendar"><i class="fas fa-calendar-alt"></i></span>
      </div>
  
     
  
    <div class="input-group  search2 search_cust col-lg-5">
     <div class="input-group-btn search-panel">
      <button type="button" class="btn btn-default dropdown-toggle searchbtn dropdownbtn" data-toggle="dropdown">
        <span id="search_concept">Filter By[ Type of Charges ]</span> <i class="fas fa-chevron-circle-down caret_style3"></i>
      </button>
      
      <ul class="dropdown-menu scrollable-dropdown" role="menu">
        <li><a href="#">Automotive Accesories</a></li>
        <li><a href="#">Cell Phone Accesories</a></li>
        <li><a href="#">Computer Accesories</a></li>
        <li><a href="#">Health and Personal Care</a></li>
      </ul>
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
        });
    var a = document.getElementByTagName('a').item(0);
    $(a).on('keyup', function(evt){
    console.log(evt);
    if(evt.keycode === 13){
    
    alert('search?');
    } 
  }); 
  </script>

   
</div>


      <!-----second main div start ---->

              
  <div id="table_box_bootstrap"></div>


  <!------------------code for table ----------------------- -->
  <!------------------table of dispute found----------------------- -->
<script>
      $(function () {
          $("#datepicker").datepicker({ 
                autoclose: true, 
                todayHighlight: true
          })
        });
</script>
<div id="content1">
<div class="credit-content" id="prepaid">


    
<table id="t01" class=" table-style table2">
                  <tr class="row1">
                    <th class=" table-style table-heading">ORDER ID</th>
                    <th class=" table-style table-heading">ORDER STATUS</th>
                    <th class=" table-style table-heading">DATE</th>

                    <th class=" table-style table-heading">AWB</th>
                    <th class=" table-style table-heading">CHARGED SHIPMENT WEIGHT</th>
                    <th class=" table-style table-heading">SHIPMENT CHARGES</th>
                    
                    
                  </tr>

                  <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>

    <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>

     <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>

    <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>

    <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>

    <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>


                 </table>
  </div><!--    credit content div end  -->
</div>


 <!------------------table of dispute  action----------------------- -->

<div id="content1">

<div class="credit-content" id="cod">

    
<table id="t01" class="table2 table-style">
                  <tr class="row1">
                    <th class=" table-style table-heading">ORDER ID</th>
                    <th class=" table-style table-heading">ORDER STATUS</th>
                    <th class=" table-style table-heading">DATE</th>
                    <th class=" table-style table-heading">AWB</th>
                    <th class=" table-style table-heading">CHARGED SHIPMENT WEIGHT</th>
                    <th class=" table-style table-heading">REMARKS</th>
                    <th class=" table-style table-heading">SHIPMENT CHARGES</th>
                    
                  </tr>

                  <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>

                  <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>
                  <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>
                  <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>
                  <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>
                  <tr class="row1">
                    <td class=" table-style pad">1234567890</td>
                    <td class=" table-style pad">aaAA</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                    <td class=" table-style pad">aaa</td>
                  </tr>

                 </table>
  </div><!--    credit-content2 div end  -->

</div>
<!-----------table of credit summary final  action----------------- -->
<div class="credit-content2" id="final">

    
<table class="final">
        <tr class="final  cod-final">
          <td class="final"><label class="final-label">COD Collected:</label></td>
          <td class="final"><input type="text" name="cod" class="input-final" value="₹ 1,00,000" disabled></td>
        </tr>

        <tr class="final cod-final">
          <td class="final"><label class="final-label final">Shipment Charges:</label><br>
              <span class="final-sublabel">(Shipment Charges + COD Charges)</span></td>
          <td class="final"><input type="text" name="shipment-charges" class="input-final" value="₹ 20,000" disabled></td>
        </tr>

        <tr class="final cod-final">
          <td class="final"><label class="final-label">Net Payable:</label><br>
              <span class="final-sublabel">(Shipment Charges + COD Collected)</span></td>
          <td class="final"><input type="text" name="shipment-charges" class="input-final" value="₹ 80,000" disabled></td>
        </tr>

        <tr class="final cod-final">
          <td class="final"><label class="final-label">Weight Dispute(if any):</label></td>
          <td class="final"><input type="text" name="shipment-charges" class="input-final"  value="₹ 2000" disabled></td>
        </tr>

        <tr class="final cod-final">
          <td class="final"><label class="total-label">Total Payment after weight Dispute:</label></td>
          <td class="final"><input type="text" name="shipment-charges" class="input-final ship-charges" value="₹ 78,000" disabled></td>
        </tr>
              
              
              
                 </table>
  </div><!--    credit-content3 div end  -->




<script>
function myfunction(evt, credits) {
  var i, creditscontent, tablinks,div,pagination;
  creditscontent = document.getElementsByClassName("credit-content");
  for (i = 0; i < creditscontent.length; i++) {
    creditscontent[i].style.display = "none";
  }
  creditscontent = document.getElementsByClassName("credit-content2");
  for (i = 0; i < creditscontent.length; i++) {
    creditscontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(credits).style.display = "block";
  evt.currentTarget.className += " active";

        pagination = document.getElementById("pagination-style");
         if(credits==='final')
          {
             div = document.getElementById("operation2");  
                 div.style.display = "none";  
                 var pagination=document.getElementById("table_box_bootstrap");
                 pagination.style.display="none";
                 
          } 
          else if(credits==='prepaid')
          {
              div = document.getElementById("operation2");  
              div.style.display = "flex";  
             
               var pagination=document.getElementById("table_box_bootstrap");
                 pagination.style.display="block";
          } 
          else if(credits==='cod')
          {
              div = document.getElementById("operation2");  
              div.style.display = "flex";  
               var pagination=document.getElementById("table_box_bootstrap");
                 pagination.style.display="block";
          } 

}
</script>


</div>
<script>
 function  pagi()
{
    



flag=1;

var tablinks = document.getElementsByClassName("tablinks");
var i=0;

  
 

  if(tablinks[0].classList.contains("active"))
   {
       
  box1 = paginator({
    table: document.getElementById("prepaid").getElementsByTagName("table")[0],
    box_mode: "list",
  });
  box1.className = "box1";
  box1.id="box1";
  document.getElementById("table_box_bootstrap").appendChild(box1);
document.getElementById("table_box_bootstrap").removeChild(box);

  }
else if(tablinks[1].classList.contains("active")){  

  
    
  box = paginator({
    table: document.getElementById("cod").getElementsByTagName("table")[0],
    box_mode: "list",
  });
box.className = "box1";
box.id="box";

document.getElementById("table_box_bootstrap").appendChild(box);
document.getElementById("table_box_bootstrap").removeChild(box1);

}
else{}

 


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
  var tbody;
  tbody = table.getElementsByTagName("tbody")[0]||table;

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
                li.appendChild(a);1

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

}
</script>

<script>
var btn = document.getElementById("tab1");
var btn2 = document.getElementById("tab2");

btn.addEventListener("click", pagi);
btn2.addEventListener("click", pagi);


</script>

</body>
</html>
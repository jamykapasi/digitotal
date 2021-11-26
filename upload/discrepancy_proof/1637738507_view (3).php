<body class="overflow-page notification-content">
   <div class="col py-3 content" id="content">
      <h2 class="heading" style="letter-spacing: 2px;">CREDITS SUMMARY</h2>
      <!--$$$$$$$$$$$$$$$$ tabs $$$$$$$$$$$$-->
      <div class="tab">
         <button id="tab1" class="tablinks active" onclick="myfunction(event, 'prepaid')">PREPAID</button>
         <button  id="tab2" class="tablinks" onclick="myfunction(event, 'cod')">COD</button>
         <button  class="tablinks" onclick="myfunction(event, 'final')">FINAL</button>
      </div>
      <div class="operation3" id="operation2" style="background-color:#ffffff;">
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
      <div class="second-row col-lg-10" style="height:80px;">
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
               <tbody id="prepaid1">
                    %PREPAID%
               </tbody>
            </table>
         </div>
         <!--    credit content div end  -->
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
               <tbody id="cod1">
                    %COD%
               </tbody>
            </table>
         </div>
         <!--  credit-content2 div end  -->
      </div>
      <!-----------table of credit summary final  action----------------- -->
      <div class="credit-content2" id="final">
         <table class="final">
            <tr class="final  cod-final">
               <td class="final"><label class="final-label">COD Collected:</label></td>
               <td class="final"><input type="text" name="cod" class="input-final" value="%TOTALCOD%" disabled></td>
            </tr>
            <tr class="final cod-final">
               <td class="final"><label class="final-label final">Shipment Charges:</label><br>
                  <span class="final-sublabel">(Shipment Charges + COD Charges)</span>
               </td>
               <td class="final"><input type="text" name="shipment-charges" class="input-final" value="%SHIPMENTCHARGES%" disabled></td>
            </tr>
            <tr class="final cod-final">
               <td class="final"><label class="final-label">Net Payable:</label><br>
                  <span class="final-sublabel">(Shipment Charges + COD Collected)</span>
               </td>
               <td class="final"><input type="text" name="shipment-charges" class="input-final" value="%NETPAYABLE%" disabled></td>
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
      </div>
      <!--    credit-content3 div end  -->
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
   <script>
      var btn = document.getElementById("tab1");
      var btn2 = document.getElementById("tab2");

      function loadRecord()
        {   
            var date = $('#created_date').val();
            var status = $('#managefilter').val();
            var keyword = $('#search').val();
            var page_rec = $('#page_rec').val();

            $.ajax({
                type:"POST",
                dataType : 'json',
                url: window.location,
                data : {"action":"getRecord",'date':date,'status':status,'keyword':keyword,'page_rec':page_rec},
                success: function(res)
                {  
                    $('#prepaid1').html(res.prepaid);
                    $('#cod1').html(res.cod);
                }
            });
        }

        $('#created_date,#managefilter,#page_rec').on('change', function(){
            //alert();
            loadRecord();
        });

        $('#search').on('keyup', function(){
            //alert();
            loadRecord();
        });
      
   </script>
</body>
</html>
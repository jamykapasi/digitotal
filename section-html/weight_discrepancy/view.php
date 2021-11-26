<div class="col py-3 content">
   <h2 class="heading" style="letter-spacing: 2px;">WEIGHT DISCREPANCY</h2>
   <!--$$$$$$$$$$$$$$$$ tabs $$$$$$$$$$$$-->
   <div class="tab">
      <button id="tab1" class="tablinks active" onclick="myfunction(event, 'dispute-content')">DISPUTE FOUND</button>
      <button id="tab2" class="tablinks" onclick="myfunction(event, 'dispute-content2')">DISPUTE ACTION</button>
   </div>
   <div class="operation2"style="background-color:#ffffff;">
   <div id="datepicker" class="input-group col-lg-3 date date_manage" data-date-format="dd-mm-yyyy">
      <input class="form-control filter1" id="created_date" name="created_date" type="text" placeholder="Filter by [Date]" />
      <span class="input-group-addon calendar"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
   <div class="filter2 col-lg-3">
      <select name="filter" id="managefilter">
         <option value="">Status</option>
         <option value="a">Approved</option>
         <option value="d">Rejected</option>
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
   <div class="second-row col-lg-10" style="align-items: center; height:50px;">
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
   <div id="table_box_bootstrap">
   </div>
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
   <div class="dispute-content table1" id="dispute-content">
      <div id="content">
         <table class=" table-style table2 col-lg-10">
            <tr class="row1">
               <th class=" table-style table-heading">DISCREPANCY DATE & TIME</th>
               <th class=" table-style table-heading">ORDER DATE & TIME</th>
               <th class=" table-style table-heading">PRODUCT DETAILS & CHANNEL</th>
               <th class=" table-style table-heading">SHIPMENT DETAILS</th>
               <th class=" table-style table-heading">ENTERED WEIGHT DETAILS</th>
               <th class=" table-style table-heading">CHARGED WEIGHT DETAILS</th>
               <th class=" table-style table-heading">PROOF</th>
            </tr>
            <tbody id="disputeFound">
                %DISPUTEFOUND%
            </tbody>
         </table>
      </div>
      <!--    disput content div end  -->
   </div>
   <!------------------table of dispute  action----------------------- -->
   <div class="dispute-content" id="dispute-content2">
      <div id="content">
         <table  class="table2 table-style col-lg-10">
            <tr class="row1">
               <th class=" table-style table-heading">DISCREPANCY DATE & TIME</th>
               <th class=" table-style table-heading">ORDER DATE & TIME</th>
               <th class=" table-style table-heading">PRODUCT DETAILS & CHANNEL</th>
               <th class=" table-style table-heading">SHIPMENT DETAILS</th>
               <th class=" table-style table-heading">ENTERED WEIGHT DETAILS</th>
               <th class=" table-style table-heading">CHARGED WEIGHT DETAILS</th>
               <th class=" table-style table-heading">STATUS</th>
            </tr>
            <tbody id="disputeAction">
                %DISPUTEACTION%
            </tbody>
         </table>
      </div>
      <!--    disput-content2 div end  -->
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
      function myfunction(evt, dispute) {
        var i, disputecontent, tablinks;
       
       disputecontent = document.getElementsByClassName("dispute-content");
        for (i = 0; i < disputecontent.length; i++) {
          disputecontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(dispute).style.display = "block";
        evt.currentTarget.className += " active";
        
      }
   </script>
</div>
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
            $('#disputeFound').html(res.disputeFound);
            $('#disputeAction').html(res.disputeAction);
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
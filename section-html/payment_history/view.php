<div class="col py-3 content">
    <div id="content" style="background-color: #ffffff;">
    <h2 class="heading" style="letter-spacing: 2px;">PAYMENT HISTORY</h2>
        <div class="row mb-3">
            <div class="col col-md-4">
                <div class="input-group  filter2 search_cust4 col-lg-3">
                    <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle searchbtn" data-toggle="dropdown">
                        <span id="status">Filter by [ Payout Date ]</span> <i class="fas fa-chevron-circle-down caret_style3"></i>
                    </button>
        
                    <ul class="dropdown-menu scrollable-dropdown" role="menu">
                        <li><a href="#">Approve</a></li>
                        <li><a href="#">Reject</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="input-group  filter2 search_cust4 col-lg-3">
                    <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle searchbtn" data-toggle="dropdown">
                        <span id="status">Filter by [ payment Status ]</span> <i class="fas fa-chevron-circle-down caret_style3"></i>
                    </button>

                    <ul class="dropdown-menu scrollable-dropdown" role="menu">
                        <li><a href="#">Approve</a></li>
                        <li><a href="#">Reject</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
        

        <table class=" table-style table2 col-lg-10 payment-history-table" style="color: #000000;">
            <tbody>
                %HTML%
            </tbody>

        </table>
      </div><!--    disput content div end  -->
</div>

<script type="text/javascript">

  $(document).on("click","#down",function() {
    $("#detail-show").toggle();
    $("#up").toggle();
    $("#down").toggle();
  });
  
  $(document).on("click","#up",function() {
    $("#detail-show").toggle();
    $("#down").toggle();
    $("#up").toggle();
  });

  $(document).on("click","#down",function() {
    $("#detail-show").toggle();
    $("#up").toggle();
    $("#down").toggle();
  });
</script>
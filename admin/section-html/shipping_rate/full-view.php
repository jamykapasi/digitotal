<style>
    .pincode-list {
        display: flex;
        align-items: center;
        padding: 0;
        margin-bottom: 15px;
        flex-wrap: wrap;
        list-style: none;
    }
    
    .pincode-item {
        padding: 6px 10px 6px 20px;
        border: 1px solid #ddd;
        border-radius: 15px;
        margin-right: 10px;
        margin-bottom: 10px;
        background-color: #f2f2f2;
        display: flex;
        align-items: center;
    }
    
    .remove-icon {
        color: #fff;
        background-color: #ff7c7c;
        width: 20px;
        height: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-left: 15px;
        font-size: 10px;
    }
</style>
<div class="row" style="margin-left:10px; margin-top:20px; margin-right:20px"> 
    <div>
        <span class="pull-right"><a href="javascript:void(0);" class="btn blue btn-toggler"><b><i class="fa fa-long-arrow-left"></i></b> Back</a> </span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
<div>
    &nbsp;
</div>
<br>
<div class="row" style="margin-left:10px;"> 
<div class="col-sm-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Courier partner Details
        </div>
        <div class="panel-body employee_full_view">
            <div class="col">
                <div class="col-sm-12">
                   <!--  <table border="col-sm-12">
                        <thead>
                            <tr>
                              <th >COURIER PARTNER</th>
                              <th >WITHIN CITY CHARGES</th>
                              <th >WITHIN ZONE CHARGES</th>
                              <th >METROS CHARGES</th>
                              <th >REST OF INDIA CHARGES</th>
                              <th >SPECIAL ZONE CHARGES</th>
                              <th >COD CHARGES</th>
                              <th >CREATED AT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>#COURIER_PARTNER#</td>
                              <td>#WITHIN_CITY#</td>
                              <td>#WITHIN_ZONE#</td>
                              <td>#METROS#</td>
                              <td>#REST_OF_INDIA#</td>
                              <td>#SPECIAL_ZONE#</td>
                              <td>#COD#</td>
                              <td>#CREATED_DATE#</td>
                            </tr>
                        </tbody>
                    </table> -->
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>COURIER PARTNER</b> : </label>
                        <div class="col-sm-8">#COURIER_PARTNER#</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>WITHIN CITY  CHARGES</b> : </label>
                        <div class="col-sm-8">#WITHIN_CITY#</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>WITHIN ZONE CHARGES</b> : </label>
                        <div class="col-sm-8">#WITHIN_ZONE#</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>METROS CHARGES</b> : </label>
                        <div class="col-sm-8">#METROS#</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>REST OF INDIA CHARGES</b> : </label>
                        <div class="col-sm-8">#REST_OF_INDIA#</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>SPECIAL ZONE CHARGES</b> : </label>
                        <div class="col-sm-8">#SPECIAL_ZONE#</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>COD CHARGES</b> : </label>
                        <div class="col-sm-8">#COD#</div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>CREATED AT</b> : </label>
                        <div class="col-sm-8">#CREATED_DATE#</div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <input type="search" id="pincode" class="col-sm-4 col-form-label" placeholder="Search Pincode" aria-label="Search" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="pincode-content">
                        <label class="col-sm-4 col-form-label"><b>PINCODE</b> : </label>
                            <ul class="pincode-list html_data">
                               
                            </ul>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b></b>  </label>
                        <div class="col-sm-8">
                            <div class ="ProductOrderPagination"> <nav aria-label="Page navigation"> </nav>
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
        loadRecord(1);
    });

    function loadRecord(page,query)
    {   
        var id = $(this).data('id');
        var query = $('#pincode').val();
        
        $.ajax({
            type:"POST",
            dataType : 'json',
            url: window.location,
            data : {"action":"getRecord","page" : page ,"limit":10,"query":query},
            success: function(res)
            {  
                $( "html, body" ).animate({ scrollTop:0 },'slow');

                $('.html_data').append("");
                $('.html_data').html(res.pincode);
                $(".ProductOrderPagination").empty();
                $('.ProductOrderPagination').unbind('page');
                ProductOrderPagination(res.total_page, page);
            }
        });
    }

    function ProductOrderPagination(totalpage,page)
    {
        $('.ProductOrderPagination').bootpag({
            total: parseInt(totalpage),
            page: parseInt(page),
            maxVisible: 5 , 
            leaps: true,
            firstLastUse: true,
            first: '←',
            last: '→',
            wrapClass: 'pagination',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'
        }).on("page", function(event, num)
        {
            loadRecord(num); 
        });  
    }

    $('#pincode').on("keyup", function(query){
      loadRecord(query);
    });

</script>

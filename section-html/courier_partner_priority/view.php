<div class="col py-3 content">
  <h3 class="heading mt-3 ms-4">SET COURIER PARTNER PRIORITY</h3>
    <div class="row fields-instruction">
      <div class="col-auto fields-report">
        <div class="main-area ms-4">
          <form action="{SITE_URL}courier_partner_priority" method="post" class="courierPartner" id="courierPartner" enctype="multipart/form-data">
            <div class="checkboxes">
              <div class="col-md-2 mt-4 form-check form-check-inline long-label">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" %CHECKED%  value="recommendation">
                <label class="form-check-label no-space-break" for="inlineRadio1"><img class="blue-logo" src="images/Bhejooo-Logo.png" alt="" width="90%"><p class="italic-text" style="display: inline-block;">(Recommended)</p></label>
                <p class="sub-text-radio">Courier partner selection is based on AI recommendation to optimise shipping charges and reduce RTO</p>
              </div>

              <div class="col-md-2 form-check form-check-inline ms-5 checkbox-2">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" %CHECKED% value="custom">
                <label class="form-check-label no-space-break custom-prio-label" for="inlineRadio2">Custom Priority</label>
                <p class="sub-text-radio">Drag & drop cards to set your own priority <br><br><br></p>
              </div>
            </div>
            <p class="italic-text" style="display: inline-block;">These priority settings will only be used in bulk shipping for Forward orders.</p>
            <input type="hidden" name="action" value="prioritySet">
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-connect mt-4">DONE</button>
          </form>
        </div>
          <div class="custom-div"  id="custom-card-section" style="margin-top: 100px; display: none;">
            <h3 class="note custom-prio-heading mb-0">YOUR CUSTOM PRIORITY LIST:</h3>
            <p class="points-rates mt-3 courier-cards-sub-head">Drag cards to reorder/ add / remove courier partners (Minimum 1 Shipping partner required)</p>
            <div class="">
                <div class="row addPriority">
                  %PRIORITY%
                </div>
            </div>
            <hr>
            <h3 class="note mt-3 ms-3 mb-4">OTHER COURIER PARTNER(S)</h3>
              <div class="">
                <div class="row">
                  %HTML%
                </div>
              </div>
          
          </div>
    </div>
  </div>
</div>
<script>
    jQuery(document).ready(function(){
      jQuery('#inlineRadio2').change(function() {
        if(jQuery('#inlineRadio2').is(':checked')) {
            jQuery('#custom-card-section').show();
         }else {
            jQuery('#custom-card-section').hide();
         }
      });

      $('input[type=radio][name=inlineRadioOptions]').change(function() {
          if (this.value == 'recommendation') {
            jQuery('#custom-card-section').hide();
          }
          else if (this.value == 'custom') {
            jQuery('#custom-card-section').show();
          }
      });
    });

    $(document).on("click",".courierPartner",function() {
      var id = $(this).data('id');

      $.ajax({
          type:"POST",
          dataType : 'json',
          url: window.location,
          data : {"action":"addCourierPriority",id},
          success: function(res)
          {
            if(res.status == 1)
            {  
              window.location = "{SITE_URL}courier_partner_priority";   
            } 
            else 
            {
              toastr['error'](res.message);
            }
          }
      });
    });

    $(document).on('click', '.removePartner', function()
    {  
      var id = $(this).data("id");

      var del = confirm("Are you sure you want to Remove?");
      if (del)
      $.ajax({
          type:"POST",
          dataType : 'json',
          url: window.location,
          data : {"action":"deletePriority",id},
          success: function (response) 
          {
            if(response.status == 1)
            { 
              window.location = "{SITE_URL}courier_partner_priority";   
            }
            if(response.status == 0)
            { 
              alert("Minimum 1 Shipping partner required");   
            } 
          },
      });
    });

</script>
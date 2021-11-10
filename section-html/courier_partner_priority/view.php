      <div class="col py-3 content">
        <h3 class="heading mt-3 ms-4">SET COURIER PARTNER PRIORITY</h3>
        <div class="row fields-instruction">
          <div class="col-auto fields-report">
            <form action="{SITE_URL}courier_partner_priority" method="post">
              <div class="main-area ms-4">
                  <div class="checkboxes">
                  <div class="col-md-2 mt-4 form-check form-check-inline long-label">
                    <input class="form-check-input" type="radio" name="priority" id="inlineRadio1" value="recommended priority">
                    <label class="form-check-label no-space-break" for="inlineRadio1"><img class="blue-logo" src="images/Bhejooo-Logo.png" alt="" width="90%"><p class="italic-text" style="display: inline-block;">(Recommended)</p></label>
                    <p class="sub-text-radio">Courier partner selection is based on AI recommendation to optimise shipping charges and reduce RTO</p>
                  </div>
                  <div class="col-md-2 form-check form-check-inline ms-5 checkbox-2">
                    <input class="form-check-input" type="radio" name="priority" id="inlineRadio2" value="custom priority" %CHECK%>
                    <label class="form-check-label no-space-break custom-prio-label" for="inlineRadio2">Custom Priority</label>
                    <p class="sub-text-radio">Drag & drop cards to set your own priority <br><br><br></p>
                  </div>
                </div> 
                <p class="italic-text" style="display: inline-block;">These priority settings will only be used in bulk shipping for Forward orders.</p>
                <div class="submit">
                  <input class="form-control" type="hidden" name="action" id="action" value="setPriority" %CHECK%>
                  <button type="submit" name="submitBtn" class="btn btn-primary btn-connect mt-2">Set Priority</button>
                </div>  
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

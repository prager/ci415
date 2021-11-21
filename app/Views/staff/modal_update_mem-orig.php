<!-- Modal -->
<div class="modal fade" id="editMem<?php echo $mem['id']; ?>" tabindex="-1" aria-labelledby="editMemLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMemLabel"><?php echo $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo base_url() . '/index.php/edit-mem/'. $mem['id'] ?>" method="post">
      <div class="modal-body">
      <section class="px-2">
        <div class="row">
          <div class="col-lg py-2">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $mem['fname']; ?>">
          </div>
          <div class="col-lg py-2">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $mem['lname']; ?>">
          </div>
          <div class="col-lg py-2">
              <label for="callsign">Callsign</label>
              <input type="text" class="form-control" id="callsign" name="callsign" value="<?php echo $mem['callsign']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 py-2">
            <label for="sel_lic">License Type</label>
            <select class="form-select" name="sel_lic">
              <?php
                foreach($lic as $license) {
                  if($license == $mem['license']) { ?>
                    <option value="<?php echo $mem['license']; ?>" selected><?php echo $mem['license']; ?></option>
              <?php    }
                  else { ?>
                    <option value="<?php echo $license; ?>"><?php echo $license; ?></option>
              <?php }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-lg py-2">
            <label for="w_phone">Cell Phone</label>
            <input type="text" class="form-control" id="w_phone" name="w_phone" value="<?php echo $mem['w_phone']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="h_phone">Home Phone</label>
            <input type="text" class="form-control" id="h_phone" name="h_phone" value="<?php echo $mem['h_phone']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $mem['email']; ?>">
          </div>
        </div>

        <div class="row py-2">
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="arrl"> ARRL Member </label>
              <?php if($mem['arrl']) {?>
                <input class="form-check-input" type="checkbox" value="" id="arrl" name="arrl" checked>
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" value="" id="arrl" name="arrl">
              <?php } ?>
            </div>
          </div>
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="carrier"> Carrier Copy </label>
              <?php if($mem['carrier']) {?>
                <input class="form-check-input" type="checkbox" value="" id="carrier" name="carrier" checked>
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" value="" id="carrier" name="carrier">
              <?php } ?>
            </div>
          </div>
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="dir"> Directory Copy </label>
              <?php if($mem['mem_card']) {?>
                <input class="form-check-input" type="checkbox" value="" id="dir" name="dir" checked>
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" value="" id="dir" name="dir">
              <?php } ?>
            </div>
          </div>
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="mem_card"> Member Card </label>
              <?php if($mem['mem_card']) {?>
                <input class="form-check-input" type="checkbox" value="" id="mem_card" name="mem_card" checked>
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" value="" id="mem_card" name="mem_card">
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg py-2">
            <label for="mem_since">Member Since</label>
            <input type="text" class="form-control" id="mem_since" name="mem_since" value="<?php echo $mem['mem_since']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="cur_year">Current Year</label>
            <input type="text" class="form-control" id="cur_year" name="cur_year" value="<?php echo $mem['cur_year']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="pay_date">Payment Date</label>
            <input type="date" class="form-control" id="pay_date" name="pay_date" value="<?php echo $mem['pay_date']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 py-2">
            <label for="address">Street Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $mem['address']; ?>">
          </div>
        </row>
        <div class="row">
          <div class="col-lg py-2">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $mem['city']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="callsign">State</label>
            <select class="form-select" id="lic" name="lic" aria-label="Default select example">
              <?php $i = 0;
                foreach($states as $state) {
                    $i++;
                    if($state == $states[$mem['state']]) { ?>
                      <option selected value="<?php echo $i; ?>"><?php echo $state; ?></option>
              <?php }
                    else { ?>
                      <option value="<?php echo $i; ?>"><?php echo $state; ?></option>
                    <?php  }
                  }?>
            </select>
          </div>
          <div class="col-lg py-2">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $mem['zip']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col py-2">
              <label for="address">Comments</label>
              <textarea
              class="form-control" id="comment" name="comment" rows="7">
              <?php echo trim($mem['comment']); ?></textarea>
          </div>
        </div>
      </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>

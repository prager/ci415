<div class="modal fade" id="editMem<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="editMemLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMemLabel"><?php echo $user['fname'] . ' ' . $user['lname'] . ' ' . $user['callsign']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo base_url() . '/index.php/reset-user/'. $user['id']; ?>" method="post">
      <div class="modal-body">
      <section class="px-2">
        <div class="row">
          <div class="col-lg py-2">
            <label for="fname">Username</label>
            <input type="text" class="form-control" id="username" name="fname" value="<?php echo $user['username']; ?>">
          </div>
          <div class="col-lg py-2">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname']; ?>">
          </div>
          <div class="col-lg py-2">
              <label for="callsign">Callsign</label>
              <input type="text" class="form-control" id="callsign" name="callsign" value="<?php echo $user['callsign']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 py-2">

          </div>
        </div>
        <div class="row">
          <div class="col-lg py-2">
            <label for="w_phone">Cell Phone</label>
            <input type="text" class="form-control" id="w_phone" name="w_phone" value="<?php echo $user['w_phone']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="h_phone">Home Phone</label>
            <input type="text" class="form-control" id="h_phone" name="h_phone" value="<?php echo $user['h_phone']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
          </div>
        </div>
        <div class="row py-2">
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="arrl"> ARRL Member </label>
              <?php if(strtoupper($user['arrl']) == 'TRUE') {?>
                <input class="form-check-input" type="checkbox" name="arrl" checked />
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" name="arrl" />
              <?php } ?>
            </div>
          </div>
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="carrier"> Carrier Copy </label>
              <?php if(strtoupper($user['hard_news']) == 'TRUE') {?>
                <input class="form-check-input" type="checkbox" name="hard_news" checked />
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" name="hard_news" />
              <?php } ?>
            </div>
          </div>
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="dir"> Directory Copy </label>
              <?php if(strtoupper($user['mem_card']) == 'TRUE') {?>
                <input class="form-check-input" type="checkbox" name="dir" checked />
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" name="dir" />
              <?php } ?>
            </div>
          </div>
          <div class="col-lg p-3">
            <div class="form-check">
              <label class="form-check-label" for="mem_card"> Member Card </label>
              <?php if(strtoupper($user['mem_card']) == 'TRUE') {?>
                <input class="form-check-input" type="checkbox" name="mem_card" checked />
              <?php }
                    else { ?>
                <input class="form-check-input" type="checkbox" name="mem_card" />
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg py-2">
            <label for="mem_since">Member Since</label>
            <input type="text" class="form-control" id="mem_since" name="mem_since" value="<?php echo $user['mem_since']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="cur_year">Current Year</label>
            <input type="text" class="form-control" id="cur_year" name="cur_year" value="<?php echo $user['cur_year']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="pay_date">Payment Date</label>
            <input type="date" class="form-control" id="pay_date" name="pay_date" value="<?php echo $user['pay_date']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 py-2">
            <label for="address">Street</label>
            <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-lg py-2">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $user['city']; ?>">
          </div>
          <div class="col-lg py-2">
            <label for="callsign">State</label>
            <select class="form-select" name="state" aria-label="Default select example">
              <?php
                foreach($states as $state) {
                  if($state == $states[$user['state']]) {?>
                  <option selected value="<?php echo key($states); ?>"><?php echo $state; ?></option>
                <?php }
                  else { ?>
                  <option value="<?php echo key($states); ?>"><?php echo $state; ?></option>
                <?php
                    }
                next($states);
                  }?>
            </select>
          </div>
          <div class="col-lg py-2">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $user['zip']; ?>">
          </div>
        </div>
        <div class="row mb-1">
          <div class="col py-2">
              <label for="comment">Comments</label>
              <textarea
              class="form-control" id="comment" name="comment" rows="7">
              <?php echo trim($user['comment']); ?></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col py-1">
            <button type="button" class="btn btn-light btn-sm"><?php echo anchor('set-silent-key/' . $user['id'], 'Set Silent Key', 'class="text-decoration-none text-dark"')?></button>
          </div>
        </div>
      </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

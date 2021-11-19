<div class="modal fade" id="delMem<?php echo $mem['id']; ?>" tabindex="-1" aria-labelledby="delMemLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="delMem<?php echo $mem['id']; ?>Label" class="modal-title">Deactivate Member?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Deactivate Member <strong><?php echo $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign']; ?>?</strong></p>
        <a href="<?php echo base_url() . '/index.php/delete-mem/'. $mem['id']; ?>" class="btn btn-danger"> Deactivate </a>
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

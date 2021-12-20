<section id="learn" class="p-5">
  <div class="container">
    <form action="<?php echo base_url() . '/index.php/sent-reg'; ?>" method="post">
    <div class="row px-5 py-3">
      <div class="col-lg p-2">
        <h5>Register to Access MDARC Web Portal</h5>
      </div>
    </div>
    <?php if($msg != '') {?>
      <div class="row p-2">
        <div class="col-lg-8 py-3">
          <p><?php echo $msg; ?></p>
        </div>
      </div>
    <?php }?>
    <div class="row px-5">
      <div class="col-lg p-2">

      </div>
  </form>
  </div>
</section>

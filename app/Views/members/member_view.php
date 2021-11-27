  <!--Learn Sections-->
        <section id="learn" class="p-5">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md py-5">
                        <img src="/img/control.svg" class="img-fluid w-75" alt="">
                    </div>
                    <div class="col-md p-5">
                        <h2>Welcome Member: <?php echo $mem['fname'] . ' ' . $mem['lname']; ?></h2>
                        <p class="lead">Callsign: <?php echo $mem['callsign']; ?> - Your MDARC file:</p>
                        <table class="table table-borderless">
                          <tr class="my-auto">
                            <td>Current Year:</td>
                            <td><?php echo $mem['cur_year']; ?></td>
                          </tr>
                          <tr class="my-auto">
                            <td>Paid on:</td>
                            <td><?php echo $mem['pay_date']; ?></td>
                          </tr>
                          <tr class="my-auto">
                            <td>Email:</td>
                            <td><?php echo $mem['email']; ?></td>
                          </tr>
                        </table>
                        <a href="<?php echo base_url() . '/index.php/pers-data'; ?>" class="btn btn-light my-3"><i class="bi bi-chevron-right"></i> Edit Your Data </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="learn" class="p-5 bg-light text-light">
            <div class="container">
                <div class="row align-items-center justify-content-between">

                </div>
            </div>
        </section>

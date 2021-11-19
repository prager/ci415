        <!--Staff Section-->
        <section id="learn" class="p-5">
            <div class="container">
                <div class="row">&nbsp;</div>
                <div class="row text-centerm">
                  <div class="col-lg-12">
                  <h4>MDARC Members Listing</h4>
                        <p><?php echo anchor('staff/download_cur_emails', 'Download Current Emails') . ' | ' . anchor('add-mem', 'Add Member') . ' | ' .
                        anchor('staff/download_all_mems', 'Download All')  . ' | ' . anchor('staff/download_cur_mems', 'Download Current Members'); ?></p>
                  </div>
                </div>
                <div class="row align-items-center justify-content-between">
                  <div class="m-4">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a href="#cur_mems" class="nav-link active" data-bs-toggle="tab">Members Current (<?php echo $cnt_cur; ?>)</a>
                        </li>
                        <li class="nav-item">
                            <a href="#carr" class="nav-link" data-bs-toggle="tab">Carrier Hard Copy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pay_due" class="nav-link" data-bs-toggle="tab">Payment Due</a>
                        </li>
                        <li class="nav-item">
                            <a href="#inactive" class="nav-link" data-bs-toggle="tab">Inactive Members</a>
                        </li>
                        <li class="nav-item">
                            <a href="#silents" class="nav-link" data-bs-toggle="tab">Silent Keys</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="cur_mems">
                          <table class="table table-responsive table-hover">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Cur Yr</th>
                                <th>Mem Type</th>
                                <th>Callsign</th>
                                <th>Lic</th>
                                <th>Pay Dt</th>
                                <th>Mem Since</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($cur_members as $mem) {?>
                              <tr>
                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#editMem<?php echo $mem['id']; ?>"><?php echo $mem['lname'] . ', ' . $mem['fname']; ?></a>
                               <?php include 'modal_update_mem.php'; ?></td>
                               <td><?php echo $mem['cur_year']; ?></td>
                               <td><?php echo $mem['mem_type']; ?></td>
                               <td><?php echo $mem['callsign']; ?></td>
                               <td><?php echo $mem['license']; ?></td>
                               <td><?php echo $mem['pay_date']; ?></td>
                               <td><?php echo $mem['mem_since']; ?></td>
                               <td><?php
                               if(strlen($mem['email']) > 30) {
                                 echo substr($mem['email'], 0, 30) . '...';
                               }
                               else {
                                 echo $mem['email'];
                               }?></td>
                                  <td class="text-center">
                                    <a href="#" data-toggle="modal" data-bs-target="#delMem<?php echo $mem['id']; ?>"><i class="fa fa-trash"></i></a>
                                    <?php include 'mod_del_mem.php'; ?>
                                  </td>
                              </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane fade" id="carr">
                            <h4 class="mt-2">Messages tab content</h4>
                            <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
                        </div>
                        <div class="tab-pane fade" id="pay_due">
                            <h4 class="mt-2">Profile tab content</h4>
                            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                        </div>
                        <div class="tab-pane fade" id="inactive">
                            <h4 class="mt-2">Messages tab content</h4>
                            <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
                        </div>
                        <div class="tab-pane fade" id="silents">
                            <h4 class="mt-2">Messages tab content</h4>
                            <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
                        </div>
                    </div>
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
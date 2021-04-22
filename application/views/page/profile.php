<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                  <div class="col-md-6 col-sm-6  profile_details">
                    <?php if ($this->session->flashdata('pesan')) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
                        <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php endif; ?>
                        <div class="ml-3 well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>My Profile</i></h4>
                            <div class="left col-sm-7">
                              <h2><?=$user['nama'];?></h2>
                              <p><strong>Perusahaan: </strong> <?=$user['perusahaan'];?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-google-plus-square"></i> Email: <?=$user['email'];?></li>
                                <li><i class="fa fa-wechat"></i> Whatsapp: <?=$user['wa'];?></li><br>
                                <li>Member dari <?=date('d F Y',$user['date_created']);?></li>
                              </ul>
                            </div>
                            <div class="right col-sm-5 text-center">
                              <img src="<?=base_url('assets/img/'.$user['foto']);?>" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" bottom text-center">
                            
                            <div class=" col-sm-6">
                              <a href="<?=base_url('page/profile/edit')?>" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                </i> Edit Profile</a>
                              <a href="<?=base_url('page/profile/gantipassword')?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-lock"> </i> Ganti Password
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright &copy;<?=date('Y');?> Sandesta Reza
            <span class="text-danger" style="font-size: 14px;">
              Version 1.0</span>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

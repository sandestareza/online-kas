<!-- page content -->
        <div class="right_col" role="main">
          <div class="container-fluid">
            <div class="row justify-content-md-center">
              <div class="col-sm-5 text-center">
              <?php if ($this->session->flashdata('pesan')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert"> Selamat <strong>Tahun Baru.</strong> Sebelum mengunakan aplikasi <?= $this->session->flashdata('pesan'); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              <?php endif; ?>
                  <a href="<?=base_url('page/profile')?>"><img src="<?=base_url('assets/img/'. $user['foto']);?>" alt="" class="img-circle img-fluid"></a>
              </div>
            </div><br>
              <h6 class="text text-center mt-2s">Saldo Saat Ini</h6>
              <h1 class="text text-center font-weight-bold">
                Rp. <?=number_format($tot_kas,0,',','.'); ?>
              </h1><br>
                <h3 class="text text-uppercase"><center>Menu Utama</center></h3><br> 
            <div class="row">
              <!-- menu1 -->
              <div class="col-xl-3 col-md-6  mb-4">
                <div class="card shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                          <a href="<?=base_url('page/kasmasuk');?>"><h3>Kas Masuk</h3></a></div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-mail-forward fa-4x"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- menu2 -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><a href="<?=base_url('page/kaskeluar');?>"><h3>Kas Keluar</h3></a></div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-mail-reply fa-4x"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- menu4 -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><a href="<?=base_url('page/analisis');?>"><h3>Analisis</h3></a></div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-dashboard fa-4x"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- menu3 -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><a href="<?=base_url('page/laporan');?>"><h3>Laporan</h3></a></div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-file-o fa-4x"></i>
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
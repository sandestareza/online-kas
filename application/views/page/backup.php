<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengaturan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php if ($this->session->flashdata('pesan')) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert"> Data <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  <?php endif; ?>
                    <h4>Backup dan Delete Data</h4>
                    <a href="<?=base_url('page/backup/pdf'); ?>" class="btn btn-primary">Backup All</a>
                    <a href="<?=base_url('page/backup/format'); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin memformat semua data?');">Delete All</a>
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

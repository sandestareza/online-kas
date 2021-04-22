<!-- page content -->
        <div class="right_col" role="main">
          <div class="container-fluid">
              <h3 class="text text-uppercase"><center><?=$judul; ?></center></h3><br> 
          </div>
          <!-- Content -->
          <div class="card-header py-3">
          </div>
          <div class="x_panel">
              <form class="form-horizontal form-label-left" action="<?=base_url('page/admin/laporan');?>" method="post">
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Dari Tanggal <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="date" name="dari"class="form-control col-md-7" value="<?= date('Y-m-d')?>">
                  <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Sampai Tanggal <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="date" name="sampai"class="form-control col-md-7" value="<?= date('Y-m-d')?>">
                  <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success ">Cari</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright &copy;<?=date('Y');?> Sandesta Reza
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

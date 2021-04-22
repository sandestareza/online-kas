<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <h2>Ganti Password</h2>
                <div class="x_panel">
                <?php if ($this->session->flashdata('pesan')) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert"> Password
                    <strong><?= $this->session->flashdata('pesan'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <form method="post" action="<?=base_url('page/admin/profile/gantipassword')?>">
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">Password Lama
                  </label>
                  <div class="col-md-7">
                    <input type="password" name="old"  class="form-control col-md-7" value="">
                    <?= form_error('old', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">Password Baru
                  </label>
                  <div class="col-md-7">
                    <input type="password" name="new"  class="form-control col-md-7" value="">
                    <?= form_error('new', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">Ulang Password
                  </label>
                  <div class="col-md-7">
                    <input type="password" name="pass"  class="form-control col-md-7" value="">
                    <?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              
                <div class="form-group row">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?=base_url('page/admin/profile')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
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
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

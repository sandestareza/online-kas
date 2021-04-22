<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <h2>Edit Profile</h2>
                <div class="x_panel">
            <div class="x_panel">
                <?=form_open_multipart('page/admin/profile/edit_aksi');?>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">Nama
                  </label>
                  <div class="col-md-7">
                    <input type="hidden" name="id_user"  class="form-control col-md-7" value="<?=$user['id_user']?>">
                    <input type="text" name="nama"  class="form-control col-md-7" value="<?=$user['nama']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">Perusahaan
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="perusahaan"  class="form-control col-md-7" value="<?=$user['perusahaan']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">Email
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="email"  class="form-control col-md-7" value="<?=$user['email']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">Wa
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="wa"  class="form-control col-md-7" value="<?=$user['wa']?>">
                  </div>
                </div>
            </div>  
            <div class="x_panel">
                <div class="form-group row">
                <label class="control-label col-md-3" for="first-name">Foto</label>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <img src="<?=base_url('assets/img/').$user['foto']?>" class="img-circle img-fluid">
                </div>
                <div class="col-sm-4">
                  <div class="custom-file mt-2">
                    <input type="file" class="custom-file-input" id="foto" name="foto">
                    <label class="custom-file-label" for="customFile">Ganti foto</label>
                  </div>
                </div>
              </div>
            </div>
                <div class="form-group row">
                  <div class="col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-success float-right">Simpan</button>
                    <a href="<?=base_url('page/admin/profile')?>" class="btn btn-danger float-right">Batal</a>
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

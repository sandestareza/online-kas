 <!-- page content -->
        <div class="right_col" role="main">
          <div class="container-fluid">
              <h3 class="text text-uppercase"><center><?=$judul; ?></center></h3><br> 
          </div>
          <!-- Content -->
          <div class="card-header py-3">
          </div>
          <div class="x_panel">
            <?php if ($this->session->flashdata('pesan')) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert"> Data <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              <?php endif; ?>
              <form class="form-horizontal form-label-left" action="<?=base_url() .'page/admin/user/tambah_aksi'; ?>" method="post">
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Nama <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="nama" name="last-name" class="form-control col-md-7">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Perusahaan/Organisasi <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="perusahaan" name="last-name" class="form-control col-md-7">
                    <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">No.Hp/Wa <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="wa" name="last-name" class="form-control col-md-7">
                    <?= form_error('wa', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="ket">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="text" class="form-control col-md-7" name="email">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="ket">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="password" class="form-control col-md-7" name="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="ket">Role <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                      <select name="role_id" class="form-control col-md-7">
                        <option value="">---Pilih Role---</option>
                        <option value="1">Administrator</option>
                        <option value="2">Member</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="ket">Blokir <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <select name="blokir" class="form-control col-md-7">
                      <option value="">---Pilih Blokir---</option>
                      <option value="1">Tidak</option>
                      <option value="0">Ya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success ">Submit</button>
                  </div>
                </div>
              </form>
          </div>

          <div class="x_panel">
            <div class="row">
              <div class="col-sm-12">
                  <div class="card-box table-responsive">
                     <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Blokir</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($pengguna as $row) :?>
                        <tr>
                          <td><?=$row->id_user; ?></td>
                          <td><?=$row->nama; ?></td>
                          <td><?=$row->email; ?></td>
                          <td>
                            <?php
                            if($row->role_id==1){
                              echo "Administrator";
                            } else{
                              echo "Member";
                            }
                           ?>
                             
                           </td>
                           <td>
                            <?php
                            if($row->blokir==1){
                              echo "Aktif";
                            } else{
                              echo "Non aktif";
                            }
                           ?>
                             
                           </td>
                          <td><a href="#" id="detail" 
                              data-toggle="modal" data-target=".bs-example-modal-lg-user"
                              data-id_user="<?=$row->id_user; ?>"
                              data-nama="<?=$row->nama; ?>"
                              data-perusahaan="<?=$row->perusahaan;?>" 
                              data-wa="<?=$row->wa;?>"
                              data-email="<?=$row->email;?>"
                              data-password="<?=$row->password;?>"
                              class="badge badge-pill badge-info">
                              <i class="fa fa-eye"></i> Detail</a>

                              <a href="#" id="edit" 
                              data-toggle="modal" data-target=".bs-example-modal-lg"
                              data-id_user="<?=$row->id_user; ?>"
                              data-nama="<?=$row->nama; ?>"
                              data-perusahaan="<?=$row->perusahaan;?>" 
                              data-wa="<?=$row->wa;?>"
                              data-email="<?=$row->email;?>"
                              data-password="<?=$row->password;?>"
                              data-role_id="<?=$row->role_id;?>"
                              data-blokir="<?=$row->blokir;?>"
                              class="badge badge-pill badge-warning">
                              <i class="fa fa-edit"></i> Edit</a>
                              <a href="<?=base_url();?>page/admin/user/hapus/<?=$row->id_user?>"
                              class="badge badge-pill badge-danger" onclick="return confirm('yakin?');">
                              <i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
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

    <!-- modal edit -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit user</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
              <!-- isi modal -->
          <div class="modal-body" id="edit_aksi">
          <div class="container">
            <div class=" form-group row">
              <div class="col-md-6">
                <form action="<?= base_url().'page/admin/user/edit_aksi'; ?>" method="post">
                  <label>Nama</label>
                  <input type="hidden" name="id_user" id="id_user" value="">
                  <input type="text" name="nama" class="form-control" id="nama" value="">
                  <label>Perusahaan/Organisasi</label>
                  <input type="text" name="perusahaan" class="form-control" id="perusahaan" value="">
                  <label>No.Wa</label>
                  <input type="number" name="wa" class="form-control" id="wa" value="">
                  <label>Role</label>
                    <select name="role_id" class="form-control" id="role_id">
                        <option value="">---Pilih Blokir---</option>
                        <option value="1">Administrator</option>
                        <option value="2">Member</option>
                    </select>
              </div>
              <div class="col-md-6">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" id="email">
                  <label>Password</label>
                  <input type="text" name="password" class="form-control" id="password">
                  <label>Blokir</label>
                    <select name="blokir" class="form-control" id="blokir">
                        <option value="">---Pilih Blokir---</option>
                        <option value="1">Tidak</option>
                        <option value="0">Ya</option>
                    </select>
              </div>
            </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-2"> Ubah</button>
                  </div>
                </form>
          </div>
          </div>
        </div>
      </div>
    </div>
<!-- end Modal edit-->

  <!-- modal detail -->
  <div class="modal fade bs-example-modal-lg-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Detail user</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
              <!-- isi modal -->
          <div class="modal-body" id="detail_aksi">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-responsive" style="width:100%">
                  <tr>
                    <th>Nama</th>
                    <th><p id="nama"></p></th>
                  </tr>
                  <tr>
                    <th>Perusahaan</th>
                    <th><p id="perusahaan"></p></th>
                  </tr>
                  <tr>
                    <th>No.Wa</th>
                    <th><p id="wa"></p></th>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <th><p id="email"></p></th>
                  </tr>
                  <tr>
                    <th>Password</th>
                    <th><p id="password"></p></th>
                  </tr>                 
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
<!-- end Modal detail -->
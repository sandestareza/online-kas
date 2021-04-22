<!-- page content -->
        <div class="right_col" role="main">
          <div class="container-fluid">
              <h3 class="text text-uppercase"><center>Kas Keluar</center></h3><br> 
          </div>
          <!-- Content -->
          <div class="card-header py-3">
              <a href="<?= base_url('page/beranda'); ?>"><i class="fa fa-arrow-circle-o-left"> Kembali</i></a>
          </div>
          <div class="x_panel">
              <?php if ($this->session->flashdata('pesan')) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert"> Data <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              <?php endif; ?>
              <form class="form-horizontal form-label-left" action="<?= base_url().'page/kaskeluar/tambah_aksi'; ?>" method="post">
                <div class="form-group row">
                  <label class="control-label col-md-3" for="first-name">No. Kas Keluar
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="no" class="form-control col-md-7" value="<?=$no; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Tanggal<span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="date" name="tanggal" class="form-control col-md-7" value="<?= date('Y-m-d')?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Kredit <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="kredit" class="form-control col-md-7" id="nominal">
                    <?= form_error('kredit', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="ket">Keterangan <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <textarea class="form-control col-md-7" name="ket"></textarea>
                    <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
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
                          <th>#</th>
                          <th>No. Kas Keluar</th>
                          <th>Tanggal</th>
                          <th>Kredit</th>
                          <th>Keterangan</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=1;
                        foreach($kaskeluar as $row) : ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$row->no;?></td>
                          <td><?=date('d M Y',strtotime($row->tanggal));?></td>
                          <td>Rp.<?=number_format($row->kredit,0,',','.');?></td>
                          <td><?=$row->ket;?></td>
                          <td class="text-center">
                            <a id="edit" href="#"  data-toggle="modal" data-target=".bs-example-modal-lg"
                            data-id_kas="<?=$row->id_kas; ?>"
                            data-no="<?=$row->no; ?>"
                            data-tanggal="<?=$row->tanggal;?>" 
                            data-kredit="<?=$row->kredit;?>"
                            data-ket="<?=$row->ket;?>"
                            class="badge badge-pill badge-primary"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="<?=base_url(); ?>page/kaskeluar/hapus/<?= $row->id_kas; ?>"
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
            <span class="text-danger" style="font-size: 14px;">
              Version 1.0</span>
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
          <h4 class="modal-title" id="myModalLabel">Edit <?=$judul; ?></h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
              <div class="modal-body" id="edit_aksi">
                <form class="form-horizontal form-label-left" action="<?= base_url().'page/kaskeluar/edit_aksi'; ?>" method="post">
                <div class="form-group row">
                  <label class="control-label col-md-4" for="first-name">No. Kas Keluar
                  </label>
                  <div class="col-md-7">
                    <input type="hidden" name="id_kas" id="id_kas">
                    <input type="text" name="no" class="form-control col-md-14" value="" id="no" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-4" for="last-name">Tanggal<span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="date" name="tanggal" class="form-control col-md-14" value="<?= date('Y-m-d')?>" id="tanggal">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-4" for="last-name">kredit <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="text" name="kredit" class="form-control col-md-14" value="" id="kredit">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-4" for="ket">Keterangan <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <textarea class="form-control col-md-14" name="ket" id="ket"></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
        </div>
      </div>
    </div>
<!-- end Modal edit-->
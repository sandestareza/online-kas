<!-- page content -->
        <div class="right_col" role="main">
          <div class="container-fluid">
              <h3 class="text text-uppercase"><center><?=$judul; ?></center></h3><br> 
          </div>
          <!-- Content -->
          <div class="card-header py-3">
              <a href="<?= base_url('page/beranda'); ?>"><i class="fa fa-arrow-circle-o-left"> Kembali</i></a>
          </div>
          <div class="x_panel">
              <form class="form-horizontal form-label-left" action="<?=base_url('page/laporan');?>" method="POST">
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Dari Tanggal <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="date" name="dari" class="form-control col-md-7"
                    value="<?= date('Y-m-d')?>">
                  <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3" for="last-name">Sampai Tanggal <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="date" name="sampai" class="form-control col-md-7"
                    value="<?= date('Y-m-d')?>">
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
          <div class="x_panel">
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-sm btn-info mb-3" href="<?=base_url('page/laporan/cetak/?dari='.set_value('dari').'&sampai='.set_value('sampai'))?>" target="_blank">
                  <i class="fa fa-print"></i> Cetak
                </a>
                  <div class="card-box table-responsive">
                     <table id="data" class="table table-striped table-bordered" style="width:100%">
                <thead class="table-success text text-center">
                <tr>
                    <th rowspan="2">Nomor</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">Keterangan</th>
                    <th colspan="2" class="text text-center">Nominal</th>
                    <th rowspan="2">Saldo Akhir</th>
              </tr>
              <tr>
                    <th>Debit</th>
                    <th>Kredit</th>
              </tr>
                </thead>
            <tbody>
              <?php
                $saldo=0;
                foreach ($kas as $row) : 
                  
                  $debit =$row['debit'];
                  $kredit =$row['kredit'];
                  $saldo += $debit-$kredit;

                ?>
                <tr>
                  <td width="100px"><?=$row['no'];  ?></td>
                  <td width="100px">
                    <?= date('d-m-Y',strtotime($row['tanggal'])); ?>
                  </td>
                  <td width="350px"><?=$row['ket']; ?></td>
                  <td class="text-right" width="350px">Rp.<?= number_format($row['debit'],0,',','.'); ?></td>
                  <td class="text-right" width="350px">Rp.<?= number_format($row['kredit'],0,',','.'); ?></td>
                  <td class="text-right" width="350px">Rp.<?= number_format($saldo,0,',','.'); ?></td>
                </tr> 
              <?php endforeach; ?>
              <tfoot>
                <tr>
                   <td colspan="5" class="text-right"><h5>Saldo saat ini</h5></td>
                   <td class="text-right"><h5>Rp.<?= number_format($saldo,0,',','.'); ?></h5></td>
                </tr>
              </tfoot>
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
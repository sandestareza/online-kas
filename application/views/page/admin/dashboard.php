    <!-- page content -->
        <div class="right_col" role="main">
          <div class="container-fluid">
            <h4>Dashboard</h4>
            <hr>
            <div class="row">
              <div class="col-md-12">
               <div class="animated flipInY">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count"><?=$member;?></div>
                  <h3>Member</h3>
                  <p>Total member yang aktif saat ini</p>
                </div>
               </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Data Kas <small>Member</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="data" class="table table-striped table-bordered" style="width:100%">
                    <thead class="text text-center">
                      <tr>
                        <th width="10px">#</th>
                        <th>Nama member</th>
                        <th>Total kas</th>
                      </tr>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach ($kas as $row): ?>
                        <tr>
                          <td><?=$no++?></td>
                          <td><?=$row->nama;?></td>
                          <td>Rp.<?= number_format($row->debit-$row->kredit,0,',','.'); ?></td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </thead>
                  </table>
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
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
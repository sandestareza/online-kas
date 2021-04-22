<!-- page content -->
        <div class="right_col" role="main">
          <div class="container-fluid">
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="text text-center mt-2s">Saldo Saat Ini</h6>
                <h1 class="text text-center font-weight-bold">
                Rp. <?=number_format($tot_kas,0,',','.'); ?></h1>
              </div>
              <div class="col-sm-4">
                <h6 class="text text-center mt-2s">Saldo Kas Masuk</h6>
                <h1 class="text text-center font-weight-bold">
                  Rp. <?=number_format($tot_kasm,0,',','.'); ?></h1>
              </div>
              <div class="col-sm-4">
                <h6 class="text text-center mt-2s">Saldo Kas Keluar</h6>
                <h1 class="text text-center font-weight-bold">
                  Rp. <?=number_format($tot_kask,0,',','.'); ?></h1>
              </div>
            </div>
            <hr>
            <div class="row">
              <!-- Line -->
              <!-- <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kas Masuk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="line_Chart"></canvas>
                  </div>
                </div>
              </div> -->
              <!-- Line2 -->
              <!-- <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kas Keluar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="line_Chartt"></canvas>
                  </div>
                </div>
              </div> -->
              <!-- Bar -->
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perbandingan Per Bulan<small>Kas Masuk dan Keluar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="mybar"></canvas>
                  </div>
                </div>
              </div>
              <!-- Donat -->
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perbandingan Total <small>Kas Masuk dan Keluar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="canvas_Doughnut"></canvas>
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
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
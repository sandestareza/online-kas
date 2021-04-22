
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Buku Kas Online | Login</title>

    <!-- Bootstrap -->
    <link href="<?=base_url('assets/');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('assets/');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('assets/');?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url('assets/');?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets/');?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?=base_url().'auth/proses_register'?>">
              <h1>Register Form</h1>
              <?= $this->session->flashdata('pesan'); ?>
              <div>
                <?= form_error('nama', '<div class="text-danger">','</div>'); ?>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?=set_value('nama')?>"/>
              </div>
              <div>
                <?= form_error('perusahaan', '<div class="text-danger">','</div>'); ?>
                <input type="text" class="form-control" placeholder="Perusahaan/Organisasi" name="perusahaan" value="<?=set_value('perusahaan')?>"/>
              </div>

              <div>
                <?= form_error('wa', '<div class="text-danger">','</div>'); ?>
                <input type="text" class="form-control" placeholder="No.Hp/Wa" name="wa" value="<?=set_value('wa')?>"/>
              </div>
              <div>
                <?= form_error('email', '<div class="text-danger">','</div>'); ?>
                <input type="text" class="form-control" placeholder="Email" name="email"/>
              </div>
              <div class="form-group row">
                <div class="col-md-6 col-sm-6">
              <?= form_error('password1', '<div class="text-danger">','</div>'); ?>
                <input type="password" class="form-control" placeholder="Password" name="password1" id="password" />
                </div>
              <div class="col-md-6 col-sm-6">
              <?= form_error('password2', '<div class="text-danger">','</div>'); ?>
                  <input type="password" class="form-control" placeholder="Ulangi Password" name="password2"/>
              </div>
              </div>
              <div>
                <button class="btn btn-info btn-sm" type="submit">Daftar</button>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun?
                  <a href="<?=base_url('auth')?>" class="to_login"> Silahkan login</a>
                </p>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-calculator"></i> Buku Kas Online
                    <span class="text-danger" style="font-size: 14px;">Version 1.0</span>
                  </h1>
                  <p>Copyright &copy;<?=date('Y');?> Sandesta Reza</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

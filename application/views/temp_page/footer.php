    <!-- jQuery -->
    <script src="<?=base_url('assets/');?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('assets/');?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/');?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url('assets/');?>/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?=base_url('assets/');?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- Moris Js -->
    <script src="<?=base_url('assets/');?>/vendors/raphael/raphael.min.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="<?=base_url('assets/');?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url('assets/');?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/');?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?=base_url('assets/');?>/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?=base_url('assets/');?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url('assets/');?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?=base_url('assets/');?>/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?=base_url('assets/');?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url('assets/');?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('assets/');?>/build/js/custom.min.js"></script>

      <!-- Datatables -->
    <script src="<?=base_url('assets/');?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script src="<?=base_url('assets/');?>/vendors/datatables.net-buttons/js/buttons.print.js"></script>

    <!-- script untuk ubah foto profil -->
    <script>
    $('.custom-file-input').on('change', function(){
      let filename =$(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
  </script>

    <!-- script untuk table searching -->
  <script>
      $(document).ready( function () {
    $('#data').DataTable({
      "order": [[ 1, "asc" ]],
});

  });
  </script>

    <!-- modal edit kas masuk -->
    <script>
    $(document).on("click","#edit", function(){
      var id_kas        = $(this).data('id_kas');
      var no           = $(this).data('no');
      var tanggal             = $(this).data('tanggal');
      var debit               = $(this).data('debit');
      var ket               = $(this).data('ket');

      $("#edit_aksi #id_kas").val(id_kas);
      $("#edit_aksi #no").val(no);
      $("#edit_aksi #tanggal").val(tanggal);
      $("#edit_aksi #debit").val(debit);
      $("#edit_aksi #ket").text(ket);
    })  
  </script>

  <!-- modal edit kas keluar -->
    <script>
    $(document).on("click","#edit", function(){
      var id_kas        = $(this).data('id_kas');
      var no           = $(this).data('no');
      var tanggal             = $(this).data('tanggal');
      var kredit               = $(this).data('kredit');
      var ket               = $(this).data('ket');

      $("#edit_aksi #id_kas").val(id_kas);
      $("#edit_aksi #no").val(no);
      $("#edit_aksi #tanggal").val(tanggal);
      $("#edit_aksi #kredit").val(kredit);
      $("#edit_aksi #ket").text(ket);
    })  
  </script>

<!-- Inputan Rupiah -->
  <script>
  var rupiah = document.getElementById('nominal');
  rupiah.addEventListener('keyup',function(e){
    rupiah.value = formatRupiah(this.value, 'Rp. ');
  })

  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g,'').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      seperator = sisa ? '.' : '';
      rupiah += seperator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
  </script>

  <!-- modal edit user -->
    <script>
    $(document).on("click","#edit", function(){
      var id_user        = $(this).data('id_user');
      var nama           = $(this).data('nama');
      var perusahaan             = $(this).data('perusahaan');
      var wa               = $(this).data('wa');
      var email               = $(this).data('email');
      var password               = $(this).data('password');
      var role_id               = $(this).data('role_id');
      var blokir               = $(this).data('blokir');

      $("#edit_aksi #id_user").val(id_user);
      $("#edit_aksi #nama").val(nama);
      $("#edit_aksi #perusahaan").val(perusahaan);
      $("#edit_aksi #wa").val(wa);
      $("#edit_aksi #email").val(email);
      $("#edit_aksi #password").val(password);
      $("#edit_aksi #role_id").val(role_id);
      $("#edit_aksi #blokir").val(blokir);
    })  
  </script>

   <!-- modal detail user -->
    <script>
    $(document).on("click","#detail", function(){
      var id_user        = $(this).data('id_user');
      var nama           = $(this).data('nama');
      var perusahaan             = $(this).data('perusahaan');
      var wa               = $(this).data('wa');
      var email               = $(this).data('email');
      var password               = $(this).data('password');

      $("#detail_aksi #id_user").text(id_user);
      $("#detail_aksi #nama").text(nama);
      $("#detail_aksi #perusahaan").text(perusahaan);
      $("#detail_aksi #wa").text(wa);
      $("#detail_aksi #email").text(email);
      $("#detail_aksi #password").text(password);
    })  
  </script>

  </body>
</html>
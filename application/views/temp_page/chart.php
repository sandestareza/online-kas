<!-- Line kas masuk -->
<!-- <?php
  $bulan="";
  $jumlah=null;
    foreach ($line1 as $row) { 
            /*perhitungan*/
    $tanggal=$row->bulan;
    $bulan.="'$tanggal'".", ";
    $hasil=$row->nominal;
    $jumlah.="$hasil".", ";
    
  }?> -->

<!-- <script>
if ($('#line_Chart').length) {

        var ctx = document.getElementById("line_Chart");
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?=$bulan; ?>],
                datasets: [{
                    label: "Kas Masuk",
                    backgroundColor: "rgba(38, 185, 154, 0.31)",
                    borderColor: "rgba(38, 185, 154, 0.7)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: [<?=$jumlah; ?>]
                }]
            },
        });

    }

</script> -->

<!--Line kas keluar  -->
<!-- <?php
  $bulan="";
  $jumlah=null;
    foreach ($line2 as $row) { 
            /*perhitungan*/
    $tanggal=$row->bulan;
    $bulan.="'$tanggal'".", ";
    $hasil=$row->nominal;
    $jumlah.="$hasil".", ";
    
  }?> -->

<!-- <script>
if ($('#line_Chartt').length) {

        var ctx = document.getElementById("line_Chartt");
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?=$bulan; ?>],
                datasets: [{
                    label: "Kas Keluar",
                    backgroundColor: "rgba(3, 88, 106, 0.3)",
                    borderColor: "rgba(3, 88, 106, 0.70)",
                    pointBorderColor: "rgba(3, 88, 106, 0.70)",
                    pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(151,187,205,1)",
                    pointBorderWidth: 1,
                    data: [<?=$jumlah; ?>]
                }]
            },
        });

    }

</script> -->

<!-- bar -->
<?php
  $bulan="";
  $jumlah=null;
    foreach ($bar1 as $row) { 
            /*perhitungan*/
    $tanggal=$row->bulan;
    $bulan.="'$tanggal'".", ";
    $hasil=$row->debit;
    $jumlah.="$hasil".", ";
    
  }?>

<?php
  $bulan2="";
  $jumlah2=null;
    foreach ($bar2 as $row) { 
            /*perhitungan*/
    $tanggal2=$row->bulan;
    $bulan2.="'$tanggal2'".", ";
    $hasil2=$row->kredit;
    $jumlah2.="$hasil2".", ";
    
  }?>

<script>

if ($('#mybar').length) {

        var ctx = document.getElementById("mybar");
        var mybarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?=$bulan;?>],
                datasets: [{
                    label: 'Kas Masuk',
                    backgroundColor: "#26B99A",
                    data: [<?=$jumlah;?>]
                }, {
                    label: 'Kas Keluar',
                    backgroundColor: "#03586A",
                    data: [<?=$jumlah2;?>]
                }]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    }
</script>
<?php
  $jumlah=null;
    foreach ($donat as $row) { 
            /*perhitungan*/
    $hasil=$row->total;
    $jumlah.="$hasil".", ";

   
  }?>
<!-- Donat -->
<script>
    
    if ($('#canvas_Doughnut').length) {

        var ctx = document.getElementById("canvas_Doughnut");
        var data = {
            labels: [
                "Kas Masuk",
                "Kas Keluar"
            ],
            datasets: [{
                data: [<?=$jumlah;?>],
                backgroundColor: [
                    "#26B99A",
                    "#03586A"
                ],
                hoverBackgroundColor: [
                    "#36CAAB",
                    "#23586A"
                ]

            }]
        };

        var canvasDoughnut = new Chart(ctx, {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: data
        });

    }
</script>
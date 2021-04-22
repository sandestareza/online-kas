<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Laporan <?=$judul; ?> <?=date('Y');?></title>
</head>
<body>
<h3><center><?=$judul; ?> <?=date('Y');?><br>
<?=$user['perusahaan']?></center></h3><br> 
       <table border="1" style="width:100%">
                <thead  style="text-align:center">
                <tr>
                    <th rowspan="2">Nomor</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">Keterangan</th>
                    <th colspan="2" style="text-align:center">Nominal</th>
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
                  <td><?=$row['no'];  ?></td>
                  <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                  <td><?=$row['ket']; ?></td>
                  <td style="text-align:right;">Rp.<?= number_format($row['debit'],0,',','.'); ?></td>
                  <td style="text-align:right;">Rp.<?= number_format($row['kredit'],0,',','.'); ?></td>
                  <td style="text-align:right;">Rp.<?= number_format($saldo,0,',','.'); ?></td>
                </tr> 
              <?php endforeach; ?>
              <tfoot>
                <tr>
                   <td colspan="5" style="text-align:right;">Saldo saat ini</td>
                   <td style="text-align:right;">Rp.<?= number_format($saldo,0,',','.'); ?></td>
                </tr>
              </tfoot>
            </tbody>
            </table>
          </body>
          </html>
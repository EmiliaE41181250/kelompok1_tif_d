<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Mahasiswa</title>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      margin: 0;
      font-family: 'Roboto', serif;
      font-weight: 100;
    }

    .judul{
      text-align: center;
      padding-bottom:20px;
    }

    .container {
      padding: 0px auto 5px;
    }

    table {
      width: 90%;
      margin: 10px auto;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 9px;
      border: solid 2px black;
      color: #000;
    }

    th {
      text-align: center;
    }

  </style>
</head><body>

<div style="text-align: center; border-bottom: solid 1px black; padding-bottom: 10px;">
    <h1>Orenz Laundry</h1>
    Alamat Orenz Laundry <br>
    Nomor Telepon (0331)442211 <br>
</div>
<div class="judul">
  <h2>Laporan Data Transaksi</h2>
</div><br>

<div style="
  width:100%;
  margin: auto;
  text-align:left;
  ">Tanggal : <?=date('Y-m-d H:i:s')?>
</div>

<div class="container">
  <table width="100%">
    <tr>
      <th>No</th>
      <th>Nama Customer</th>
      <th>Tanggal Waktu</th>
      <th>Total</th>
    </tr>
    
    <?php 
    $no = 1;
    foreach ($transaksi as $trs) { ?>

        <tr style="text-align:center;">
          <td><?=$no++?></td>
          <td style="text-align:left;"><?php foreach($user as $usr){echo $trs->id_user == $usr->id_user ? $usr->nama_user : "";} ?></td>
          <td style="text-align:center;"><?=substr($trs->tgl_transaksi, 0, 10)?></td>
          <td>Rp. <?=number_format($trs->total_harga, 0, ",", ".")?></td>
        </tr>

    <?php }?>
    
  </table>
</div>
  
</body></html>
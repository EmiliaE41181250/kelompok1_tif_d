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
  <h2>Nota Transaksi Orenz Laundry</h2>
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
      <th>Tanggal dan Waktu</th>
      <th>Paket</th>
      <th>Berat</th>
      <th>Harga</th>
      <th>Total</th>
    </tr>
    
    <?php 
    $no = 1;
    foreach ($promo as $prm) { ?>

        <tr style="text-align:center;">
          <td><?=$no++?></td>
          <td style="text-align:left;"><?=$prm->judul_promo?></td>
          <td style="text-align:justify;"><?=$prm->deskripsi?></td>
          <td><?=$prm->jumlah?>%</td>
          <td><?=$prm->awal?></td>
          <td><?=$prm->akhir?></td>
          <td><?=$prm->status?></td>
        </tr>

    <?php }?>
    
  </table>
</div>
  
</body></html>
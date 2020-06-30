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
      <th>Tanggal dan Waktu</th>
      <th>Paket</th>
      <th>Berat</th>
      <th>Harga</th>
      <th>Total Harga</th>
      <th>Diskon</th>
      <th>Tanggal Jemput</th>
      <th>Total Antar</th>
    </tr>

    <?php 
    $no = 1;
    foreach ($transaksi as $trns) { ?>

        <tr style="text-align:center;">
          <td><?=$no++?></td>
          <td style="text-align:justify;"><?=$trns->tgl_transaksi?></td>
          <td><?=$dt->nama_paket?>%</td>
          <td><?=$dt->berat?></td>
          <td><?=$dt->harga?></td>
          <td><?=$dt->total_harga?></td>
          <td><?=$dt->diskon?></td>
          <td><?=$trns->tgl_jemput?></td>
          <td><?=$trns->tanggall_antar?></td>
        </tr>

    <?php }?>
    
  </table>
</div>
</body>
</html>
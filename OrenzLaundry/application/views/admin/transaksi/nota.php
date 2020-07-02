<!DOCTYPE html>
<html><head>
  <title> Nota </title>
  <style type="text/css">
    body{ font-family: "Helvetica"; }
    
    .content {
      width: 80mm;
      font-size: 12px;
      padding: 5px;
    }
    .title {
      text-align: center;
      font-size: 13px;
      padding-bottom: 5px;
      border-bottom: 1px dashed;
    }
    .head {
      margin-top: 5px;
      margin-bottom: 10px;
      padding-bottom: 10px;
      border-bottom: 1px solid;
    }
    table {
      width: 100%;
      font-size: 12px;
    }
    .thanks {
        margin-top: 10px;
        padding-top: 10px;
        text-align: center;
        border-top: 1px dashed;
    }
    @media print{
      @page{
        width: 80mm;
        margin: 0mm;
      }

    }
    </style>
    </head><body">
      <div class="content">
        <div class="title">
        <b> Orenz Laundry Jember </b>
        <br>
        Perumahan Mastrip Blok G-21 Jember
        <br>
        081556885614
        </div>

        <div class="head">
          <table cellspacing="0" cellpading="0">
          <?php foreach($transaksi as $trs){ ?>
            <tr>
              <td style ="width:150px">
              <?php echo date("d/m/Y H:i:s");?>
              </td>
              <td> Cashier </td>
              <td style="text-align:center;">:</td>
              <td syle="text-align:left">
                <?php foreach($admin as $adm){ if($trs->id_admin == $adm->id_admin){ echo $adm->nama_admin;} } ?>
              </td>
            </tr>
            <tr>
              <td>
              <?=$trs->id_transaksi?>
              </td>
              <td> Customer </td>
              <td style="text-align:center">:</td>
              <td style="text-align:left">
              <?php foreach($user as $usr){ if($trs->id_user == $usr->id_user){ echo $usr->username;} } ?>
              </td>
            </tr>
          </table>
        </div>
        
        <div class="transaction">
          <table class="transacion-table" cellspacing="0" cellpading="0">

          <tr>
              <td style="width:145px">Nama Paket</td>
              <td>Berat</td>
              <td style="text-align:right;">Harga</td>
              <td style="text-align:right;">
              Subtotal
              </td>
          </tr>


          <?php foreach($detail as $dt){?>
          <tr>
              <td style="width:145px"><?php foreach($paket as $pkt){ if($dt->id_paket == $pkt->id_paket){ echo $pkt->nama_paket;} }?></td>
              <td><?=$dt->berat?></td>
              <td style="text-align:right;">
              <?php foreach($paket as $pkt){ if($dt->id_paket == $pkt->id_paket){ echo $pkt->harga;} }?></td>
              <td style="text-align:right;">
                Rp. <?=number_format($dt->sub_total, 0, ",", ".")?>
              </td>
          </tr>
          <?php } ?>
          
          <tr>
              <td style="border-top:1px dashed; width:145px;"></td>
              <td colspan="2" style="border-top:1px dashed; text-align:right; padding:10px 0 0; "> Discount :</td>
              <td style="border-top:1px dashed; text-align:right; padding:10px 0 0;">
              <?php foreach($promo as $prm){ if($trs->id_promo == $prm->id_promo){ echo $prm->jumlah;} }?> %
              </td>
          </tr>

          <tr>
              <td style="width:145px;"></td>
              <td colspan="2" style="text-align:right; "> Grand Total :</td>
              <td style="text-align:right;">
                Rp.<?=number_format($trs->total_harga, 0, ",", ".")?>
              </td>
          </tr>

            
          <?php } ?>
          </table>
          </div>
          <div class="thanks">
          ---- Terimakasih telah memesan ----
          </div>
          </div>
          </body></html>

          
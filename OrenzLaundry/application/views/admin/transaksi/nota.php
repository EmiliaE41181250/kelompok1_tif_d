<html mozmonarginboxes mozdisallowselectionprint>
<head>
  <title> Nota </title>
  <style type="text/css">
    htlm { font-family: "Verdana, Arial"; }
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
    </head>
    <body onload="window.print()">
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
          <tr>
          <td style ="width:200px">
          <?php
            echo Date("d/m/Y, strtotime($sale->date))." ". Date("H:i", strtotime($scale->sale_created));
            ?>
            </td>
            <td> Cashier </td>
            <td style="text-align:center; width:10px">:</td>
            <td syle="text-align:right">
                <?=ucfirst(
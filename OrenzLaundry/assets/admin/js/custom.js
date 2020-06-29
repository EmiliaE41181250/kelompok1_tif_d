
    $(document).ready(function(){

      $("#berat").keyup(function() {
          var harga = parseInt($("#harga").val());
          var berat = parseFloat($("#berat").val());

          $("#sub_total").val(parseInt(harga * berat));
      });

      var harga;

      $("#nama_paket").change(function () {
        $(this).find("option:selected").each(function () {
          harga = $(this).attr("harga");
          var berat = parseFloat($("#berat_tambah").val());

          $("#sub_total").val(parseInt(harga * berat));
        });
      }).change();

      $("#berat_tambah").keyup(function() {
        var berat = parseFloat($("#berat_tambah").val());

        $("#sub_total").val(parseInt(harga * berat));
    });
    });
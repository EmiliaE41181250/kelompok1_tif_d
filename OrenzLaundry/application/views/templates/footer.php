<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Orenz Laundry 2020</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('admin/login/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap core JavaScript-->

<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/admin/js/sb-admin-2.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/admin/js/demo/datatables-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?php //base_url()
                  ?>assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="<?php //base_url()
                ?>assets/admin/js/demo/chart-pie-demo.js"></script> -->


<script>
  $("#monthpicker").datepicker({
    format: "yyyy-mm",
    startView: "months",
    minViewMode: "months"
  });
</script>

<script>
  $("#yearpicker").datepicker({
    format: "yyyy",
    startView: "years",
    minViewMode: "years"
  });
</script>

<script>
  $('#tanggal_dari').datetimepicker({
    lang: 'en',
    timepicker: false,
    format: 'Y-m-d',
    closeOnDateSelect: true
  });
  $('#tanggal_sampai').datetimepicker({
    lang: 'en',
    timepicker: false,
    format: 'Y-m-d',
    closeOnDateSelect: true
  });
</script>

<script>
  $(document).ready(function() {

    function load_unseen_notification(view = '') {
      $.ajax({
        url: "<?= base_url() . "admin/notifikasi/fetch_notif" ?>",
        method: "POST",
        data: {
          view: view
        },
        dataType: "json",
        success: function(data) {
          $('.wadah-notif-dropdown').html(data.notification);
          if (data.unseen_notification > 0) {
            $('.notif-count').html(data.unseen_notification);
          }
        }
      });
    }

    load_unseen_notification();

    setInterval(function() {
      load_unseen_notification();;
    }, 5000);

  });
</script>

</body>

</html>
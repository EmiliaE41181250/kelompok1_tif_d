<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Paket <a class="btn btn-primary" href="<?= base_url() . 'admin/C_pelanggan/tambah'; ?>">
<i class="fas fa-user-plus"></i></a></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Paket</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
        <?php 
        foreach ($paket as $pk ) { ?>
          <tr>
            <td><?=$pk->nama_paket?></td>
            <td><?=$pk->harga?></td>
            <td>
            <?php if ($tr['status'] == 1) : ?>
                <div class='alert alert-success small'><i class='fas fa-check'></i></div>
            <?php else : ?>
                <a class='btn btn-warning' href='' <i class='fas fa-check'></i></a>
            <?php endif; ?>
            </td>
            <td>
              <a class="btn btn-primary" href="<?php echo base_url('admin/C_pelanggan/edit/'. $tb->id_pelanggan); ?>"><i class="fas fa-pencil-alt"></i></a>
              <a class="btn btn-danger" href="<?php echo base_url('admin/C_pelanggan/hapus/'. $tb->id_pelanggan); ?>"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
          </tbody>
        </table>
        </div>
    </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
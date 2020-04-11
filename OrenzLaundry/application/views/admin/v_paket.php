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
            <th>Nama</th>
            <th>Alamat</th>
            <th>No telepon</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No telepon</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
        <?php 
        foreach ($tb_pelanggan as $tb ) { ?>
          <tr>
            <td><?=$tb->nama_pelanggan?></td>
            <td><?=$tb->alamat?></td>
            <td><?=$tb->no_telepon?></td>
            <td><?=$tb->jenis_kelamin?></td>
            <?php date_default_timezone_set('Asia/Jakarta');?>
            <td><?= $tb->tanggal . '&nbsp;' . $tb->jam?></td>
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
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data Customer</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/User"></i> Customer</a></li>
                    <li class="breadcrumb-item active">Edit Data Customer</li>
                </ul>
            </div>
            <div class="card-body">

                <?php foreach ($user as $usr) { ?>

                    <form action="<?= base_url() . 'admin/User/update' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?= $usr->id_user ?>">

                        <div class="form-group">
                            <label for="nama_user">Nama Customer</label>
                            <input value="<?= $usr->nama_user ?>" type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Masukkan Nama Customer . ." aria-describedby="NamaUser" maxlength="100" required>
                            <small id="NamaUser" class="text-muted">Masukkan Nama Customer tidak lebih dari 100 Karakter</small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input value="<?= $usr->alamat ?>" type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Customer . ." aria-describedby="Alamat" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option>Jenis Kelamin :</option>
                                <option value="Laki Laki" <?= $usr->jenis_kelamin == "Laki Laki" ? "selected" : "" ?>>Laki Laki</option>
                                <option value="Perempuan" <?= $usr->jenis_kelamin == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input value="<?= $usr->tgl_lahir ?>" type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input value="<?= $usr->no_hp ?>" type="text" name="no_hp" id="alamat" class="form-control" placeholder="Masukkan No.HP Customer . ." aria-describedby="NoHp" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?= $usr->email ?>" type="text" name="email" id="email" class="form-control" placeholder="Masukkan Alamat Email Customer . ." aria-describedby="Email" maxlength="100" required>
                        </div>

                        <div class="form-group">
                            <label for="saldo">Saldo</label>
                            <input value="<?= $usr->saldo ?>" type="number" name="saldo" id="saldo" class="form-control" placeholder="Masukkan Saldo Customer . ." aria-describedby="Saldo" min="0">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option>Pilih Status :</option>
                                <option value="1" <?= $usr->status == "1" ? "selected" : "" ?>>1</option>
                                <option value="0" <?= $usr->status == "0" ? "selected" : "" ?>>0</option>
                            </select>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary px-2 mr-1" type="submit">Simpan</button>
                            <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
                        </div>
                    </form>


            </div>
        </div>
    </div>


</div>

<?php } ?>
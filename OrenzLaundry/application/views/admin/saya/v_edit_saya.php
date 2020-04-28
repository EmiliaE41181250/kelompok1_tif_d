<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-7 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Profil Saya</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/C_saya"></i> Profil Saya</a></li>
                    <li class="breadcrumb-item active">Edit Profil</li>
                </ul>
            </div>
            <div class="card-body">

                <?php foreach ($admin as $adm) { ?>

                    <form action="<?= base_url() . 'admin/C_saya/update' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_admin" value="<?= $adm->id_admin ?>">

                        <div class="form-group">
                            <label for="judul_promo">Nama</label>
                            <input value="<?= $adm->nama_admin ?>" type="text" name="nama_admin" id="nama_admin" class="form-control" placeholder="Masukkan Nama Anda.." aria-describedby="Nama" maxlength="100" required>
                        </div>

                        <div class="form-group">
                            <label for="judul_promo">Alamat</label>
                            <input value="<?= $adm->alamat ?>" type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Anda.." aria-describedby="Alamat" maxlength="100" required>
                        </div>

                        <div class="form-group">
                            <label for="judul_promo">No. Hp</label>
                            <input value="<?= $adm->no_hp ?>" type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No.Hp Anda.." aria-describedby="NoHp" maxlength="100" required>
                        </div>

                        <div class="form-group">
                            <label for="judul_promo">No. Telp</label>
                            <input value="<?= $adm->no_telp ?>" type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan Nama Anda.." aria-describedby="Nama" maxlength="100" required>
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
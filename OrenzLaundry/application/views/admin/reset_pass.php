<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-7 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Saya</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Reset Password</li>
                </ul>
            </div>
            <div class="card-body">
            <?php echo $this->session->flashdata('pesan');?>
              <form action="<?=base_url('admin/login/reset_pass_logic')?>" method="post">
              <input type="hidden" name="id_admin" value="<?=$this->session->userdata('id_admin');?>">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password" required placeholder="Masukkan Password . .">
              </div>
              <div class="form-group">
                <label for="repass">Reinput Password</label>
                <input type="text" class="form-control" name="repass" id="repass" required aria-describedby="passwordHelp" placeholder="Masukkan Password . .">
              </div>
              <div class="text-center">
              <input type="submit" class="form-control btn btn-ijo w-25" value="Ubah Password">
              </div>
              </form> 
            </div>
        </div>
    </div>

</div>
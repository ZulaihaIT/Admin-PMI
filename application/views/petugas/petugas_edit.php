<?php $this->load->view('headfoot/header'); ?> 
<!-- Sidebar -->
<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data Petugas</h6>
    </div>
    <?php
    foreach ($petugas as $row){
      ?>
      <div class="card-body">
        <form method="post" action="<?php echo site_url('petugas/edit?id='. $this->uri->segment(3));?>" enctype="multipart/form-data">
         <div class="card-body">
          <form method="post" action="<?php echo site_url('petugas/insert');?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" 
            placeholder="Masukan Nama" required="" value="<?php echo $row->nama;?>">
          </div>
           <div class="form-group">
          <label for="jk">Jenis Kelamin</label>
          <input type="radio" class="form-control" name="jk" value="laki-laki" checked /> 
          Laki - Laki
          <input type="radio"  class="form-control" name="jk" value="perempuan" /> 
          Perempuan
        </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" 
            placeholder="Masukan Email" required="" value="<?php echo $row->email;?>">
          </div>
          <div class="form-group">
            <label for="no_tlp">No Telp</label>
            <input type="text" class="form-control" name="no_tlp" 
            placeholder="Masukan Telp" required="" value="<?php echo $row->no_tlp;?>">
          </div>
          <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <textarea class="form-control" rows="5" placeholder="Masukan Alamat" name="alamat" value=""required=""><?php echo $row->alamat;?></textarea>
                </div>
                <button class="btn btn-info" type="submit">Simpan</button>
      </form>
    <?php }?>
  </div>
</div>
</div>

<!--Row-->

</div>
</div>
</div>
<!---Container Fluid-->
</div>
<?php $this->load->view('headfoot/footer'); ?> 
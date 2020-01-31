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
      <h6 class="m-0 font-weight-bold text-primary">Input Data Petugas</h6>
    </div>
    <div class="card-body">
      <form method="post" action="<?php echo site_url('Petugas/insert');?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" name="nama" 
          placeholder="Masukan Nama" required="">
        </div>
        <div class="form-group">
          <label for="berat_badan">Jenis Kelamin</label>
          <input type="radio" class="custom-control custom-radio" name="jk" value="laki-laki" checked /> 
          Laki - Laki
          <input type="radio"  class="custom-control custom-radio" name="jk" value="perempuan" /> 
          Perempuan
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" 
          placeholder="Masukan Email" required="">
        </div>
        <div class="form-group">
          <label for="no_tlp">No Telp</label>
          <input type="text" class="form-control" name="no_tlp" 
          placeholder="Masukan No Telp" required="">
        </div>

        <div class="form-group">
          <label for="comment">Alamat :</label>
          <textarea class="form-control" rows="5" placeholder="Masukan Alamat" name="alamat" required=""></textarea>
        </div>

        <button class="btn btn-success" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>
<!--Row-->

</div>
<!---Container Fluid-->
</div>
</div>
<?php $this->load->view('headfoot/footer'); ?> 
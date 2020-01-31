<?php $this->load->view('headfoot/header'); ?> 
<!-- Sidebar -->
<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Darah</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active" aria-current="page">Data Darah</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Input Data Darah</h6>
    </div>
    <div class="card-body">
      <form method="post" action="<?php echo site_url('Darah/input_darah_proses');?>" enctype="multipart/form-data">
       <div class="form-group">
        <label for="in_stok">ID Darah</label>
        <input type="text" class="form-control" name="id_darah" value="<?php echo $iddarah?>" readonly placeholder="Masukan ID Darah" required="">
      </div>
      <div class="form-group">
        <label for="gol_darah">Golongan Darah:</label>
        <select name="gol_darah" class="form-control">
          <option value="">--Pilih Golongan Darah--</option>
          <option value="A">
            A
          </option>
          <option value="AB">
            AB
          </option>
          <option value="B">
            B
          </option>
          <option value="O">
            O
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" class="form-control" name="stok" 
        placeholder="Masukan Stok" required="">
      </div>
      <div class="form-group">
        <label for="usr">Barcode:</label><br>
        <img src= "http://bwipjs-api.metafloor.com/?bcid=qrcode&text=<?php echo $iddarah?>&scale=2"class="img-fluid">
        <input type="hidden" name="url_qr" value="http://bwipjs-api.metafloor.com/?bcid=qrcode&text=<?php echo $iddarah?>&scale=2">
<!-- http://bwipjs-api.metafloor.com/?bcid=code128&text=AB1234567890&scale=3&rotate=I&includetext
-->
</div>
</div>
<div class="form-group">
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
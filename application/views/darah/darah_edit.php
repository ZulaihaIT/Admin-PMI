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
      <h6 class="m-0 font-weight-bold text-primary">Edit Data Darah</h6>
    </div>
    <?php
    foreach ($darah as $row){
      ?>
      <div class="card-body">
        <form method="post" action="<?php echo site_url('Darah/edit?idDarah='.$this->uri->segment(3));?>" enctype="multipart/form-data">
         <div class="form-group">
          <label for="in_stok">ID Darah</label>
          <input type="text" class="form-control" name="id_darah" value="<?php echo $this->uri->segment(3)?>" readonly placeholder="Masukan ID Darah" required="">
        </div>
        <div class="card-body">
          <label for="gol_darah">Golongan Darah:</label>
          <select name="gol_darah" class="form-control">
            <option value="">--Pilih Golongan Darah--</option>
            <option value="A" <?php if($row->gol_darah=="A"){echo "selected ";}?>>A
            </option>
            <option value="AB" <?php if($row->gol_darah=="AB"){echo "selected ";}?>>
              AB
            </option>
            <option value="B" <?php if($row->gol_darah=="b"){echo "selected ";}?>>
              B
            </option>
            <option value="O" <?php if($row->gol_darah=="O"){echo "selected ";}?>>
              O
            </option>
          </select>
        </div>
        <div class="form-group">
          <label for="stok">Stok</label>
          <input type="number" class="form-control" name="stok" value="<?php echo $row->stok ?>" placeholder="Masukan Stok" required="">
        </div>
        <div class="form-group">
          <label for="usr">Barcode:</label><br>
          <img src= "http://bwipjs-api.metafloor.com/?bcid=qrcode&text=<?php echo $this->uri->segment(3)?>&scale=2"class="img-fluid">
          <input type="hidden" name="url_qr" value="http://bwipjs-api.metafloor.com/?bcid=qrcode&text=<?php echo $this->uri->segment(3)?>&scale=2">
<!-- http://bwipjs-api.metafloor.com/?bcid=code128&text=AB1234567890&scale=3&rotate=I&includetext
-->
</div>
</div>

<button class="btn btn-info" type="submit">Simpan</button>
</form>
<?php }?>
</div>
</div>
</div>

<!--Row-->

</div>

<!---Container Fluid-->
</div>
<?php $this->load->view('headfoot/footer'); ?> 
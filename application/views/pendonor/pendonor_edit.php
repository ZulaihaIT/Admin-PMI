<?php $this->load->view('headfoot/header'); ?> 
<!-- Sidebar -->
<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pendonor</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active" aria-current="page">Data Pendonor</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data Pendonor</h6>
    </div>
    <?php
    foreach ($pendonor as $row){
      ?>
      <div class="card-body">
        <form method="post" action="<?php echo site_url('Pendonor/edit?id='. $this->uri->segment(3));?>" enctype="multipart/form-data">
         <div class="card-body">
          <form method="post" action="<?php echo site_url('Pendonor/insert');?>" enctype="multipart/form-data">
           <div class="form-group form-group-lg">
            <div class="form-line">
              <label>Golongan Darah</label>
              <select class="form-control show-tick form-group-lg" name="gol_darah">                            
                <option value="">-- Pilih Golongan Darah--</option>
                <?php foreach ($darah as $a) { ?>
                  <option value="<?php echo $a->id_darah ?>"><?php echo $a->gol_darah; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" 
            placeholder="Masukan Nama" required="" value="<?php echo $row->nama;?>">
          </div>
          <div class="form-group">
            <label for="berat_badan">Berat Badan</label>
            <input type="text" class="form-control" name="berat_badan" 
            placeholder="Masukan Berat Badan" required="" value="<?php echo $row->berat_badan;?>">
          </div>
          <div class="form-group">
            <label for="tensi_darah">Tensi Darah</label>
            <input type="text" class="form-control" name="tensi_darah" 
            placeholder="Masukan Tensi" required="" value="<?php echo $row->tensi_darah;?>">
          </div>
          <div class="form-group">
            <label for="kadar_hb">Kadar HB</label>
            <input type="text" class="form-control" name="kadar_hb" 
            placeholder="Masukan Kadar Hb" required="" value="<?php echo $row->kadar_hb;?>">
          </div>
           <div class="form-group">
                    <label for="comment">Alamat :</label>
                    <textarea class="form-control" rows="5" placeholder="Masukan Alamat" name="alamat" required=""><?php echo $row->alamat;?></textarea>
                </div>
                <div>
         <button class="btn btn-info" type="submit">Simpan</button>
       </div>
      </form>
    <?php }?>
  </div>
</div>
</div>
  </div>

<!--Row-->

</div>
</div>
<!---Container Fluid-->
</div>
<?php $this->load->view('headfoot/footer'); ?> 
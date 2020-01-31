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
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Darah</h6>
          
        </div>
        <div class="table-responsive p-3">
          <p><a class="btn btn-info" href="<?php echo site_url('Darah/form');?>"><i class="fa fa-plus"></i>Tambah Data</a></p>
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>Golongan Darah</th>
                <th>Stok</th>
                <th>Barcode</th>
                <th>Tanggal Add</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $darah = $this->Darah_m->select_db();
              $no = 1;
              foreach ($darah as $row) {
                ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $row->gol_darah;?></td>
                  <td><?php echo $row->stok;?></td>
                  <td><img src="<?php echo base_url('assets/barcode/') . $row->gambar?>" style="width: 80px"></td>
                  <td><?php echo date_format(date_create($row->tgl_update), "d-m-Y H:i:s") ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm " href="<?php echo site_url('darah/select_by/'.$row->id_darah);?>"><i class="fa fa-edit"></i>EDIT</a>
                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('darah/delete/'.$row->id_darah);?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini??')"><i class="fas fa-trash"></i>DELETE</a>
                  </td>
                </tr>
              <?php } ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

</div>
<!---Container Fluid-->
</div>
<?php $this->load->view('headfoot/footer'); ?> 
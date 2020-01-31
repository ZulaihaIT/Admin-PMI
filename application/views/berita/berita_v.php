<?php $this->load->view('headfoot/header'); ?> 
<!-- Sidebar -->
<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="./">Home</a></li>
<li class="breadcrumb-item">Tables</li>
<li class="breadcrumb-item active" aria-current="page">Data Berita</li>
</ol>
</div>

<!-- Row -->
<div class="row">
<!-- DataTable with Hover -->
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>

</div>
<div class="table-responsive p-3">
<p><a class="btn btn-info" href="<?php echo site_url('Berita/form');?>"><i class="fa fa-plus"></i>Tambah Data</a></p>
<table class="table align-items-center table-flush table-hover" id="dataTableHover">
<thead class="thead-light">
<tr>
<th>NO</th>
<th>Judul</th>
<th>Kategori</th>
<th>Deskripsi</th>
<th>Foto</th>
<th>Tanggal Add</th>
<th>Tindakan</th>
</tr>
</thead>
<tbody>
<?php 
$berita = $this->Berita_m->select_db();
$no = 1;
foreach ($berita as $row) {
?>
<tr>
  <td><?php echo $no++;?></td>
  <td><?php echo $row->judul;?></td>
  <td><?php echo $row->kategori;?></td>
  <td><?php $string = strip_tags($row->deskripsi);
  if (strlen($string) > 300) {
    $stringCut = substr($string, 0, 300);
    $endPoint = strrpos($stringCut, ' ');
    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '..';
  }
  echo $string;?>
</td>
<td><img src="<?php echo base_url('assets/berita/') . $row->gambar?>" style="width: 80px"></td>
<td><?php echo date_format(date_create($row->tgl_add), "d-m-Y H:i:s") ?></td>
<td>
<a class="btn btn-primary btn-sm " href="<?php echo site_url('berita/select_by/'.$row->id_berita);?>"><i class="fa fa-edit"></i>EDIT</a>
<a class="btn btn-danger btn-sm" href="<?php echo site_url('berita/delete/'.$row->id_berita);?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini??')"><i class="fas fa-trash"></i>DELETE</a>
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
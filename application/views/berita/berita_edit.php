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
  <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Berita</h6>
                </div>
                <?php
          foreach ($berita as $row){
            ?>
                <div class="card-body">
                  <form method="post" action="<?php echo site_url('Berita/edit?id='. $this->uri->segment(3));?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="in_judul">Judul</label>
                      <input type="text" class="form-control" name="in_judul" 
                        placeholder="Masukan Judul" required="" value="<?php echo $row->judul;?>">
                    </div>
                    <div class="form-group">
                    <label for="usr">Kategori:</label>
                    <select name="in_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <option value="Umum">
                            Umum
                        </option>
                        <option value="Budaya">
                            Budaya
                        </option>
                        <option value="Ekonomi">
                            Ekonomi
                        </option>
                        <option value="Politik">
                            Politik
                        </option>
                        <option value="Sosial">
                            Sosial
                        </option>
                    </select>
                </div>
                   <div class="form-group">
                    <label for="comment">Deskripsi :</label>
                    <textarea class="form-control" rows="5" name="in_deskripsi" required=""><?php echo $row->deskripsi;?></textarea>
                </div>
                    <div class="form-group">
                    <label for="usr">Gambar:</label>
                    <input type="file" class="form-control" name="in_gambar" required="">
                </div>
                <div class="form-group">
                <img src="<?php echo base_url();?>assets/berita/<?php echo $row->gambar;?>" style="width: 80px">
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
</div>
</div>
<!---Container Fluid-->
<?php $this->load->view('headfoot/footer'); ?> 
<h2>Daftar Menu Pesanan</h2>
<?= $this->session->flashdata('pesan'); ?>
<center>
  <a href="#tambah" data-toggle="modal" class="btn btn-warning">+Tambah</a>
</center>
<table id="example" class="table table-hover table-striped">
  <thead>
    <tr>
      <td>No</td>
      <td>Foto Makanan</td>
      <td>Nama Pesanan</td>
      <td>Kategori</td>
      <td>Harga</td>
      <td>Koki</td>
      <td>Stok</td>
      <td>Aksi</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_makanan as $makanan):
    $no++; ?>
    <tr>
      <td><?= $no ?></td>
      <td><img src="<?=base_url('assets/img/'.$makanan->foto_cover )?>" style="width: 40px"></td>
      <td><?= $makanan->nama_makanan ?></td>
      <td><?= $makanan->nama_kategori ?></td>
      <td><?= $makanan->harga ?></td>
      <td><?= $makanan->koki ?></td>
      <td><?= $makanan->stok ?></td>
      <td><a href="#edit" onclick="edit('<?= $makanan->id_makanan ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('index.php/makanan/hapus/'.$makanan->id_makanan)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Tambah makanan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/makanan/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td><input type="hidden" name="id_makanan" class="form-control"></td>
            </tr>
            <tr>
              <td>nama makanan</td>
              <td><input type="text" name="nama_makanan" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required class="form-control"></td>
            </tr>
            <tr>
              <td>koki</td>
              <td><input type="text" name="koki" required class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="create" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Edit makanan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/makanan/makanan_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_makanan_lama" id="id_makanan_lama">
          <table>
            <tr>
              <td><input type="hidden" name="id_makanan" id="id_makanan" class="form-control"></td>
            </tr>
            <tr>
              <td>nama makanan</td>
              <td><input type="text" name="nama_makanan" id="nama_makanan" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control" id="id_kategori">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>
            <tr>
              <td>koki</td>
              <td><input type="text" name="koki" required id="koki" class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" id="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="edit" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/makanan/edit_makanan/"+a,
      dataType:"json",
      success:function(data){
        $("#id_makanan").val(data.id_makanan);
        $("#nama_makanan").val(data.nama_makanan);
        $("#id_kategori").val(data.id_kategori);
        $("#harga").val(data.harga);
        $("#koki").val(data.koki);
        $("#stok").val(data.stok);
        $("#id_makanan_lama").val(data.id_makanan);
      }
    })
  }
</script>
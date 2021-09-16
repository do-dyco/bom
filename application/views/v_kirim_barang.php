
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=$judul; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?=$judul; ?></div>
            </div>
          </div>

          
<?php echo
$this->session->flashdata('msg');
?>
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add <?=$judul; ?></button>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="myTable">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kode Produksi</th>
                            <th class="text-center">Tanggal Kirim</th>
                            <th class="text-center">Jumlah Kirim</th>
                            <th class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no=1;
                              foreach ($list_kirim as $key) {
                                $id = $key['id_kirim_produk'];
                                $kode_produksi = $key['kode_produksi'];
                                $nama_formula = $key['nama_formula'];
                                $tanggal_kirim = $key['tanggal_kirim'];
                                $jumlah_kirim = $key['jumlah_kirim'];
                              
                                
                          ?>
                          <tr>
                            <td style="text-align: center"><?=$no;?></td>
                            <td><?=$kode_produksi; ?> - <?=$nama_formula; ?></td>
                            <td style="text-align: center"><?=$tanggal_kirim; ?></td>
                            <td style="text-align: center"><?=$jumlah_kirim; ?></td>
                            <td style="text-align: center">
                              <a data-target="#ModalDelete<?=$id;?>" data-toggle="modal">
                              <button class="btn btn-danger btn-sm"><i class="fa fa-times" ></i> Delete</button>
                              </a>
                            </td>
                          </tr>
                          <?php $no ++; } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    </section>
</div>
<!-- Modal ADD -->
  <form action="<?= base_url().'kirim_produksi/simpan'?>" method="post">
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add <?=$judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Kode Produksi
                <select onchange="get()" name="id_produksi" class="form-control" id="id_produksi">
                  <option>--Pilih Produksi--</option>
                    <?php 
                      foreach ($list_produksi as $k) {
                        $id_produksi = $k['id_produksi'];
                        $kode_produksi = $k['kode_produksi'];
                        $nama_formula = $k['nama_formula'];
                      
                    ?>
                  <option value="<?=$id_produksi; ?>">
                    <?=$kode_produksi?> - <?=$nama_formula; ?>    
                  </option>
                <?php } ?>
                </select>
                Tanggal Pengiriman
                <input type="date" name="tanggal_kirim" class="form-control">
                Jumlah
                <input type="number" name="jumlah_kirim" id="jumlah_kirim" class="form-control">
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>

<?php
                              foreach ($list_kirim as $key) {
                                $id = $key['id_kirim_produk'];
                                $id_produksi = $key['id_produksi'];
                                $nama_formula = $key['nama_formula'];
                                $tanggal_kirim = $key['tanggal_kirim'];
                                $jumlah_kirim = $key['jumlah_kirim'];
                              
                                
                          ?>
<form id="add-row-form" action="<?php echo base_url().'kirim_produksi/delete' ?>" method="post">
       <div class="modal fade" id="ModalDelete<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body">
                         <input type="hidden" name="id_kirim_produk" value="<?=$id;?>" class="form-control" required>
                         <input type="hidden" name="id_produksi" value="<?=$id_produksi;?>" class="form-control">
                         <input type="hidden" name="jumlah_kirim" value="<?=$jumlah_kirim; ?>" class="form-control">
                         <strong>Anda yakin mau menghapus record ini?</strong>
                 </div>
                 <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" id="add-row" class="btn btn-danger">Hapus</button>
                 </div>
              </div>
          </div>
       </div>
   </form>
<?php } ?>

<script type="text/javascript">
  function get(){
    var id_produksi = document.getElementById("id_produksi").value;

  $.ajax({
    url : "<?=base_url()?>kirim_produksi/get_data/"+id_produksi,
    type :"post",
    dataType : "json",
    async : true, 
    success : function(data){
      // alert(data.qty_produksi);
      document.getElementById("jumlah_kirim").value = data.jumlah;
    }
  });
  }
  



</script>
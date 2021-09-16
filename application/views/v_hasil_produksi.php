
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data <?=$judul; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Data <?=$judul; ?></div>
            </div>
          </div>

          

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
                            <th class="text-center">Tanggal Cek Produk</th>
                            <th class="text-center">Jumlah Produksi</th>
                            <th class="text-center">Reject</th>
                            <th class="text-center">Result</th>
                            <th class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            foreach ($list_hasil_produksi as $key) {
                              $id_hasil_produksi = $key['id_hasil_produksi'];
                              $id_produksi = $key['id_produksi'];
                              $id_formula = $key['id_formula'];
                              $formula = $key['nama_formula'];
                              $kode_produksi = $key['kode_produksi'];
                              $tgl_cek = $key['tgl_cek'];
                              $qty_produksi = $key['qty_produksi'];
                              $reject = $key['reject'];
                              $result = $key['result'];
                            
                          ?>
                                
                          <tr>
                            <td style="text-align: center"><?=$no; ?></td>
                            <td><?=$kode_produksi; ?> - <?=$formula; ?></td>
                            <td style="text-align: center"><?=$tgl_cek; ?></td>
                            <td style="text-align: center"><?=$qty_produksi; ?></td>
                            <td style="text-align: center"><?=$reject; ?></td>
                            <td style="text-align: center"><?=$result; ?></td>
                            <td style="text-align: center">
                              <a data-target="#ModalDelete<?=$id_hasil_produksi ;?>" data-toggle="modal">
                              <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                              </a>
                            </td>
                          </tr>
                          <?php $no++; } ?>
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
  <form action="<?= base_url().'hasil_produksi/simpan_hasil'?>" method="post">
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Data <?=$judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Kode Produksi
                <select onchange="get()" name="id_produksi" class="form-control" id="id_produksi">
                  <option value="">--Pilih Produk--</option>
                    <?php
                      foreach ($list_produksi as $k1) {
                        $id = $k1['id_produksi'];
                        $kode_produksi = $k1['kode_produksi'];
                        $formula = $k1['nama_formula'];
                      
                    ?>

                  <option value="<?=$id; ?>"><?=$kode_produksi; ?> - <?=$formula; ?> </option>
                    <?php } ?>
                </select>
                Tanggal Cek Produk
                <input type="date" name="tgl_cek" class="form-control">
                Jumlah Produksi
                <input type="number" name="" id="jml_produksi" class="form-control" readonly>
                Reject
                <input type="number" name="reject" class="form-control">
                Result
                <input type="number" name="result" class="form-control">
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


<?php                      foreach ($list_hasil_produksi as $key) {
                              $id_hasil_produksi = $key['id_hasil_produksi'];
                              $id_produksi = $key['id_produksi'];
                              $kode_produksi = $key['kode_produksi'];
                              $tgl_cek = $key['tgl_cek'];
                              $reject = $key['reject'];
                              $result = $key['result'];
                            
                          ?>
 <form id="add-row-form" action="<?php echo base_url().'hasil_produksi/delete_hasil_produksi' ?>" method="post">
       <div class="modal fade" id="ModalDelete<?=$id_hasil_produksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body">
                         <input type="hidden" name="id_hasil_produksi" value="<?=$id_hasil_produksi;?>" class="form-control" >
                         <input type="hidden" name="id_produksi" value="<?=$id_produksi; ?>" class="form-control">
                         <input type="hidden" name="result" value="<?=$result; ?>" class="form-control">
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
    url : "<?=base_url()?>hasil_produksi/get_data/"+id_produksi,
    type :"post",
    dataType : "json",
    async : true, 
    success : function(data){
      // alert(data.qty_produksi);
      document.getElementById("jml_produksi").value = data.qty_produksi;
    }
  });
  }
  



</script>
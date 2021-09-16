
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data <?=$judul; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Data <?=$judul; ?></div>
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
                            <th class="text-center">Nama Formula</th>
                            <th class="text-center">Detail Formula</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Qty Produksi</th>
                            <th class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            foreach ($list_produksi as $key) {
                              $id = $key['id_produksi'];
                              $kode_produksi = $key['kode_produksi'];
                              $id_formula = $key['id_formula'];
                              $nama_formula = $key['nama_formula'];
                              $tanggal_produksi = $key['tanggal_produksi'];
                              $qty_produksi = $key['qty_produksi'];
                            
                          ?>
                                
                          <tr>
                            <td style="text-align: center"><?=$no; ?></td>
                            <td><?=$kode_produksi; ?></td>
                            <td><?=$nama_formula; ?></td>
                            <td style="text-align: center"> 
                              <a href="<?=base_url().'produksi/data/'.$id_formula; ?>">
                              <button class="btn btn-primary btn-sm"><i class="fa fa-eye" ></i> Lihat Detail
                              </button>
                              </a>
                            </td>
                            <td style="text-align: center"><?=$tanggal_produksi; ?></td>
                            <td style="text-align: center"><?=$qty_produksi; ?></td>
                            <td style="text-align: center">
                              <a data-target="#ModalDelete<?=$id;?>" data-toggle="modal">
                              <button class="btn btn-danger btn-sm"><i class="fa fa-times" href="#"></i> Delete</button>
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
  <form action="<?= base_url().'produksi/simpan_produksi'?>" method="post">
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
                <input type="text" name="kode_produksi" id="kode_produksi" class="form-control" value="PRD<?=$invoice; ?>" readonly>
                Formula
                <select name="id_formula" class="form-control">
                  <?php
                    foreach ($list_formula as $k) {
                      $id_formula = $k['id_formula'];
                      $nama_formula = $k['nama_formula'];
                    
                  ?>
                  <option value="<?=$id_formula?>"><?=$nama_formula; ?></option>
                <?php } ?>
                </select>
                Tanggal
                <input type="date" name="tanggal_produksi" class="form-control">
                Qty Produksi
                <input type="number" name="qty_produksi" class="form-control">
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
                            foreach ($list_produksi as $k) {
                              $id = $k['id_produksi'];
                              $kode_produksi = $k['kode_produksi'];
                              $id_formula = $k['id_formula'];
                              $nama_formula = $k['nama_formula'];
                              $tanggal_produksi = $k['tanggal_produksi'];
                              $qty_produksi = $k['qty_produksi'];
                            
                          ?>
 <form id="add-row-form" action="<?php echo base_url().'produksi/delete' ?>" method="post">
       <div class="modal fade" id="ModalDelete<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body">
                         <input type="hidden" name="id_produksi" value="<?=$id;?>" class="form-control" >
                         <input type="hidden" name="kode_produksi" value="<?=$kode_produksi;?>" class="form-control" >
                         <input type="hidden" name="id_formula" value="<?=$id_formula;?>" class="form-control" >
                         <input type="hidden" name="nama_formula" value="<?=$nama_formula;?>" class="form-control" >
                         <input type="hidden" name="tanggal_produksi" value="<?=$tanggal_produksi;?>" class="form-control" >
                         <input type="hidden" name="qty_produksi" class="form-control" value="<?=$qty_produksi;?>">
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
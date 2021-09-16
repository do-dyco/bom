
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=$judul; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?=$judul; ?></div>
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
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no=1;
                              foreach ($list_barang as $key) {
                                $id = $key['id_barang'];
                                $kode_barang = $key['kode_barang'];
                                $nama_barang = $key['nama_barang']; 
                                $satuan = $key['satuan'];
                                $stock = $key['stock'];
                                
                          ?>
                          <tr>
                            <td style="text-align: center"><?=$no;?></td>
                            <td><?=$kode_barang; ?></td>
                            <td><?=$nama_barang; ?></td>
                            <td><?=$stock; ?> <?=$satuan; ?></td>
                            <td style="text-align: center">
                            <a data-target="#ModalUpdate<?=$id;?>" data-toggle="modal">
                              <button class="btn btn-warning btn-sm"><i class="fa fa-edit" href="#"></i> Edit</button>
                            </a>

                            <a data-target="#ModalDelete<?=$id;?>" data-toggle="modal">
                              <button class="btn btn-danger btn-sm"><i class="fa fa-times" href="#"></i> Delete</button>
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
  <form action="<?= base_url().'barang/simpan_barang'?>" method="post">
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
                Kode Barang
                <input type="text" name="kode_barang" class="form-control">
                Nama Barang
                <input type="text" name="nama_barang" class="form-control">
                Satuan
                <select name="id_satuan" class="form-control">
                  <?php
                    foreach ($list_satuan as $k1) {
                      $id_satuan = $k1['id_satuan'];
                      $satuan = $k1['satuan'];
                    
                  ?>
                  <option value="<?=$id_satuan; ?>"><?=$satuan; ?></option>
                <?php } ?>
                </select>
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
                              foreach ($list_barang as $k) {
                                $id = $k['id_barang'];
                                $kode_barang = $k['kode_barang'];
                                $nama_barang = $k['nama_barang']; 
                                $satuan = $k['satuan'];
                                $stock = $k['stock'];
                                
                          ?>
<form action="<?= base_url().'barang/edit_barang'?>" method="post">
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalUpdate<?=$id; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add <?=$judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id_barang" class="form-control" value="<?=$id; ?>">
                Kode Barang
                <input type="text" name="kode_barang" class="form-control" value="<?=$kode_barang; ?>">
                Nama Barang
                <input type="text" name="nama_barang" class="form-control" value="<?=$nama_barang; ?>">
                Satuan
                <select name="id_satuan" class="form-control" value="<?=$id_satuan; ?>" selected>
                  <?php
                    foreach ($list_satuan as $k2) {
                      $id_satuan = $k2['id_satuan'];
                      $satuan = $k2['satuan'];
                    
                  ?>
                  <option value="<?=$id_satuan; ?>" selected><?=$satuan; ?></option>
                <?php } ?>
                </select>
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
<?php } ?>

<?php
                              foreach ($list_barang as $k1) {
                                $id = $k1['id_barang'];
                                $kode_barang = $k1['kode_barang'];
                                $nama_barang = $k1['nama_barang']; 
                                $satuan = $k1['satuan'];
                                $stock = $k1['stock'];
                                
                          ?>
    <form id="add-row-form" action="<?php echo base_url().'barang/delete_barang' ?>" method="post">
       <div class="modal fade" id="ModalDelete<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body">
                         <input type="hidden" name="id_barang" value="<?=$id;?>" class="form-control" required>
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

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=$judul; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?=$judul; ?></div>
            </div>
          </div>
<?php 
 foreach ($list_formula as $a) {
                                $id = $a['id_formula'];
                                $nama_formula = $a['nama_formula']
                              
                          ?>
          
<p style="font-size: 20px"><b>Nama Formula : <?=$nama_formula; ?></b></p><br>

<?php } ?>
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
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Jumlah Pakai</th>
                            <th class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no=1;
                              foreach ($list_detail_formula as $key) {
                                $id_detail_formula = $key['id_detail_formula'];
                                $nama_barang = $key['nama_barang'];
                                $jumlah_barang = $key['jumlah_barang'];
                                $satuan = $key['satuan'];
                              
                          ?>
                          <tr>
                            <td style="text-align: center"><?=$no;?></td>
                            <td><?=$nama_barang; ?></td>
                            <td style="text-align: center"><?=$jumlah_barang; ?> <?=$satuan; ?></td>
                            <td style="text-align: center">
                            <a data-target="#ModalUpdate<?=$id_detail_formula;?>" data-toggle="modal">
                              <button class="btn btn-warning btn-sm"><i class="fa fa-edit" href="#"></i> Edit
                              </button>
                            </a>
                            <a data-target="#ModalDelete<?=$id_detail_formula;?>" data-toggle="modal">
                              <button class="btn btn-danger btn-sm"><i class="fa fa-times" href="#"></i> Delete
                              </button>
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
  <form action="<?= base_url().'detail_formula/simpan_detail_formula/'.$id?>" method="post">
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
                <input type="hidden" name="id_formula" value="<?= $id;?>" class="form-control">
                Nama Barang
                <select name="id_barang" class="form-control">
                  <?php
                      foreach ($list_barang as $k1) {
                        $id_barang = $k1['id_barang'];
                        $nama_barang = $k1['nama_barang'];
                      
                  ?>
                  <option value="<?=$id_barang; ?>"><?=$nama_barang; ?></option>
                <?php } ?>
                </select>

                Jumlah Pakai
                <input type="number" name="jumlah_barang" class="form-control">

                Satuan
                <select name="id_satuan" class="form-control">
                  <?php
                      foreach ($list_satuan as $k2) {
                        $id_satuan = $k2['id_satuan'];
                        $satuan = $k2['satuan'];
                      
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
                              foreach ($list_detail_formula as $k) {
                                $id_detail_formula = $k['id_detail_formula'];
                                $nama_barang = $k['nama_barang'];
                                $jumlah_barang = $k['jumlah_barang'];
                                $satuan = $k['satuan'];
                              
                          ?>
  <form action="<?= base_url().'detail_formula/edit_detail_formula/'.$id?>" method="post">
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalUpdate<?=$id_detail_formula;?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add <?=$judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id_formula" value="<?= $id;?>" class="form-control">
                <input type="hidden" name="id_detail_formula" value="<?= $id_detail_formula;?>" class="form-control">
                Nama Barang
                <select name="id_barang" class="form-control" value="<?=$id_barang; ?>" selected>
                  <?php
                      foreach ($list_barang as $k2) {
                        $id_barang = $k2['id_barang'];
                        $nama_barang = $k2['nama_barang'];
                      
                  ?>
                  <option value="<?=$id_barang; ?>"><?=$nama_barang; ?></option>
                <?php } ?>
                </select>

                Jumlah Pakai
                <input type="number" name="jumlah_barang" class="form-control" value="<?=$jumlah_barang; ?>">

                Satuan
                <select name="id_satuan" class="form-control">
                  <?php
                      foreach ($list_satuan as $k2) {
                        $id_satuan = $k2['id_satuan'];
                        $satuan = $k2['satuan'];
                      
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
<?php } ?>

<?php
                              foreach ($list_detail_formula as $k3) {
                                $id_detail_formula = $k3['id_detail_formula'];
                                $nama_barang = $k3['nama_barang'];
                                $jumlah_barang = $k3['jumlah_barang'];
                                $satuan = $k3['satuan'];
                              
                          ?>
 <form id="add-row-form" action="<?php echo base_url().'detail_formula/delete_detail_formula/'.$id ?>" method="post">
       <div class="modal fade" id="ModalDelete<?=$id_detail_formula;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body">
                         <input type="hidden" name="id_detail_formula" value="<?=$id_detail_formula;?>" class="form-control" required>
                         <input type="hidden" name="id_formula" value="<?= $id;?>" class="form-control">
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

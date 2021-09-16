
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
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="myTable">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama Barang / Formula</th>
                            <th class="text-center">Jumlah Produksi</th>
                            <th class="text-center">Stock Produk</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no=1;
                              foreach ($list_stock as $key) {
                                $id = $key['id_stock_produk'];
                                $id_produksi = $key['id_produksi'];
                                $formula = $key['nama_formula'];
                                $kode_produksi = $key['kode_produksi'];
                                $jumlah = $key['jumlah'];
                              
                          ?>
                          <tr>
                            <td style="text-align: center"><?=$no;?></td>
                            <td><?=$formula; ?></td>
                            <td><?= $control->hitung($key['id_formula'])->qty_produksi; ?></td>
                            <td style="text-align: center"><?=$jumlah; ?></td>
                            
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


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
                              <button class="btn btn-warning btn-sm"><i class="fa fa-edit" href="#"></i> Edit
                              </button>
                              <button class="btn btn-danger btn-sm"><i class="fa fa-times" href="#"></i> Delete
                              </button>
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

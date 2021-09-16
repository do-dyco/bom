
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
                            <th class="text-center">Nama Satuan</th>
                            <th class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no=1;
                              foreach ($list_satuan as $key) {
                                $id = $key['id_satuan'];
                                $satuan = $key['satuan'];
                              
                          ?>
                          <tr>
                            <td style="text-align: center"><?=$no;?></td>
                            <td><?=$satuan; ?></td>
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
  <form action="<?= base_url().'satuan/simpan_satuan'?>" method="post">
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
                Nama Satuan
                <input type="text" name="satuan" class="form-control">
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
                              foreach ($list_satuan as $k) {
                                $id = $k['id_satuan'];
                                $satuan = $k['satuan'];
                              
                          ?>
<form action="<?= base_url().'satuan/edit_satuan'?>" method="post">
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalUpdate<?=$id; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit <?=$judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="text" name="id_satuan" class="form-control" value="<?=$id; ?>">
                Nama Satuan
                <input type="text" name="satuan" class="form-control" value="<?=$satuan; ?>">
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
                              foreach ($list_satuan as $k1) {
                                $id = $k1['id_satuan'];
                                $satuan = $k1['satuan'];
                              
                          ?>
   <form id="add-row-form" action="<?php echo base_url().'satuan/delete' ?>" method="post">
       <div class="modal fade" id="ModalDelete<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body">
                         <input type="hidden" name="id_satuan" value="<?=$id;?>" class="form-control" required>
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
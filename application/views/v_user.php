
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
                            <th class="text-center">Fullname</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Level</th>
                            <th class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no=1;
                              foreach ($list_user as $key) {
                                $id = $key['id_user'];
                                $fullname = $key['fullname'];
                                $username = $key['username'];
                                $level = $key['level']; 
                                
                                
                          ?>
                          <tr>
                            <td style="text-align: center"><?=$no;?></td>
                            <td><?=$fullname; ?></td>
                            <td style="text-align: center"><?=$username; ?></td>
                            <td style="text-align: center">
                              <?php 
                                  if($level == 1 ){
                                    echo "Admin";
                                  }
                                  if($level == 2 ){
                                    echo "QC";
                                  }
                                  if($level == 3 ){
                                    echo "Leader";
                                  }
                                  if($level == 4 ){
                                    echo "Admin Gudang";
                                  }
                                ?>
                            </td>
                            <td style="text-align: center">
                              <a data-target="#ModalUpdate<?=$id;?>" data-toggle="modal">
                              <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                              </a>
                              <a data-target="#ModalDelete<?=$id;?>" data-toggle="modal">
                              <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
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
  <form action="<?= base_url().'user/simpan_user'?>" method="post">
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
                Fullname
                <input type="text" name="fullname" class="form-control">
                Username
                <input type="text" name="username" class="form-control">
                Password
                <input type="text" name="password" class="form-control">
                Level
                <select name="level" class="form-control">
                  <option value="1">Admin</option>
                  <option value="2">QC</option>
                  <option value="3">Leader Produksi</option>
                  <option value="4">Gudang</option>
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
                              foreach ($list_user as $k) {
                                $id = $k['id_user'];
                                $fullname = $k['fullname'];
                                $username = $k['username'];
                                $password = $k['password'];
                                $level = $k['level']; 
                                
                                
                          ?>
 <form action="<?= base_url().'user/edit'?>" method="post">
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalUpdate<?=$id;?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit <?=$judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="text" name="id_user" class="form-control" value="<?=$id;?>">
                Fullname
                <input type="text" name="fullname" class="form-control" value="<?=$fullname;?>">
                Username
                <input type="text" name="username" class="form-control" value="<?=$username;?>">
                Password
                <input type="text" name="password" class="form-control">
                Level
                <select name="level" class="form-control">
                  <option value="1">Admin</option>
                  <option value="2">QC</option>
                  <option value="3">Leader Produksi</option>
                  <option value="4">Gudang</option>
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
                              foreach ($list_user as $k) {
                                $id = $k['id_user'];
                                $fullname = $k['fullname'];
                                $username = $k['username'];
                                $level = $k['level']; 
                                
                                
                          ?>
 <form id="add-row-form" action="<?php echo base_url().'user/delete' ?>" method="post">
       <div class="modal fade" id="ModalDelete<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body">
                         <input type="hidden" name="id_user" value="<?=$id;?>" class="form-control" required>
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
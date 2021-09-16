
  <body onload="window.print()">
  <center><img src="<?php echo base_url().'assets/img/logo.jpg'?>" style="height: 50px"></center>
  
  <br/>
    <table align="center" width="30%">
      <tr>
        <td width="15%">
        </td>
      </tr>
    </table>
            
               
&nbsp;&nbsp; Dari Tanggal &nbsp;&nbsp;&nbsp;&nbsp; : <b><?php echo $tgl1=$this->input->post('tgl1'); ?></b></br> 
&nbsp;&nbsp; Sampai Tanggal : <b><?php echo $tgl2=$this->input->post('tgl2'); ?></b>
                
<br/><br/>
          
          
    <center><h3><b>Report Produksi</b></h3></center>
      <hr/>
                    <center>
                      <table border="1">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kode Produksi</th>
                            <th class="text-center">Nama Formula</th>
                            <th class="text-center">Qty Produksi</th>
                            <th class="text-center">Reject</th>
                            <th class="text-center">Result</th>
                            <th class="text-center">Tanggal Produksi</th>
                            <th class="text-center">Tanggal Pengecekan</th>
                            <th class="text-center">Tanggal Pengiriman</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            foreach ($list_report_produksi as $key) {
                              $kode_produksi = $key['kode_produksi'];
                              $nama_formula = $key['nama_formula'];
                              $qty_produksi = $key['qty_produksi'];
                              $reject = $key['reject'];
                              $result = $key['result'];
                              $tanggal_produksi = $key['tanggal_produksi'];
                              $tgl_cek = $key['tgl_cek'];
                              $tgl_kirim = $key['tanggal_kirim'];
                            
                          ?>
                                
                          <tr>
                            <td style="text-align: center"><?=$no; ?></td>
                            <td><?=$kode_produksi; ?></td>
                            <td style="text-align: center"><?=$nama_formula?></td>
                            <td style="text-align: center"><?=$qty_produksi; ?></td>
                            <td style="text-align: center"><?=$reject; ?></td>
                            <td style="text-align: center"><?=$result; ?></td>
                            <td style="text-align: center"><?=$tanggal_produksi; ?></td>
                            <td style="text-align: center"><?=$tgl_cek; ?></td>
                            <td style="text-align: center"><?=$tgl_kirim; ?></td>
                          </tr>
                          <?php $no++; } ?>
                        </tbody>
                      </table>
                      </center>
</body><br><br>
                    
<p style="text-align: right; margin: 50px">Mengetahui</p></br>


<p style="text-align: right; margin: 35px">(<?=$this->session->userdata('fullname');?>)</p>
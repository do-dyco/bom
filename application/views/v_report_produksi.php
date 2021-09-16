<link rel="stylesheet" href="css/BeatPicker.min.css"/>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/BeatPicker.min.js"></script>

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
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive"> 
<fieldset>
<legend><strong style="font:Calibri bold 2px; color:;"> Report Produksi </strong></legend>


<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">
				<form role="form" action="<?php echo base_url("report_produksi/detail_report"); ?>" method="post" target="_new">
                
									<label>Dari Tanggal</label>
									<input type="date" data-beatpicker="true" name="tgl1" class="form-control" style="width:500px;">
										<br/>
                                    <label>Sampai Tanggal</label>
									<input type="date" data-beatpicker="true" name="tgl2" class="form-control" style="width:500px;">
								
										<br/>
                                
							<div class="col-md-7">
							  <input type="submit" class="btn btn-primary" name="show" value="Tampilkan">
							</div>
						</form>
					</div>
				</div>

				</div>
                  </div>
                </div>
              </div>
            </div>

    </section>
</div>	

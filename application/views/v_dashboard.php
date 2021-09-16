<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?=$judul; ?></div>
            </div>
          </div>


<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Produksi</h4>
                  </div>

    <canvas id="canvas" height="450" width="1000px"></canvas>

                    </div>
                  </div>



    <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/Chart.js'?>"></script>

    <style>
      canvas{
      }
    </style>

 </div>
                  </div>
                </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>

    </section>
</div>

  <script>

    var lineChartData = {
      labels : ["January","February","March","April","May","June","July","Agustus","September","Oktober","November","Desember"],
      datasets : [
        {
          fillColor : "rgba(151,187,205,0.5)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          data : [
              <?php
              // januari
                $control->hitungbarang('01');
                echo ",";
                $control->hitungbarang('02');
                echo ",";
                $control->hitungbarang('03');
                echo ",";
                $control->hitungbarang('04');
                echo ",";
                $control->hitungbarang('05');
                echo ",";
                $control->hitungbarang('06');
                echo ",";
                $control->hitungbarang('07');
                echo ",";
                $control->hitungbarang('08');
                echo ",";
                $control->hitungbarang('09');
                echo ",";
                $control->hitungbarang('10');
                echo ",";
                $control->hitungbarang('11');
                echo ",";
                $control->hitungbarang('12');
                echo ",";
              ?>
          ]
        },
        {
          fillColor : "rgba(247, 119, 147,0.5)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          data : [

              <?php
              // januari
                $control->hitungbarangreject('01');
                echo ",";
                $control->hitungbarangreject('02');
                echo ",";
                $control->hitungbarangreject('03');
                echo ",";
                $control->hitungbarangreject('04');
                echo ",";
                $control->hitungbarangreject('05');
                echo ",";
                $control->hitungbarangreject('06');
                echo ",";
                $control->hitungbarangreject('07');
                echo ",";
                $control->hitungbarangreject('08');
                echo ",";
                $control->hitungbarangreject('09');
                echo ",";
                $control->hitungbarangreject('10');
                echo ",";
                $control->hitungbarangreject('11');
                echo ",";
                $control->hitungbarangreject('12');
                echo ",";
              ?>
          ]
        }
      ]
      
    }

  var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);
  
  </script>

  
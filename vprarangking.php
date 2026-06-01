<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Pra Rangking</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        vprarangking
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
<div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">View Pra Rangking</h6>
                  <p class="text-sm mb-20">
                    Berisi tampilan detail Pra Rangking. 
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Id Matrix</h6></th>
                          <th><h6>Id Alternatif</h6></th>
                          <th><h6>Nama Alternatif</h6></th>
                          <th><h6>Id Kriteria</h6></th>
                          <th><h6>Nama Kriteria</h6></th>
                          <th><h6>Id Bobot</h6></th>
                          <th><h6>Value Bobot</h6></th>
                          <th><h6>Nilai</h6></th>
                          <th><h6>Keterangan</h6></th>
                          <th><h6>Normalisasi</h6></th>
                          <th><h6>Pra Rangking</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <?php
                      include 'koneksi.php';
                      $query = mysqli_query($db, "SELECT * FROM vprarangking join alternatif on vprarangking.idalternatif=alternatif.idalternatif order by id_nilai");
                      while ($data = mysqli_fetch_array($query)) {
                        ?>
                      <tbody>
                        <tr>
                          <td>
                            <p><?php echo $data['id_nilai']?> </p>
                          </td>
                          <td>
                            <p><?php echo $data['idalternatif']?> </p>
                          </td>
                          <td>
                            <p><?php echo $data['nmalternatif']?> </p>
                          </td>
                          <td>
                            <p><?php echo $data['id_kriteria']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['nm_kriteria']?> </p>
                          </td>
                          <td>
                            <p><?php echo $data['id_bobot']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['valuebobot']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['nilai']?> </p>
                          </td> 
                          <td class="min-width">
                            <p><?php echo $data['keterangan']?> </p>
                          </td> 
                          <td class="min-width">
                            <p><?php echo $data['normalisasi']?> </p>
                          </td> 
                          <td class="min-width">
                            <span class="status-btn warning-btn"><?php echo $data['prarangking']?>  </span>
                          </td>  
                        </tr>
                        <?php } ?>
                        <!-- end table row -->
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
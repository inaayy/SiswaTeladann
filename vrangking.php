<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Rangking</h2>
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
                        vrangking
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
                  <h6 class="mb-10">View Rangking</h6>
                  <p class="text-sm mb-20">
                    Berisi tampilan detail Rangking. 
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Rank</h6></th>
                          <th><h6>Id Alternatif</h6></th>
                          <th><h6>Nama Alternatif</h6></th>
                          <th><h6>Value</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <?php
                      include 'koneksi.php';
                      $no = 1;
                      $query = mysqli_query($db, 'SELECT * FROM vrangking order by rangking desc');
                      while ($data = mysqli_fetch_array($query)) {
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td>
                            <p><?php echo $data['idalternatif']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['nmalternatif']?> </p>
                          </td>
                          <td class="min-width">
                            <span class="status-btn warning-btn"><?php echo $data['rangking']?> </span>
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
<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Alternatif</h2>
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
                        Alternatif
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
                  <h6 class="mb-10">Alternatif Table</h6>
                  <p class="text-sm mb-20">
                    Berisi data-data alternatif yang dibutuhkan untuk DSS Siswa Teladan.
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Id Alternatif</h6></th>
                          <th><h6>Nama Alternatif</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <?php
                      include 'koneksi.php';
                      $query = mysqli_query($db, "SELECT * FROM alternatif");
                      while ($data = mysqli_fetch_array($query)) {
                        ?>
                      <tbody>
                        <tr>
                          <td>
                            <p><?php echo $data['idalternatif']?> </p>
                          </td>
                          <td class="min-width">
                            <span class="status-btn success-btn"><?php echo $data['nmalternatif']?> </span>
                          </td>
                          <td>
                            <div class="action">
                              <a href="aksialternatif.php?aksi=delete&idalternatif=<?php echo $data['idalternatif']; ?>" >
                              <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                              </button>
                              </a> | 
                              <a  href="aksialternatif.php?aksi=update&idalternatif=<?php echo $data['idalternatif']; ?>">
                              <button class="text-warning">
                                <i class="lni lni-brush"></i>
                              </button>
                              </a>
                            </div>
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

            <form action="aksialternatif.php" method="POST">
            <div class="row">
              <div class="col-lg-12">
              <div class="card-style mb-30">
                  <h6 class="mb-25">Insert Data Alternatif</h6>
                  <div class="input-style-1">
                    <label>ID Alternatif</label>
                    <input type="text" placeholder="ID Alternatif" name="idalternatif"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Nama Alternatif</label>
                    <input type="text" placeholder="Nama Alternatif" name="nmalternatif"/>
                  </div>
                  <!-- end input -->
                  <!-- <div class="input-style-1">
                    <label>NIM</label>
                    <input type="text" placeholder="NIM Mahasiswa" name="nim"/>
                  </div> -->
                  <!-- end input -->
                  <div class="input-style-1">
                  <button type="submit" class="main-btn success-btn rounded-md btn-hover" value="Simpan" name="btn_tambah">
                    Submit</button>
                  </div>
                  <!-- end input -->

                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>      
            </form>
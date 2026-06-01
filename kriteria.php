<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Kriteria</h2>
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
                        Kriteria
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
                  <h6 class="mb-10">Kriteria Table Table</h6>
                  <p class="text-sm mb-20">
                    Berisi data-data kriteria yang dibutuhkan untuk DSS Siswa Teladan .
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Id Kriteria</h6></th>
                          <th><h6>Nama Kriteria</h6></th>
                          <!-- <th><h6>Tipe</h6></th> -->
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <?php
                      include 'koneksi.php';
                      $query = mysqli_query($db, "SELECT * FROM kriteria");
                      while ($data = mysqli_fetch_array($query)) {
                        ?>
                      <tbody>
                        <tr>
                          <td>
                            <p><?php echo $data['id_kriteria']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['nm_kriteria']?> </p>
                          </td>
                          <td>
                            <div class="action">
                              <a href="aksikriteria.php?aksi=delete&id_kriteria=<?php echo $data['id_kriteria']; ?>" >
                              <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                              </button>
                              </a> | 
                              <a  href="aksikriteria.php?aksi=update&id_kriteria=<?php echo $data['id_kriteria']; ?>">
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

            <form action="aksikriteria.php" method="POST">
            <div class="row">
              <div class="col-lg-12">
              <div class="card-style mb-30">
                  <h6 class="mb-25">Insert Data Kriteria</h6>
                  <div class="input-style-1">
                    <label>ID Kriteria</label>
                    <input type="text" placeholder="ID Kriteria" name="id_kriteria"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Nama Kriteria</label>
                    <input type="text" placeholder="Nama Kriteria" name="nm_kriteria"/>
                  </div>
                  <!-- end input -->
                  <!-- <div class="select-style-1">
                    <label>Tipe</label>
                    <div class="select-position">
                      <select name="tipe">
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                      </select>
                    </div>
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
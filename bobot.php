<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Bobot</h2>
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
                        Bobot
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
                  <h6 class="mb-10">Bobot Table</h6>
                  <p class="text-sm mb-20">
                    Berisi data-data bobot yang dibutuhkan untuk DSS Siswa Teladan.
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Id Bobot</h6></th>
                          <th><h6>Kriteria</h6></th>
                          <th><h6>Value Bobot</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <?php
                      include 'koneksi.php';
                      $query = mysqli_query($db, "SELECT * FROM bobot join kriteria on bobot.id_kriteria=kriteria.id_kriteria order by id_bobot");
                      while ($data = mysqli_fetch_array($query)) {
                        ?> 
                      <tbody>
                        <tr>
                          <td>
                            <p><?php echo $data['id_bobot']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['nm_kriteria']?> </p>
                          </td>
                          <td class="min-width">
                            <span class="status-btn success-btn"><?php echo $data['valuebobot']?> </span>
                          </td>
                          <td>
                            <div class="action">
                              <a href="aksibobot.php?aksi=delete&id_bobot=<?php echo $data['id_bobot']; ?>" >
                              <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                              </button>
                              </a> | 
                              <a  href="aksibobot.php?aksi=update&id_bobot=<?php echo $data['id_bobot']; ?>">
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

            <form action="aksibobot.php" method="POST">
            <div class="row">
              <div class="col-lg-12">
              <div class="card-style mb-30">
                  <h6 class="mb-25">Insert Data Bobot</h6>
                  <div class="input-style-1">
                    <label>ID Bobot</label>
                    <input type="text" placeholder="ID Bobot" name="id_bobot"/>
                  </div>
                  <!-- end input -->
                  <div class="select-style-1">
                    <label>Id Kriteria</label>
                    <div class="select-position">
                    <select name="id_kriteria" id="">
                          <?php 
                          $kriteria = mysqli_query($db, "SELECT * FROM kriteria");
                          while($row= mysqli_fetch_array($kriteria)) { ?>
                            <option value="<?=$row['id_kriteria']?>"><?=$row['nm_kriteria']?></option>
                          <?php } ?>)
                      </select>
                    </div>
                    <!-- <input type="text" placeholder="Pilih Kriteria" name="nmalternatif"/> -->
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Bobot</label>
                    <input type="text" placeholder="Masukkan Bobot" name="valuebobot"/>
                  </div>
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
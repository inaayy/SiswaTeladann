<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Matrix Keputusan</h2>
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
                        Matrix Keputusan
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
                  <h6 class="mb-10">Matrix Keputusan Table</h6>
                  <p class="text-sm mb-20">
                    Berisi data-data Matrix penilaian kriteria yang dibutuhkan untuk DSS Siswa Teladan.
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Id Matrix</h6></th>
                          <th><h6>ID Alternatif</h6></th>
                          <th><h6>Bobot Kriteria</h6></th>
                          <th><h6>Value Skala</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <?php
                      include 'koneksi.php';
                      $query = mysqli_query($db, "SELECT * FROM penilaian join alternatif on penilaian.idalternatif=alternatif.idalternatif join bobot on penilaian.id_bobot=bobot.id_bobot join skala on penilaian.idskala=skala.idskala order by id_nilai");
                      while ($data = mysqli_fetch_array($query)) {
                        ?> 
                      <tbody>
                        <tr>
                          <td>
                            <p><?php echo $data['id_nilai']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['nmalternatif']?> </p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $data['valuebobot']?> </p>
                          </td>
                          <td class="min-width">
                            <span class="status-btn success-btn"><?php echo $data['keterangan']?> </span>
                          </td>
                          <td>
                            <div class="action">
                              <a href="aksimatrixkeputusan.php?aksi=delete&id_nilai=<?php echo $data['id_nilai']; ?>" >
                              <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                              </button>
                              </a> | 
                              <a  href="aksimatrixkeputusan.php?aksi=update&id_nilai=<?php echo $data['id_nilai']; ?>">
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

            <form action="aksimatrixkeputusan.php" method="POST">
            <div class="row">
              <div class="col-lg-12">
              <div class="card-style mb-30">
                  <h6 class="mb-25">Insert Data Matrix Keputusan</h6>
                  <div class="input-style-1">
                    <label>ID Matrix</label>
                    <input type="text" placeholder="ID Matrix" name="id_nilai"/>
                  </div>
                  <!-- end input -->
                  <div class="select-style-1">
                    <label>Alternatif</label>
                    <div class="select-position">
                    <select name="idalternatif" id="" >
                            <option value="">---Pilih Alternatif---</option>
                          <?php 
                          $kriteria = mysqli_query($db, "SELECT * FROM alternatif");
                          while($row= mysqli_fetch_array($kriteria)) { ?>
                            <option value="<?=$row['idalternatif']?>"><?=$row['nmalternatif']?></option>
                          <?php } ?>)
                      </select>
                    </div>
                  </div>
                  <!-- end input -->
                  <div class="select-style-1">
                    <label>Bobot Kriteria</label>
                    <div class="select-position">
                    <select name="id_bobot" id="">
                            <option value="">---Pilih Bobot Kriteria---</option>
                          <?php 
                          $kriteria = mysqli_query($db, "SELECT * FROM bobot join kriteria on bobot.id_kriteria=kriteria.id_kriteria");
                          while($row= mysqli_fetch_array($kriteria)) { ?>
                            <option value="<?=$row['id_bobot']?>"><?=$row['id_kriteria']?> (bobot=<?=$row['valuebobot']?>)</option>
                          <?php } ?>)
                      </select>
                    </div>
                  </div>
                  <!-- end input -->
                  <div class="select-style-1">
                    <label>Skala</label>
                    <div class="select-position">
                    <select name="idskala" id="">
                            <option value="">---Pilih Skala---</option>
                          <?php 
                          $kriteria = mysqli_query($db, "SELECT * FROM skala");
                          while($row= mysqli_fetch_array($kriteria)) { ?>
                            <option value="<?=$row['idskala']?>"><?=$row['valueskala']?>--><?=$row['keterangan']?></option>
                          <?php } ?>)
                      </select>
                    </div>
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
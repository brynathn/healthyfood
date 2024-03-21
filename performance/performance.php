<?php
include('../connection.php');
$query = mysqli_query($con, "SELECT * FROM performance");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['nik'])) {
  $nik = $_GET['nik'];
  $search = mysqli_query($con, "SELECT * FROM performance WHERE nik='$nik' LIMIT 1");
  $search_result = mysqli_fetch_all($search, MYSQLI_ASSOC);
}

if (isset($_POST['insert']) && $_GET['action'] != 'edit') {
  $tanggal = $_POST['tanggal'];
  $nama = $_POST['nama'];
  $nik = $_POST['nik'];
  $loc     = $_FILES['foto']['tmp_name'];
  $status = $_POST['status'];
  $posisi = $_POST['posisi'];
  $responsible = $_POST['responsible'];
  $teamwork = $_POST['teamwork'];
  $time = $_POST['time'];
  $total = $_POST['total'];
  $grade = $_POST['grade'];
  $filenm = $nama . '-' . uniqid() . '.png';
  move_uploaded_file($loc, '../img/' . $filenm);

  $insert = mysqli_query($con, "INSERT INTO performance SET nik='$nik',foto='$filenm', nama='$nama', status_kerja='$status', position='$posisi', tgl_penilaian='$tanggal', responsibility='$responsible', teamwork='$teamwork', management_time='$time', total='$total', grade='$grade'");

  if ($insert)
    header('Location: performance.php');
  else
    echo 'Gagal Input: ' . mysqli_error($con);
}

if (isset($_POST['insert']) && $_GET['action'] === 'edit') {
  $tanggal = $_POST['tanggal'];
  $nama = $_POST['nama'];
  $nik = $_POST['nik'];
  $oldimg  = $_POST['old'];
  $newimg = $_FILES['foto']['name'];
  $status = $_POST['status'];
  $posisi = $_POST['posisi'];
  $responsible = $_POST['responsible'];
  $teamwork = $_POST['teamwork'];
  $time = $_POST['time'];
  $total = $_POST['total'];
  $grade = $_POST['grade'];

  if ($newimg == "") {
    $update = mysqli_query($con, "UPDATE performance SET nama='$nama', status_kerja='$status', position='$posisi', tgl_penilaian='$tanggal', responsibility='$responsible', teamwork='$teamwork', management_time='$time', total='$total', grade='$grade' WHERE nik='$nik'");
  } else {
    unlink('image/' . $oldimg);
    $loc    = $_FILES['foto']['tmp_name'];
    $filenm = $nama . '-' . uniqid() . '.png';
    move_uploaded_file($loc, '../img/' . $filenm);

    $update = mysqli_query($con, "UPDATE performance SET foto='$filenm', nama='$nama', status_kerja='$status', position='$posisi', tgl_penilaian='$tanggal', responsibility='$responsible', teamwork='$teamwork', management_time='$time', total='$total', grade='$grade' WHERE nik='$nik'");
  }

  if ($update)
    header('Location: performance.php');
  else
    echo 'Gagal Input: ' . mysqli_error($con);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete') {

  $nik = $_GET['nik'];

  $delete = mysqli_query($con, "DELETE FROM performance WHERE nik='$nik'");

  if ($delete)
    header('Location: performance.php');
  else
    echo 'Gagal Delete';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Performance</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="app.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <div class="background">
    <div class="sidebar">
      <div class="content">
        <div class="brand">
          <h1>HealthyFood</h1>
        </div>
        <div class="list">
          <div class="space home-list">
            <a href="../home.php">
              <i class="fa-solid fa-house"></i>
              <p>HOME</p>
            </a>
          </div>

          <div class="space perform-list">
            <a href="">
              <i class="fa-solid fa-chart-simple"></i>
              <p>PERFORMANCE</p>
            </a>
          </div>

          <div class="profile">
            <hr>
            <div class="profile_grid">
              <div><img src="../img/bry.jpg" alt=""></div>
              <div>
                <p>Bryan Nathaniel</p>
              </div>
              <div><i class="fa-solid fa-door-open"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="performance">
      <div class="btn_Nav">
      <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="fa-solid fa-bars"></i></button>
      </div> 

      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <div class="content">
        <div class="brand">
          <h1>HealthyFood</h1>
        </div>
        <div class="list">
          <div class="space home-list">
            <a href="../home.php">
              <i class="fa-solid fa-house"></i>
              <p>HOME</p>
            </a>
          </div>

          <div class="space perform-list">
            <a href="">
              <i class="fa-solid fa-chart-simple"></i>
              <p>PERFORMANCE</p>
            </a>
          </div>

          <div class="profile">
            <hr>
            <div class="profile_grid">
              <div><img src="../img/bry.jpg" alt=""></div>
              <div>
                <p>Bryan Nathaniel</p>
              </div>
              <div><i class="fa-solid fa-door-open"></i></div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
      <div class="judul">
        <h1>Performance</h1>
      </div>
      <div class="formKaryawan">
        <form method="post" enctype="multipart/form-data">
          <div class="form_grid">
            <div class="left_grid">
              <div>
                <p>Foto</p>
              </div>
              <div>
                <p>:</p>
                <input type="hidden" name="old" value="<?= $search_result[0]['foto']; ?>" />
              </div>
              <?php
              $showUploadimg = '';
              if (isset($_GET['action'])) {
                $action = $_GET['action'];
                if ($action === 'view') {
                  $showUploadimg = 'hidden';
                }
              }
              ?>
              <div class="upload_foto">
                <div class="circle">
                  <img class="profile-pic" src="<?php
                                                if (isset($_GET['nik'])) {
                                                ?>../img/<?php echo $search_result[0]['foto'];
                                                } else {
                              ?>
                    ../img/profile.png
                    <?php
                                                }
                    ?>" />
                </div>
                <div class="p-image <?= $showUploadimg; ?>">
                  <i class="fa fa-camera upload-button"></i>
                  <input class="file-upload" type="file" accept=".png, .jpg, .jpeg, .jfif, .gif" name="foto" />
                </div>
              </div>

              <div>
                <p>Tanggal Penilaian</p>
              </div>
              <div>
                <p>:</p>
              </div>
              <div class="input">
                <input value="<?php
                              if (isset($_GET['nik'])) {
                                echo $search_result[0]['tgl_penilaian'];
                              } ?>" name="tanggal" type="date" />
              </div>

              <div>
                <p>NIK</p>
              </div>
              <div>
                <p>:</p>
              </div>
              <?php
              $showReadOnly = '';
              if (isset($_GET['action'])) {
                $action = $_GET['action'];
                if ($action === 'edit' || $action === 'view') {
                  $showReadOnly = 'readonly';
                }
              }
              ?>
              <div class="input">
                <input value="<?php
                              if (isset($_GET['nik'])) {
                                echo $search_result[0]['nik'];
                              } ?>" name="nik" type="text" <?= $showReadOnly; ?> />
              </div>

              <div>
                <p>Nama</p>
              </div>
              <div>
                <p>:</p>
              </div>
              <div class="input">
                <input value="<?php
                              if (isset($_GET['nik'])) {
                                echo $search_result[0]['nama'];
                              } ?>" name="nama" type="text" />
              </div>

              <div>
                <p>Status Kerja</p>
              </div>
              <div>
                <p>:</p>
              </div>
              <div>
                <?php
                include('../connection.php');
                $query_enum = "SHOW COLUMNS FROM performance WHERE Field = 'status_kerja'";
                $result_enum = $con->query($query_enum);
                $row = $result_enum->fetch_assoc();
                $enum_str = $row['Type'];
                preg_match_all("/'([^']+)'/", $enum_str, $matches);
                $enum_values = $matches[1];
                ?>
                <select name="status" id="" class="select-status">
                  <?php foreach ($enum_values as $value) : ?>
                    <option value="<?= $value ?>" <?php if (isset($_GET['nik']) && $search_result[0]['status_kerja'] == $value) echo 'selected'; ?>><?= $value ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div>
                <p>Posisi</p>
              </div>
              <div>
                <p>:</p>
              </div>
              <div class="input">
                <input value="<?php
                              if (isset($_GET['nik'])) {
                                echo $search_result[0]['position'];
                              } ?>" name="posisi" type="text" />
              </div>
            </div>
            <?php
            $firstLand = 'firstLand';
            if (isset($_GET['action'])) {
              $action = $_GET['action'];
              if ($action === 'edit') {
                $firstLand = 'buttonGroupEdit';
              } else if ($action === 'view') {
                $firstLand = 'buttonGroupView';
              }
            }
            ?>
            <div class="right_grid">
              <div class="buttonGroup <?php echo $firstLand; ?>">
                <?php
                $showSaveClear = '';
                $showCancel = 'hidden';
                if (isset($_GET['action'])) {
                  $action = $_GET['action'];
                  if ($action === 'edit') {
                    $showSaveClear = '';
                    $showCancel = '';
                  } else {
                    $showSaveClear = 'hidden';
                    $showCancel = '';
                  }
                }
                ?>
                <div class="button <?php echo $showSaveClear; ?>"><button name="insert" type="submit">SIMPAN</button></div>
                <div class="button <?php echo $showSaveClear; ?>"><button name="reset" type="reset">CLEAR</button></div>
                <div class="button <?php echo $showCancel; ?>">
                  <div class="cancelbtn"><a href="performance.php">CANCEL</a></div>
                </div>
              </div>

              <div class="right_input">
                <div>
                  <p>Responsibility (30)%</p>
                </div>
                <div>
                  <p>:</p>
                </div>
                <div class="input">
                  <input value="<?php
                                if (isset($_GET['nik'])) {
                                  echo $search_result[0]['responsibility'];
                                } ?>" id="responsibility" name="responsible" type="number" oninput="calculateTotalAndGrade()" min="0" max="100" />
                </div>

                <div>
                  <p>Teamwork (40)%</p>
                </div>
                <div>
                  <p>:</p>
                </div>
                <div class="input">
                  <input value="<?php
                                if (isset($_GET['nik'])) {
                                  echo $search_result[0]['teamwork'];
                                } ?>" id="teamwork" name="teamwork" type="number" oninput="calculateTotalAndGrade()" min="0" max="100" />
                </div>

                <div>
                  <p>Management Time (40)%</p>
                </div>
                <div>
                  <p>:</p>
                </div>
                <div class="input">
                  <input value="<?php
                                if (isset($_GET['nik'])) {
                                  echo $search_result[0]['management_time'];
                                } ?>" id="managementTime" name="time" type="number" oninput="calculateTotalAndGrade()" min="0" max="100" />
                </div>

                <div>
                  <p>Total</p>
                </div>
                <div>
                  <p>:</p>
                </div>
                <div class="input">
                  <input value="<?php
                                if (isset($_GET['nik'])) {
                                  echo $search_result[0]['total'];
                                } ?>" id="total" name="total" type="text" readonly />
                </div>

                <div>
                  <p>Grade</p>
                </div>
                <div>
                  <p>:</p>
                </div>
                <div class="input">
                  <input value="<?php
                                if (isset($_GET['nik'])) {
                                  echo $search_result[0]['grade'];
                                } ?>" id="grade" name="grade" type="text" readonly />
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="tabelKaryawan">
        <table class="isi_tabel">
          <thead>
            <tr>
              <th scope="col">TANGGAL</th>
              <th scope="col">NIK</th>
              <th scope="col">NAMA</th>
              <th scope="col">STATUS KERJA</th>
              <th scope="col">POSITION</th>
              <th scope="col">TOTAL</th>
              <th scope="col">GRADE</th>
              <th colspan="3" scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query) > 0) {
              foreach ($result as $result) : ?>
                <tr>
                  <td data-cell="tanggal" scope="row"><?= $result['tgl_penilaian'] ?></td>
                  <td data-cell="nik"><?= $result['nik'] ?></td>
                  <td data-cell="nama"><?= $result['nama'] ?></td>
                  <td data-cell="status kerja"><?= $result['status_kerja'] ?></td>
                  <td data-cell="position"><?= $result['position'] ?></td>
                  <td data-cell="total"><?= $result['total'] ?></td>
                  <td data-cell="grade"><?= $result['grade'] ?></td>
                  <td><a href='performance.php?nik=<?= $result['nik'] ?>&action=view'>View</a></td>
                  <td><a href='performance.php?nik=<?= $result['nik'] ?>&action=edit'>Edit</a></td>
                  <td><a href='performance.php?nik=<?= $result['nik'] ?>&action=delete' onclick="return confirm('Apakah yakin hapus?')">Hapus</a></td>
                </tr>
              <?php endforeach;
            } else { ?>
              <tr>
                <td colspan="8" align="center"><i>Data Belum Ada</i></td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f266ad9e8a.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="app.js"></script>
</body>

</html>
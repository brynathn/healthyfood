<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthyFood</title>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
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
              <a href="#">
                <i class="fa-solid fa-house"></i>
                <p>HOME</p>
              </a>
            </div>

            <div class="space perform-list">
              <a href="performance/performance.php">
                <i class="fa-solid fa-chart-simple"></i>
                <p>PERFORMANCE</p>
              </a>
            </div>
            
            <div class="profile">
            <hr>
            <div class="profile_grid">
              <div><img src="img/bry.jpg" alt=""></div>
              <div><p>Bryan Nathaniel</p></div>
              <div><i class="fa-solid fa-door-open"></i></div>
            </div>   
            </div>
          </div>
        </div>
      </div>
    <div class="main-container">
    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="fa-solid fa-bars"></i></button>

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
            <a href="#">
              <i class="fa-solid fa-house"></i>
              <p>HOME</p>
            </a>
          </div>

          <div class="space perform-list">
            <a href="performance/performance.php">
              <i class="fa-solid fa-chart-simple"></i>
              <p>PERFORMANCE</p>
            </a>
          </div>

          <div class="profile">
            <hr>
            <div class="profile_grid">
              <div><img src="img/bry.jpg" alt=""></div>
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
      <h2>Home</h2>

      <div class="three-box-container mb-5">
        <div class="jumlah-karyawan-container">
          <div class="jumlah-karyawan upper-container">
            <span class="text title-text">Jumlah Karyawan</span>
            <span class="little-text date-text"></span>
          </div>
          <div class="jumlah-karyawan bottom-container">
            <div class="jumlah-karyawan tetap-container">
              <span class="sub-text tetap-text">
                Tetap
              </span>
              <span class="sub-text colon-tetap-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE status_kerja = 'Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalTetap = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalTetap . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
            <div class="jumlah-karyawan tidak-tetap-container">
              <span class="sub-text tidak-tetap-text">
                Tidak Tetap
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE status_kerja = 'Tidak Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalNoTetap = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalNoTetap . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
          </div>
        </div>
        <div class="karyawan-tetap-container">
          <div class="karyawan-tetap upper-container">
            <span class="text title-text">Hasil Performance <br> Karyawan Tetap</span>
            <span class="little-text year-text js-year-value"></span>
          </div>
          <div class="karyawan-tetap bottom-container">
            <div class="karyawan-tetap basic-rank-container">
              <span class="sub-text a-rank-text">
                A
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'A' AND status_kerja = 'Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeA = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeA . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
            <div class="karyawan-tetap rank-container">
              <span class="sub-text b-rank-text">
                B
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'B' AND status_kerja = 'Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeB = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeB . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
            <div class="karyawan-tetap rank-container">
              <span class="sub-text c-rank-text">
                C
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'C' AND status_kerja = 'Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeC = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeC . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
            <div class="karyawan-tetap rank-container">
              <span class="sub-text d-rank-text">
                D
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'D' AND status_kerja = 'Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeD = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeD . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
          </div>
        </div>
        <div class="karyawan-notetap-container">
          <div class="karyawan-tidak-tetap upper-container">
            <span class="text title-text">Hasil Performance <br> Karyawan Tidak Tetap</span>
            <span class="little-text year-text js-year-value"></span>
          </div>
          <div class="karyawan-tidak-tetap bottom-container">
            <div class="karyawan-tidak-tetap rank-container">
              <span class="sub-text a-rank-text">
                A
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'A' AND status_kerja = 'Tidak Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeA = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeA . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
            <div class="karyawan-tidak-tetap rank-container">
              <span class="sub-text b-rank-text">
                B
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'B' AND status_kerja = 'Tidak Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeB = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeB . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
            <div class="karyawan-tidak-tetap rank-container">
              <span class="sub-text c-rank-text">
                C
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'C' AND status_kerja = 'Tidak Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeC = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeC . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
            <div class="karyawan-tidak-tetap rank-container">
              <span class="sub-text d-rank-text">
                D
              </span>
              <span class="sub-text colon-text">
                :
              </span>
              <?php
              $sql = "SELECT COUNT(*) as total FROM performance WHERE grade = 'D' AND status_kerja = 'Tidak Tetap'";
              $result = mysqli_query($con, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalGradeD = $row['total'];

                echo '<span class="sub-text js-tetap-value">[' . $totalGradeD . ']</span>';
              } else {
                echo '<span class="sub-text js-tetap-value">No Data</span>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-2">
        <h2 class="mb-1">Employee Chart</h2>
        <p class="">Karyawan Tetap dengan Performance C dan D</p>
      </div>

      <div class="table-responsive mb-5">
        <table class="table-default">
          <thead>
            <th>FOTO</th>
            <th>NIK</th>
            <th>NAMA</th>
            <th>POSITION</th>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM performance WHERE status_kerja = 1 AND grade IN ('C', 'D') ORDER BY nik ASC";
            $result = mysqli_query($con, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr class="whitespace-nowrap text-center">
                  <td class="table-img-karyawan"><img src="img/<?= $row['foto'] ?>" class="table-img-karyawan"></td>
                  <td><?= $row['nik'] ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['position'] ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="mb-2">
        <p class="">Karyawan Tidak Tetap dengan Performance C dan D</p>
      </div>

      <div class="table-responsive mb-5">
        <table class="table-default">
          <thead>
            <th>FOTO</th>
            <th>NIK</th>
            <th>NAMA</th>
            <th>POSITION</th>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM performance WHERE status_kerja = 2 AND grade IN ('C', 'D') ORDER BY nik ASC";
            $result = mysqli_query($con, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr class="whitespace-nowrap text-center">
                  <td class="table-img-karyawan"><img src="img/<?= $row['foto'] ?>" class="table-img-karyawan"></td>
                  <td><?= $row['nik'] ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['position'] ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f266ad9e8a.js" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>
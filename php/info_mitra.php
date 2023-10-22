<?php
$db_host = "localhost";
$db_name = "arenafinderweb";
$db_user = "root";
$db_pass = "";

try {
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Mengambil data gambar dari database
  $stmt = $pdo->prepare("SELECT id, nama_gambar, data_gambar FROM gambar"); // Sesuaikan dengan kolom dan kriteria yang sesuai

  $stmt->execute();

  $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info Mitra</title>
  <link rel="stylesheet" href="/ArenaFinder/css/info_mitra.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/924b40cfb7.js" crossorigin="anonymous"></script>
  <style>
    body {
      overflow-x: scroll;
    }

    .img-container {
      display: flex;
      align-item: center;
      justify-content: center;
    }

    .img-container img {
      display: flex;
      align-item: center;
      justify-content: center;
      width: 1300px;
      height: 400px;
      margin-left: -40px;
    }

    /* Gaya untuk menyembunyikan teks h3 secara default */
    #rincianHarga {
      display: none;
    }

    #rincianHarga2 {
      display: none;
    }

    /* Menampilkan section1 terlebih dahulu */
    #section1 {
      display: block;
    }

    .link.active {
      color: #02406d;
    }

    .title-con {
      margin-left: 53.3px;
    }

    /* Menyembunyikan semua bagian kecuali section1 */
    section:not(#section1) {
      display: none;
    }

    .title button:active {
      background-color: #02406D;
    }
  </style>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg" style="background-color: #02406D;">
    <div class="container-fluid">
      <a class="navbar-brand" style="font-family: 'Kanit', sans-serif; color: white; margin-right: -235px;">Arena</a>
      <a class="navbar-brand" style="font-family: 'Kanit', sans-serif; color: #A1FF9F; margin-left: 235px;">Finder</a>
      <a class="navbar-brand" style="font-family: 'Kanit', sans-serif; color: white; padding-right: 300px;">|</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"
        style="margin-top: 0px; background-color: white; color-scheme: #02406D;">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/ArenaFinder/html/beranda.html">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aktivitas.php">Aktivitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/ArenaFinder/html/referensi.html">Referensi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">Info Mitra</a>
          </li>
        </ul>
        <li class="nav-item dropdown" style="margin-right: 20px; color: white;">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
              class="fa-solid fa-id-card fa-flip" style="margin-right: 5px;"></i>
            Daftar
          </a>
          <ul class="dropdown-menu" style="background-color: white; border: 1px solid #02406D;">
            <li><a class="dropdown-item"
                href="/ArenaFinder/cpanel-admin-arenafinder/startbootstrap-sb-admin-2-gh-pages/register.php">Daftar
                sebagai Admin</a></li>
            <li><a class="dropdown-item" href="/ArenaFinder/php/daftar.php">Daftar sebagai User</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown" style="color: white; margin-right: 40px;">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
              class="fa-solid fa-right-to-bracket" style="margin-right: 5px;"></i>
            Masuk
          </a>
          <ul class="dropdown-menu" style="background-color: white; border: 1px solid #02406D;">
            <li><a class="dropdown-item"
                href="/ArenaFinder/cpanel-admin-arenafinder/startbootstrap-sb-admin-2-gh-pages/login.html">Masuk sebagai
                Admin</a></li>
            <li><a class="dropdown-item" href="/ArenaFinder/php/masuk.php">Masuk sebagai User</a></li>
          </ul>
        </li>
        </form>
      </div>
    </div>
  </nav>

  <div class="first-con">
    <div class="img-container">
      <div>
        <img src="/ArenaFinder/img_asset/outdoor.jpg" alt="">
      </div>
    </div>

    <div class="title-con">
      <div class="box">
        <div class="group">
          <div class="rectangle"></div>
          <div class="div"></div>
        </div>
      </div>

      <div class="title">
        <h2>Blessing Futsal
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-edit">Edit
            <i class="fa-regular fa-pen-to-square"></i></button>
        </h2>
        <h5>2 Lapangan</h5>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Info Mitra</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h3>Deskripsi</h3>
            <h6 id="editableText" contenteditable="true">Blessing Futsal merupakan tempat penyewaan lapangan futsal yang
              dimana didirikan
              oleh Mr... dan sekarang tetap menjadi bagian layanan olahraga terbaik untuk masyarakat di Kabupaten
              Nganjuk dan sekitarnya.
            </h6>

            <h3>Rincian Harga
              <div id="rincianHarga">
                <!-- Tambahkan contenteditable="true" untuk mengedit teks -->
                <h6 id="harga1" contenteditable="true">Member > <strong>07:00 - 16:00</strong> (Pagi - Sore) <h6
                    id="harga1" contenteditable="true"><strong>Rp. 90.000/Jam</strong></h6>
                </h6>
                <h6 id="harga2" contenteditable="true">Member > <strong>17:00 - 24:00</strong> (Sore - Malam) <h6
                    id="harga2" contenteditable="true"><strong>Rp. 120.000/Jam</strong></h6>
                </h6>
                <h6 id="harga3" contenteditable="true">Non Member > <strong>07:00 - 16:00</strong> (Pagi - Sore) <h6
                    id="harga3" contenteditable="true"><strong>Rp. 105.000/Jam</strong></h6>
                </h6>
                <h6 id="harga4" contenteditable="true">Non Member > <strong>17:00 - 24:00</strong> (Sore - Malam) <h6
                    id="harga4" contenteditable="true"><strong>Rp. 135.000/Jam</strong></h6>
                </h6>
              </div>
            </h3>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="simpanPerubahan()">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        function simpanPerubahan() {
          // Ambil teks yang diedit dan simpan dalam variabel
          var editedText = document.getElementById('editableText').innerText;
          var harga1 = document.getElementById('harga1').innerText;
          var harga2 = document.getElementById('harga2').innerText;
          var harga3 = document.getElementById('harga3').innerText;
          var harga4 = document.getElementById('harga4').innerText;

          // Tampilkan notifikasi atau lakukan apa yang Anda inginkan dengan teks yang diedit
          alert('Perubahan Teks: ' + editedText + '\nHarga 1: ' + harga1 + '\nHarga 2: ' + harga2 + '\nHarga 3: ' + harga3 + '\nHarga 4: ' + harga4);
        }
      </script>

      <div class="nav-body">
        <div class="link-body">
          <nav>
            <ul>
              <li><a class="link" id="link1" href="#section1" data-target="section1">TENTANG</a></li>
              <li><a class="link" id="link2" href="#section2" data-target="section2">AKTIVITAS</a></li>
              <li><a class="link" id="link3" href="#section3" data-target="section3">MEMBER</a></li>
              <li><a class="link" id="link4" href="#section4" data-target="section4">GALERI</a></li>
              <li><a class="link" id="link5" href="#section5" data-target="section5">KONTAK</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <section id="section1">
        <div class="tentang-con">
          <div class="deskripsi">
            <h3>Deskripsi</h3>
            <h6 id="editableText">Blessing Futsal merupakan tempat penyewaan lapangan futsal yang dimana didirikan
              oleh Mr... dan sekarang tetap menjadi bagian layanan olahraga terbaik untuk masyarakat di Kabupaten
              Nganjuk dan sekitarnya.
            </h6>

            <div class="harga">
              <h3>Rincian Harga
                <div id="rincianHarga">
                  <h6>Member > <strong>07:00 - 16:00</strong> (Pagi - Sore)
                    <h6><strong>Rp. 90.000/Jam</strong></h6>
                  </h6>
                  <h6>Member > <strong>17:00 - 24:00</strong> (Sore - Malam)
                    <h6><strong>Rp. 120.000/Jam</strong></h6>
                  </h6>
                  <h6>Non Member > <strong>07:00 - 16:00</strong> (Pagi - Sore)
                    <h6><strong>Rp. 105.000/Jam</strong></h6>
                  </h6>
                  <h6>Non Member > <strong>17:00 - 24:00</strong> (Sore - Malam)
                    <h6><strong>Rp. 135.000/Jam</strong></h6>
                  </h6>
                </div>
              </h3>
            </div>

            <div class="fasilitas">
              <h3>Fasilitas Tempat</h3>
              <div id="fasilitasTempat">
                <div style="margin-bottom: 20px;">
                  <img src="/ArenaFinder/img_asset/toilet.jpg" alt="">
                  <h5 style="text-align: center;">Toilet</h5>
                </div>

                <div style="margin-bottom: 20px;">
                  <img src="/ArenaFinder/img_asset/kursi.jpg" alt="">
                  <h5 style="text-align: center; width: 80px;">Kursi Penonton</h5>
                </div>
                <div style="margin-bottom: 20px;">
                  <img src="/ArenaFinder/img_asset/parkiran.jpg" alt="">
                  <h5 style="text-align: center;">Area Parkir</h5>
                </div>
                <div style="margin-bottom: 20px;">
                  <img src="/ArenaFinder/img_asset/alex-_AOL4_fDQ3M-unsplash.jpg" alt="">
                  <h5 style="text-align: center; width: 80px;">Lapangan Futsal</h5>
                </div>
              </div>
            </div>

            <div class="pengelola">
              <h3>Pengelola</h3>
              <div id="pengelolaTempat">
                <div class="pengelola-item">
                  <img src="/ArenaFinder/img_asset/alex-_AOL4_fDQ3M-unsplash.jpg" alt="">
                  <h5>Admin</h5>
                </div>
                <div class="pengelola-item">
                  <img src="/ArenaFinder/img_asset/alex-_AOL4_fDQ3M-unsplash.jpg" alt="">
                  <h5>Super Admin</h5>
                </div>
              </div>
            </div>

            <script src="script.js"></script>
          </div>
        </div>
      </section>

      <section id="section2">
        <div class="tentang-con">
          <div class="deskripsi" style="width: 100%; margin-left: -65px;">
            <div class="card"
              style="color: white; background: linear-gradient(to right, #02406D, 50%, white); border: 1px solid white;">
              <div class="card-body">
                <h3>Blessing Futsal Activity</h3>
                <h6 id="editableText" style="color: white;"><strong style="color: #A1FF9F;">Futsal</strong> oleh <strong
                    style="color: #A1FF9F;">Mr. Robert</strong>
                </h6>
              </div>
            </div>
            <h3 style="margin-top: 30px;">Semua Aktivitas</h3>
          </div>

          <div class="card-con" style="display: flex; justify-content: space-between; margin: 10px;">
            <div class="card" style="width: 18rem; margin-left: -65px;">
              <img src="/ArenaFinder/img_asset/alex-_AOL4_fDQ3M-unsplash.jpg" class="card-img" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="/ArenaFinder/img_asset/alex-_AOL4_fDQ3M-unsplash.jpg" class="card-img" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="/ArenaFinder/img_asset/alex-_AOL4_fDQ3M-unsplash.jpg" class="card-img" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="/ArenaFinder/img_asset/alex-_AOL4_fDQ3M-unsplash.jpg" class="card-img" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
              </div>
            </div>
          </div>


        </div>
      </section>

      <section id="section3">
        <div class="tentang-con">
          <div class="deskripsi" style="width: 10rem; margin-left: -85px;">
            <div class="card" style="color: black;  border: 1px solid white;">
              <div class="card-body" style="background-color: white;">
                <img src="/ArenaFinder/img_asset/bg-member.png" alt="" style="border-radius: 10px;">
                <div class="card" style="margin-top: -41rem; margin-left: 30px; width: 500px; border: 1px solid white;">
                  <div class="card-body" style="display: flex; align-items: center;">
                    <img src="/ArenaFinder/img_asset/img-c2.jpeg" alt="" style="width: 20%; border-radius: 5px;">
                    <h3 style="margin-left: 20px;">K.C2</h3>
                    <h6 style="margin-left: -48px; margin-top: 50px;">@C2_nich</h6>
                    <div class="card"
                      style="display: flex; width: 250px; text-align: center; height: 30px; background-color: #02406D; color: white;">
                      Super Admin
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </section>

      <section id="section4">
        <div class="tentang-con">
          <div class="deskripsi" style="width: 10rem; margin-left: -85px;">
            <div class="card" style="color: black;  border: 1px solid white;">
              <div class="card-body" style="background-color: white;">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                  <label for="fileUpload">Pilih Gambar:</label>
                  <input type="file" name="fileUpload" id="fileUpload" accept="image/*">
                  <button type="submit" name="submit">Upload dan Simpan</button>
                </form>

                <?php foreach ($images as $image) { ?>
                  <div class="card">
                    <img src="data:image/jpeg;base64,<?= base64_encode($image['data_gambar']); ?>" alt="Gambar">
                    <div class="card-body">
                      <h5 class="card-title">Gambar ID
                        <?= $image['id']; ?>
                      </h5>
                      <p class="card-text">Deskripsi gambar atau informasi lainnya.</p>
                    </div>
                  </div>
                <?php } ?>


              </div>

            </div>
          </div>
        </div>
      </section>

      <section id="section5">
        <div class="tentang-con">
          <div class="deskripsi" style="width: 10rem; margin-left: -85px;">
            <div class="card" style="color: black;  border: 1px solid white;">
              <div class="card-body" style="background-color: white;">
                <img src="/ArenaFinder/img_asset/bg-member.png" alt="" style="border-radius: 10px;">
                <div class="card" style="margin-top: -41rem; margin-left: 30px; width: 500px; border: 1px solid white;">
                  <div class="card-body" style="display: flex; align-items: center;">
                    <img src="/ArenaFinder/img_asset/telepon.png" alt="" style="width: 20%; border-radius: 5px;">
                    <h3 style="margin-left: 20px;">08958074xxxxx</h3>
                    <div class="card"
                      style="display: flex; width: 150px; text-align: center; height: 30px; background-color: #02406D; color: white; margin-left: 50px;">
                      Super Admin
                    </div>




                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </section>



      <script>
        // Ambil semua tautan di dalam navigasi
        const navLinks = document.querySelectorAll(".link");

        // Tambahkan event listener untuk setiap tautan navigasi
        navLinks.forEach((link) => {
          link.addEventListener("click", (event) => {
            event.preventDefault();

            // Ambil target dari atribut data-target
            const targetId = link.getAttribute("data-target");

            // Sembunyikan semua bagian
            const sections = document.querySelectorAll("section");
            sections.forEach((section) => {
              section.style.display = "none";
            });

            // Tampilkan bagian yang sesuai dengan tautan yang diklik
            const targetSection = document.getElementById(targetId);
            targetSection.style.display = "block";

            // Hapus kelas "active" dari semua tautan
            navLinks.forEach((navLink) => {
              navLink.classList.remove("active");
            });

            // Tambahkan kelas "active" ke tautan yang diklik
            link.classList.add("active");
          });
        });



      </script>

      <div class="container">
        <div class="footer">
          <h1 style="font-size: 20px; color: white;">Arena</h1>
          <h1 style="font-size: 20px; color: #A1FF9F;">Finder</h1>
          <div class="hierarki">
            <p style="font-size: 20px; color: white; margin-left: 250px;">Hierarki
              <a href="" style="margin-top: 10px;">Beranda</a>
              <a href="">Aktivitas</a>
              <a href="">Referensi</a>
              <a href="">Info Mitra</a>
            </p>
            <p style="font-size: 20px; color: white; margin-left: 120px;">Bantuan
              <a href="" style="margin-top: 10px;">Apa saja layanan yang disediakan?</a>
              <a href="">Siapa target penggunanya?</a>
              <a href="">Bagaimana sistem ini bekerja?</a>
              <a href="">Saat kapan pengguna dapat mengetahui pesanan?</a>
              <a href="">Masuk aplikasi??</a>
              <a href="">Daftar aplikasi??</a>
            </p>
            <p style="font-size: 20px; color: white; margin-left: 120px;">Narahubung
              <a href="">https://chat.whatsapp.com/DycWLfU9nt40BIjERofIrq</a>
            </p>
          </div>
        </div>
      </div>


</body>

</html>
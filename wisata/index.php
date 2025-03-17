<?php
include 'db.php'; // Koneksi ke database

// Initialize the query
$query = "SELECT * FROM tbdestinasi";

// Check if a search term is provided
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query .= " WHERE name LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
    <title>TUGAS UTS</title>
  </head>
  <body>
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="#" class="logo">BiBeach</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">HOME</a></li>
        <li><a href="#destination">DESTINATION</a></li>
        <li><a href="#tour">TOUR</a></li>
        <li><a href="#package">PACKAGE</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="login.php">ADMIN</a></li>
        <li><a href="#">BiBeach</a></li>
      </ul>
      <div class="nav__btns">
        <button class="btn">BiBeach</button>
      </div>
    </nav>

    <header id="home">
      <div class="header__container">
        <div class="header__content">
          <p>Nikmati Keindahan Alam Bima Mbojo</p>
          <h1>Visit Bima Mbojo</h1>
          <div class="header__btns">
            <button class="btn">See more</button>
            <a href="#" id="play-button">
              <span><i class="ri-play-circle-fill"></i></span>
            </a>
          </div>
        </div>
        <video class="header__video" autoplay muted loop>
          <source src="video2.mp4" type="video/mp4" />
        </video>

        <audio id="background-audio" autoplay>
          <source src="audio/audio1.mp3" type="audio/mpeg" />
        </audio>
      </div>
    </header>

    <section class="section__container destination__container" id="destination">
      <h2 class="section__header">Destinasi Populer</h2>
      <p class="section__description">
        Temukan Destinasi yang menyenangkan di Bima
      </p>

      <section class="section">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="menu-card">
            <img src="img/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="menu-card-img">
            <h3 class="menu-card-title"><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <a href="order.php?product_id=<?php echo $row['id']; ?>" class="cta"></a>
        </div>
        <?php endwhile; ?>
    </div>
    <!-- Button for slide control -->
    <div class="button">
        <button class="prev" onclick="slideLeft()">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button class="next" onclick="slideRight()">
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</section>

    <section class="section__container journey__container" id="tour">
      <h2 class="section__header">
        Tour Bersama BiBeach, Sederhanakan Petualangan Anda!
      </h2>
      <p class="section__description">
        Tour Tanpa Ribet untuk Petualangan Anda Selanjutnya
      </p>
      <div class="journey__grid">
        <div class="journey__card">
          <div class="journey__card__bg">
            <span><i class="ri-bookmark-3-line"></i></span>
            <h4>Proses Pemesanan yang Mudah</h4>
          </div>
          <div class="journey__card__content">
            <span><i class="ri-bookmark-3-line"></i></span>
            <h4>Reservasi Mudah, Cukup Sekali Klik</h4>
            <p>
              Dari penerbangan dan akomodasi hingga aktivitas dan transportasi,
              semua yang Anda butuhkan tersedia di ujung jari Anda, membuat
              perencanaan perjalanan menjadi mudah.
            </p>
          </div>
        </div>
        <div class="journey__card">
          <div class="journey__card__bg">
            <span><i class="ri-landscape-fill"></i></span>
            <h4>Tailored Itineraries</h4>
          </div>
          <div class="journey__card__content">
            <span><i class="ri-landscape-fill"></i></span>
            <h4>Rencana yang Disesuaikan Khusus untuk Anda</h4>
            <p>
              Nikmati perjalanan yang dipersonalisasi atau perjalanan grup
              sesuai dengan minat Anda. Baik mencari petualangan atau pengalaman
              yang luar biasa.
            </p>
          </div>
        </div>
        <div class="journey__card">
          <div class="journey__card__bg">
            <span><i class="ri-map-2-line"></i></span>
            <h4>Expert Local Insights</h4>
          </div>
          <div class="journey__card__content">
            <span><i class="ri-map-2-line"></i></span>
            <h4>Tips dan Rekomendasi</h4>
            <p>
              Kami menyediakan rekomendasi pilihan untuk bersantap, bertamasya,
              dan permata tersembunyi, sehingga Anda dapat menikmati setiap
              destinasi seperti penduduk lokal.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container showcase__container" id="package">
      <div class="showcase__image">
        <img src="img/image.png" alt="Showcase" />
      </div>
      <div class="showcase__content">
        <h4>BEBASKAN RINDU PETUALANGAN DI BIBEACH</h4>
        <p>
          Mulailah perjalanan tak terlupakan ke pantai-pantai menakjubkan di
          Bima, Nusa Tenggara Barat, tempat impian pantai Anda menjadi
          kenyataan. Misi kami adalah menginspirasi dan memfasilitasi
          petualangan Anda, apakah Anda mencari keindahan tenang pantai
          tersembunyi, kehidupan bawah laut yang beragam, atau keramahan hangat
          budaya lokal. Di Bibeach, kami menawarkan destinasi pantai yang
          dirancang dengan ahli dan itinerari yang dipersonalisasi, memastikan
          setiap perjalanan sesuai dengan preferensi unik Anda. Temukan permata
          tersembunyi di pesisir Bima, selami tradisi kaya masyarakatnya, dan
          ciptakan kenangan tak terlupakan di latar belakang air jernih dan
          pasir emas.
        </p>
        <div class="showcase__btn">
          <button class="btn">
            Book A Tour Now
            <span><i class="ri-arrow-right-line"></i></span>
          </button>
        </div>
      </div>
    </section>

    <section class="section__container discover__container">
      <h2 class="section__header">
        Temukan suasana yang belum pernah anda rasakan
      </h2>
      <p class="section__description">
        Nikmati Pemandangan Menakjubkan dan Perspektif Unik
      </p>
      <div class="discover__grid">
        <div class="discover__card">
          <span><i class="ri-camera-lens-line"></i></span>
          <h4>Aerial Cityscapes</h4>
          <p>
            Saksikan keajaiban arsitektur dan jalan-jalan yang ramai dari
            ketinggian, memberikan perspektif yang unik.
          </p>
        </div>
        <div class="discover__card">
          <span><i class="ri-ship-line"></i></span>
          <h4>Coastal Wonders</h4>
          <p>
            Tour di atas garis pantai yang masih asli dan perairan berwarna biru
            kehijauan, menyinkap teluk teluk tersembunyi dan terumbu karang yang
            berwarna-warni.
          </p>
        </div>
        <div class="discover__card">
          <span><i class="ri-landscape-line"></i></span>
          <h4>Historic Landmarks</h4>
          <p>
            Saksikan keindahan alam yang mempesona dengan cara yang tidak biasa
            ditawarkan oleh BiBeach.
          </p>
        </div>
      </div>
    </section>

    <!-- komentar -->
     

    <div class="comment-box">
        <h2>Komentar</h2>
        <textarea id="commentInput" placeholder="Tulis komentar Anda di sini..." rows="5"></textarea>
        <button id="submitComment">Kirim</button>
    </div>

    <div id="commentsSection">
    <h3>Komentar yang Dikirim:</h3>
    <ul id="commentsList">
    </ul>
</div>


<footer id="contact">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="footer__logo">
            <a href="#" class="logo">BiBeach</a>
          </div>
          <p>
            Temukan tempat wisata dan destinasi di wilayah Bima yang menyuguhkan
            suasana yang belum pernah anda rasakan.
          </p>
          <ul class="footer__socials">
            <li>
              <a href="#"><i class="ri-facebook-fill"></i></a>
            </li>
            <li>
              <a href="#"><i class="ri-instagram-line"></i></a>
            </li>
            <li>
              <a href="#"><i class="ri-youtube-line"></i></a>
            </li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Quick Links</h4>
          <ul class="footer__links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tours</a></li>
            <li><a href="#">Hotels</a></li>
            <li><a href="#">Cruise</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Contact Us</h4>
          <ul class="footer__links">
            <li>
              <a href="#">
                <span><i class="ri-phone-fill"></i></span> +62 1912727
              </a>
            </li>
            <li>
              <a href="#">
                <span><i class="ri-record-mail-line"></i></span> info@BiBeach
              </a>
            </li>
            <li>
              <a href="#">
                <span><i class="ri-map-pin-2-fill"></i></span> Bima, Nusa
                Tenggara Barat
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Tugas UTS. All rights reserved.
      </div>
      <button id="scrollButton" onclick="scrollToTop()">↑</button>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>

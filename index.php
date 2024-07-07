<?php
// File path to the APK file
$filePath = 'SRMTracker.apk';

// Function to increment visit count
function incrementVisitCount() {
    $visitFile = 'visit_count.txt';
    $count = (int)file_get_contents($visitFile);
    $count++;
    file_put_contents($visitFile, $count);
}

// Function to increment download count
function incrementDownloadCount() {
    $downloadFile = 'download_count.txt';
    $count = (int)file_get_contents($downloadFile);
    $count++;
    file_put_contents($downloadFile, $count);
}

function getDownloadCount() {
    $downloadFile = 'download_count.txt';
    return (int)file_get_contents($downloadFile);
}

// Function to get visit count
function getVisitCount() {
    $visitFile = 'visit_count.txt';
    return (int)file_get_contents($visitFile);
}


// Increment visit count
incrementVisitCount();

// Check if the download button is clicked
if (isset($_GET['download'])) {
    // Increment download count
    incrementDownloadCount();

    // Download the APK file
    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.android.package-archive');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo 'File not found.';
    }
}

if (getVisitCount() > 20) {
    $showView = true;
} else {
    $showView = false;
}

if (getDownloadCount() > 20) {
    $showDown = true;
} else {
    $showDown = false;
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SRM TRACKER</title>
    <link rel="icon" href="ic_icon.png" type="ion" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/2.5.0/remixicon.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <style>
      body {
        margin: 0;
        font-family: "Lato", Arial, sans-serif;
        background-color: #fff;
        color: #000;
      }
      .navbar {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        background-color: #fff;
        border-bottom: 0.1px solid #222;
      }
      .navbar img {
        height: 50px;
        width: 50px;
        margin-right: 10px;
      }
      .navbar h1 {
        font-size: 1.5rem;
        margin: 0;
        font-weight: 400;
      }
      .hero {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 80vh;
        text-align: center;
        padding: 20px;
        opacity: 0;
        animation: fadeIn 2s ease-in-out 1s forwards,
          bounce 1s infinite alternate;
      }
      @keyframes bounce {
        0% {
          transform: translateY(0);
        }
        100% {
          transform: translateY(-10px);
        }
      }
      .hero h1 {
        font-size: 3rem;
        font-weight: bold; 
        margin: 0;
      }
      .hero .highlight {
        color: #ff00ff;
        background: linear-gradient(90deg, #ff00ff, #a64ca6);
        -webkit-background-clip: text;
        color: transparent;
      }
      .hero .btn {
        display: inline-block;
        margin: 20px 0;
        padding: 10px 20px;
        background-color: #fff;
        color: #000;
        border: 2px solid #000;
        border-radius: 25px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
        font-weight: bold;
      }

      .hero .btn:hover {
        background-color: #000;
        color: #fff;
      }
      .stats {
        text-align: center;
        margin-top: 10px;
      }
      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 1em;
        text-align: center;
      }

      .title {
        font-size: 1.5em;
        margin-bottom: 1em;
        animation: fadeIn 4s ease-in-out 1s forwards;
        font-weight: bold;
      }
      .heading {
        font-size: 3em;
        margin-bottom: 1em;
        opacity: 0;
        animation: fadeIn 4s ease-in-out 1s forwards;
        font-weight: bold;
      }

      .carousel-container {
        overflow: hidden;
        position: relative;
        margin: 0 auto;
        border: 1px solid #222;
        border-radius: 20px;
        padding: 20px;
        max-width: 100%;
        margin-bottom: 20px;
      }
      .carousel {
        display: flex;
        transition: transform 0.5s ease-in-out;
      }
      .carousel-item {
        min-width: 40%;
        box-sizing: border-box;
        padding: 1em;
      }

      .card {
        background: #fff;
        color: #000;
        border: 1px solid #222;
        border-radius: 20px;
        padding: 1em;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 120px;
        width: 80%;
        margin: 0 auto;
      }
      .card-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      .icon {
        font-size: 2em;
        margin-bottom: 0.5em;
      }
      .card-title {
        font-size: 1.2em;
        font-weight: bold;
      }

      .f-text {
        font-size: 0.9em;
        text-align: center;
        margin-top: 20px;
      }

      .footer {
        border-top: 0.1px solid #222;
        text-align: center;
        padding: 10px 0;
        margin-top: 20px;
      }
      @media (max-width: 768px) {
        .container {
          padding: 1em;
        }

        .carousel-container {
          width: 80%;
        }

        .heading {
          font-size: 2em;
        }

        .title {
          font-size: 1.2em;
        }

        .carousel-item {
          min-width: 40%;
        }

        .card {
          height: 100px;
          width: 80%;
        }

        .icon {
          font-size: 1.5em;
        }

        .card-title {
          font-size: 1em;
        }

        .f-text {
          font-size: 0.8em;
        }

        .footer {
          font-size: 0.8em;
        }
      }

      @media (max-width: 480px) {
        .heading {
          font-size: 2em;
          font-weight: bold;
        }

        .title {
          font-size: 1em;
        }

        .carousel-item {
          min-width: 100%;
        }

        .carousel-container {
          width: 90%;
        }

        .card {
          height: 90px;
          width: 60%;
        }

        .icon {
          font-size: 1.2em;
        }

        .card-title {
          font-size: 0.9em;
          font-weight: bold;
        }

        .f-text {
          font-size: 0.8em;
        }

        .footer {
          font-size: 0.8em;
        }
      }

      @keyframes fadeIn {
        0% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }
    </style>
  </head>
  <body>
    <div class="navbar">
      <img src="ic_icon.png" alt="Logo" />
      <h1>SRM TRACKER</h1>
    </div>

    <div class="hero">
      <h1>
        Track Your Attendance With <span class="highlight">SRM TRACKER</span>
      </h1>
      <form method="post" action="download.php">
        <button type="submit" name="download" class="btn">Download Now</button>
    </form>

    <div class="stats">
        <?php if ($showView): ?>
            <p>This page has been visited <?php echo getVisitCount(); ?> times.</p>
        <?php else: ?>
            <p></p>
        <?php endif; ?>
        <?php if ($showDown): ?>
            
            <p>This file has been downloaded <?php echo getDownloadCount(); ?> times.</p>
        <?php else: ?>
            <p></p>
        <?php endif; ?>
      
      </div>
    </div>

    <div class="container">
      <h2 class="heading">In App Features</h2>
      <h2 class="title">Utilise our features to the up-most</h2>
      <div class="carousel-container">
        <div class="carousel">
          <div class="carousel-item">
            <div class="card">
              <div class="card-content">
                <i class="icon ri-login-box-fill"></i>
                <h4 class="card-title">Auto Login</h4>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="card-content">
                <i class="icon fas fa-user-graduate"></i>
                <h4 class="card-title">Attendance Analysis</h4>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="card-content">
                <i class="icon fas fa-table"></i>
                <h4 class="card-title">Time Table Mode</h4>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="card-content">
                <i class="icon ri-book-3-fill"></i>
                <h4 class="card-title">Scholarship Mode</h4>
              </div>
            </div>
          </div>
        </div>
        <p class="f-text">SRM TRACKER</p>
      </div>
    </div>

    <div class="footer">
      <p>© srmtracker 2024</p>
    </div>

    <script src="https://unpkg.com/embla-carousel@latest/embla-carousel.umd.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const emblaNode = document.querySelector(".carousel-container");
        const embla = EmblaCarousel(emblaNode, { loop: true });

        const autoplay = (embla) => {
          let timer = 0;

          const play = () => {
            stop();
            timer = setInterval(() => embla.scrollNext(), 3000);
          };

          const stop = () => clearInterval(timer);

          embla.on("pointerDown", stop);
          embla.on("init", play);
          embla.on("destroy", stop);

          return { play, stop };
        };

        const { play, stop } = autoplay(embla);
        play();
      });
    </script>
  </body>
</html>



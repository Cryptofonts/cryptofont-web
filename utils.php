<!doctype html>
<html lang="en">
  <head>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K769Q5P');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119769091-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119769091-1');
    </script>

    <!-- Hotjar Tracking Code for https://cryptofonts.com/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1835372,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A crisp webfont icons and svg logos for your favourite cryptocurrencies. Featuring 974 icons.">
    <meta name="keywords" content="icons, logos, crypto logo, vector icons, svg icons, free icons, icon font, webfont, desktop icons, svg, font awesome, font awesome free, font awesome pro">
    <meta name="author" content="Fabio Monzani">

    <meta property="og:site_name" content="Cryptofonts" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.cryptofonts.com/img/card.png" />
    <meta property="og:url" content="https://cryptofonts.com" />
    <meta property="og:title" content="Cryptofonts" />
    <meta property="og:description" content="A crisp webfont icons and svg logos for your favourite cryptocurrencies. Featuring 974 icons." />

    <title>CryptoFont - Cryptocurrency icons and webfont</title>

    <?php include('include/favicons.php') ?>
    <?php include('include/social.php') ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custome CSS -->
    <link rel="stylesheet" href="css/style.min.css?v=1.6">
    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/duotone.min.css" rel="stylesheet">
    <link href="css/brands.min.css" rel="stylesheet">
    <!-- Cryptofonts -->
    <link href="css/cryptofonts-util.css" rel="stylesheet">

  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K769Q5P"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php
    include('include/navbar.php');
    include('include/getfontcount.php')
    ?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1>Utility Web Font for dApps</h1>
        <p class="lead">Create beautiful dApps with our utilty collection.</p>
        <a href="https://github.com/monzanifabio/cryptofonts-utils/releases" target="_blank" class="btn btn-primary"><span class="fad fa-folder-download"></span> Download Webfont</a>
      </div>
    </div>

    <div class="container">
      <div class="input-group input-group-lg">
        <input type="text" id="searchTicker" onkeyup="searchTicker()"class="form-control" placeholder="Search icons..." autofocus autocomplete="off">
      </div>
    </div>

    <section>
      <div class="container">
        <div class="row" id="list">
          <!-- <h1 id="emptySearch" style="display: none;">Empty search</h1> -->
          <?php
          //get database account details
          include('include/dbaccess.php');

          //create connection
          $link = mysqli_connect($db_hostname,$db_username,$db_password,$db_database)
              or die("cannot connect to database.");

          //running SQL query
          $query ="SELECT * FROM utils ORDER BY ticker";
          $result=mysqli_query($link, $query)
              or die("Failed to load data.");

          //processing results
          while($row = mysqli_fetch_assoc($result)){

            echo "<div class='col-md-2 col-6 text-center expand'>";
            echo "<i class='cfu-" . $row['ticker'] . " icon-small' id='" . $row['ticker'] . "' onclick='getDetails(this)'></i>";
            echo "<p class='text-muted'>cfu-" . $row['ticker'] . "</p>";
            echo "</div>";
          }

          ?>
        </div>
      </div>
    </section>

    <?php include('include/footer.php') ?>

    <?php include('include/donate.php') ?>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="modalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body text-center">
              <i class="" id="tickerDetail"></i>
              <h2 class="mt-5">Icon Font Usage</h2>
              <div class="form-inline justify-content-center">
                <p id="tickerHtml"></p>
                <!-- <a class="badge badge-light mb-3" onclick="copy('#tickerHtml')"><img src="img/clipboard-regular.svg" height="16"></a> -->
              </div>
            </div>
        </div>
      </div>
    </div>


    <script>
    function searchTicker() {
        // Declare variables
        var input, filter, ul, li, a, i;
        input = document.getElementById('searchTicker');
        filter = input.value.toUpperCase();
        ul = document.getElementById("list");
        li = ul.getElementsByTagName('div');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("p")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    function getDetails(ticker) {
      var name = $(ticker).attr('id');
      console.log(name);

      $('#detailModal').modal();
      $('#tickerDetail').removeClass();
      $('#modalTitle').html("<i class='cfu-" + name + "'></i> " + name);
      $('#tickerDetail').addClass("cfu-" + name + " xlarge");
      $('#tickerHtml').text('<i class="cfu-' + name + '"></i>');
      $('#tickerTitle').addClass("cfu-" + name);
    }

    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendors/bootstrap-4.5.0/js/jquery-3.5.1.min.js"></script>
    <script src="vendors/bootstrap-4.5.0/js/popper.min.js"></script>
    <script src="vendors/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    </body>
    </html>

<!doctype html>
<html lang="en">
  <head>

    <?php include('include/tracking.php') ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A crisp webfont icons and svg for your favourite cryptocurrencies. Featuring 974 icons.">
    <meta name="keywords" content="icons, vector icons, svg icons, free icons, icon font, webfont, desktop icons, svg, font awesome, font awesome free, font awesome pro">
    <meta name="author" content="Fabio Monzani">

    <title>CryptoFont - Cryptocurrency icons and webfont</title>

    <?php include('include/favicons.php') ?>
    <?php include('include/social.php') ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custome CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Lato font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/duotone.min.css" rel="stylesheet">
    <link href="css/brands.min.css" rel="stylesheet">
    <!-- Cryptofonts -->
    <link href="css/cryptofont.css" rel="stylesheet">

  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K769Q5P"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php
      include('include/navbar.php');
      include('include/getcount.php');
     ?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1>High Quality Cryptocurrencies Icons</h1>
        <p class="lead">The complete set of <?php echo $count; ?> SVG icons.</p>
        <a href="https://github.com/monzanifabio/cryptoicons/releases" target="_blank" class="btn btn-primary"><span class="fad fa-folder-download"></span> Download All Icons</a>
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
          include('include/images.php');

          //create connection
          $link = mysqli_connect($db_hostname,$db_username,$db_password,$db_database)
              or die("cannot connect to database.");

          //running SQL query
          $query ="SELECT * FROM coloricon ORDER BY ticker";
          $result=mysqli_query($link, $query)
              or die("Failed to load data.");

          //processing results
          while($row = mysqli_fetch_assoc($result)){

            $logoid = $row['id'];
            echo "<div class='col-md-2 col-6 text-center expand'>";
            // echo "<embed type='image/svg+xml' class='grow' src='" . $path . $row['ticker'] . ".svg' height='60'/>";
            echo "<img loading='lazy' src='" . $path . $row['ticker'] . ".svg' height='60' id='" . $row['ticker'] . "' onclick='getDetails(this)' alt='" . $row['ticker'] . "'></img>";
            echo "<p class='text-muted'>" . $row['ticker'] . "</p>";
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
              <img id="iconDetail" src="" height="200">
              <div class="row justify-content-center mt-5">
                <a download='' id="iconDownload" href="" class="btn btn-primary">Download SVG</a>
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
      var newSrc = "img/icons/" + name + ".svg";
      console.log(name);

      $('#detailModal').modal();
      $('#modalTitle').html('<img src="img/icons/'+ name + '.svg" height="16"> ' + name);
      $('#iconDetail').attr('src', newSrc);
      $('#iconDownload').attr('href', newSrc).attr('download', name);
    }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>

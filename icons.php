<!doctype html>
<html lang="en">
  <head>

    <?php include('include/tracking.php') ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A crisp webfont icons and svg for your favourite cryptocurrencies. Featuring 974 icons.">
    <meta name="author" content="Fabio Monzani">

    <title>CryptoFont - Cryptocurrency icons and webfont</title>

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
    <?php include('include/navbar.php') ?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1>High Quality Web Font</h1>
        <p class="lead">The complete set of 1930 open source cryptocurrencies icons crafted for designers and developers.</p>
        <a href="https://github.com/monzanifabio/cryptofont/releases" class="btn btn-primary">Download Webfont</a>
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
          $query ="SELECT * FROM fontcase ORDER BY ticker";
          $result=mysqli_query($link, $query)
              or die("Failed to load data.");

          //processing results
          while($row = mysqli_fetch_assoc($result)){

            echo "<div class='col-md-2 col-xs-4 text-center expand'>";
            echo "<i class='cf cf-" . $row['ticker'] . " large' id='" . $row['ticker'] . "' onclick='getDetails(this)'></i>";
            echo "<p class='text-muted'>cf-" . $row['ticker'] . "</p>";
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
          <form>
            <div class="modal-body text-center">
              <i class="" id="tickerDetail"></i>
              <h2 class="mt-5">Icon Font Usage</h2>
              <p id="tickerHtml"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          </form>
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
      $('#modalTitle').html("<i class='cf cf-" + name + "'></i> " + name);
      $('#tickerDetail').addClass("cf cf-" + name + " xlarge");
      $('#tickerHtml').text('<i class="cf cf-' + name + '"></i>');
      $('#tickerTitle').addClass("cf cf-" + name);
    }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>

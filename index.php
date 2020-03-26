<?php

$install = true;
if ($install) {
  echo "merci de finir l'instalation ;)";
  die();
}
$zip = new ZipArchive;

if (!file_exists('./prestashop')) {
  $prestashop = copy('https://download.prestashop.com/download/releases/prestashop_1.7.6.4.zip', './prestashop.zip');
  mkdir('./prestashop');
  $zip->open('./prestashop.zip');
  $zip->extractTo('./prestashop');
  $zip->close();
  unlink('./prestashop.zip');
}

if (!file_exists('./wordpress')) {
  $worpress = copy('https://fr.wordpress.org/latest-fr_FR.zip', './wp.zip');
  $zip->open('./wp.zip');
  $zip->extractTo('./');
  $zip->close();
  unlink('./wp.zip');
}

if (file_exists('./prestashop/install') && !file_exists('./prestashop/admin')) {
  rename('./prestashop/install', './installquiserarienici');
  unlink('./prestashop/INSTALL.txt');
  unlink('./prestashop/Install_PrestaShop.html');
  unlink('./prestashop/LICENSES');
}

foreach (scandir('./prestashop/') as $dir) {
  if (substr($dir, 0, 5) == "admin" && strlen($dir) > 5) {
    $adminpresta = $dir;
    $install = false;
  }
}
if (file_exists('./wordpress/wp-config.php')) {
  $install = false;
} else {
  $install = true;
}
if ($install) {
  echo "merci de finir l'instalation ;)";
  die();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Groupe Alternance">
  <meta name="keywords" content="">
  <meta name="author" content="FIORI Stéphane pour Groupe Alternance">
  <title>Plateforme NDRC</title>
  <link rel="icon" type="image/png" href="/assets/img/icone_groupe-alternance32.png">
  <link rel="stylesheet" href="/assets/style/font-awesome.min.css">
  <link href="/assets/style/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="/assets/style/mdb.min.css" rel="stylesheet">
  <link href="/assets/style/style.css" rel="stylesheet">
  <link href="/assets/style/pagination.css" rel="stylesheet">
</head>

<body class="fixed-sn">
  <style>
    body {
      font-weight: 300;
    }

    .card-body {
      -ms-flex: 1 1 auto;
      -webkit-box-flex: 1;
      -webkit-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: 1.25rem;
    }

    .fixed-sn main {
      margin-left: 0%;
      margin-right: 0%;
      padding-top: 1rem;
    }

    .btn.btn-flat {
      box-shadow: none;
      background-color: transparent;
      color: inherit !important;
    }

    .btn:not(:disabled):not(.disabled) {
      cursor: pointer;
    }

    .trigger {
      padding: 1px 10px;
      font-size: 12px;
      font-weight: 400;
      border-radius: 10px;
      background-color: #eee;
      color: #212121;
      display: inline-block;
      margin: 2px 5px;
    }

    .hoverable,
    .trigger {
      transition: box-shadow 0.55s;
      box-shadow: 0;
    }

    .hoverable:hover,
    .trigger:hover {
      transition: box-shadow 0.45s;
      box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .circle {
      display: inline-block;
      color: #fff;
      border-radius: 50%;

      width: 24px;
      height: 24px;
      line-height: 24px;
      margin-right: 8px;
      text-align: center;
      background-color: #4285F4 !important;
    }

    .logo {
      border: 1px solid #ddd;
      border-radius: 5px;
      display: block;
      flex-grow: 0;
      flex-shrink: 0;
      height: 90px;
      margin-right: 20px;
      width: 90px;
      background-position: 50% 50%;
      background-size: 70px;
      background-repeat: no-repeat;
    }

    .element {
      background-color: transparent;

      padding: 1px 13px;
      margin-bottom: 10px;
    }

    p {
      font-size: 0.9rem;

    }

    .badge {
      font-weight: 300;
    }

    .file-field .btn {
      line-height: 1rem;
    }

    input[type="date"],
    input[type="datetime-local"],
    input[type="email"],
    input[type="number"],
    input[type="password"],
    input[type="search-md"],
    input[type="search"],
    input[type="tel"],
    input[type="text"],
    input[type="time"],
    input[type="url"],
    textarea.md-textarea {
      font-size: 0.8rem;
    }

    .modal-content .close {
      position: inherit;
      right: 15px;
    }

    #idliste .card-body p {
      font-size: 75%;
    }

    #tablistemployes table tr {
      font-size: 0.8rem;
    }

    [type="checkbox"]+label {
      height: 5px;
    }

    .fa-user-times {
      cursor: pointer;
    }

    /*----------------------------scroll horizontal----------*/
    .live__scroll {
      overflow-x: auto;
      overflow-y: hidden;
      white-space: nowrap;
    }

    .live__scroll .row {
      display: block;
    }

    .live__scroll .live__scroll--box {
      display: inline-block;
      float: none;
      padding: 5px;
    }

    .overlay {
      cursor: pointer;
    }

    .flottant {
      width: 200px;
      float: right;
      margin: 0px;
    }
  </style>
  <div class="flottant"><img src="/assets/img/logo_groupe_alternance.png" width="183" height="105"></div>
  <div>
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div id="iddpts" class="card">
              <div class="card-header unique-color white-text">Accès aux applications</div>
              <div class="card-body">
                <h6>Applications (cliquez sur une icône)</h6>
                <div class="live__scroll">
                  <div class="row text-center">
                    <div class="col-3 live__scroll--box">
                      <div class="card testimonial-card">
                        <div class="card-up blue lighten-3">
                        </div>
                        <div class="avatar mx-auto white">
                          <div class="view overlay">
                            <img src="/assets/img/presta.png" class="rounded-circle">
                            <div class="mask flex-center rgba-black-strong" data-appli="rando">
                              <a href="/prestashop/">
                                <p class="white-text">Magasin en<br>ligne</p>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">e-commerce</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-3 live__scroll--box">
                      <div class="card testimonial-card">
                        <div class="card-up grey darken-4">
                        </div>
                        <div class="avatar mx-auto white">
                          <div class="view overlay">
                            <img src="/assets/img/wordpress.png" class="rounded-circle">
                            <div class="mask flex-center rgba-black-strong" data-appli="blog">
                              <a href="/wordpress/">
                                <p class="white-text">Blog<br>WordPress</p>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">Blog</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  </div>
  <br />
  <hr />
  <p>Cette plateforme a été réalisé par le Groupe Alternance. Elle est à destination de tous nos étudiants présents dans
    nos centres faisant partis du réseau du groupe.</p>
  <hr />
  <div>
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div id="iddpts" class="card">
              <div class="card-header unique-color white-text">Accès aux administrations</div>
              <div class="card-body">
                <h6>Administration (cliquez sur une icône)</h6>
                <div class="live__scroll">
                  <div class="row text-center">
                    <div class="col-3 live__scroll--box">
                      <div class="card testimonial-card">
                        <div class="card-up blue lighten-3">
                        </div>
                        <div class="avatar mx-auto white">
                          <div class="view overlay">
                            <img src="/assets/img/presta.png" class="rounded-circle">
                            <div class="mask flex-center rgba-black-strong" data-appli="rando">
                              <a href="/prestashop/<?= $adminpresta ?>/">
                                <p class="white-text">Magasin en<br>ligne</p>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">e-commerce</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-3 live__scroll--box">
                      <div class="card testimonial-card">
                        <div class="card-up grey darken-4">
                        </div>
                        <div class="avatar mx-auto white">
                          <div class="view overlay">
                            <img src="/assets/img/wordpress.png" class="rounded-circle">
                            <div class="mask flex-center rgba-black-strong" data-appli="blog">
                              <a href="/wordpress/wp-admin/">
                                <p class="white-text">Blog<br>WordPress</p>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">Blog</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <br />
  <hr />
  <p>Cette plateforme a été réalisé par le Groupe Alternance. Elle est à destination de tous nos étudiants présents dans
    nos centres faisant partis du réseau du groupe.</p>
</body>

</html>
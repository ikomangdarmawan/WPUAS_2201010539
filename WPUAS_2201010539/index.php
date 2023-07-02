<?php
// hubungkan dengan file koneksi.php
require_once('koneksi.php');
// pagination

// 1. sistem read data
function read_data() {

  global $mysqli;

  $query = "SELECT * FROM tb_pendaftaran";
  $result = mysqli_query($mysqli, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    
    return $data;
  } else {
    // jika query kosong, kembalikan array kosong
    return array();
  }
}


// 2. sistem hapus data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $no_undi = $_POST['no_undi'];

  // Query untuk menghapus data data berdasarkan ID
  $query = "DELETE FROM tb_pendaftaran WHERE no_undi = '$no_undi'";

  // Eksekusi query
  if(mysqli_query($mysqli, $query)) {
    // life hack untuk memunculkan alert
    echo "<div></div>";
    // alert
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'>
    <script>Swal.fire('Data Di Hapus!','Data Berhasil Di Hapus!','info')</script>
    ";
    // Redirect ke halaman sebelumnya
    // header("Location: {$_SERVER['HTTP_REFERER']}");
    // exit();
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}


// 3. sistem cari data
function read_by_search() {
  global $mysqli;
  global $mulai_dari;

  // Retrieve search query parameter
  $search_query = isset($_GET['search']) ? $_GET['search'] : '';

  // Prepare and execute search query
  $sql = "SELECT * FROM tb_pendaftaran WHERE seka LIKE '%$search_query%'";
  $result = mysqli_query($mysqli, $sql);

  // Fetch search results
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
      return $data;
  } else {
      return array();
  }
}

// panggil fungsi untuk membaca data
if (isset($_GET['search'])) {
  $data_tabel = read_by_search();
} else {
  $data_tabel = read_data();
}


?>

<?php 
  // memanggil header.php
  // require_once('header.php');
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- css -->
  <link rel="stylesheet" href="src/css/index.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  
  <title>Kite Festival 2023</title>

  <style>

    .header{
        background-image: url("src/img/index.jpg");
        background: linear-gradient(#f08d8d15 , #ffffff), url("src/img/index.jpg") ;
        background-size: cover ;
        background-position: center;
        min-height: 28vh;
    }

    .navbar{
        padding-top: 40px;
        overflow: hidden;
        margin-top: 3px;
        background-color: rgb(255, 255, 255);
        min-height: 9vh;
        position: sticky;
    }

    .navbar>ul{
        display: flex;
    }

    .navbar>ul>a{
        text-decoration: none;
        margin: 5px;
        color: black;
        transition: ease-in-out .3s;
        font-family: 'Barlow Semi Condensed', sans-serif;
        font-size: 2em;
    }

    .navbar>ul>a:hover{
        font-size: 1.5em;
        background-color: #36483D ;
        border-radius: 5px;
        color: #ffffff;
        transition: ease-in-out .4s;
    }

    .active{
        text-align: center;
        background-color: #36483D;
        color: #ffff!important;
        border-radius: 3px;
    }

    .side>h1{
        margin-top: 70px;
        margin-left: 10px;
        font-size: 4em;
        text-align: center;
        position: relative;
        font-family: 'Kalam', cursive;
    }

    .imgmain>img{
        border-radius: 10px;
        margin: auto;
        margin-top: 18px;
        width: 50vw;
        min-height: 70vh;
    }

    .imgmain>p{
        padding-top: 10px;
        text-align: center;
        margin-top: 15px;
        font-family: 'Roboto Condensed', sans-serif;
        min-height: 15vh;
        font-size: 1.3em;
    }

  </style>
</head>
  <div class="header">
  </div>
  <div class="navbar">
      <ul>
        <a href="index.php" class="active">Beranda/Anggota</a>
        <a href="create.php">Pendaftaran</a>
      </ul>
  </div>
  <main class="container">
    <!-- konten -->
      <div class="row">
          <div class="side">
              <h1>LOMBA TARI 2023</h1>
              <div class="imgmain">
                  <img class="mySlides" src="src/img/tari1.jpg" alt="" >
                  <img class="mySlides" src="src/img/tari2.jpg" alt="">
                  <img class="mySlides" src="src/img/tari3.jpg" alt="">
              </div>
          </div>
      </div>

    <!-- search bar -->
    <div class="p-1 rounded rounded-pill shadow mb-4">
      <form adction="index.php" method="GET" class="input-group">
        <input type="search" name="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-white rounded-pill">
        <div class="input-group-append">
          <button id="button-addon1" type="submit" class="btn btn-link text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
      </form>
    </div>
    <!-- table -->
    <div class="p-2 shadow">
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="scope">no_undi</th>
            <th class="scope">seka</th>
            <th class="scope">kriteria</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            for($i = 0; $i < count($data_tabel); $i++) {
          ?>
          <tr>
            <th scope="row"><?= $data_tabel[$i]['no_undi'] ?></th>
            <th scope="row"><?= $data_tabel[$i]['seka'] ?></th>
            <th scope="row"><?= $data_tabel[$i]['kriteria'] ?></th>
            <th scope="row">
              <div class="row">
                <div class="col">
                  <a href="detail.php?id=<?= $data_tabel[$i]['no_undi'] ?>" style="width:100%" class="btn btn-outline-primary">
                  Detail
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                    <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                    <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                  </svg>
                  </a>
                </div>
                <div class="col">
                  <a href="update.php?id=<?= $data_tabel[$i]['no_undi'] ?>" style="width:100%" class="btn btn-outline-secondary">
                  Update
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                  </svg>
                  </a>
                </div>
                <div class="col">
                  <form action="index.php" method="POST">
                    <input type="hidden" value="<?= $data_tabel[$i]['no_undi'] ?>" name="no_undi">
                    <button type="submit" onclick="return confirm('yakin ingin di hapus?')" style="width:100%" class="btn btn-outline-danger">
                      Hapus
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg>
                    </button>
                  </form>
                </div>
              </div>
            </th>
          </tr>
          <?php 
            }
          ?>
        </tbody>
      </table>
      <?php 
        if(count($data_tabel) == 0) {
          echo "<p class='text-center'>data tidak ditemukan</p>";
        }
      ?>
      <!-- pagination -->

    </div>
  </main>

  <script>
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
  }
  </script>

  <?php 
    // memanggil footer.php
    require_once('footer.php');
  ?>

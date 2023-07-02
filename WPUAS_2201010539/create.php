<?php
// hubungkan dengan file koneksi.php
require('koneksi.php');

// sistem tambah data
// cara cek adalah bila method request = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // $_POST
  $no_undi = $_POST['no_undi'];
  $seka = $_POST['seka'];
  $kriteria = $_POST['kriteria'];

  // var_dump($no_undi);
  // die();

  //menambah data baru
  $sql = "INSERT INTO tb_pendaftaran (
      no_undi, 
      seka, 
      kriteria
    ) VALUES (
      '$no_undi', 
      '$seka', 
      '$kriteria'
    )";

  if (mysqli_query($mysqli, $sql)) {
    // life hack : diisi untuk memunculkan alert
    echo "<div></div>";
    // alert
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'>
    <script>Swal.fire('Berhasil!','Data Berhasil Di Tambahkan!','success')</script>
    ";
  } 

  // berhenti mysqli
  mysqli_close($mysqli);
}

?>

<?php 
  // memanggil header.php
  // require_once('header.php');
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- css -->
  <link rel="stylesheet" href="src/css/index.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  
  <title>LOMBA TARI 2023</title>

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

      
    .grid-container{
      display: grid;
      grid-template-columns: auto auto auto;
    }

    .grid-container>a{
        text-decoration: none;
    }

    .grid-container>a>img{
        width: 30vw;
        margin: 27px;
        min-height: 43vh;
        border-radius: 10px;
        transition: ease-in-out .4s ;
        position: relative;
        box-shadow: 5px 10px 20px 0 rgba(0, 0, 0, 0.521), 0 6px 20px 0 rgba(7, 15, 24, 0.212);
    }

    .grid-container>a>img:hover{
        box-shadow: 5px 10px 20px 0 rgb(14, 68, 9), 0 6px 20px 0 rgb(0, 119, 255);
        width: 30.5vw;
        min-height: 45vh;
        transition: ease-in-out .4s ;
    }

    .grid-container>a>p{
        text-align: center;
        margin: 20px;
        color: black;
        cursor:default;
        overflow:-moz-hidden-unscrollable;
        /* max-height: 6em; */
    }

    .grid-container>a>h1{
        padding-top: 0;
        text-align: center;
        color: #36483D;
        font-size: 2em;
        cursor:default;
        font-family: 'Gloria Hallelujah', cursive;
    }
  </style>
</head>

<div class="header">
</div>
<div class="navbar">
    <ul>
      <a href="index.php">Beranda/Anggota</a>
      <a href="create.php" class="active">Pendaftaran</a>
    </ul>
</div>

<div class="grid-container">
    <a  target="_blank" rel="noopener noreferrer"><img src="src/img/Janggan.jpg" alt=""> <h1>Janggan </h1><p><strong>Kriteria Layangan Janggan</strong> Penilaian berdasar gegulakan,Layangan yang mendapat nilai penuh adalah layangan yang sekali terbang,Tidak boleh cacat terbang,Warna gleber maksimal 4 warna,Pola warna berupa garis,Tapel kategori janggan adalah tapel Naga,Don/bungan guwangan terbuat dari daun lontar.</p></a>
    
    <a target="_blank" rel="noopener noreferrer"><img src="src/img/Bebean.jpg" alt=""><h1>Bebean</h1><p><strong>Kriteria Layangan Bebean</strong> Penilaian berdasar gegulakan diudara,Layangan yang mendapat nilai penuh adalah layangan yang sekali terbang,Layangan yang naik 2 kali/lebih akan didiskualifikasi,Tidak boleh cacat terbang,Warna dasar yg diperbolehkan adalah Catur Warna,Guwet warna bisa horizontal/vertikal/diagonal,Don atau bungan guwangan harus terbuat dari daun lontar.</p></a>
    
    <a target="_blank" rel="noopener noreferrer"><img src="src/img/Pecukan.jpg" alt=""><h1>Pecukan</h1><p><strong>Kriteria Layangan Pecukan</strong> Penilaian berdasar gegulakan diudara,Layangan yang mendapat nilai penuh adalah layangan yang sekali terbang,Layangan yang naik 2 kali atau lebih akan didiskualifikasi,Tidak boleh cacat terbang,Warna dasar yg diperbolehkan adalah Catur Warna,Guwet warna vertikal,Don/bungan guwangan terbuat dari daun lontar.</p></a>
    
    <a target="_blank" rel="noopener noreferrer"><img src="src/img/Kuwir.jpg" alt=""><h1>Janggan Buntut/Kuwir</h1><p><strong>Kriteria Layangan Janggan Buntut/Kuwir</strong> Penilaian berdasar gegulakan diudara,Layangan yang mendapat nilai penuh adalah layangan yang sekali terbang,Layangan yang naik 2 kali/lebih akan didiskualifikasi,Tidak boleh cacat terbang,Tapel yang digunakan adalah berupa tapel paksi,Penukub layangan Janggan Buntut/Kuwir bebas mengambil unsur Catur Datu,Don atau bungan guwangan harus terbuat dari daun lontar.</p></a>
    
    <a target="_blank" rel="noopener noreferrer"><img src="src/img/BebeanKhasSanur.jpg" alt=""><h1>Bebean Khas Sanur</h1><p><strong>Kriteria Layangan Bebean Khas Sanur</strong> Penilaian berdasar gegulakan diudara,Layangan yang mendapat nilai penuh adalah layangan yang sekali terbang,Layangan yang naik 2 kali/lebih akan didiskualifikasi,Tidak boleh cacat terbang,Warna dasar yg diperbolehkan adalah Catur Warna,Guwet warna bisa horizontal/vertikal/diagonal,Don atau bungan guwangan harus terbuat dari daun lontar.</p></a>
    
    <a target="_blank" rel="noopener noreferrer"><img src="src/img/Kreasi.webp" alt=""> <h1>Kreasi</h1><p><strong>Kriteria Layangan Kreasi</strong> Penilaian diudara dinilai dari kesuksean terbang berlandaskan rangka bangun/konstruki,Tema layangan kreasi TIDAK BOLEH mengandung unsur pronografi dan SARA,Layangan yang akan mendapat nilai penuh adalah layangan yang sekali terbang tidak jatuh,Layangan yang naik 2 kali atau lebih akan didiskualifikasi,Tidak boleh cacat terbang,Penukub layangan bebas boleh terbuat dari kertas, kain maupun daun,Warna bebas.</p></a>
</div>

<!-- konten -->
<div class="container">
<h5 class="text-center mt-5">TAMBAH PENDAFTARAN</h5>
<form class="shadow rounded py-4 px-3 my-4" action="create.php" method="POST">
  <div class="mb-3">
    <label for="no_undi" class="form-label">no_undi</label>
    <input required type="text" class="form-control" id="no_undi" name="no_undi">
  </div>
  <div class="mb-3">
    <label for="seka" class="form-label">seka</label>
    <input required type="text" class="form-control" id="seka" name="seka">
  </div>
  <div class="mb-3">
    <label for="kriteria" class="form-label">kriteria</label>
    <select class="form-select" id="kriteria" name="kriteria">
      <option selected disabled>Choose...</option>
      <option value="Bebean">Bebean</option>
      <option value="Jangan">Jangan</option>
      <option value="Kuwir">Kuwir</option>
      <option value="Pecukan">Pecukan</option>
      <option value="Bebean Khas Sanur">Bebean Khas Sanur</option>
      <option value="Kreasi">Kreasi</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php 
  // memanggil footer.php
  require_once('footer.php');
?>
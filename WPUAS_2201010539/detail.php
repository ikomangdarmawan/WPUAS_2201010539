<?php
// hubungkan dengan file koneksi.php
require_once('koneksi.php');

// sistem tambah data

if (isset($_GET['id'])) {

  // sanitize data
  $no_undi = mysqli_real_escape_string($mysqli, $_GET['id']);

  // query untuk ambil data
  $sql = "SELECT * FROM tb_pendaftaran WHERE no_undi = '$no_undi'";

  // eksekusi query
  $result = mysqli_query($mysqli, $sql);

  // cek apakah data ditemukan
  if (mysqli_num_rows($result) > 0) {
    // tampilkan data dalam bentuk tabel
    // echo "<table>";
    // while ($row = mysqli_fetch_assoc($result)) {
    //   echo "<tr><td>no_undi:</td><td>" . $row['no_undi'] . "</td></tr>";
    //   echo "<tr><td>seka:</td><td>" . $row['seka'] . "</td></tr>";
    //   echo "<tr><td>kriteria:</td><td>" . $row['kriteria'] . "</td></tr>";
    //   echo "<tr><td>prodi:</td><td>" . $row['prodi'] . "</td></tr>";
    //   echo "<tr><td>gender:</td><td>" . $row['gender'] . "</td></tr>";
    //   echo "<tr><td>tanggal_lahir:</td><td>" . $row['tanggal_lahir'] . "</td></tr>";
    //   echo "<tr><td>tanggal_bergabung:</td><td>" . $row['tanggal_bergabung'] . "</td></tr>";
    // }
    // echo "</table>";
    $data = mysqli_fetch_assoc($result);
  } else {
    // jika data tidak ditemukan
    echo "Data tidak ditemukan.";
    $data = [];
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
      <a href="index.php" class="active">Beranda/Anggota</a>
      <a href="create.php">Pendaftaran</a>
    </ul>
</div>

<div class="grid-container">
    <a  target="_blank" rel="noopener noreferrer"><img src="src/img/pendet.jpg" alt=""> <h1>Tari Pendet </h1><p><strong>Lomba Tari Pendet</strong> Makna Tari Pendet sejatinya adalah bentuk rasa syukur terhadap dewa atas segala karunia yang diberikan. Selain itu sebagai tari sesembahan, mak gerak tarinya juga mengandung unsur penghormatan terhadap Dewa.</p></a>
    
    <a target="_blank" rel="noopener noreferrer"><img src="src/img/PanjiSemirang.jpg" alt=""><h1>Tari Panji Semirang</h1><p><strong>Lomba Tari Panji Semirang</strong>  Seni tari ini adalah penggambaran dari sosok bernama Galuh Candrakirana yang menyamar sebagai laki-laki untuk menemui orang yang disukainya, yakni Raden Panji Inu Kertapati.</p></a>
    
    <a target="_blank" rel="noopener noreferrer"><img src="src/img/legong.jpg" alt=""><h1>Tari Legong</h1><p><strong>Lomba Tari Legong</strong> ari Legong merupakan tarian tradisional Bali yang dibawakan oleh dua atau tiga penari wanita, dengan ciri pokok gerakan yang luwes pada kaki yang diiringi permainan musik.</p></a>
    
</div>


 <!-- konten -->
 <div class="container">
  <h5 class="text-center mt-5">DETAIL data</h5>
  <form class="shadow rounded py-4 px-3 my-4">
    <div class="mb-3">
      <label for="no_undi" class="form-label">no_undi</label>
      <input readonly type="text" class="form-control" id="no_undi" name="no_undi" value="<?= $data['no_undi'] ?>">
    </div>
    <div class="mb-3">
      <label for="seka" class="form-label">seka</label>
      <input readonly type="text" class="form-control" id="seka" name="seka" value="<?= $data['seka'] ?>">
    </div>
    <div class="mb-3">
      <label for="seka" class="form-label">kriteria</label>
      <input readonly type="text" class="form-control" id="seka" name="seka" value="<?= $data['kriteria'] ?>">
    </div>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  </form>
</div>

<?php 
  // memanggil footer.php
  require_once('footer.php');
?>
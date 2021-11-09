<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Buku</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        position: relative;
        left: 24
        text-transform: uppercase;
        color: Black;
      }
    table {
      border: solid 1px #C0C0C0;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #A9A9A9;
        border: solid 1px #C0C0C0;
        color: #6495ED;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #C0C0C0;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          
          background-color: Peru;
          color: #FFFAFA;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }

    .tambah{
      position: relative;
      right : 420px;
      background-color : blue
    }

    .edit{
      background-color : green
    }

    .delete{
      background-color : red
    }

    .tabel{
      background-color : #EEE8AA
    }

    .tabel2{
      background-color : #00FF7F
    }


    </style>
  </head>
  <body>
    <center><h1>DAFTAR BUKU</h1><center>
    <center><a  href="tambah_produk.php" class="tambah">+ &nbsp; Tambah Buku </a><center>
    <br/>
    <table class="tabel">
      <thead >
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Gambar Buku</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM buku ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo substr($row['pengarang'], 0, 20); ?></td>
          <td><?php echo substr($row['penerbit'],0, 20); ?></td>
          <td><?php echo $row['tahun']; ?></td>
          <td style="text-align: center;"><img src="../gambar<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a> 
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>
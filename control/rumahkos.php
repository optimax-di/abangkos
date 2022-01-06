<?php
  function daftaradmin($username, $password, $email, $idhakuser){
    $query = "INSERT INTO admin (id, nama, password, email, id_hakakses) VALUES ('', '$username', '$password', '$email', '$idhakuser')";
    return run($query);
  }

  function daftaruser($namalengkap, $nama, $password, $email, $alamat, $hp, $idhakuser){
    $query = "INSERT INTO user (id_user, namalengkap, nama, password, email, alamat, hp, id_hakakses) VALUES ('', '$namalengkap', '$nama', '$password', '$email', '$alamat', '$hp', '$idhakuser')";
    return run($query);
  }

  function tampilperid($id){
    global $konek;
    $query = "SELECT * FROM user WHERE id_user = '$id'";
    $hasil = mysqli_query($konek, $query) or die('gagal query edit');
    return $hasil;
  }

  function tampildatauser(){
    global $konek;
    $query = mysqli_query($konek, "SELECT * FROM user");
    return $query;
  }

  function editdatauser($namalengkap, $nama, $password, $email, $alamat, $hp, $id_user){
    $query = "UPDATE user SET namalengkap = '$namalengkap', nama = '$nama', password = '$password', email = '$email', alamat = '$alamat', hp = '$hp' WHERE id_user = $id_user";
    return run($query);
  }
   function editdataadmin($namalengkap, $nama, $email, $hp, $alamat, $id){
    $query = "UPDATE user SET namalengkap = '$namalengkap', nama = '$nama', email = '$email', alamat = '$alamat', hp = '$hp' WHERE id_hakakses = '$id'";
    return run($query);
  }

  function filterinput($string){
    return htmlspecialchars(trim($string));
  }

  function hapusdatauser($id){
    global $konek;
    $query = mysqli_query($konek, "DELETE FROM user WHERE id_user = $id");
    return $query;
  }

  function tampilprofile($id){
    global $konek;
    $query = mysqli_query($konek, "SELECT id_user, namalengkap, nama, email, alamat, hp FROM user WHERE nama ='".$_SESSION['nama']."'") or die('query tampil profile gagal');
    return $query;
    }

  function tampilprofileadmin($id){
    global $konek;
    $query = mysqli_query($konek, "SELECT id_user, namalengkap, nama, password, email, alamat, hp FROM user WHERE id_hakakses ='".$_SESSION['id_hakakses']."'") or die('query tampil profile gagal');

    return $query;
  }

  function tampilkos(){
    global $konek;
    $query = mysqli_query($konek, "SELECT * FROM listkos");
    return $query;
  }

  function tampilkosperid($id){
    global $konek;
    $query = mysqli_query($konek, "SELECT * FROM listkos WHERE idkos = $id");
    return $query;
  }

  function infokos_perid($id){
    global $konek;
    $query = mysqli_query($konek, "SELECT * FROM listkos WHERE id_user = '$id'") or die('query tampil iduser gagal');
    return $query;
  }

  function tampildatakos(){
      global $konek;
      $query = mysqli_query($konek, "SELECT * FROM listkos");
      return $query;
    }

  function tampilmarker($id){
    global $konek;
   $query = mysqli_query($konek, "SELECT * FROM listkos WHERE idkos = $id");
    return $query;
    }

//tampilkomentar
  function tampilkomenperid($id){
    global $konek;
    $query = mysqli_query($konek, "SELECT * FROM komentar WHERE idkomen = $id");
    return $query;
  }

  function tampilkomen(){
    global $konek;
    $query = mysqli_query($konek, "SELECT * FROM komentar");
    return $query;
  }

  //selesai

  function run($query){
    global $konek;
    if($hasil = mysqli_query($konek, $query) or die('maaf ada kesalahan query')){
      return $hasil;
    }
  }


 ?>

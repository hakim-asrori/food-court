<?php
include_once "function/bootstrap.php";
$produk = $koneksi->query("SELECT * FROM tb_produk");
$response = array();
while ($p = $produk->fetch_assoc()) {
  $pembelian = $koneksi->query("SELECT jumlah, COUNT(id_produk) as 'count' FROM tb_pembelian WHERE id_produk = '$p[id_produk]'")->fetch_assoc();
  $response[] = array(
    'id' => $p['id_produk'],
    'nama' => $p['nama'],
    'slug' => $p['slug'],
    'harga' => $p['harga'],
    'rating' => $p['rating'],
    'deskripsi' => $p['deskripsi'],
    'foto' => $p['foto'],
    'count' => $pembelian['count']
  );
}

echo json_encode($response);
exit();
?>

<script>
  function load() {
    let xhr = new XMLHttpRequest();

    console.log(xhr);

    xhr.open("GET", "./", true);

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        let response = JSON.parse(this.responseText);

        let gambar = document.createElement('img');

        for (let key in response) {
          if (response.hasOwnProperty(key)) {
           let val = response[key];

           gambar.src = val['foto']; 
           document.getElementById("a").append(gambar);
           username_cell.innerHTML = val['salary']; 
           email_cell.innerHTML = val['email']; 

         }
       } 

     }
   };
 }
</script>
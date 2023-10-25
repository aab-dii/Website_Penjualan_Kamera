<?php
@include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn2, "SELECT * FROM barang_form WHERE id = $id");

    $barang = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $barang[] = $row;
    }
    
    foreach ($barang as $brg):
    $status=unlink('../assets/'.$brg['gambar']);    
    if ($status){
        mysqli_query($conn2, "DELETE from barang_form where id = $id");   
        echo "
        <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'dashboard.php'
        </script>";
    }
    else{
        mysqli_query($conn2, "DELETE from barang_form where id = $id");   
        echo "
        <script>
            alert('Data Gagal Dihapus ! ');
            document.location.href = 'dashboard.php'
            </script>";
    }
    endforeach;
} else {
    echo "ID data yang akan dihapus tidak ditemukan.";
}
?>

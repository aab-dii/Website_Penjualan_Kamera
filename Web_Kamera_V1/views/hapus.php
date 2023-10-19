<?php
@include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn2, "DELETE FROM barang_form WHERE id = $id");

    if ($result){
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'dashboard.php'
        </script>";
    }
    else{
        echo "
        <script>
            alert('Data Gagal Dihapus ! ');
            document.location.href = 'dashboard.php'
            </script>";
    }
} else {
    echo "ID data yang akan dihapus tidak ditemukan.";
}
?>

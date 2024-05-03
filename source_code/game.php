<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Game.controller.php");

$gameController = new GameController();
$error = "";

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_game = $_POST['nama_game'];
    // Memeriksa apakah nama game tidak kosong
    if(empty($_POST['nama_game'])) {
        $error = "Nama game tidak boleh kosong!";
        echo "<script>alert('$error');history.go(-1);</script>"; // Menampilkan pesan kesalahan sebagai popup alert dan kembali ke halaman sebelumnya
    } else {
        if(!empty($_POST['id'])) {
            $gameController->edit($_POST);
        } else {
            $gameController->add($_POST);
        }
    }
} elseif(isset($_GET['action'])) {
    if($_GET['action'] == 'delete' && !empty($_GET['id'])) {
        $id_game = $_GET['id'];
        // Hapus anggota yang memiliki game dengan id_game sebagai foreign key
        $gameController->delete($id_game);
    } elseif($_GET['action'] == 'edit' && !empty($_GET['id'])) {
        $id_game = $_GET['id'];
        header("Location: game.php?id=$id_game");
        exit();
        
    }

} else {
    $gameController->index();
}

?>

<?php
class Game extends DB
{   
    
    function getGames()
    {
        $query = "SELECT * FROM game";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama_game = $data['nama_game'];

        $query = "INSERT INTO game (nama_game) VALUES ('$nama_game')";
        return $this->execute($query);
    }

    function edit($data)
    {
        $id_game = $data['id']; // Menggunakan kunci 'id' karena itulah yang Anda gunakan dalam form
        $nama_game = $data['nama_game'];
    
        $query = "UPDATE game SET nama_game='$nama_game' WHERE id_game='$id_game'";
        return $this->execute($query);
    }
    
    function delete($id_game)
    {
        // Hapus anggota yang memiliki game dengan id_game sebagai foreign key
        $this->deleteMembersByGameId($id_game);

        // Hapus game setelah menghapus anggota yang terkait
        $query = "DELETE FROM game WHERE id_game='$id_game'";
        return $this->execute($query);
    }

    function deleteMembersByGameId($id_game)
    {
        // Hapus anggota yang memiliki game dengan id_game sebagai foreign key
        $query = "DELETE FROM members WHERE game='$id_game'";
        return $this->execute($query);
    }

}

?>
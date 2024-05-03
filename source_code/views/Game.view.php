<?php
class GameView {
    public function render($games, $id = ''){ 
        $no = 1;
        $dataGames = "";
        foreach($games as $game){
            $dataGames .= "<tr>
                <td>{$no}</td>
                <td>{$game['nama_game']}</td>
                <td>
                    <a class='btn btn-success' href='game.php?action=edit&id={$game['id_game']}'>Edit</a>
                    <a class='btn btn-danger' href='game.php?action=delete&id={$game['id_game']}'>Delete</a>
                </td>
            </tr>";
            $no++;
        }
        
        
        // Form add/update
        // GameView
        $form = "<h2>Add/Edit Game</h2>";

        // Tampilkan pesan error jika nama game kosong
        if (isset($_POST['submit'])) {
            if (empty($_POST['nama_game'])) {
                $form .= "<div class='alert alert-danger' role='alert'>Nama game tidak boleh kosong!</div>";
            }
        }

        $form .= "<form method='post'>";
        $form .= "<input type='hidden' name='id' value='". (isset($_GET['id']) ? $_GET['id'] : '') ."'>";
        $form .= "<div class='form-group'>";
        $form .= "<label for='nama_game'>Nama Game:</label>";
        $form .= "<input type='text' class='form-control' id='nama_game' name='nama_game' value='". (isset($_GET['id']) ? $games[array_search($_GET['id'], array_column($games, 'id_game'))]['nama_game'] : '') ."'>";
        $form .= "</div>";
        $form .= "<button type='submit' class='btn btn-primary' name='submit'>Submit</button>";
        $form .= "</form>";

        $tpl = new Template("templates/game.html");
        $tpl->replace("DATA_GAMES", $dataGames);
        $tpl->replace("FORM", $form);
        $tpl->write();
    }
}
?>

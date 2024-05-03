<?php
class MemberEdit {
    public function render($member, $games){
        $options = "";
        foreach($games as $game){
            $selected = ($game['id_game'] == $member['game']) ? 'selected' : '';
            $options .= "<option value='{$game['id_game']}' $selected>{$game['nama_game']}</option>";
        }
        $form = "<div class='col-lg-6 m-auto'>
            <form method='post' action='index.php?action=editMem'>
                <input type='hidden' name='action' value='edit'>
                <input type='hidden' name='id' value='{$member['id']}' class='form-control'> <br>
                        <br><br>
                        <div class='card'>
                            <div class='card-header bg-warning'>
                                <h1 class='text-white text-center'>Update Member</h1>
                            </div><br>
                            <label>NAME:</label>
                            <input type='text' name='name' class='form-control' value='{$member['name']}'> <br>
                            <label>EMAIL:</label>
                            <input type='text' name='email' class='form-control' value='{$member['email']}'> <br>
                            <label>PHONE:</label>
                            <input type='text' name='phone' class='form-control' value='{$member['phone']}'> <br>
                            <label>GAME:</label>
                            <select name='game' class='form-control'>
                                {$options}
                            </select><br>
                            <button class='btn btn-success' type='submit' name='submit'>Submit</button><br>
                            <a class='btn btn-info' href='index.php'>Cancel</a><br>
                        </div>
                    </form>
                </div>";
        // echo $form;
        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $form);
        $tpl->write();
    }
}
?>

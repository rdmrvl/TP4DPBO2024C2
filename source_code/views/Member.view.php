<?php
class MemberView {
    public function render($data){
        $no = 1;
        $dataMember = "";
        $dataMember .= "
    <a type='button' class='btn btn-primary' href='index.php?action=add'>Add New</a>
";
foreach($data['member'] as $val){
    $id = $val['id'];
    $name = $val['name'];
    $email = $val['email'];
    $phone = $val['phone'];
    $game = $data['game'][$val['game']]; // Mengambil nama game berdasarkan id game
    $dataMember .= "<tr>
        <td>{$no}</td>
        <td>{$name}</td>
        <td>{$email}</td>
        <td>{$phone}</td>
        <td>{$game}</td>
        <td>
            <a href='index.php?action=edit&id={$id}' class='btn btn-warning'>Edit</a>
            <a href='index.php?action=delete&id={$id}' class='btn btn-danger'>Hapus</a>
        </td>
    </tr>";
    $no++;
}

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write();
    }
}
?>

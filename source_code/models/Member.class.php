<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE id='$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $game = $data['game'];

        $query = "INSERT INTO members (name, email, phone, game) VALUES ('$name', '$email', '$phone', '$game')";
        return $this->execute($query);
    }

    function edit($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $game = $data['game'];

        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', game='$game' WHERE id='$id'";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM members WHERE id='$id'";
        return $this->execute($query);
    }
}

?>
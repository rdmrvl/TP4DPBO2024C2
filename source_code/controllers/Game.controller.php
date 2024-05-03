<?php
include_once("connection.php");
include_once("models/Game.class.php");
include_once("views/Game.view.php");

class GameController {
  private $game;
  private $db;

  function __construct(){
    $this->game = new Game(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->db = new DB(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
}


  public function index() {
    $this->game->open();
    $this->game->getgames();
    $data = array();
    while($row = $this->game->getResult()){
      array_push($data, $row);
    }

    $this->game->close();

    $view = new gameView();
    $view->render($data);
  }

  
  function add($data){
    $this->game->open();
    $this->game->add($data);
    $this->game->close();
    
    header("location:game.php");
  }

  function getGameById($id){
    $query = "SELECT * FROM game WHERE id_game='$id'";
    $result = mysqli_query($this->db->getConnection(), $query);

    if (!$result) {
        die("Error: " . mysqli_error($this->db->getConnection()));
    }

    return $result;
}




  function edit($data){
    $this->game->open();
    $this->game->edit($data);
    $this->game->close();
    
    header("location:game.php");
  }


  function delete($id){
    $this->game->open();
    $this->game->delete($id);
    $this->game->close();
    
    header("location:game.php");
  }


}
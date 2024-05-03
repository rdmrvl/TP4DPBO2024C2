<?php
include_once("connection.php");
include_once("models/Game.class.php");
include_once("models/Member.class.php");
include_once("views/Member.view.php");

class MemberController {
  private $member;
  private $game;

  function __construct(){
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->game = new Game(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->member->open();
    $this->game->open();
    $this->member->getmember();
    $this->game->getgames();
    
    $data = array(
      'member' => array(),
      'game' => array()
    );
    while($row = $this->member->getResult()){
      array_push($data['member'], $row);
    }
    while($row = $this->game->getResult()){
    $data['game'][$row['id_game']] = $row['nama_game'];
}

    $this->member->close();
    $this->game->close();

    $view = new memberView();
    $view->render($data);
}


  
  function addForm(){
    $this->game->open();
    $games = $this->game->getgames();
    $this->game->close();
    
    $view = new MemberAdd();
    $view->render($games);
}

function editForm($id){
  $this->member->open();
  $member = $this->member->getMemberById($id);
  $this->member->close();
  
  $this->game->open();
  $games = $this->game->getgames();
  $this->game->close();
  
  $view = new MemberEdit();
  $view->render(mysqli_fetch_assoc($member), $games); // Fetch as an associative array

}

function edit($id){
  $this->member->open();
  $this->member->edit($id);
  $this->member->close();

  header("location:index.php");
}

function add($data){
  $this->member->open();
  $this->member->add($data);
  $this->member->close();

  header("location:index.php");
}

  function delete($id){
    $this->member->open();
    $this->member->delete($id);
    $this->member->close();

    header("location:index.php");
  }

}
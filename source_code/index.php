<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");
include_once("views/MemberAdd.view.php");
include_once("views/MemberEdit.view.php");

$memberController = new MemberController();

if(isset($_GET['action'])){
    if($_GET['action'] == 'add'){
        $memberController->addForm();
    } elseif($_GET['action'] == 'edit'){
        $id = $_GET['id'];
        $memberController->editForm($id);
    } elseif($_GET['action'] == 'delete'){
        $id = $_GET['id'];
        $memberController->delete($id);
    } elseif($_GET['action'] == 'addMem'){
        $memberController->add($_POST);
    } elseif($_GET['action'] == 'editMem'){
        $memberController->edit($_POST);
    }
} elseif(isset($_POST['submit']) ) {
    if(isset($_POST['id'])){
        $memberController->edit($_POST);
    }else{
        $memberController->add($_POST);
    }
} else {
    $memberController->index();
}

?>

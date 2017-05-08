<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

  public function index(){
    $usuarioLogado = autoriza();
    $this->load->model("user_model");
    $users = $this->user_model->buscaUsers();
    $dados = array("users" => $users);
  


    $this->load->template("home/home.php", $dados);
  }



}

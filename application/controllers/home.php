<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

  public function index(){
    $autoriza = autoriza();
    $this->load->model("user_model");
    $user =  $this->user_model->busca($autoriza["idUser"]);
    if ($user["inativo"]==1 | $user["hierarquia_idHierarquia"]==8) {

      $this->session->unset_userdata("usuario_logado");
      $this->session->set_flashdata("danger", "Você não possui acesso ao sistema");
      redirect("/");
    }
    $users = $this->user_model->buscaUsers();
    $dados = array("users" => $users);
    $this->load->template("home/home.php", $dados);
  }



}

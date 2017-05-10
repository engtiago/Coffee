<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {


  public function novoUser(){
    nivelAcesso(6,"home");
    nivelAcesso(7,"home");
    nivelAcesso(8,"home");

    $autoriza = autoriza();
    $this->load->model("user_model");
    $hierarquia = $this->user_model->buscaHierarquia();
    $dados = array("hierarquia" => $hierarquia);
    $this->load->template("user/novoUser.php", $dados);
  }

    public function novo() {

        $autoriza = autoriza();
        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha")),
            "hierarquia_idhierarquia" => $this->input->post("hierarquia")
        );

        $this->load->model("user_model");
        $this->user_model->salva($usuario);
        $this->session->set_flashdata("success", "Usuario cadastrado com sucesso");
        redirect("/home");
    }
}

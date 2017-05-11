<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
  public function index(){
    $autoriza = autoriza();
    $this->load->model("User_model");
    $user = $this->User_model->buscaUsers();
    $dados = array(
      "user" => $user,
    );
    $this->load->template("user/user.php", $dados);
  }

  public function novouser(){
    $autoriza = autoriza();
    nivelAcesso(6,"Home");
    nivelAcesso(7,"Home");
    nivelAcesso(8,"Home");

    $autoriza = autoriza();
    $this->load->model("User_model");
    $hierarquia = $this->User_model->buscaHierarquia();
    $dados = array("hierarquia" => $hierarquia);
    $this->load->template("user/novouser.php", $dados);
  }

  public function novo() {
    $autoriza = autoriza();
    $this->form_validation->set_rules("nome", "nome", "required");
    $this->form_validation->set_rules("email", "email", "required");
    $this->form_validation->set_rules("senha", "senha", "required");
    $this->form_validation->set_rules("confirmar_Senha", "confirmar_Senha", "required|matches[senha]");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger', </p>");
    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $usuario = array(
        "nome" => $this->input->post("nome"),
        "email" => $this->input->post("email"),
        "senha" => md5($this->input->post("senha")),
        "hierarquia_idhierarquia" => $this->input->post("hierarquia")
      );

      $this->load->model("User_model");
      $this->User_model->salva($usuario);
      $this->session->set_flashdata("success", "Usuario cadastrado com sucesso");
      redirect("/home");
    }else {
      $this->session->set_flashdata("danger", "Erro ao cadastrar usuario");
      $this->load->model("User_model");
      $hierarquia = $this->User_model->buscaHierarquia();
      $dados = array("hierarquia" => $hierarquia);
      $this->load->template("user/novouser.php", $dados);
    }

  }

  public function ver($id) {
    $autoriza = autoriza();
    nivelAcesso(6,"user");
    nivelAcesso(7,"user");
    nivelAcesso(8,"user");

    $this->load->model("User_model");
    $hierarquia = $this->User_model->buscaHierarquia();
    $user = $this->User_model->busca($id);
    $dados = array(
      "hierarquia" => $hierarquia,
      "user" => $user,
    );
    $this->load->template("user/edituser.php", $dados);
  }

  public function edituser(){
    $autoriza = autoriza();
    $data = array(
      'nome' => $this->input->post("nome"),
      'email' => $this->input->post("email"),
      'hierarquia_idHierarquia' =>  $this->input->post("hierarquia"),
      'inativo' => $this->input->post("ativo")
    );
    $this->load->model("User_model");
    $this->User_model->edituser($this->input->post("id"),$data);
    $this->session->set_flashdata("success", "Usuario modificado com sucesso");
    redirect("/user/ver/".$this->input->post('id')."");
  }

}

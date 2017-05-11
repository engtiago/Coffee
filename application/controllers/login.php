
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index(){
    if($this->session->userdata("usuario_logado")){
      //$this->load->template("home/home.php");
      redirect("/home");
    }else{
      $this->load->template("login/index.php");
    }
  }

  public function autenticar() {
    $this->form_validation->set_rules("email", "email", "required");
    $this->form_validation->set_rules("senha", "senha", "required");


    $this->load->model("user_model");
    $email = $this->input->post("email");
    $senha = md5($this->input->post("senha"));
    $usuario = $this->user_model->buscaPorEmailESenha($email, $senha);
    if($usuario) {
      $this->session->set_userdata("usuario_logado" , $usuario);
      $this->session->set_flashdata("success" ,"Logado com sucesso");
    } else {
      $this->session->set_flashdata("danger" ,"Usuário ou senha inválida");
    }
    redirect("/");
  }


  public function logout(){
    $this->session->unset_userdata("usuario_logado");
    $this->session->set_flashdata("success" ,"Deslogado com sucesso");
    redirect("/");
  }

}

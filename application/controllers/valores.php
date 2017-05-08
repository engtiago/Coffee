<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class valores extends CI_Controller {




  public function verDepositos(){
    $user = $this->session->userdata("usuario_logado");
    $this->load->model("valores_model");
    $depositos =  $this->valores_model->verDepositos($user['idUser']);
    $dados = array("depositos" => $depositos);
    $this->load->template("valores/verDepositos.php",$dados);
  }







  public function despesa(){
    $usuarioLogado = autoriza();
    $this->load->model("user_model");
    $users = $this->user_model->buscaUsers();
    $dados = array("users" => $users);
    $this->load->template("valores/despesas.php",$dados);
  }






  public function novaDespesa(){

    $this->form_validation->set_rules("data", "data", "required|regex_match[/^\d{2}\/\d{2}\/\d{4}/]");
    $this->form_validation->set_rules("motivo", "motivo", "required|max_length[255]");
    $this->form_validation->set_rules("valor", "valor", "required");
    $this->form_validation->set_rules("usuario", "usuario", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger', </p>");
    $sucesso = $this->form_validation->run();
    if ($sucesso) {

      $config = array(
        "upload_path" => "upload/despesas",
        "allowed_types" => "jpg|jpeg|png|bmp|gif",
        "max_size" => "0",
        "file_name" => url_title($this->input->post('img'))
      );
      $this->load->library('upload',$config);

      $this->load->model("valores_model");
      if($this->upload->do_upload('img')){

        $despesa = array(
          "data" => $this->input->post("data"),
          "motivo" => $this->input->post("motivo"),
          "valor" => $this->input->post("valor"),
          "user_idUser" => $this->input->post("usuario"),
          "img" => $this->upload->file_name
        );
        $this->valores_model->despesa($despesa);
        $this->session->set_flashdata("success", "Despesa cadastrada com sucesso");

      }else{

        $despesa = array(
          "data" => $this->input->post("data"),
          "motivo" => $this->input->post("motivo"),
          "valor" => $this->input->post("valor"),
          "user_idUser" => $this->input->post("usuario"),
          "img" => "null.png"
        );
        $this->valores_model->despesa($despesa);
        $this->session->set_flashdata("success", "Despesa cadastrada com sucesso - Sem comprovante");
      }
      redirect("/home");

    }else{
      $this->session->set_flashdata("danger", "Erro no cadastro da despesa");
      redirect("/home");;
    }
  }//fim deposito





  public function deposito(){
    $this->form_validation->set_rules("mesPagamento", "mesPagamento", "required|regex_match[/^\d{2}\/\d{4}/]");
    $this->form_validation->set_rules("data", "data", "required|regex_match[/^\d{2}\/\d{2}\/\d{4}/]");
    $this->form_validation->set_rules("usuario", "usuario", "required");
    $this->form_validation->set_rules("valor", "valor", "required");
    $sucesso = $this->form_validation->run();
    if ($sucesso) {

      $deposito = array(
        "mesPagamento" => $this->input->post("mesPagamento"),
        "data" => $this->input->post("data"),
        "user_idUser" => $this->input->post("usuario"),
        "valor" => $this->input->post("valor")

      );
      $this->load->model("valores_model");
      $this->valores_model->deposita($deposito);
      $this->session->set_flashdata("success", "Deposito realizado com sucesso");
    }else{
      $this->session->set_flashdata("danger", "Erro no Deposito");
    }
    redirect("/home");
  }//fim deposito



}

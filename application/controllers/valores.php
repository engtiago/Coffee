<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Valores extends CI_Controller {




  public function verdepositos(){
    $user = autoriza();
    $this->load->model("Valores_model");
    $anoPesquisar =  $this->input->post("anoPesquisar");
    $balanco =  $this->Valores_model->consulaBalancoAno($anoPesquisar);

    $depositos =  $this->Valores_model->verdepositos($user['idUser']);

    $this->load->library('calendar');
    $dados = array(
      "balanco" => $balanco,
      "depositos" => $depositos,
      "anoPesquisar" =>$anoPesquisar
    );
    $this->load->template("Valores/verdepositos.php",$dados);


  }


  public function despesa(){
    $autoriza = autoriza();
    nivelAcesso(2,"Home");
    nivelAcesso(3,"Home");
    nivelAcesso(4,"Home");
    nivelAcesso(5,"Home");
    nivelAcesso(6,"Home");
    nivelAcesso(7,"Home");
    nivelAcesso(8,"Home");
    $this->load->model("User_model");
    $users = $this->User_model->buscaUsers();
    $dados = array("users" => $users);
    $this->load->template("Valores/despesas.php",$dados);
  }




  public function novaDespesa(){
    $autoriza = autoriza();
    nivelAcesso(2,"Home");
    nivelAcesso(3,"Home");
    nivelAcesso(4,"Home");
    nivelAcesso(5,"Home");
    nivelAcesso(6,"Home");
    nivelAcesso(7,"Home");
    nivelAcesso(8,"Home");
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

      $this->load->model("Valores_model");
      if($this->upload->do_upload('img')){

        $despesa = array(
          "data" => $this->input->post("data"),
          "motivo" => $this->input->post("motivo"),
          "valor" => $this->input->post("valor"),
          "user_idUser" => $this->input->post("usuario"),
          "img" => $this->upload->file_name
        );
        $this->Valores_model->despesa($despesa);
        $this->session->set_flashdata("success", "Despesa cadastrada com sucesso");

      }else{

        $despesa = array(
          "data" => $this->input->post("data"),
          "motivo" => $this->input->post("motivo"),
          "valor" => $this->input->post("valor"),
          "user_idUser" => $this->input->post("usuario"),
          "img" => "null.png"
        );
        $this->Valores_model->despesa($despesa);
        $this->session->set_flashdata("success", "Despesa cadastrada com sucesso - Sem comprovante");
      }
      redirect("/Home");

    }else{
      $this->session->set_flashdata("danger", "Erro no cadastro da despesa");
      redirect("/Home");;
    }
  }//fim deposito





  public function deposito(){
    $autoriza = autoriza();
    nivelAcesso(4,"Home");
    nivelAcesso(5,"Home");
    nivelAcesso(6,"Home");
    nivelAcesso(7,"Home");
    nivelAcesso(8,"Home");

    $this->form_validation->set_rules("mesPagamento", "mesPagamento", "required|regex_match[/^\d{2}\/\d{4}/]");
    $this->form_validation->set_rules("data", "data", "required|regex_match[/^\d{2}\/\d{2}\/\d{4}/]");
    $this->form_validation->set_rules("usuario", "usuario", "required");
    $this->form_validation->set_rules("valor", "valor", "required|numeric");
    $sucesso = $this->form_validation->run();
    if ($sucesso) {

      $deposito = array(
        "mesPagamento" => $this->input->post("mesPagamento"),
        "data" => $this->input->post("data"),
        "user_idUser" => $this->input->post("usuario"),
        "valor" => $this->input->post("valor")

      );
      $this->load->model("Valores_model");
      $this->Valores_model->deposita($deposito);
      $this->session->set_flashdata("success", "Deposito realizado com sucesso");
    }else{
      $this->session->set_flashdata("danger", "Erro no Deposito");
    }
    redirect("/Home");
  }//fim deposito



}

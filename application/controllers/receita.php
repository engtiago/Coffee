<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$mesAno ="";
class receita extends CI_Controller {


  public function index(){

      $mesPesquisar =  $this->input->post("mesPesquisar");
      $user = $this->session->userdata("usuario_logado");
      $this->load->model("receita_model");
      $depositos =  $this->receita_model->verTodosDepositos($mesPesquisar);
      $despesas =  $this->receita_model->verTodasDespesas($mesPesquisar);


    $dados = array(
      "mesPesquisar"=> $mesPesquisar,
      "depositos" => $depositos,
      "despesas" => $despesas
    );
    $this->load->template("receita/receita.php",$dados);

  }


}

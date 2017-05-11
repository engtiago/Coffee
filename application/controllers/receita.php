<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$mesAno ="";
class Receita extends CI_Controller {


  public function index(){
      $autoriza = autoriza();
      $mesPesquisar =  $this->input->post("mesPesquisar");
    //$user = $this->session->userdata("usuario_logado");
      $this->load->model("Receita_model");
      $depositos =  $this->Receita_model->verTodosDepositos($mesPesquisar);
      $despesas =  $this->Receita_model->verTodasDespesas($mesPesquisar);


    $dados = array(
      "mesPesquisar"=> $mesPesquisar,
      "depositos" => $depositos,
      "despesas" => $despesas
    );
    $this->load->template("Receita/Receita.php",$dados);

  }


}

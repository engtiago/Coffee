<?php
class user_model extends CI_Model {
  public function salva($usuario) {
    $this->db->insert("user", $usuario);
  }

  public function buscaPorEmailESenha($email, $senha) {
    $this->db->where("email", $email);
    $this->db->where("senha", $senha);
    $usuario = $this->db->get("user")->row_array();
    return $usuario;
  }

  public function busca($id) {
    return $this->db->get_where("user", array("idUser" => $id))->row_array();
  }

  public function buscaHierarquia(){
    return $this->db->get("hierarquia")->result_array();
  }

  public function buscaUsers(){
    return $this->db->get("user")->result_array();
  }

  public function editUser($id,$data){
    $this->db->where('idUser', $id);
    $this->db->update('user', $data);
  }

}

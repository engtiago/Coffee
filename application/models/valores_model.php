<?php
class valores_model extends CI_Model {


  public function deposita($deposito) {
    $this->db->insert("pagamentos", $deposito);
  }

  public function despesa($despesa) {
    $this->db->insert("despesas", $despesa);
  }

  public function verDepositos($userId){
    $this->db->select('mesPagamento,data,valor');
    $this->db->from('pagamentos');
    $this->db->where('user_idUser', $userId);
    return $this->db->get()->result_array();
  }

}

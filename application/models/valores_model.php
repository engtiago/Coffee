<?php
class Valores_model extends CI_Model {


  public function deposita($deposito) {
    $this->db->insert("pagamentos", $deposito);
  }

  public function despesa($despesa) {
    $this->db->insert("despesas", $despesa);
  }

  public function verdepositos($userId){
    $this->db->select('mesPagamento,data,valor');
    $this->db->from('pagamentos');
    $this->db->where('user_idUser', $userId);
    return $this->db->get()->result_array();
  }



  public function consulaBalancoAno($ano) {
// ".$i."/".$ano."

    for ($i=1; $i <13 ; $i++) {
      $query = $this->db->query("SELECT sum(valor) 'Despesas', (SELECT sum(valor) FROM pagamentos WHERE SUBSTRING(data,4) = SUBSTRING('0".$i."/".$ano."',-7)) 'Pagamentos' FROM despesas   WHERE  SUBSTRING(data,4) = SUBSTRING('0".$i."/".$ano."',-7);");
      $balanco =  $query->row_array();
      $meses [ $i ] =  $balanco;
    }
    return $meses;
  }

}

// echo $ano;
// $teste2 ="SELECT sum(valor) 'Despesas', (SELECT sum(valor) FROM pagamentos WHERE SUBSTRING(data,7)='2017') 'Pagamentos' FROM despesas   WHERE SUBSTRING(data,7)='2017'";
// $query = $this->db->query($teste2);
// $teste  = $this->$query->get()->result_array();
// print_r ($teste2);

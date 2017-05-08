<?php
class receita_model extends CI_Model {
  public function verTodosDepositos($mesAno){
    $this->db->select('p.mesPagamento,p.data,p.valor, u.nome');
    $this->db->from('pagamentos p');
    $this->db->join('user u', 'u.idUser =p.user_idUser');
    $this->db->where('mesPagamento', $mesAno);
    return $this->db->get()->result_array();
  }


  public function verTodasDespesas($mesAno){


    $this->db->select('d.motivo,d.data,d.valor, u.nome, d.img');
    $this->db->from('despesas d');
    $this->db->join('user u', 'u.idUser =d.user_idUser');
    $this->db->where('SUBSTRING(d.data,4)', $mesAno);
    // $this->db->like('data', $mesAno, 'after');
    //$this->db->having('data',  $mesAno);
    //  $this->db->like();
    return $this->db->get()->result_array();

  }

}


// SELECT `d`.`motivo`,`d`.`data`, `d`.`valor`, `u`.`nome`, `d`.`img`
// FROM `despesas` `d`
// JOIN `user` `u`
// ON `u`.`idUser` =`d`.`user_idUser`
// Where SUBSTRING(`d`.`data`,4) = '05/2017'

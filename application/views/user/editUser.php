

<div style="padding-bottom: 168px;" class="container">
  <h1>Editar Usuario</h1>



  <?php
  echo form_open("user/editUser");

  echo form_hidden("id", $user["idUser"]);

  echo form_label("Nome", "nome");
  echo form_input(array(
    "name" => "nome",
    "id" => "nome",
    "class" => "form-control",
    "maxlength" => "255",
    "value"=> $user['nome']
  ));


  echo form_label("Email", "email");
  echo form_input(array(
    "name" => "email",
    "id" => "email",
    "class" => "form-control",
    "maxlength" => "255",
    "value"=>$user['email']
  ));




  //aray de opções
  foreach($hierarquia as $hierarquia){

    $options [ $hierarquia["idHierarquia"] ] = $hierarquia["nome"];
    //print_r($option);
  }
  echo form_label("Hierarquia", "hierarquia");
  echo form_dropdown('hierarquia', $options, $user['hierarquia_idHierarquia'],array(
    "class" => "form-control",
  ));

if($user['inativo']!=0){
  $ativo=true;
}else {
  $ativo=false;
}

  echo form_label("Desativar usuario ", "email");
  echo '<input type="hidden" name="ativo" value="0" />';
  echo "<div class='checkbox'> <label>";
  echo form_checkbox(array(
    "name" => "ativo",
    "id" => "ativo",
    "class" => "",
  ),1,$ativo);
  echo "Marcar para desativar usuario";
  echo "</label></div>";


  echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Editar",
    "type" => "submit",
    "style"=> "width: 170px;
    margin-top: 15px;
    float: right;"
  ));


  echo form_close();
  ?>


</div>

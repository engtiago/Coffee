

<div style="padding-bottom: 168px;" class="container">
  <h1>Novo Usuario</h1>



  <?php
  echo form_open("user/novo");

  echo form_label("Nome", "nome");
  echo form_input(array(
    "name" => "nome",
    "id" => "nome",
    "class" => "form-control",
    "maxlength" => "255"
  ));
  echo form_error("nome");

  echo form_label("Email", "email");
  echo form_input(array(
    "name" => "email",
    "id" => "email",
    "class" => "form-control",
    "maxlength" => "255"
  ));
  echo form_error("email");

  echo form_label("Senha", "senha");
  echo form_password(array(
    "name" => "senha",
    "id" => "senha",
    "class" => "form-control",
    "maxlength" => "255"
  ));
    echo form_error("senha");

  echo form_label("Confirmar Senha", "confirmar_Senha");
  echo form_password(array(
    "name" => "confirmar_Senha",
    "id" => "confiarmar_Senha",
    "class" => "form-control",
    "maxlength" => "255"
  ));
    echo form_error("confirmar_Senha");


  //aray de opções
  foreach($hierarquia as $hierarquia){

    $options [ $hierarquia["idHierarquia"] ] = $hierarquia["nome"];
    //print_r($option);
  }
  echo form_label("Hierarquia", "hierarquia");
  echo form_dropdown('hierarquia', $options, "",array(
    "class" => "form-control"
  ));



  echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Cadastrar",
    "type" => "submit",
    "style"=> "width: 170px;
    margin-top: 15px;
    float: right;"
  ));


  echo form_close();
  ?>


</div>

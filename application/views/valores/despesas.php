<div class="container">
  <?php
  echo form_open_multipart("Valores/novaDespesa",array(

  ));
  echo "<div class='form-group'>";


  echo form_label("Dia Despesa", "data");
  echo form_input(array(
    "required"=>"true",
    "placeholder"=>"dd/mm/aaaa",
    "type"=> "text",
    "name" => "data",
    "id" => "data",
    "class" => "form-control dataPgm"
  ));

  echo form_label("Motivo:", "motivo");
  echo form_input(array(
    "required"=>"true",
    "placeholder"=>"Motivo da despesa",
    "type"=> "text",
    "name" => "motivo",
    "id" => "motivo",
    "class" => "form-control"
  ));


  echo form_label("Valor", "valor");
  echo form_input(array(
    "pattern"=>  "(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)",
    "required"=>"true",
    "placeholder"=>"R$ 0,00",
    "type"=>"text" ,
    "name" => "valor",
    "id" => "valor",
    "class" => "form-control",
  ));



  foreach($users as $users){
    $options [ $users["idUser"] ] = $users["nome"];
    //print_r($option);
  }
  echo form_label("Despesa do:", "usuario");
  echo form_dropdown('usuario', $options, "",array(
    "id"=>"usuario",
    "required"=>"true",
    "class" => "form-control"
  ));




  echo form_label("Foto do deposito", "img");
  echo form_upload("img",array(
    "id" => "img",
    "type=" =>"file"
  ));

  echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Realizar deposito",
    "type" => "submit",
    "value"=> "upload",
    "style"=> "width: 170px;
    margin-top: 15px;
    float: right;"
  ));
  echo "</div>";
  echo form_close();
  ?>
</div>

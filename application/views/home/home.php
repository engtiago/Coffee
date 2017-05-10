
<div  class="container">
  <h1>HOME</h1>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
    <i class='material-icons' style='font-size:19;'>attach_money</i>Deposito
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Novo Pagamento</h4>
        </div>
        <div class="modal-body">
          <?php
          echo form_open("valores/deposito",array());
          echo "<div class='form-group'>";


          echo form_label("Mes Pagamento", "mes");
          echo form_input(array(
          "required"=>"true",
            "placeholder"=>"mm/aaaa",
            "type"=> "text",
            "name" => "mesPagamento",
            "id" => "mes",
            "class" => "form-control dateMes"
          ));

          echo form_label("Dia pagamento", "data");
          echo form_input(array(
              "required"=>"true",
            "placeholder"=>"dd/mm/aaaa",
            "type"=> "text",
            "name" => "data",
            "id" => "data",
            "class" => "form-control dataPgm "
          ));



          echo form_label("Valor", "valor");
          echo form_input(array(
              "pattern"=>  "(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)",
              "required"=>"true",
              "value"=>"0.00",
              "type"=>"text" ,
              "name" => "valor",
              "id" => "valor",
              "class" => "form-control",
              "readonly"=>"readonly"
            ));


          foreach($users as $users){
            $options [ $users["idUser"] ] = $users["nome"];
          //  $hieraquiaUsers [ $users["idUser"] ] = $users["hierarquia_idHierarquia"];
            echo "<div hidden class='hierarquia' id=".$users['idUser'].">".$users['hierarquia_idHierarquia']."</div>";
          }
          echo form_label("Pagamento do:", "usuario");
          echo form_dropdown('usuario', $options, "",array(
              "required"=>"true",
              "class" => "form-control ususarioDD",


          ));



          echo form_button(array(
            "style"=>"margin-top: 10px;",
            "class" => "btn btn-primary",
            "content" => "<i class='material-icons' style='font-size:19;'>attach_money</i> Realizar deposito",
            "type" => "submit",
          ));
          echo "</div>";
          echo form_close();

          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <?php


  ?>




</div>

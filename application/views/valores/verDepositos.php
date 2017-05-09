
<div style="mar"  class="container">
  <?php
  echo form_open("valores/verDepositos",array());
  echo form_label("Pesquisar Ano", "ano");
  echo "<div class='form-group'>";
  echo "<div class='row'>";
  echo "  <div class='input-group'>";


  echo form_input(array(
    "required"=>"true",
    "placeholder"=>"Escolha o Ano",
    "type"=> "text",
    "name" => "anoPesquisar",
    "id" => "ano",
    "class" => "form-control dateAno"
  ));



  echo "<span class='input-group-btn'>";
  echo form_button(array(
    "class" => "btn btn-default",
    "content" => "Realizar pesquisa",
    "type" => "submit"
  ));
  echo "</span>";


  echo "</div>";//form-group
  echo "</div>";//row
  echo "</div>";//input-group
  echo form_close();
  ?>
  <h2>Calendario</h2>

  <div class="container">
    <div class="row">

    <style media="screen">
    table{
      .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th,
      .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td
      {

      }

      </style>
      <?php for ($i=1; $i <13 ; $i++) :?>

        <div  class="col-lg-4 col-md-4 col-sm-6">
          <div class="panel panel-default ">
            <div  class="panel-heading" >
              <?php  $mes = $balanco[$i];?>
              <p>  Pagamentos: R$<text><?=html_escape($mes["Pagamentos"]);?></text></p>
              <p>  Despesas: R$<text><?=html_escape($mes["Despesas"]);?></text></p>
              <?php $total = $mes["Pagamentos"]-$mes["Despesas"];  ?>
              <p>  Balanço: R$<text class="valorTotal"><?=html_escape($total);?></text></p>
            </div>
            <div class="panel-body ">
              <div style="align-items: center;
              justify-content: center;
              display: flex;
              height: 345px;" >
              <?=$this->calendar->generate($anoPesquisar, $i);?>
            </div>
          </div>
        </div>
      </div>
    <?php endfor ?>



  </div>




<h2>Meus depositos</h2>
<div style="margin-bottom: 150px;" class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Mes Referente ao pagamento</th>
          <th>Data</th>
          <th>Valor</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach($depositos as $depositos) : ?>

          <tr>
            <td><?= html_escape($depositos["mesPagamento"])?></td>
            <td><?= html_escape($depositos["data"])?> </td>
            <td><?= html_escape($depositos["valor"])?></td>

          </tr>
        <?php endforeach ?>
      </table>
    </div>
  </div>


</div>

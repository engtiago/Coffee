

<div  class="container">

  <h1>Receita</h1>
  <div class="row">

    <div class="col-md-4 col-lg-4">
      <div class="panel panel-success">
        <div class="panel-heading">Valor Total Pagamentos</div>
        <div id="valorDepositoResultado" class="panel-body">
          R$ 0.00
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-4">
      <div class="panel panel-danger">
        <div class="panel-heading">Valor Total Despesas</div>
        <div id="valorDespesaResultado" class="panel-body">
          R$ 0.00
        </div>
      </div>
    </div>


    <div class="col-md-4 col-lg-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Balanço Mensal</div>
        <div id="balanco" class="panel-body">
          R$ 0.00
        </div>
      </div>
    </div>

  </div>


  <?php
  echo form_open("receita",array());
  echo form_label("Mes Pagamento", "mes");
  echo "<div class='form-group'>";
  echo "<div class='row'>";
  echo "  <div class='input-group'>";


  echo form_input(array(
    "required"=>"true",
    "placeholder"=>"Escolha o mes = mm/aaaa",
    "type"=> "text",
    "name" => "mesPesquisar",
    "id" => "mes",
    "class" => "form-control dateMes"
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

  <h1>Todos os Pagamentos <?= $mesPesquisar ?></h1>
  <div class="table-responsive">
    <table  class="table table-striped">
      <thead>
        <tr>
          <th>Mes Referente ao pagamento</th>
          <th>Data</th>
          <th>Autor</th>
          <th>Valor</th>
          <!-- <th>Comprovante</th> -->

        </tr>
      </thead>
      <tbody>
        <?php $itemDeposito=0;?>
        <?php foreach($depositos as $depositos) : ?>
          <?php $itemDeposito++;?>
          <tr id="deposito">
            <td><?= html_escape($depositos["mesPagamento"])?></td>
            <td><?= html_escape($depositos["data"])?> </td>
            <td><?= html_escape($depositos["nome"])?> </td>
            <td id="valorDeposito"><?= html_escape($depositos["valor"])?></td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>


    <h1>Todas as Despesas <?= $mesPesquisar ?></h1>
    <div style="margin-bottom: 150px;" class="table-responsive">
      <table  class="table table-striped">
        <thead>
          <tr>
            <th>Motivo</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Autor</th>
            <th>Comprovante</th>

          </tr>
        </thead>
        <tbody>
          <?php $itemDespesas=0;?>
          <?php foreach($despesas as $despesas) : ?>
            <?php $itemDespesas++;?>
            <tr id="despesa">
              <td><?= html_escape($despesas["motivo"])?></td>
              <td><?= html_escape($despesas["data"])?> </td>
              <td id="valorDespesa"><?= html_escape($despesas["valor"])?></td>
              <td><?= html_escape($despesas["nome"])?></td>
              <?php $img = base_url( "upload/despesas/");?>

              <td><img style="height: 100;width: 100px; " class="media-object" src="<?=$img.$despesas["img"]?>"  alt="foto do comprovante de pagamento"></td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>

    </div>


    <script type="text/javascript">



    </script>

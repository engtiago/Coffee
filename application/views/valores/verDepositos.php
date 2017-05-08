
<div class="container">
  <h1>Meus depositos</h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Mes Referente ao pagamento</th>
          <th>Data</th>
          <th>Valor</th>
          <!-- <th>Comprovante</th> -->

        </tr>
      </thead>
      <tbody>
        <?php foreach($depositos as $depositos) : ?>

          <tr>
            <td><?= html_escape($depositos["mesPagamento"])?></td>
            <td><?= html_escape($depositos["data"])?> </td>
            <td><?= html_escape($depositos["valor"])?></td>
            <!-- <td><img style="height: 180;" class="media-object" src="../../upload/</?=$depositos["img"]?>"  alt=" foto do comprovante de pagamento"></td> -->
          </tr>
        <?php endforeach ?>
      </table>
    </div>
  </div>

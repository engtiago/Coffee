<div style="padding-bottom: 150px;" class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</td>
          <th>Email</td>
            <th>Ativo</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($user as $user) : ?>

              <tr>
                <td><?= anchor("user/ver/{$user['idUser']}", html_escape($user["nome"]))?></td>
                <td><?= html_escape($user["email"])?> </td>
                <td><?php if($user["inativo"]==0){echo "Ativo";}else{echo "Desativo";} ?></td>
              </tr>
            <?php endforeach ?>
          </table>
        </div>

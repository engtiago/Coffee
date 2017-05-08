<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Coffee<i class="material-icons"  style=" font-size: 18px;" >free_breakfast</i></a>
    </div>
    <?php if($this->session->userdata("usuario_logado")) : ?>
      <?php
      $user = $this->session->userdata("usuario_logado");

      ?>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <?= anchor('/home','Home')?>
          </li>
          <li><a href="#">Caffee</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=html_escape($user["nome"])?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>  <?= anchor('user/novouser','<i class="material-icons" style="font-size:19";">person_add</i>Novo Usuario ')?></li>
              <li>  <?= anchor('/valores/despesa','<i class="material-icons" style="font-size:19";">money_off</i>Nova despesa')?></li>
              <li>  <?= anchor('/valores/verDepositos','<i class="material-icons" style="font-size:19";">monetization_on</i>Meus Pagamentos')?></li>
              <li>  <?= anchor('/receita','<i class="material-icons" style="font-size:19";">assessment</i>Receitas')?></li>
              <li role="separator" class="divider"></li>
              <li><?= anchor('login/logout','<i class="material-icons" style="font-size:19";">power_settings_new</i>Sair')?></li>
            </ul>
          </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    <?php endif ?>
  </div><!-- /.container-fluid -->
</nav>
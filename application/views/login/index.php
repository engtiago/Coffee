
<!-- <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.css"> -->

<style type="text/css">
.painel{padding-top:20px;}
</style>

<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Faça seu login</h3>
        </div>
        <div class="panel-body">
          <?php  echo form_open("login/autenticar");?>
          <fieldset>
            <div class="form-group">

              <?php
              echo form_label("email", "email");
              echo form_input(array(
                "class" => "form-control",
                "placeholder"=>"E-mail",
                "name" => "email",
                "id" => "email",
                "type" => "email",
                "maxlength" => "255"
              ));
              ?>
            </div>

            <div class="form-group">
              <?php echo form_label("senha", "senha");
              echo form_password(array(
                "class"=>"form-control",
                "placeholder"=>"Senha",
                "name"=>"senha",
                "type"=>"password",
                "value"=>""
              ));?>
            </div>
            <?php
            echo form_button(array(
              "class"=>"btn btn-lg btn-success btn-block",
              "type"=>"submit",
              "content" => "Entrar"
            ));
            ?>

          </fieldset>
          <?php  echo form_close();?>

        </div>
      </div>
    </div>
  </div>
</div>

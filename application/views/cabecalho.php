<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url("public/bootstrap/css/bootstrap.css") ?>">
  <link rel="stylesheet" href="<?= base_url("public/datepicker/css/bootstrap-datepicker.css") ?>">

</head>
<body style="position: relative;">


<?php require_once "menu.php"; ?>

  <?php if($this->session->flashdata("success"))  : ?>
    <div class="alert alert-success alert-dismissible show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p> <?= $this->session->flashdata("success") ?></p>
    </div>
  <?php endif ?>
  <?php if($this->session->flashdata("danger"))  : ?>
    <div class="alert alert-danger alert-dismissible show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p> <?= $this->session->flashdata("danger") ?></p>
    </div>
  <?php endif ?>

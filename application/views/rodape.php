<footer style="
background-color: #777;
width: 100%;
bottom: 0px;
position: absolute;
height: 100px;"


class="footer">
<div class="container">
  <p style="color:#fff; padding-top: 10px" class="text-muted">Coffee ® - Desenvolvido por Tiago França Ferreira</p>
  <a href="http://tiagoweb.tk/" style="color:#fff; padding-top: 10px" class="text-muted"> <i style="font-size:16px;"class="material-icons">desktop_windows</i>  tiagoweb.tk</a>
  <p  style="color:#fff; padding-top: 10px" class="text-muted"> <i style="font-size:16px;"class="material-icons">smartphone</i> +55 91 98894-2400</p>
</div>
</footer>



<script src="<?= base_url("public/js/jquery.js") ?>"></script>
<script src="<?= base_url("public/js/jquery-maskmoney.js") ?>"></script>
<script src="<?= base_url("public/bootstrap/js/bootstrap.js") ?>"></script>
<script src="<?= base_url("public/datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?= base_url("public/datepicker/locales/bootstrap-datepicker.pt-BR.min.js") ?>"></script>
<script src="<?= base_url("public/receita.js") ?>"></script>



<script type="text/javascript">
$(function(){
  $("#valor").maskMoney({ thousands:'',decimal:'.'});
});

$('.dateMes').datepicker({
  format: 'mm/yyyy',
  language:'pt-BR',
  minViewMode: 'months',
  autoclose:"true",
});

$('.dataPgm').datepicker({
  format: 'dd/mm/yyyy',
  language:'pt-BR',
  autoclose:"true",
});


</script>
</body>
</html>

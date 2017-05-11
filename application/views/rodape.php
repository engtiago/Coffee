<footer style="
background-color: #777;
width: 100%;
bottom: 0px;
position: absolute;
height: 100px;"


class="footer">
<div class="container">
  <p style="color:#fff; padding-top: 10px" class="text-muted">Coffee ® - Desenvolvido por Tiago França Ferreira   <a href="https://github.com/engtiago/Coffee" style="color:#fff; padding-top: 10px" class="text-muted"><i style="font-size:16px;"class="material-icons">cloud</i>Ver Projeto</a></p>
  <a href="http://tiagoweb.tk/" style="color:#fff; padding-top: 10px" class="text-muted"> <i style="font-size:16px;"class="material-icons">desktop_windows</i>  tiagoweb.tk</a>
  <p  style="color:#fff; padding-top: 10px" class="text-muted"> <i style="font-size:16px;"class="material-icons">smartphone</i> +55 91 98894-2400</p>
</div>
</footer>



<script src="<?= base_url("public/js/jquery.js") ?>"></script>
<script src="<?= base_url("public/js/jquery-maskmoney.js") ?>"></script>
<script src="<?= base_url("public/bootstrap/js/bootstrap.js") ?>"></script>
<script src="<?= base_url("public/datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?= base_url("public/datepicker/locales/bootstrap-datepicker.pt-BR.min.js") ?>"></script>
<script src="<?= base_url("public/Receita.js") ?>"></script>



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

$('.dateAno').datepicker({
  format: 'yyyy',
  language:'pt-BR',
  minViewMode: 'years',
  autoclose:"true",
});

$('.dataPgm').datepicker({
  format: 'dd/mm/yyyy',
  language:'pt-BR',
  autoclose:"true",
});


var uSelect = $( ".ususarioDD" ).val();
$(".hierarquia").each(function () {
  var id = $(this).attr('id');
  var hierarquia = $(this).text();
  if(uSelect ==id){
    if(hierarquia ==1|hierarquia ==8){
      $('#valor').val('ISENTO');
    }else if(hierarquia ==2|hierarquia ==3){
      $('#valor').val('15.00');
    }else if(hierarquia ==4|hierarquia ==5){
      $('#valor').val('10.00');
    }else if(hierarquia ==6|hierarquia ==7){
      $('#valor').val('5.00');
    }
  }
});



$(".ususarioDD").change(function(){
  var uSelect = $(this).val();
  $(".hierarquia").each(function () {
    var id = $(this).attr('id');
    var hierarquia = $(this).text();
    if(uSelect ==id){
      if(hierarquia ==1|hierarquia ==8){
        $('#valor').val('ISENTO');
      }else if(hierarquia ==2|hierarquia ==3){
        $('#valor').val('15.00');
      }else if(hierarquia ==4|hierarquia ==5){
        $('#valor').val('10.00');
      }else if(hierarquia ==6|hierarquia ==7){
        $('#valor').val('5.00');
      }
    }
  });
});


// $(".hierarquia").each(function () {
// var id = $(this).attr('id');
// var hierarquia = $(this).text();
// });

</script>
</body>
</html>

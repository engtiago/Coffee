var valorDeposito = 0;
$("#deposito > #valorDeposito").each(function () {
  valorDeposito += Number($(this).text());
});
$( "#valorDepositoResultado" ).text( "R$ " + valorDeposito );


var valorDespesa = 0;
$("#despesa > #valorDespesa").each(function () {
  valorDespesa += Number($(this).text());
});
$( "#valorDespesaResultado" ).text( "R$ " + valorDespesa );

var balanco = Number(valorDeposito-valorDespesa);
$( "#balanco" ).text( "R$ " + balanco );




$(".valorTotal").each(function () {
    // $(this).css('background', "red");
  var valorTotal = 0;
  var target = $(this).closest('.panel');
  valorTotal = Number($(this).text());
  //console.log(valorTotal);
  if (valorTotal>0){
    target.addClass('panel-success');
  }else if(valorTotal==0) {
    console.log("=");
  }else{
    target.addClass('panel-danger');
  }

});

$(".panel").each(function () {
  var $elementoPai = $(this).parent();
// procura dentro do elemento pai o elemento [name="plano"]
  var $elemento = $elementoPai.find('table').addClass('tabela table table-bordered table-striped');

  });

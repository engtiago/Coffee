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

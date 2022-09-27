<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .buy {}

    </style>
</head>
<!--<body class="flex _center _middle" style="height:100vh;" onload="document.all.jikkou.click();">-->

<body>
    <!--<div style="display:none;">-->
    <form id="purchase_form" name="menu" action="https://c.thebase.in/cart/add/hynex" method="post">
        <!--<form id="purchase_form" name="menu" action="" method="post">-->
        <!--
    <div id="itemSelect">
        <div id="amountSelectWrap" class="purchaseElement">
				<label for="amountSelect">数量</label>
				<select name="amount" id="amountSelect" class="amountSelect">
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				    <option value="4">4</option>
				    <option value="5">5</option>
				</select>
        </div>
    </div>
-->

        <!--
<input type="hidden" name="data[via]" value="" id="via"/>
<input type="hidden" name="shopID" value="hynex" />
-->
        <input type="hidden" name="id" value="5554984" />
        <input type="hidden" name="amount" value="1" />
        <!--
<script>
$('#valiationSelect').on('change', function(){
  $('#amountSelectWrap  .amountSelect').addClass('hide').prop('disabled', true);
  $('#amountSelectWrap  .amountSelect:eq('+$(this).find(':selected').attr('data-index')+')').removeClass('hide').prop('disabled', false);
});
</script>
-->
        <!--<SCRIPT language="JavaScript">document.menu.submit();</SCRIPT>-->
        <!--<input type="submit" value="カートに入れる" class="buttonHover buy" name="jikkou">-->
        <input type="submit" value="カートに入れる" class="" name="">

    </form>
    <form id="purchase_form" name="menu" action="https://c.thebase.in/cart/add/saloncell" method="post">

    <input type="hidden" name="shopID" value="saloncell">
    <input type="hidden" name="id" value="27760957">
    <input type="hidden" name="amount" value="1" />

    <button type="submit">カートに入れる</button>

</form>

</body>

</html>


<!--
<form id="purchase_form" name="menu" action="https://c.thebase.in/cart/add/saloncell" method="post">

    <input type="hidden" name="shopID" value="saloncell">
    <input type="hidden" name="id" value="27760957">
    <input type="hidden" name="amount" value="1" />

    <button type="submit">カートに入れる</button>

</form>
-->

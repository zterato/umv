<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<title>Loja Virtual</title>
<!--area do css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsivo.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<!-- fim css -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#bt-cep").click(function(){
	var cep = document.getElementById("cep").value;
	 if(cep == ""){
		 alert("preencha os campos corretamente");
	 }else{
	
    var valor1 = 35.50;
    document.getElementById("valor_cep").value = valor1;
    $("#valor_cep").show();
		 }
  });
});
</script>
</head>
<!-- Area Menu Responsivo -->
<!-- fim menu responsivo -->
<!-- inicio banner-->
<!-- fim banner-->

<body>
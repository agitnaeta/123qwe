<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
	function validate () {
		var promo=document.getElementById('promocode').value;
		if (promo=="APA") {
			alert("MAAF")
		};
	}
	</script>
</head>
<body>
<input id="pomocode" name="promocode" >
<input type="submit" onclick="validate()">
</body>
</html>
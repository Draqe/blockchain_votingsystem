<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script>
function copyText(element) {
   document.myForm.myField.value = element.innerHTML;
}
</script>
<body>
<form name="myForm">
    <span onclick="copyText(this)" >Text1</span>, <span onclick="copyText(this)" >Text2</span>
    <br>
    <input name="myField"></input>
</form>
</body>
</html>
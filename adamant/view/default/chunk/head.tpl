<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>{$page.title}</title>
	<meta name="description" content="{$page.description|strip_tags}">
	<meta name="keywords" content="{$page.keywords|strip_tags}">
	<link rel="stylesheet" href="{combine input=$page.css output='/tmp/combined.css' age=10}">
	<script type="text/javascript" src="{combine input=$page.js output='/tmp/combined.js' age=10}">
	</script>
	
	
</head>
<body>

<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-02 00:21:31
         compiled from "adamant\view\default\chunk\head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1395852747a9d4eb607-87271000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70042f6971558a368435b9da58b2de4519bd7709' => 
    array (
      0 => 'adamant\\view\\default\\chunk\\head.tpl',
      1 => 1383366089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1395852747a9d4eb607-87271000',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52747a9d56c4a5_19544912',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52747a9d56c4a5_19544912')) {function content_52747a9d56c4a5_19544912($_smarty_tpl) {?><?php if (!is_callable('smarty_function_combine')) include 'M:\\zoonman\\www\\adamant\\adamant\\library\\smarty\\plugins\\function.combine.php';
?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</title>
	<meta name="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['description']);?>
">
	<meta name="keywords" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['keywords']);?>
">
	<?php echo smarty_function_combine(array('input'=>$_smarty_tpl->tpl_vars['page']->value['css'],'output'=>'/tmp/combined.css','age'=>10),$_smarty_tpl);?>

	<?php echo smarty_function_combine(array('input'=>$_smarty_tpl->tpl_vars['page']->value['js'],'output'=>'/tmp/combined.js','age'=>10),$_smarty_tpl);?>

</head>
<body>
<?php }} ?>

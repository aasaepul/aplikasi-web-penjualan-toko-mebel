<?php

	/* Login */
	if(@$_GET['page'] == "login") { include ("login.php");}

	/* Lupa Password */
	if(@$_GET['page'] == "lupa_pass") { include ("lupa_pass.php");}

	/* Lupa Password */
	if(@$_GET['page'] == "reset_pass") { include ("reset_pass.php");}
?>
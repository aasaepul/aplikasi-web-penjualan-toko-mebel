<?php
	echo '<h2 class="title text-center"><i class="fa fa-chevron-circle-right"></i> Lupa Password  </h2>';
	echo '<div class="row">';
	echo '<div class="col-sm-4 col-sm-offset-1">';
	echo '<div class="login-form">';
	echo '<h2> Lupa <i> Password </i> Anda ? </h2>';
	echo '<form action="?p=act_forgotpass" method="POST">';
	echo '<input type="email" name="email" placeholder="Masukkan Email" />';
	echo '<span>';
	echo '</span>';
	echo '<button type="submit" name="kirim" class="btn btn-default"><i class="fa fa-sign-in"></i> Kirim</button>';
	echo '</form>';
	echo '</div><!--/login form-->';
	echo '</div>';
	echo '</div>';
?>
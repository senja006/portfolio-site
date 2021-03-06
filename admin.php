<?php
	$title = 'Авторизация';
	$page_item = 'admin';
	require_once 'header.php';
?>
<!-- begin admin -->
<section class="admin">
	<div class="admin__in">
		<div class="admin__title"><span class="admin__title-span">Авторизуйтесь</span></div>
		<div class="admin__form-container">
			<form class="form-validation admin__form">
				<div class="container-input">
					<span class="span-label">Логин</span>
					<div class="input-wrapper">
						<input class="input input__login" type="text" name="login" placeholder="Введите логин" required />
						<div class="tooltip" data-required="введите логин"><span class="tooltip__span">введите логин</span></div>
					</div>
				</div>
				<div class="container-input">
					<span class="span-label">Пароль</span>
					<div class="input-wrapper">
						<input class="input input__pass" type="password" name="pass" placeholder="Введите пароль" required />
						<div class="tooltip" data-required="введите пароль"><span class="tooltip__span">введите пароль</span></div>
					</div>
				</div>
				<input class="button button--shadow" type="submit" value="Войти">
			</form>
		</div>
	</div>
</section>
<!-- end admin -->

</div>
<!-- end content -->
<?php 
	require_once 'footer.php';
?>
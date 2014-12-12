<?php 
	$title = 'Контакты';
	$menu_item = 'feedback';
	require_once 'header.php';
?>
<!-- begin content -->
<div class="content">
<?php 
	require_once 'sidebar.php';
?>
<!-- begin content__main -->
<div class="content__main">
	<!-- begin content__block -->
	<div class="content__block">
		<!-- begin feedback -->
		<div class="feedback">
			<div class="feedback__title"><span class="feedback__title-span">У вас интересный проект? Напишите мне</span></div>
			<div class="feedback__form">
				<form class="form-validation" method="POST" action="form-feedback.php">
					<div class="form-info">
						<div class="form-info-in form-info-success">
							<a href="#" class="form-info-close"><span class="icon"></span></a>
							<span class="form-info-title">Ура!</span>
							<span class="form-info-text">Ваше сообщение отправлено.</span>
						</div>
						<div class="form-info-in form-info-error">
							<a href="#" class="form-info-close"><span class="icon"></span></a>
							<span class="form-info-title">Ошибка!</span>
							<span class="form-info-text">Невозможно отправить сообщение.</span>
						</div>
					</div>
					<div class="feedback__form-row">
						<div class="container-input">
							<span class="span-label">Имя</span>
							<div class="input-wrapper">
								<input class="input input--name" type="text" name="name" placeholder="Как к Вам обращаться" required />
								<div class="tooltip" data-required="введите имя"><span class="tooltip__span"></span></div>
							</div>
						</div>
						<div class="container-input container-input--email">
							<span class="span-label">Email</span>
							<div class="input-wrapper">
								<input class="input input--email" type="text" name="email" placeholder="Куда мне писать" required />
								<div class="tooltip tooltip--right" data-required="введите email"><span class="tooltip__span"></span></div>
							</div>
						</div>
					</div>
					<div class="feedback__form-row">
						<div class="container-input">
							<span class="span-label">Сообщение</span>
							<div class="input-wrapper">
								<textarea class="textarea" name="message" placeholder="Кратко в чем суть" required></textarea>
								<div class="tooltip" data-required="введите сообщение"><span class="tooltip__span"></span></div>
							</div>
						</div>
					</div>
					<div class="feedback__form-row">
						<div class="container-input">
							<span class="span-label">Введите код, указанный на картинке</span>
							<div class="captcha">
								<div class="captcha__img"><img src="images/content/captcha.jpg" width="146" height="46"></div>
								<div class="input-wrapper">
									<input class="input input--captcha" type="text" name="captcha" placeholder="Введите код" required />
									<div class="tooltip tooltip--right" data-required="введите код"><span class="tooltip__span"></span></div>
								</div>
							</div>
						</div>
					</div>
					<div class="feedback__form-row">
						<input class="button button--shadow" type="submit" value="Отправить">
						<input class="button button--reset button--dark" type="reset" value="Очистить">
					</div>
				</form>
			</div>
		</div>
		<!-- end feedback -->
	</div>
	<!-- end content__block -->
</div>
<!-- end content__main -->

</div>
<!-- end content -->
<?php 
	require_once 'footer.php';
?>
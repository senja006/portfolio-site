<?php 
	$title = 'Мои работы';
	$menu_item = 'work';
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
		<!-- begin work -->
		<div class="work">
			<h2 class="content__block-title"><span class="content__block-title-span">Мои работы</span></h2>
			<div class="work__list">
				<ul class="work__ul">
					<li class="work__li">
						<div class="work__img">
							<img src="images/content/work.jpg" width="181" height="127">
							<div class="work__name"><span class="work__name-span">Название</span></div>
						</div>
						<a href="#" class="work__a">www.site.ru</a>
						<p class="work__p">Информация о проекте 1 превью 2 строки...</p>
					</li>
					<li class="work__li">
						<div class="work__img">
							<img src="images/content/work.jpg" width="181" height="127">
							<div class="work__name"><span class="work__name-span">Название</span></div>
						</div>
						<a href="#" class="work__a">www.site.ru</a>
						<p class="work__p">Информация о проекте 1 превью 2 строки...</p>
					</li>
					<li class="work__li">
						<div class="work__img">
							<img src="images/content/work.jpg" width="181" height="127">
							<div class="work__name"><span class="work__name-span">Название</span></div>
						</div>
						<a href="#" class="work__a">www.site.ru</a>
						<p class="work__p">Информация о проекте 1 превью 2 строки...</p>
					</li>
					<li class="work__li">
						<div class="work__img">
							<img src="images/content/work.jpg" width="181" height="127">
							<div class="work__name"><span class="work__name-span">Название</span></div>
						</div>
						<a href="#" class="work__a">www.site.ru</a>
						<p class="work__p">Информация о проекте 1 превью 2 строки...</p>
					</li>
				</ul>
				<div class="work__add">
					<a href="#add-project" class="work__add-a open-popup">
						<div class="work__add-a-wrapper">
							<span class="icon icon--mountains"></span>
							<span class="work__add-span">Добавить проект</span>
						</div>
					</a>
				</div>
			</div>
			<div class="popup" id="add-project">
				<div class="popup__in">
					<a href="#" class="close"><span class="icon"></span></a>
					<span class="popup__title">Добавление проекта</span>
					<div class="popup__form">
						<form class="form-validation">
							<div class="form-info">
								<div class="form-info-in form-info-success">
									<a href="#" class="form-info-close"><span class="icon"></span></a>
									<span class="form-info-title">Ура!</span>
									<span class="form-info-text">Проект успешно добавлен.</span>
								</div>
								<div class="form-info-in form-info-error">
									<a href="#" class="form-info-close"><span class="icon"></span></a>
									<span class="form-info-title">Ошибка!</span>
									<span class="form-info-text">Невозможно добавить проект.</span>
								</div>
							</div>
							<div class="container-input">
								<span class="span-label">Название проекта</span>
								<div class="input-wrapper">
									<input class="input" type="text" name="name" placeholder="Введите название" required />
									<div class="tooltip" data-required="введите название"><span class="tooltip__span"></span></div>
								</div>
							</div>
							<div class="container-input">
								<span class="span-label">Картинка проекта</span>
								<div class="input-file">
									<div class="input-wrapper">
										<input class="input input__file-name" type="text" name="file-name" placeholder="Загрузите изображение" readonly required />
										<div class="tooltip"data-required="изображение"><span class="tooltip__span"></span></div>
									</div>
									<label class="label__file" for="input__file">
										<span class="icon icon--upload"></span>
										<input id="input__file" class="input__file" type="file">
									</label>
								</div>
							</div>
							<div class="container-input">
								<span class="span-label">URL проекта</span>
								<div class="input-wrapper">
									<input class="input" type="text" name="url" placeholder="Добавьте ссылку" required />
									<div class="tooltip" data-no-valid="введите правильный URL" data-required="ссылка на проект"><span class="tooltip__span"></span></div>
								</div>
							</div>
							<div class="container-input">
								<span class="span-label">Описание</span>
								<div class="input-wrapper">
									<textarea class="textarea" name="desc" placeholder="Пара слов о Вашем проекте" required></textarea>
									<div class="tooltip" data-required="введите сообщение"><span class="tooltip__span"></span></div>
								</div>
							</div>
							<div class="container-submit">
								<input class="button" type="submit" value="Добавить">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end work -->
	</div>
	<!-- end content__block -->
</div>
<!-- end content__main -->

</div>
<!-- end content -->
<?php 
	require_once 'footer.php';
?>
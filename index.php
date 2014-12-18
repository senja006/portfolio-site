<?php
	$title = 'Яркевич Сергей';
	$menu_item = 'about';
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
		<!-- begin info -->
		<div class="info">
			<h2 class="content__block-title"><span class="content__block-title-span">Основная информация</span></h2>
			<div class="info__img"><img src="images/content/photo.jpg" width="200" height="200"></div>
			<div class="info__text">
				<ul class="info__text-ul">
					<li class="info__text-li">
						<span class="info__text-span"><b>Меня зовут:</b></span>
						<span class="info__text-span">Яркевич Сергей Сергеевич</span>
					</li>
					<li class="info__text-li">
						<span class="info__text-span"><b>Мой возраст:</b></span>
						<span class="info__text-span">31 год</span>
					</li>
					<li class="info__text-li">
						<span class="info__text-span"><b>Мой город:</b></span>
						<span class="info__text-span">ст. Ленинградская, Краснодар</span>
					</li>
					<li class="info__text-li">
						<span class="info__text-span"><b>Моя специализация:</b></span>
						<span class="info__text-span">FRONTEND разработчик</span>
					</li>
					<li class="info__text-li">
						<span class="info__text-span"><b>Ключевые навыки:</b></span>
						<div class="skills">
							<ul class="skills__ul">
								<li class="skills__li"><span class="skills__li-span">html</span></li>
								<li class="skills__li"><span class="skills__li-span">css</span></li>
								<li class="skills__li"><span class="skills__li-span">javascript</span></li>
								<li class="skills__li"><span class="skills__li-span">grunt</span></li>
								<li class="skills__li"><span class="skills__li-span">git</span></li>
								<li class="skills__li"><span class="skills__li-span">sass</span></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- end info -->
	</div>
	<!-- end content__block -->
	<!-- begin content__block -->
	<div class="content__block">
		<!-- begin about -->
		<div class="about">
			<h2 class="content__block-title"><span class="content__block-title-span">Опыт работы</span></h2>
			<ul class="about__ul">
				<li class="about__li">
					<div class="about__container-icon"><span class="icon icon--briefcase"></span></div>
					<div class="about__text">
						<span class="about__text-title">"ИП Яркевич С.М." - бухгалтер</span>
						<span class="about__text-span">Июнь 2005 - Сентябрь 2007</span>
					</div>
				</li>
				<li class="about__li">
					<div class="about__container-icon"><span class="icon icon--briefcase"></span></div>
					<div class="about__text">
						<span class="about__text-title">"ИП Яркевич С.С." - собственный бизнес</span>
						<span class="about__text-span">Сентябрь 2007 - Декабрь 2013</span>
					</div>
				</li>
			</ul>
		</div>
		<!-- end about -->
	</div>
	<!-- end content__block -->
	<!-- begin content__block -->
	<div class="content__block">
		<!-- begin about -->
		<div class="about">
			<h2 class="content__block-title"><span class="content__block-title-span">Образование</span></h2>
			<ul class="about__ul">
				<li class="about__li">
					<div class="about__container-icon"><span class="icon icon--education"></span></div>
					<div class="about__text">
						<span class="about__text-title">КубГУ, экономический факультет</span>
						<span class="about__text-span">Сентябрь 2000 - Июнь 2005</span>
					</div>
				</li>
				<li class="about__li">
					<div class="about__container-icon"><span class="icon icon--doc"></span></div>
					<div class="about__text">
						<span class="about__text-title">Курсы Loftschool.ru</span>
						<span class="about__text-span">Ноябрь 2014 - по настоящее время</span>
					</div>
				</li>
			</ul>
		</div>
		<!-- end about -->
	</div>
	<!-- end content__block -->
</div>
<!-- end content__main -->

</div>
<!-- end content -->
<!-- begin contacts -->
<div class="contacts contacts__mobile">
	<ul class="contacts__ul">
		<li class="contacts__li">
			<span class="icon icon--mail"></span>
			<a href="mailto:senja999@mail.ru" class="contacts__a">senja999@mail.ru</a>
		</li>
		<li class="contacts__li">
			<span class="icon icon--phone"></span>
			<a href="tel:+79184741204" class="contacts__a">+79184741204</a>
		</li>
		<li class="contacts__li">
			<span class="icon icon--skype"></span>
			<a href="skype:senja006?call" class="contacts__a">senja006</a>
		</li>
	</ul>
</div>
<!-- end contacts -->
<?php 
	require_once 'footer.php';
?>
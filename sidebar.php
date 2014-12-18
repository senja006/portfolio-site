<!-- begin sidebar -->
<div class="sidebar hidden-tablet">
	<div class="sidebar__block">
		<!-- begin menu -->
		<nav class="menu">
			<ul class="menu__ul">
				<li class="menu__li <?php if($menu_item == "about") echo "is-active";?>">
					<a href="index.php" class="menu__a"><span class="menu__span">Обо мне</span></a>
				</li>
				<li class="menu__li <?php if($menu_item == "work") echo "is-active";?>">
					<a href="work.php" class="menu__a"><span class="menu__span">Мои работы</span></a>
				</li>
				<li class="menu__li <?php if($menu_item == "feedback") echo "is-active";?>">
					<a href="feedback.php" class="menu__a"><span class="menu__span">Связаться со мной</span></a>
				</li> 
			</ul>
		</nav>
		<!-- end menu -->
	</div>
	<div class="sidebar__block">
		<!-- begin contacts -->
		<div class="contacts">
			<span class="contacts__title">Контакты</span>
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
	</div>
</div>
<!-- end sidebar -->
<?php if($page_item != 'admin') { ?>
<!-- begin contacts -->
<div class="contacts contacts__mobile">
	<ul class="contacts__ul">
		<li class="contacts__li">
			<div class="contacts__li-container">
				<span class="icon icon--mail"></span>
				<a href="mailto:senja999@mail.ru" class="contacts__a">senja999@mail.ru</a>
			</div>
		</li>
		<li class="contacts__li">
			<div class="contacts__li-container">
				<span class="icon icon--phone"></span>
				<a href="tel:+79184741204" class="contacts__a">+79184741204</a>
			</div>
		</li>
		<li class="contacts__li">
			<div class="contacts__li-container">
				<span class="icon icon--skype"></span>
				<a href="skype:senja006?call" class="contacts__a">senja006</a>
			</div>
		</li>
	</ul>
</div>
<!-- end contacts -->
<div class="social visible-phone">
	<ul class="social__ul">
		<li class="social__li">
			<a href="http://vk.com/id130461439" target="_blank" class="social__a social__a--vk"><span class="icon"></span></a>
		</li>
		<li class="social__li">
			<a href="http://twitter.com/senja006" target="_blank" class="social__a social__a--tw"><span class="icon"></span></a>
		</li>
		<li class="social__li">
			<a href="http://www.facebook.com/profile.php?id=100008555380366" target="_blank" class="social__a social__a--fb"><span class="icon"></span></a>
		</li>
		<li class="social__li">
			<a href="https://github.com/senja006" target="_blank" class="social__a social__a--git"><span class="icon"></span></a>
		</li>
	</ul>
</div>
<?php } ?>
<!-- begin footer -->
<footer class="footer">
	<div class="footer__in">
		<?php if($page_item != 'admin') { ?>
		<a class="login" href="admin.php"><span class="icon"></span></a>
		<?php } ?>
		<div class="copyright">
			<span class="copyright__span">© 2014, Это мой сайт, пожалуйста, не копируйте и не воруйте его</span>
		</div>
	</div>
</footer>
<!-- end footer -->	</div>
	<!-- end page -->
	
	<script type="text/javascript" src="js/vendor/dest/vendor.min.js"></script>
	<script type="text/javascript" src="js/local/src/validationForm.js"></script>
	<script type="text/javascript" src="js/local/src/pageSize.js"></script>
	<script type="text/javascript" src="js/local/src/popup.js"></script>
	<script type="text/javascript" src="js/local/src/mobileMenu.js"></script>
	<script type="text/javascript" src="js/local/src/mobileClasses.js"></script>
	<script type="text/javascript" src="js/local/src/feedbackForm.js"></script>
	<script type="text/javascript" src="js/local/src/loginForm.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
	<?php
	require_once 'webadmin/classes/functions.php';
	save_visitors();
	$webSetting = $settings->getSettings('1', '0');
	$userPackages = $package->getPackagesStatus();
	logoutUser();
	?>

	<!-- header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- btn -->
						<button class="header__btn" type="button" aria-label="header__nav">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end btn -->

						<!-- logo -->
						<a href="index.php" class="header__logo">
							<img src="img/settings/<?= $webSetting['logo'] ?? 'tradeeclipse__var3.png' ?>" alt="Chain Crest Capital Logo">
						</a>
						<!-- end logo -->

						<!-- tagline -->
						<span class="header__tagline"></span>
						<!-- end tagline -->

						<!-- navigation -->
						<ul class="header__nav" id="header__nav">
							<li class="active">
								<a href="index.php">Home</a>
							</li>

							<?php if (isset($_SESSION['user_data']['role']) && $_SESSION['user_data']['role']  == "0") : ?>

								<li>
									<a href="dashboard.php">Dashboard</a>
								</li>

							<?php endif; ?>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="how-it-works.php">How It Works</a>
							</li>

							<li>
								<a href="faq.php">FAQ</a>
							</li>

							<li>
								<a target="__blank" href="https://cointelegraph.com/">News</a>
							</li>

							<li>
								<a href="contact.php">Contact Us</a>
							</li>

						</ul>
						<!-- end navigation -->

						<!-- language -->
						<div class="header__language">
							<a class="dropdown-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">EN <i class="ti ti-point-filled"></i></a>

							<ul class="dropdown-menu header__language-menu">
								<!-- <li><a href="#">English</a></li>
								<li><a href="#">Spanish</a></li>
								<li><a href="#">French</a></li> -->
								<div id="google_translate_element"></div>

								<script type="text/javascript">
									function googleTranslateElementInit() {
										new google.translate.TranslateElement({
											pageLanguage: 'auto', // Automatically detect page language
											includedLanguages: 'ar,en,fr,pt,es,sw' // Include English in the list
										}, 'google_translate_element');
									}
								</script>

								<script type="text/javascript"
									src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
								</script>
							</ul>
						</div>
						<!-- end language -->

						<!-- profile -->
						<?php if (isset($_SESSION['user_data']['userId'])) : ?>
							<a href="?logout=true" class="header__profile">
								<i class="ti ti-user-circle"></i>
								<span>Logout</span>
							</a>

						<?php else : ?>

							<a href="login.php" class="header__profile">
								<i class="ti ti-user-circle"></i>
								<span>Login</span>
							</a>

						<?php endif; ?>



						<!-- end profile -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->
<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
	$uname_db = $get_user_email != null ? $get_user_email['firstName'] : null;
}

$categoryProduct = [
    ['id' => 1, 'item' => 'noodles', 'name' => 'Noodles', 'image' => 'noodles/n.jpg'],
    ['id' => 2, 'item' => 'snack', 'name' => 'Snack', 'image' => 'snack/sn.jpg'],
    ['id' => 3, 'item' => 'sweet', 'name' => 'Sweet', 'image' => 'sweet/s.jpg'],
    ['id' => 4, 'item' => 'hygiene', 'name' => 'Hygiene', 'image' => 'hygiene/hy.jpg'],
    ['id' => 5, 'item' => 'shampoo', 'name' => 'Shampoo', 'image' => 'shampoo/pall.jpg'],
    ['id' => 6, 'item' => 'soap', 'name' => 'Soap', 'image' => 'soap/sp.jpg'],
    ['id' => 7, 'item' => 'drink', 'name' => 'Drink', 'image' => 'drink/dr.jpg'],
    ['id' => 8, 'item' => 'seasoning', 'name' => 'Seasoning', 'image' => 'seasoning/cond.jpg']
];



?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-8JFCNSN5ZE"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-8JFCNSN5ZE');
		</script>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-N89BJNV6');</script>
		<!-- End Google Tag Manager -->

		<title>Nita's online grocery for your needs - Fresh products, drinks and snacks</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Découvrez notre épicerie en ligne, spécialisée dans la livraison rapide de produits frais et de qualité. Explorez nos catégories de produits frais, boissons, snacks, et bien plus encore.">
    	<meta name="keywords" content="online grocery,Fresh products, drinks, snacks, quality products">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="/js/homeslideshow.js"></script>
	</head>
	<body style="min-width: 980px;">

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N89BJNV6"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div class="homepageheader" style="position: relative;">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="color: #fff; text-decoration: none;" href="signin.php">SIGN UP</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/cart.png">
				</a>
			</div>
			<div class="">
				<div id="srcheader">
					<form id="newsearch" method="get" action="search.php">
					        <input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="home-welcome">
			<div class="home-welcome-text" style="background-image: url(image/background.jpg); height: 380px; ">
				<div style="padding-top: 180px;">
					<div style=" background-color: #dadbe6;">
						<h1 style="margin: 0px;">Welcome To nita's online grocery</h1>
						<h2>Most Convenient Store in 7th ave. Caloocan</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="home-prodlist">
			<div>
				<h2 style="text-align: center;"><strong>Products Category</strong></h2>
			</div>
			<div style="padding: 20px 30px; width: 85%; margin: 0 auto;">
				<?php foreach ($categoryProduct as $category) { ?>
					<ul style="float: left;">
						<li style="float: left; padding: 25px;">
							<div class="home-prodlist-img"><a href="OurProducts/category.php?item=<?php echo $category['item']; ?>">
							<!-- <div class="home-prodlist-img"><a href="OurProducts/Drinks.php"> -->
								<img src="./image/product/<?php echo $category['image']; ?>" class="home-prodlist-imgi">
								</a>
							</div>
						<h3><strong><?php echo $category['name']; ?></strong></h3>
						</li>
					</ul>
				<?php } ?>
			</div>			
		</div>
	</body>
</html>
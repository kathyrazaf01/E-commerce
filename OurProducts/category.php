<?php include ( "../inc/connect.inc.php" ); ?>
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
			$uname_db = $get_user_email['firstName'];
}

$item = $_GET['item'];

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

		
	<title>Drinks</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N89BJNV6"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

	<?php include ( "../inc/mainheader.inc.php" ); ?>
	<div class="categolis">
		<table>
			<tr>
                <?php foreach ($categoryProduct as $category) { 
                    if ($category['item'] != $item) { ?>
                        <th><a href="?item=<?php echo urlencode($category['item']); ?>" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;"><?php echo $category['name']; ?></a></th>
                    <?php }else{ ?>
                        <th><a href="?item=<?php echo urlencode($category['item']); ?>" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;"><?php echo $category['name']; ?></a></th>
                <?php }} ?>
			</tr>
		</table>
	</div>
	<div style="padding: 15px 0px; font-size: 15px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php 
			$getposts = mysqli_query($con, "SELECT * FROM products WHERE available >='1' AND item ='".$item."'  ORDER BY id DESC LIMIT 10") or die(mysqlI_error($con));
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
										<img src="../image/product/'.$item.'/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: '.$price.' Php</div>
									</div>
									
								</li>
							</ul>
						';

						}
				}
		?>
			
		</div>
	</div>
</body>
</html>
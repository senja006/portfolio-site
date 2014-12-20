<?php  
session_start();
require_once 'config.php';

$pdo = connectToDB();
$result = $pdo->query($data_sql['getPortfolio']);
$portfolio = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($portfolio as $item) { ?>
<li class="work__li">
	<div class="work__img">
		<img src="<?php echo $item["img"] ?>" width="181" height="127">
		<div class="work__name"><span class="work__name-span"><?php echo $item["title"] ?></span></div>
	</div>
	<a href="#" class="work__a"><?php echo $item["url"] ?></a>
	<p class="work__p"><?php echo $item["description"] ?></p>
</li>
<?php } ?>
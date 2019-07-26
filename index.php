<?php
require_once( "config.php" );
// $steamid = isset($_GET["steamid"]);
if ( isset( $_GET["steamid"] ) ) {
	$steamid = $_GET["steamid"];
} else {
	$steamid = 76561197960435530;
}


$api_url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$STEAM_API_KEY&steamids=$steamid";
$resp = file_get_contents( $api_url );
$resp_json = json_decode( $resp, true );
$profile = $resp_json["response"]["players"][0];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Gmod Loading Screen</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
			crossorigin="anonymous"
		/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      		rel="stylesheet">
	</head>
	<body style="background: url(<?php echo( $BG_URL ); ?>)">
		<div class="container">
			<h1 id="server-name" class="<?php if ( $BG_IS_DARK ) { echo( "text-light" );} ?>">Server Name</h1>
			<div class="float-left">
				<div class="card mb-2">
					<div class="card-header">
						<i class="material-icons">
							description
						</i>
						<b>Rules</b>
					</div>
					<ul class="list-group list-group-flush">
						<?php
						foreach( $RULES as $rule ) {
							echo("<li class='list-group-item'>$rule</li>");
						}
						?>
					</ul>
				</div>
				<div class="card">
					<div class="card-header">
						<i class="material-icons">
							info
						</i>
						<b>Info</b>
					</div>
					<ul class="list-group list-group-flush" id="rules-list">
						<li class="list-group-item" id="map"><b>Map:</b> </li>
						<li class="list-group-item" id="gamemode"><b>Gamemode:</b> </li>
						<li class="list-group-item" id="maxplayers"><b>Max Players:</b> </li>
					</ul>
				</div>
			</div>
			<div class="card float-right">
				<div class="card-header">
					<b>Welcome!</b>
				</div>
				<img class="card-img-top rounded-circle mx-auto my-2" style="width: 250px;" src="<?php echo($profile["avatarfull"])?>" alt="avatar">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<i class="material-icons">
							face
						</i>
						<b><?php echo($profile["personaname"])?></b>
					</li>
					<li class="list-group-item">
						<i class="material-icons">
							rowing
						</i>
						<span id="status">Loading...</span>
					</li>
				</ul>
			</div>
		</div>
		<script src="static/js/load.js"></script>
	</body>
</html>

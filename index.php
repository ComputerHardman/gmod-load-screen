<?php
/*
 * Copyright (C) 2019  William Sandbrink
 *
 * gmod-load-screen is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * gmod-load-screen is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with gmod-load-screen.  If not, see <https://www.gnu.org/licenses/>.
 */
?>
<?php
require_once("config.php");
// $steamid = isset($_GET["steamid"]);
if (isset($_GET["steamid"])) {
    $steamid = $_GET["steamid"];
} else {
    $steamid = 76561197960435530;
}


$api_url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$STEAM_API_KEY&steamids=$steamid";
$resp = file_get_contents($api_url);
$resp_json = json_decode($resp, true);
$profile = $resp_json["response"]["players"][0];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Gmod Loading Screen</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body style="background: url(<?php echo($BG_URL); ?>)">
        <h1 id="server-name" class="<?php if ($BG_IS_DARK) {
    echo("text-light");
} ?>">Server Name</h1>
        <div class="panel rule-panel">
            <h2>
                <i class="material-icons">
                    description
                </i>
                Rules
            </h2>
            <ul>
                <?php
                foreach ($RULES as $rule) {
                    echo("<li>$rule</li>");
                }
                ?>
            </ul>
        </div>
        <div class="panel info-panel">
            <h2>
                <i class="material-icons">
                    info
                </i>
                Info
            </h2>
            <ul id="rules-list">
                <li id="map"><b>Map:</b> </li>
                <li id="gamemode"><b>Gamemode:</b> </li>
                <li id="maxplayers"><b>Max Players:</b> </li>
            </ul>
        </div>
        <div class="panel welcome-panel">
            <h2>
                <b>Welcome!</b>
            </h2>
            <img class="avatar" style="width: 250px; float: right;" src="<?php echo($profile["avatarfull"])?>" alt="avatar">
            <p class="username">
                <i class="material-icons">
                    face
                </i>
                <b><?php echo($profile["personaname"])?></b>
            </p>
        </div>
        <div style="clear: both;"></div>
        <p id="status" class="<?php if ($BG_IS_DARK) {
                    echo("text-light");
                } ?>">Loading...</p>
        <script src="static/js/load.js"></script>
    </body>
</html>

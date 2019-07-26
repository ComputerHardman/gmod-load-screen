// Spaghetti mess
var s = document.getElementById( "server-name" );
var statusc = document.getElementById( "status" );
var body = document.getElementsByTagName( "body" )[0];
var ruleslist = document.getElementById( "rules-list" );

var map = document.getElementById( "map" );
var gm = document.getElementById( "gamemode" );
var mp = document.getElementById( "maxplayers" );

ruleslist.innerHTML = "";
	for ( var i = 0; i < rules.length; i++ ) {
		rule = "<li class=\"list-group-item\">" + rules[i] + "</li>";
		ruleslist.innerHTML += rule;
}

body.style.backgroundRepeat = "no-repeat";
body.style.backgroundSize = "cover";

if ( bgIsDark == true ) {
	s.className += " " + "text-light";
}



function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) {
	s.innerText = servername;
	map.innerText += " " + mapname;
	gm.innerText  += " " + gamemode;
	mp.innerText  += " " + maxplayers;
}

function SetStatusChanged( status ) {
	statusc.innerText = status;
}

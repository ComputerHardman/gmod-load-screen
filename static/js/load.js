var s = document.getElementById("server-name");
var statusc = document.getElementById("status");
var body = document.getElementsByTagName("body")[0];

var map = document.getElementById("map");
var gm = document.getElementById("gamemode");
var mp = document.getElementById("maxplayers");

body.style.backgroundRepeat = "repeat";
body.style.backgroundSize = "cover";

function GameDetails(servername, serverurl, mapname, maxplayers, steamid, gamemode) {
	s.innerText = servername;
	map.innerText += " " + mapname;
	gm.innerText += " " + gamemode;
	mp.innerText += " " + maxplayers;
}

function SetStatusChanged(status) {
	statusc.innerText = status;
}

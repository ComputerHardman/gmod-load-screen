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

var s = document.getElementById( "server-name" );
var statusc = document.getElementById( "status" );
var body = document.getElementsByTagName( "body" )[0];

var map = document.getElementById( "map" );
var gm = document.getElementById( "gamemode" );
var mp = document.getElementById( "maxplayers" );

body.style.backgroundRepeat = "repeat";
body.style.backgroundSize = "cover";

function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) {
    s.innerText = servername;
    map.innerText += " " + mapname;
    gm.innerText  += " " + gamemode;
    mp.innerText  += " " + maxplayers;
}

function SetStatusChanged( status ) {
    statusc.innerText = status;
}

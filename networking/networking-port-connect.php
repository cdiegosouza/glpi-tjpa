<?php
/*
 
  ----------------------------------------------------------------------
GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2004 by the INDEPNET Development Team.
 
 http://indepnet.net/   http://glpi.indepnet.org
 ----------------------------------------------------------------------
 LICENSE

This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// Based on:
// IRMA, Information Resource-Management and Administration
// Christian Bauer 
// ----------------------------------------------------------------------
// Original Author of file:
// Purpose of file:
// ----------------------------------------------------------------------

include ("_relpos.php");
include ($phproot . "/glpi/includes.php");
include ($phproot . "/glpi/includes_networking.php");

checkAuthentication("admin");


commonHeader($lang["title"][6],$_SERVER["PHP_SELF"]);
if(isset($_GET)) $tab = $_GET;
if(empty($tab) && isset($_POST)) $tab = $_POST;
if(!isset($tab["ID"])) $tab["ID"] = "";
if(isset($_GET["sport"])) $tab["ID"] = $_GET["sport"];

if(!(isset($tab["next"])))
{
	showConnectorSearch($_SERVER["PHP_SELF"],$tab["ID"]);
}
else
{
	switch ($tab["next"]) 
	{
		case "";
			showConnectorSearch($_SERVER["PHP_SELF"],$tab["ID"]);
		break;

		case "compsearch";
			listConnectorComputers($_SERVER["PHP_SELF"],$tab);
		break;

		case "showports";
			listConnectorPorts($_SERVER["PHP_SELF"],$tab);
		break;		

		case "connect";
			makeConnector($tab["sport"],$tab["dport"]);
		break;		
	}
}

commonFooter();


?>



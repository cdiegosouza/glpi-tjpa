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
include ("glpi/includes.php");
include ($phproot . "/glpi/includes_tracking.php");
include ($phproot . "/glpi/includes_computers.php");
include ($phproot . "/glpi/includes_printers.php");
include ($phproot . "/glpi/includes_monitors.php");
include ($phproot . "/glpi/includes_peripherals.php");
include ($phproot . "/glpi/includes_networking.php");


checkAuthentication("normal");

commonHeader($lang["title"][0],$_SERVER["PHP_SELF"]);

// Greet the user

echo "<center><b>".$lang["central"][0].$_SESSION["glpiname"].", ".$lang["central"][1]."</b></center>";
//echo "<hr noshade>";

// New database object
$db= new DB;

// Show last events
if(isset($_GET["order"]))
{
	showEvents($_SERVER["PHP_SELF"],$_GET["order"],$_GET["sort"]);
}
else
{
	showEvents($_SERVER["PHP_SELF"],"","");
}
if ($cfg_features["jobs_at_login"] == "1")
{
	if(empty($_GET["start"])) $_GET["start"] = 0;
	showJobList($_SERVER["PHP_SELF"],$_SESSION["glpiname"],"individual","","","",$_GET["start"]);
}

commonFooter();

?>

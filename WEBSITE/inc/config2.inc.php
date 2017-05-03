<?php
/**
*	@desc	    Config include.
*    
*	@company	Web-Développez
*	@Property	public
*	@author		plop
*	@contact	plopyy@gmail.com
*	@version	1.0.0
*	@date		16/09/2008
*	@access		public
**/

$sHost      = 'localhost'; // Default: 127.0.0.1 EN:Host/IP  FR:HOST/IP
$sLogin     = 'root'; // Default: root EN:Login  FR: Identifiant
$sPass      = '1234'; // Default:  EN:Password  FR: Mot de passe
$sDatabase  = 'flyff'; // Default: flyff EN:Database Name  FR: Nom de la base de donnée

$myConnect  = mysql_connect( $sHost, $sLogin, $sPass );
$myDatabase = mysql_select_db( $sDatabase, $myConnect );
?>

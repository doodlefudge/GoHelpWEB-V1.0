<?php
require_once('inc/config2.inc.php');
require_once('inc/functions.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <head>
        <link href="style.css" rel="stylesheet" type="text/css"/>  
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <?php
            $sQuery     = "SELECT t2.channelnum, t2.charname, t2.level, t2.class FROM accounts AS t1 INNER JOIN characters AS t2 ON t1.username = t2.accountname WHERE t1.accesslevel >= 100";
            $rExecute   = mysql_query( $sQuery );
            $iNbOfResult = mysql_num_rows( $rExecute );
            
            $ctr = 0;

            while( $aRowData   = mysql_fetch_assoc( $rExecute ) )
            {
                $aData['channelnum'][$ctr]  = $aRowData['channelnum'];
                $aData['charname'][$ctr]    = $aRowData['charname'];
                $aData['level'][$ctr]       = $aRowData['level'];
                $aData['level2'][$ctr]      = RealLevel( $aRowData['level'], $aRowData['class'] );
                $aData['class'][$ctr]       = $aRowData['class'];
                $ctr++;
            }
            
            if( 1 < $iNbOfResult )
            {
                array_multisort( $aData['level2'], SORT_NUMERIC, SORT_DESC, $aData['channelnum'], $aData['charname'], $aData['level'], $aData['class']);
            }
            
            echo'
            <table style="border: 0px solid blue; font-size: 12px;" cellpadding="0" cellspacing="0">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Status</center>
 	<br><table style="border: 0px solid blue; font-size: 12px;" cellpadding="0" cellspacing="0">

            ';
            
            $iNo = 1;
            
            while( $iNo <= $iNbOfResult )
            {
                echo '


                   <Br><td align="center">'.$iNo.' 	                
 		    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;'.RealLevel2( $aData['level'][$iNo-1], $aData['class'][$iNo-1] ).' </td>
	            <td align="center">&nbsp;&nbsp;'.$aData['charname'][$iNo-1].'      </td>         
 		    <td align="center">&nbsp;&nbsp;'.Job($aData['class'][$iNo-1]).' </td>
                    <td align="center">&nbsp;&nbsp;'.Statu($aData['channelnum'][$iNo-1]).' </td>
    <td style="width: 20px;"></td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td style="width: 20px;"></td>
                </tr>

                ';
                $iNo++;
            }
            
            echo'
            </table>
            ';
        ?>
    </body>
</html>

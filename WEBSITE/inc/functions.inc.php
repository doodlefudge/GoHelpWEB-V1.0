<?php
/**
*	@desc	    Function include.
*    
*	@company	Web-Développez
*	@Property	public
*	@author		plop
*	@contact	plopyy@gmail.com
*	@version	1.0.0
*	@date		16/09/2008
*	@access		public
**/

function RealLevel( $iLevel, $iClass )
{
    if( ( 16 <= $iClass ) && ( $iClass <= 23 ) )
    {
        $iNewLevel = $iLevel + 1000;
    }
    elseif( ( 24 <= $iClass ) && ( $iClass <= 31 ) )
    {
        $iNewLevel = $iLevel + 2000;
    }
    else
    {
        $iNewLevel = $iLevel;
    }
    
    return $iNewLevel;
}

function Statu( $iStatu )
{
    if( 0 >= $iStatu )
    {
        $iRealStatu = 'off';
    }
    else
    {
        $iRealStatu = 'on';
    }
    return '<img src="img/'.$iRealStatu.'.png" alt="" />';
}

function RealLevel2( $iLevel, $iClass )
{
    if( ( 16 <= $iClass ) && ( $iClass <= 23 ) )
    {
        if( ( 60 <= $iLevel ) && ( $iLevel <= 69 ) )
        {
            $sLevel2 = $iLevel.'<img src="img/m1.png" alt="" />';
        }
        elseif( ( 70 <= $iLevel ) && ( $iLevel <= 79 ) )
        {
            $sLevel2 = $iLevel.'<img src="img/m2.png" alt="" />';
        }
        elseif( ( 80 <= $iLevel ) && ( $iLevel <= 89 ) )
        {
            $sLevel2 = $iLevel.'<img src="img/m3.png" alt="" />';
        }
        elseif( ( 90 <= $iLevel ) && ( $iLevel <= 99 ) )
        {
            $sLevel2 = $iLevel.'<img src="img/m4.png" alt="" />';
        }
        elseif( ( 100 <= $iLevel ) && ( $iLevel <= 109 ) )
        {
            $sLevel2 = $iLevel.'<img src="img/m5.png" alt="" />';
        }
        elseif( ( 110 <= $iLevel ) && ( $iLevel <= 120 ) )
        {
            $sLevel2 = $iLevel.'<img src="img/m6.png" alt="" />';
        }
    }
    elseif( ( 24 <= $iClass ) && ( $iClass <= 31 ) )
    {
        $sLevel2 = '<img src="img/h.png" alt="" />';
    }
    else
    {
        $sLevel2 = $iLevel;
    }
    
    return $sLevel2;
}

function Job( $iClass )
{
    $aJob = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '6',
        17 => '7',
        18 => '8',
        19 => '9',
        20 => '10',
        21 => '11',
        22 => '12',
        23 => '13',
        24 => '6',
        25 => '7',
        26 => '8',
        27 => '9',
        28 => '10',
        29 => '11',
        30 => '12',
        31 => '13'
    );
    
    return '<img src="img/'.$aJob[$iClass].'.png" alt="" />';
}


?>

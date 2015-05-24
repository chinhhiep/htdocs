<?php
@session_start();
//include_once 'common.php';
include("config.php");
$db		=	new	lg_mysql($host,$dbuser,$dbpass,$csdl);
include("func.php");

$THANHVIEN["id"] = 0;
include("z_includes/dem_online.php");

if( !empty($_SERVER['QUERY_STRING']) && strpos($_SERVER['QUERY_STRING'], 'act=') !== false ){
	$act = explode('&', $_SERVER['QUERY_STRING']);
	foreach( $act as $k=>$v ){
		$v = explode('=', $v);
		eval('$'.$v[0].' = \''.$v[1].'\';');
	}
}

if (empty($act)) $act = "home";
if ( !in_array($act, array("home","gioi_thieu","lien_he","san_pham","san_pham_xem","tin_tuc","tin_tuc_xem","tuyen_dung","dich_vu"
    /*if ( !in_array($act, array("home","gioi_thieu","lien_he","san_pham","san_pham_xem","tin_tuc","tin_tuc_xem","tuyen_dung","dich_vu"*/
	) ) ) 
{
	$act = "home";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forbes Vietnam</title>

<meta name="author" content="ThietkewebX - Website ban hang">
<meta name="keywords" content="ThietkewebX - Website ban hang">
<meta name="description" content="ThietkewebX - Website ban hang">
<meta name="copyright" content="ThietkewebX - Website ban hang">
<meta http-equiv="expires" content="0">
<meta name="resource-type" content="document">
<meta name="distribution" content="global">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<meta name="rating" content="general">

<link href="<?php echo $liveSite;?>/phh.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo $liveSite;?>/jquery/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $liveSite;?>/jquery/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo $liveSite;?>/jquery/ui/effects.core.js"></script>
<script type="text/javascript" src="<?php echo $liveSite;?>/jquery/ui/effects.blind.js"></script>
<script type="text/javascript" src="<?php echo $liveSite;?>/phh.js"></script>
<script type="text/javascript" src="<?php echo $liveSite;?>/js/swfobject.js"></script>
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<?php echo $liveSite;?>/js/pngfix.js"></script>
<![endif]-->
<!--[if lte IE 6]>
<style type="text/css">
.clearfix {height: 1%;}
</style>
<![endif]-->
<!--[if gte IE 7.0]>
<style type="text/css">
.clearfix {display: inline-block;}
</style>
<![endif]-->
<script type="text/javascript" src="<?php echo $liveSite;?>/highslide/highslide-full.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $liveSite;?>/highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = '/highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.dimmingOpacity = 0.5;
	hs.registerOverlay({
		overlayId: 'closebutton',
		position: 'top right',
		fade: 2 // fading the semi-transparent overlay looks bad in IE
	});
</script>

</head>
<body>
<center>
<div class="tgp_container">
		<div class="tgp_menu">
		<ul>
			<li><a href="<?php echo $liveSite;?>/home/index.html"><?php echo $lang['MENU_HOME']; ?></a></li>
			<li><a href="<?php echo $liveSite;?>/gioi-thieu/index.html"><?php echo $lang['MENU_ABOUT_US']; ?></a></li>
			<li id="top_menu_1" class="sub"><a href="#"><?php echo $lang['MENU_OUR_PRODUCTS']; ?></a>
				<ul>
					<?php
					$r	=	$db->select("tgp_product_menu","cat = 'sp' and hien_thi = '1'","order by thu_tu asc");
					while ($row = $db->fetch($r))
					{
					?>
						<li><img src="<?php echo $liveSite;?>/images/bl3.gif" /> <a href="<?php echo $liveSite;?>/san-pham/<?php echo $row["id"]?>/<?php echo lg_string::get_link($row["ten"])?>"><?php echo $row["ten"]?></a></li>
					<?php
					}
					?>
				</ul>
			</li>
			<li><a href="<?php echo $liveSite;?>/tin-tuc/index.html"><?php echo $lang['MENU_NEWS_EVENTS']; ?></a></li>
			<li><a href="<?php echo $liveSite;?>/dich-vu/index.html"><?php echo $lang['MENU_OUR_SERVICES']; ?></a></li>

			<li><a href="<?php echo $liveSite;?>/lien-he/index.html"><?php echo $lang['MENU_CONTACT_US']; ?></a></li>
		</ul>
     	<div class="languages">
      	<a href="index.php?lang=vn">
      	<img border="0" src="<?php echo $liveSite;?>/images/lang_vn.jpg"/>
      	</a>
      	<a href="index.php?lang=en">
      	<img border="0" src="<?php echo $liveSite;?>/images/lang_en.jpg"/>
      	</a>
      	</div>
	</div>
	<div class="tgp_banner">
        <tr>
            <td align="center" valign="top"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="960" height="393">
                    <param name="movie" value="banner.swf" />
                    <param name="quality" value="high" />
                    <param name="wmode" value="transparent" />
                    <param name="swfversion" value="9.0.45.0" />
                    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you donâ€™t want users to see the prompt. -->
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="banner.swf" width="960" height="393">
                        <!--<![endif]-->
                        <param name="quality" value="high" />
                        <param name="wmode" value="transparent" />
                        <param name="swfversion" value="9.0.45.0" />
                        <param name="expressinstall" value="Scripts/expressInstall.swf" />
                        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                        <div>
                            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                        </div>
                        <!--[if !IE]>-->
                    </object>
                    <!--<![endif]-->
                </object></td>
        </tr></div>

	<div class="clearfix">
	<div class="tgp_body">
		<div class="body_1">
			<?php
include "z_includes/menu.php"; ?>
			<?php
include "z_includes/support.php"; ?>
			<?php
include "z_includes/thong_ke.php"; ?>
		</div>
		<div class="body_2">
			<?php
include "z_modules/".$act.".php";
include "z_modules/include.php"; ?>
		</div>
		<div class="body_3">
			<?php
include "z_includes/quang_cao.php"; ?>
		</div>
	</div>
	</div>
	<div class="tgp_copyright">
		<div class="div_1"><b>Â© 2006 - 2009. Báº£n quyá»�n thuá»™c vá»� CÃ”NG TY TNHH MTV TM&DV Tháº¿ Giá»›i Pháº³ng.</b><br />
			<b>* Ä�á»‹a chá»‰</b> : 147 TrÆ°Æ¡ng Ä�á»‹nh - HBT - HÃ  Ná»™i<br />
			<b>* Ä�iá»‡n thoáº¡i</b> : (0511)6.256.257 <b>* Fax</b> : (0511)6.256.267</div>
		<div class="div_2">Powered (+) Designed<br /><a href="https://plus.google.com/u/0/101740367695515335148" title="Gemini Vinh" target="_blank"><b>THE GIOI <font color="#FF9900">PHANG</font></b></a></div>
	</div>
</div>
</center>

</body>
</html>
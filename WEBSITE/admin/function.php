<?php
function	get_user($id,$value)
{
	global $db;
	
	$r	=	$db->select("tgp_user","id = '".$id."'");
	while ($row = $db->fetch($r))
		return $row[$value];
}

function	kt_user_dung($txt_username)
{function	get_bien($id)
{
	global $db;
	
	$r	=	$db->select("tgp_bien","ten = '".$id."'");
	while ($row = $db->fetch($r))
		return $row["gia_tri"];
}
	return (!ereg("(^[a-z]+([a-z\_0-9\-]*))$", $txt_username));
}
function	kt_email_dung($txt_email)
{
	return (!ereg("[A-Za-z0-9_-]+([\.]{1}[A-Za-z0-9_-]+)*@[A-Za-z0-9-]+([\.]{1}[A-Za-z0-9-]+)+", $txt_email));	
}
function	show_order($name,$sum,$pos,$width,$style=1)
{
?>
<select name="<?php echo $name?>" dir="rtl" size="1" class="inputbox" style="width:<?php echo $width?>;<?php echo $style==1?"font-weight:bold;color:red;":""?>">
<?php
	for ($i = 1; $i <= $sum; $i++)
	{
		echo "<option value=".$i;
		if ($pos == $i) echo " selected ";
		echo ">".$i."</option>";
	}
?>
</select>
<?php
}
// admin_load
function	admin_load($thong_bao,$url)
{
?>
<center>
	<b><font size="2"><?php echo $thong_bao?></font></b>
	<br /><img vspace="3" src="images/83.gif" />
	<br>Xin đợi vài giây hoặc bấm <b><a href="<?php echo $url?>">vào đây</a></b> để tiếp tục...
</center>
<head>
	<meta http-equiv="Refresh" content="1; URL=<?php echo $url?>">
</head>
<?php
	die();
}
// resize hình ảnh bất kỳ
function img_resize($src,$dis,$par)
{
 	require_once('../lib/phpthumb/phpthumb.class.php');
 	$phpThumb = new phpThumb();
 	$phpThumb->src = $src;
		$r = explode("&",$par);
		for ($i = 0; $i <= count($i); $i++)
		{
			if ($r[$i] != "")
			{
				$q = explode("=",$r[$i]);
				if ($q[0] == 'h') 
					$phpThumb->h = $q[1];
				if ($q[0] == 'w') 
					$phpThumb->w = $q[1];
			}
		}
	$phpThumb->q = 100;
	$phpThumb->config_output_format = 'jpeg';
	$phpThumb->config_error_die_on_error = true;
	if ($phpThumb->GenerateThumbnail())
	{
		$phpThumb->RenderToFile($dis);
  	}
  	else
	{
  	}
}
?>
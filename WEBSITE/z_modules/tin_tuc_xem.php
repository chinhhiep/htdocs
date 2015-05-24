<div class="tgp_box">
	<h1><span>TIN TỨC - SỰ KIỆN</span></h1>
	<div class="content">
	<div class="clearfix">
	<?php
	$id	=	$id + 0;
	$r2	=	$db->select("tgp_cms","id = '".$id."'");
	while ($row2 = $db->fetch($r2))
	{	
		$db->update("tgp_cms","luot_xem",$row2["luot_xem"]+1,"id = '".$id."'");
		?>
		<img src="<?php echo $liveSite;?>/images/bl3.gif" align="absmiddle" /> <a href="<?php echo $liveSite;?>/tin-tuc-xem/<?php echo $row2["id"]?>/<?php echo lg_string::get_link($row2["ten"])?>"><b><?php echo $row2["ten"]?></b></a>
		<?php
	?>
		<div style="margin-top:5px;text-align:justify;" class="clearfix">
			<div style="font-weight:bold;color:#999999;"><?php echo $row2["chu_thich"]?></div>
			<div style="margin-top:10px;"><?php echo $row2["noi_dung"]?></div>
		</div>
	<?php
$r = $db->select("tgp_cms","cat = '".$row2["cat"]."' and time < '".$row2["time"]."' and hien_thi = 1","order by time desc limit 5");
		if ($db->num_rows($r) != 0)
		{
			echo "<br><img src='/images/more_post.jpg' /><br>";
		}
		while ($row = $db->fetch($r))
		{?>
			<img src="<?php echo $liveSite;?>/images/bl3.gif" align="absmiddle"> <a href="<?php echo $liveSite;?>/tin-tuc-xem/<?php echo $row["id"]?>/<?php echo lg_string::get_link($row["ten"])?>"><?php echo $row["ten"]?></a><br />
		<?php
}
	}
	if ($db->num_rows($r2) == 0)
	{
		echo "<h3>Bài viết này không tồn tại.</h3>";
	}
	?>
	</div>
	</div>
</div>
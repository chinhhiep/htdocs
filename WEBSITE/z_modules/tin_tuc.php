<div class="tgp_box">
	<h1><span>TIN TỨC - SỰ KIỆN</span></h1>
	<div class="content">
	<div class="clearfix">
	<?php
		$r2	= $db->select("tgp_cms","hien_thi = 1","order by time desc limit 12");
		while ($row2 = $db->fetch($r2))
		{
		?>
			<div style="width:290px;height:120px;float:left;text-align:justify;padding:5px;">
			<?php echo  "<img src='/images/bl.gif' align=absmiddle /> <a href=\"/tin-tuc-xem/".$row2["id"]."/".lg_string::get_link($row2["ten"])."\"><b>".lg_string::crop($row2["ten"],7)."</b></a><br>";
				echo "<div class='clearfix' style='clear:both;margin-top:5px;margin-bottom:8px;'>";
				if ($row2["hinh"] != "no")	echo "<img src='/uploads/cms/".$row2["hinh"]."' width=120 height=80 align='left' style='padding:1px;border:solid 1px #ccc;margin-right:10px;'>";
				echo lg_string::crop($row2["chu_thich"],24)."</div>";
			?>
			</div>
		<?php
		}
	?>
	</div>
	</div>
</div>
<?php
$cmid = $cmid + 0;
$r = $db->select("tgp_product_menu","id = '".$cmid."'");

if ($db->num_rows($r) == 0)
{
	$cmid = 0;
}
else
{
	while ($row = $db->fetch($r))
	{
		$cat = $row;
	}
}

?>
<div class="tgp_box">
	<h1><span>Sản phẩm &raquo; <?php echo $cat["ten"]?></span></h1>
	<div class="content">
<div class="clearfix">
	<?php
$page		=	((isset($page))?$page:0) + 0;
	$perpage	=	12;
	$r_all		=	$db->select("tgp_product","cat = '".$cmid."' and hien_thi = 1");
	$sum		=	$db->num_rows($r_all);
	$pages		=	($sum-($sum%$perpage))/$perpage;
	if ($sum % $perpage <> 0 )	$pages = $pages+1;
	$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
	$min 		= 	abs($page-1) * $perpage;
	$max 		= 	$perpage;
	
	$r	=	$db->select("tgp_product","cat = '".$cmid."' and hien_thi = 1","order by time asc limit $min, $max");
	if ($db->num_rows($r) == 0)
	{
		echo "Không có sản phẩm nào trong Danh mục nào.";
	}
	while ($row = $db->fetch($r))
	{
	?>
	<div class="sp_box">
		<div style="float:left;margin-right:5px;border:solid 1px #CCCCCC;width:100px;height:98px;overflow:hidden;background:#fff;">
		<a href="<?php echo $liveSite;?>/san-pham-xem/<?php echo $row["id"]?>/<?php echo lg_string::get_link($row["ten"])?>">
			<img src="<?php echo $liveSite;?>/uploads/product/<?php echo $row["hinh"]?>" width="100" border="0" />
		</a>
		</div>
		<img src="<?php echo $liveSite;?>/images/bl2.jpg" align="absmiddle" /> <strong><font color="#0066FF"><a href="<?php echo $liveSite;?>/san-pham-xem/<?php echo $row["id"]?>/<?php echo lg_string::get_link($row["ten"])?>"><?php echo lg_string::crop($row["ten"],4)?></a></font></strong><br />
		<font size="1"><?php echo lg_string::crop($row["chu_thich"],24)?></font>
	</div>
	<?php
}
	?>
</div>
<?php
if ($pages > 1)
{
?>
<div style="width:100%;">
			<div id="page_paging">
				<dl>
					<dt class="btn_chg_page" onclick="Forward('/san-pham/<?php echo $cmid?>/1/the-gioi-phang.html');">First</dt>
					<dt class="btn_chg_page" onclick="Forward('/san-pham/<?php echo $cmid?>/<?php echo abs($page-1)?>/the-gioi-phang.html');">&laquo;Pre.</dt>
				<?php
$_start	=	$page - 3;
				$_end	=	$page + 3;
				
				if ($page < 4) $_end += (4-$page);
				if ($page > $pages - 3) $_start -= (3-($pages - $page));
				
				if ($_start < 1) $_start = 1;
				if ($_end   > $pages) $_end = $pages;
				
				for ($i = $_start; $i <= $_end; $i++)
				{
					if ($i == $page)
							echo "<dt class='active_page'> $i </dt>";
					else	echo "<dt onclick=\"Forward('/san-pham/$cmid/$i/the-gioi-phang.html');\" class='rp_page'> $i </dt>";
				}
				?>
					<dt class="btn_chg_page" onclick="Forward('/san-pham/<?php echo $cmid?>/<?php echo abs($page+1)?>/the-gioi-phang.html');">Next&raquo;</dt>
					<dt class="btn_chg_page" onclick="Forward('/san-pham/<?php echo $cmid?>/<?php echo ($pages)?>/the-gioi-phang.html');">Last</dt>
				</dl>
			</div>	
</div>
<?php
}
?>
	</div>
</div>
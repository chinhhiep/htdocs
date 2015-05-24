<?php
$id	=	$id + 0;
$r	=	$db->query("SELECT * FROM tgp_product WHERE id = $id");
if ($db->num_rows($r) == 0)
	$r = $db->query("SELECT * FROM tgp_product ORDER BY id ASC LIMIT 1");
	
while ($row = $db->fetch($r))
{
?>
<div class="tgp_box">
<h1><span>Sản phẩm &raquo; <?php echo $row["ten"]?></span></h1>
<div class="content">
<div class="clearfix">

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:10px;margin-top:10px;">
<tr>
	<td><font face="Verdana" size="4" color="#333333"><b>&raquo; <?php echo $row["ten"]?></b></font></td>
	<td align="right">
	<select name="txt_product" class="button" style="width:200px;" onChange="var val=this.options[this.selectedIndex].value; if(val!='home') {Forward('/san-pham-xem/'+val+'/the-gioi-phang.html');options[0].selected=true;};">
		<option value="none">Danh sách sản phẩm</option>
		<?php
$r2	=	$db->select("tgp_product","cat = '".$row["cat"]."' and hien_thi = 1","order by ten asc");
			while ($row2 = $db->fetch($r2))
			{
			?>
			<option value="<?php echo $row2["id"]?>"><?php echo $row2["ten".$_fix]?></option>
			<?php
			}
		?>
	</select></td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:5px;margin-bottom:5px;">
<tr>
	<td width="35%" valign="top">
	<a href="<?php echo $liveSite;?>/uploads/product/<?php echo $row["hinh"]?>" class="highslide" onclick="return hs.expand(this)">
		<img src="<?php echo $liveSite;?>/uploads/product/<?php echo $row["hinh"]?>" BORDER="0" width="200" STYLE="padding:1px;border:solid 1px #CCCCCC;" />
	</a>
	<div class="highslide-caption">
		<font color="#0B0000"><?php echo $row["ten"]?></font>
	</div>
	</td>
	<td width="65%" style="padding-left:5px;" align="left" valign="top">
		<?php echo nl2br($row["chu_thich".$_fix])?>		
	</td>
</tr>
</table>
<?php
if ($row["noi_dung"] != "<br />")
{
?>
<b>Chi tiết sản phẩm : </b><br /><br />
<div class="clearfix" style="text-align:justify;clear:both;">
<?php echo $row["noi_dung"]?>
</div>
<?php
}
?>
</div>
</div>
</div>
<?php
}
?>
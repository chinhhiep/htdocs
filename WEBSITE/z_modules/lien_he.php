<div class="tgp_box">
	<h1><span><?php echo $lang['MENU_CONTACT_US']; ?></span></h1>
	<div class="content">
		<?php echo get_page("lien_he")?>
	</div>
</div>
<div class="tgp_box">
	<h1><span><?php echo $lang['MENU_CONTACT_WITH']; ?></span></h1>
	<div class="content">
<script>
function CheckForm ()
{
	if (document.frmContact.txtName.value == ''){
		 alert(<?php echo $lang['MENU_NAME']; ?>);
		 document.frmContact.txtName.focus();
		 return false;
		}
	email=document.frmContact.txtEmail.value
	if (!email.match(/^([-\d\w][-.\d\w]*)?[-\d\w]@([-\w\d]+\.)+[a-zA-Z]{2,6}$/)){
		alert('Địa chỉ email không hợp lệ.');
		document.frmContact.txtEmail.focus();
		return false;
	}
	if (document.frmContact.txtSubject.value == ''){
		alert('Bạn chưa nhập chủ đề.');
		document.frmContact.txtSubject.focus();
		return false;
	}
	if (document.frmContact.txtContent.value == ''){
		alert('Bạn chưa nhập nội dung.');
		document.frmContact.txtContent.focus();
		return false;
	 }
	return true;
}
</script>
<?php
if (!empty($func))
{
	if (empty($txtEmail)) 	$txtEmail = "";
	if (empty($txtName)) 	$txtName = "";
	if (empty($txtSubject)) $txtSubject = "";
	if (empty($txtContent)) $txtContent = "";

	if ($func=='send')
	{
		$CHECK = TRUE;
		if (!ereg("[A-Za-z0-9_-]+([\.]{1}[A-Za-z0-9_-]+)*@[A-Za-z0-9-]+([\.]{1}[A-Za-z0-9-]+)+", $txtEmail)) {
			$CHECK=FALSE;
			$thongbao = "Email của bạn không hợp lệ !";
		}
		else if (empty($txtName)){
			$CHECK=FALSE;
			$thongbao = "Vui lòng nhập tên của bạn";
		}
		else if (empty($txtSubject)){
			$CHECK=FALSE;
			$thongbao = "Bạn chưa nhập Chủ đề\n";
		}
		else if (empty($txtContent)){
			$CHECK=FALSE;
			$thongbao = "Bạn chưa nhập nội dung\n";
		}
		
		if ($CHECK){
			$send_tieude = "Thư liên hệ từ website www.tantruongtoan.com";
			
			$OK = gui_mail($txtName."<".$txtEmail.">","hiepnc.it@gmail.com",$send_tieude,$txtContent);
			if ($OK == true) $thongbao = "<b>Đã gởi thành công thư liên hệ của bạn</b>";
			else $thongbao = "Không thể gởi email của bạn vì có một vài lỗi từ phía máy chủ.";
		}
	}
}
?>
<form name="frmContact" onsubmit="return CheckForm();" method="post" action="/lien-he/the-gioi-phang.html">
<input type="hidden" name="func" value="send" />
<center>
			  <table border="0" style="border-collapse: collapse;" width="95%" cellpadding="5" cellspacing="0">
				<tr>
				 <td colspan="2" align="left"><?php echo !empty($thongbao)?"<div class=error style='height:16px;font-weight:bold;'>".$thongbao."</div><br />":""?></td>
				</tr>
				<tr>
				 <td colspan="2" align="left"><strong>XIN VUI LÒNG LIÊN HỆ VỚI CHÚNG TÔI THEO ĐỊA CHỈ SAU</strong></td>
				</tr>
				<tr> 
				  <td width="30%"><div align="left">Họ và tên:</div></td>
				  <td width="70%" align="left" style="padding:1px;"> <input type="text" name="txtName" size="50" class="inputbox" maxlength="100" style="width:75%">
				  (*)</td>
				</tr>
				<tr> 
				  <td><div align="left">Địa chỉ:</div></td>
				  <td align="left" style="padding:1px;"> <input type="text" name="txtAddress" size="50" class="inputbox" maxlength="50" style="width:75%"></td>
				</tr>
				<tr> 
				  <td><div align="left">Điên thoại:</div></td>
				  <td align="left" style="padding:1px;"> <input type="text" name="txtTel" size="50" class="inputbox" maxlength="20" style="width:75%"></td>
				</tr>
				<tr> 
				  <td><div align="left">E-mail:</div></td>
				  <td align="left" style="padding:1px;"> <input type="text" name="txtEmail" size="50" class="inputbox" maxlength="50" style="width:75%">
				  (*)</td>
				</tr>
				<tr> 
				  <td><div align="left">Chủ đề:</div></td>
				
				  <td align="left" style="padding:1px;"> <input type="text" name="txtSubject" size="50" class="inputbox" maxlength="200" style="width:75%">
				  (*)</td>
				</tr>
				<tr> 
				  <td><div align="left"> Nội dung :</div></td>
				  <td align="left" style="padding:1px;"> <textarea rows="5" name="txtContent" cols="32" class="inputbox" style="width:75%;" ></textarea>
				  (*)</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td ><div align="left">
					<input type="submit" value="   Gửi   " name="btnSend" class="button" style="width:20%"> 
					&nbsp; 
					<input type="reset" value="Viết lại" name="btnReset" class="button" style="width:20%">
				  </div></td>
				</tr>
			  </table>
</center>
</form>
	</div>
</div>
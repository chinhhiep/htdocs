<font size="2" face="Tahoma"><b>Tin tức <img src="images/bl3.gif" border="0" /> Sửa bài viết</b></font>
<hr size="1" color="#cadadd" />
<?php
	include "templates/cms.php";
	if (empty($func)) $func = "";
?>
<center>
<?php
	//	Kiểm tra sự tồn tại của ID
	
	$id = $id + 0;
	$r	= $db->select("tgp_cms","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại bài viết này.","?act=cms_manager");
	
	$max_file_size	=	2048000;
	$up_dir			=	"../uploads/cms/";

	$OK = false;

	if ($func == "update")
	{
		if (empty($txt_ten))
			$error = "Vui lòng nhập tên bài viết.";
		else if (empty($txt_chu_thich))
			$error = "Vui lòng nhập sơ lược bài viết.";
		else if (empty($txt_noi_dung))
			$error = "Vui lòng nhập nội dung bài viết.";
		else
		{
			// kiểm tra file uploads.
			$file_type = $HTTP_POST_FILES['txt_hinh']['type'];
			$file_name = $HTTP_POST_FILES['txt_hinh']['name'];
			$file_size = $HTTP_POST_FILES['txt_hinh']['size'];
			switch ($file_type)
			{
				case "image/pjpeg"	: $file_type = "jpg"; break;
				case "image/jpeg"	: $file_type = "jpg"; break;
				case "image/gif" 	: $file_type = "gif"; break;
				case "image/x-png" 	: $file_type = "png"; break;
				default : $file_type = "unk"; break;
			}
			$file_full_name = "tmp_".time().".".$file_type;
			if ( ($file_size > 0) && ($file_size <= $max_file_size) )
				if ($file_type != "unk")
						if ( @move_uploaded_file($HTTP_POST_FILES['txt_hinh']['tmp_name'],$up_dir.$file_full_name) )
						{
							$OK = true;
							$hinh = true;
						}
						else
							$error = "Không thể upload hình ảnh.";
				else
				{
					$error = "Sai định dạng file - Không thể upload hình ảnh.";
				}
			else
			{
				if ($file_size == 0)
				{
					$OK		= true;
					$hinh	= false;
				}
				else
					$error = "Hình của bạn chọn vượt quá kích thước cho phép.";
			}
			// Process xong
			if ($OK)
			{
				$db->query("update tgp_cms set cat = '".$db->escape($txt_cat)."', ten = '".$db->escape($txt_ten)."', chu_thich = '".$txt_chu_thich."', hinh_note = '".$db->escape($txt_hinh_note)."', noi_dung = '".$txt_noi_dung."', hien_thi = '".($txt_hien_thi+0)."', noi_bat = '".($txt_noi_bat+0)."' where id = '".$id."'");
				if ($hinh)
				{
					$txt_hinh_2	= $id.".".$file_type;
					img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_2,"w=220&h=160");
					$db->update("tgp_cms","hinh",$txt_hinh_2,"id = '".$id."'");
				}
				admin_load("Đã cập nhật thành công.","?act=cms_list&id=".($txt_cat+0));
			}			
		}
	}
	else
	{
		$r	= $db->select("tgp_cms","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_cat		= $row["cat"];
			$txt_ten		= $row["ten"];
			$txt_chu_thich	= $row["chu_thich"];
			$txt_hinh_note	= $row["hinh_note"];
			$txt_noi_dung	= $row["noi_dung"];
			$txt_hien_thi	= $row["hien_thi"];
			$txt_noi_bat	= $row["noi_bat"];
		}
	}
	
	if (!$OK)
		template_edit("?act=cms_edit","update",$id,$txt_cat,$txt_ten,$txt_chu_thich,$txt_hinh,$txt_hinh_note,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$error)
?>
</center>
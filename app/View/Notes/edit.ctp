<h2>Chỉnh sửa nội dung ghi chú</h2>
<br />

<form action="" method="post" name="editForm" id="editForm" >
<div style="padding: 10px;">
<label style="font-weight: bold;font-size: medium;">Tiêu đề:</label>
<br><br>
<input type="text" name="title" id="title" value="<?php echo $note['Note']['title']; ?>" />
<br><br>
<label style="font-weight: bold;font-size: medium;">Nội dung ghi chú:</label> <br>
<textarea name="content" id="content" rows="8"><?php echo $note['Note']['content']; ?></textarea>
<br><br>
<label style="font-weight: bold;font-size: medium;">Ngày tạo:</label> <br>
<input type="text" name="created" id="created" value="<?php echo $note['Note']['created']; ?>" size="12" /> <br>
<br><br>
<input type="submit" name="editBtn" id="editBtn" value="Lưu nội dung" />
</div>
</form>

<div style="margin-top: 10px;">
<?php echo $this->Html->link('Quay trở về trang trước' , '/notes/view/' . $note['Note']['id'] , array('target' => '_self')); ?>
</div>
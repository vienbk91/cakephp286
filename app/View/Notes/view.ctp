<script>
function editNote() {
	if (confirm('Bạn có muốn chỉnh chửa nội dung ghi chú ?')) {
		return true;
	} else {
		return false;
	}
}

function deleteNote() {
	if (confirm('Bạn có xóa ghi chú này hay không ?')) {
		return true;
	} else {
		return false;
	} 
}
</script>

<h2><?php echo $note['Note']['title']; ?></h2>
<br /><br />
<div style="padding-left: 10px;">
<?php echo str_replace("\n" , '<br>' , $note['Note']['content']); ?>
</div>

<div style="font-size: small;margin-top: 10px;">
Ngày tạo: <?php echo $note['Note']['created']; ?> <br />
Ngày chỉnh sửa: <?php echo $note['Note']['modified']; ?>
</div>

<div style="margin-top: 20px;">
<?php echo $this->Html->link('Quay lại trang chủ' , '/notes/' , array('target' => '_self')); ?> 
&nbsp;&nbsp;| &nbsp;&nbsp;
<?php echo $this->Html->link(
		'Chỉnh sửa nội dung ghi chú' , 
		'/notes/edit/' . $note['Note']['id'] , 
		array(
				'target' => '_self' , 
				'onclick' => 'return editNote();'
		)); ?>
&nbsp;&nbsp;| &nbsp;&nbsp;
<?php echo $this->Html->link('Xóa ghi chú' , '/notes/delete/' . $note['Note']['id'] , array(
		'onclick' => 'return deleteNote();'
)); ?>
</div>
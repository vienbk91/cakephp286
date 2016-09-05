<script>
function addNewNote() {
	if (confirm('Bạn có muốn tạo thêm ghi chú mới ?')) {
		return true;
	} else {
		return false;
	}
}
</script>

<h2>Danh sách ghi chú</h2>
<div>
<?php 
foreach ($notes as $item):
?>
<ul>
<li>
<?php
    echo $this->Html->link($item['Note']['title'] , '/notes/view/' . $item['Note']['id'] , array('target' => '_blank'));
?>
</li>  
</ul>
<?php 
endforeach;
?>
</div>
<div style="margin-top: 20px;" id="addNote">
<?php echo $this->Html->link('>> Thêm ghi chú mới' , '/notes/add/' , array(
		'target' => '_self' , 
		'onclick' => 'return addNewNote();'
)); ?>
</div>
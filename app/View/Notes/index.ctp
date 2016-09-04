<h2>Danh sách ghi chú</h2>

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
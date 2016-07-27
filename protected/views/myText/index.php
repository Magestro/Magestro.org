<?php
/* @var $this MyTextController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'My Texts',
);

$this->menu=array(
	array('label'=>'Create MyText', 'url'=>array('create')),
	array('label'=>'Manage MyText', 'url'=>array('admin')),
);
?>
	
	<h1>My Texts</h1>
	
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>

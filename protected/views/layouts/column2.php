<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

		<?php echo $content; ?>

<div >

	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
</div>
<?php $this->endContent(); ?>
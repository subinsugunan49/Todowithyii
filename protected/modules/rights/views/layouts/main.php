<?php $this->beginContent(Rights::module()->appLayout); ?>
<style>
.row{
	     margin-left:0px !important; 
}
</style>
<div id="rights" class="container">

	<div id="content">

		<?php if( $this->id!=='install' ): ?>

			<div id="menu">

				<?php $this->renderPartial('/_menu'); ?>

			</div>

		<?php endif; ?>

		<?php //$this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>

	</div><!-- content -->

</div>

<?php $this->endContent(); ?>
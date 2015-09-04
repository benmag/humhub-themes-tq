<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */
?>

<style>
.vote_control .btn-xs:nth-child(1) {
    margin-bottom:3px;
}

.qanda-panel {
    margin-top:57px;
}

.qanda-header-tabs {
    margin-top:-49px;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-9">
        	<div class="row">
            	<div class="col-xs-12">
        			<div class="qa-circle-bg community-bg"><span class="icon icon-qanda"></span></div>
        			<h1 class="qa-h1">Your Public Community Q&amp;A</h1>
                </div>
            </div>
            <div class="panel panel-default qanda-panel">
                <?php $this->renderPartial('../partials/top_menu_bar'); ?>
                <div class="panel-body">

				<?php 
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
				)); 
				?>


                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Related</strong> Questions</div>
                <div class="list-group">
                    <a class="list-group-item" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    <a class="list-group-item" href="#">Nunc pharetra blandit sapien, et tempor nisi.</a>
                    <a class="list-group-item" href="#">Duis finibus venenatis commodo. </a>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<!-- end: show content -->

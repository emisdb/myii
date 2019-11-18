<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
        array('label'=>'Create Issue', 'url'=>array('issue/create','pid'=>$model->id)),
);
?>

<h1>View Project #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'cssFile'=>Yii::app()->request->baseUrl.'/css/detail_view.css',
	'attributes'=>array(
		'name',
		'description',
               array(
                'name'=>'state',
                'value'=>CHtml::encode($model->getStateText())
                ),
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
<br />
<h1>Project Issues</h1>	
<?php
	$arr=$model->getIssueDiagram();
//	var_dump($arr);
?>
<div id="xsvg">
<?php
	global $discs;
	$discs=array();
	function descriptions($arr) {
		global $discs;
		$discs[]=$arr;	
	}

	function drawIssue($arr,$x,$y) {
		$off=$x*200;
		$ii=0;
     foreach ($arr as $issue) {
		$lev=$ii*50;
		descriptions(array($issue['id'],$issue['description']));
		echo '<rect id="task'.$issue['id'].'" x="'.($off+30).'" y="'.($y+$lev+10).'" width="180" height="40"'
				. ' style="fill:#8f8; stroke-width:2; stroke:#454;"';
		echo ' onmouseover="evt.target.setAttribute(\'opacity\',0.5);ShowTooltip(evt,\''.$issue['id'].'\');"';
		echo ' onmouseout="evt.target.setAttribute(\'opacity\',1);HideTooltip(\''.$issue['id'].'\');"'. ' />';
		echo "\n";
		echo '<a xlink:href="'.$issue['link'].'" >'; 
		echo '<text x="'.($off+35).'" y="'.($y+$lev+25).'" style="fill:#000;font-weight:bold;">'.$issue['name'].'</text>';
		echo '<text x="'.($off+45).'" y="'.($y+$lev+45).'" style="fill:#000;">:'.$issue['type'].' : '.$issue['status'].'</text>';
		echo '</a>';
		if($issue["items"]){
			drawIssue($issue["items"],$x+1,$lev);
		}
		$ii++;
	 }
	}
//	'.$issue['description'].'
	 $height=count($arr);
?>
	<svg viewBox="0 0 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
		 width="750" height="<?php echo $height*60 ?>" 
		style="border: #000 dotted thin; background-color: #fff;" onload="init(evt)">
		   <style>
			.tooltip{
				font-size: 12px;
			}
			</style>
		<script type="text/ecmascript">
	   <![CDATA[
	   function init(evt)
	   {
		   if ( window.svgDocument == null ) {
			   svgDocument = evt.target.ownerDocument;
		   }
			
			tooltip_bg = svgDocument.getElementById('tooltip_bg');
		}
		function ShowTooltip(evt, id){
			tid='disc'+id;
			tooltip = svgDocument.getElementById(tid);
			length=tooltip.getComputedTextLength();
			x_show=parseInt(evt.target.getAttribute("x"))+parseInt(evt.target.getAttribute("width"))+3;
			y_show=parseInt(evt.target.getAttribute("y"))+10;
			tooltip_bg.setAttributeNS(null,"x",x_show);
			tooltip_bg.setAttributeNS(null,"y",y_show);
			tooltip_bg.setAttributeNS(null,"width",length+8);
			tooltip.setAttributeNS(null,"x",x_show+5);
			tooltip.setAttributeNS(null,"y",y_show+12);
			tooltip_bg.setAttributeNS(null,"visibility","visible");
			tooltip.setAttributeNS(null,"visibility","visible");
		}
		function HideTooltip(id){
			tid='disc'+id;
			tooltip = svgDocument.getElementById(tid);
			tooltip_bg.setAttributeNS(null,"visibility","hidden");
			tooltip.setAttributeNS(null,"visibility","hidden");
		}

	   ]]>
	   </script>	
		 <?php	   drawIssue($arr,0,0);   ?>
	   <rect class="tooltip_bg" id="tooltip_bg" style="fill:#ff0;stroke:#000; stroke-width:1;" x="0" y="0" rx="4" ry="4" width="52" height="16" visibility="hidden"/>
	    <?php	  
     foreach ($discs as $issue) {
		 echo ' <text class="tooltip" id="disc'.$issue[0].'" x="0" y="0" visibility="hidden">'.$issue[1].'</text>';
	 }
		
		?>

	</svg>
		 <?php var_dump($discs);   ?>
</div>

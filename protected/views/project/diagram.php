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
	var_dump($arr);
?>
<div id="xsvg">
<?php
	function drawIssue($arr,$x,$y) {
		$off=$x*200;
		$ii=0;
     foreach ($arr as $issue) {
		$lev=$ii*50;
		echo '<rect id="task'.$issue['id'].'" x="'.($off+30).'" y="'.($y+$lev+10).'" width="180" height="40"'
				. ' style="fill:#8f8; stroke-width:2; stroke:#454;"';
		echo ' onmouseover="evt.target.setAttribute(\'opacity\',0.5);ShowTooltip(evt,\'cho\');"';
		echo ' onmouseout="evt.target.setAttribute(\'opacity\',1);HideTooltip();"'. ' />';
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
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
			tooltip = svgDocument.getElementById('tooltip');
			tooltip_bg = svgDocument.getElementById('tooltip_bg');
		}
		function ShowTooltip(evt, mouseovertext){
			tooltip.setAttributeNS(null,"x",evt.clientX-8);
			tooltip.setAttributeNS(null,"y",evt.clientY-5);
			tooltip.firstChild.data = mouseovertext;
			tooltip.setAttributeNS(null,"visibility","visible");
		}
		function HideTooltip(){
			tooltip.setAttributeNS(null,"visibility","hidden");
		}

	   ]]>
	   </script>	
		 <?php	   drawIssue($arr,0,0);   ?>
	   <rect class="tooltip_bg" id="tooltip_bg" x="0" y="0" rx="4" ry="4" width="52" height="16" visibility="hidden"/>
	   <text class="tooltip" id="tooltip" x="0" y="0" visibility="hidden">Tooltip</text>
	</svg>

</div>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onload="init(evt)" width="380" height="100">

  <style>
    .tooltip{
	font-size: 12px;
    }
    .caption{
	font-size: 14px;
	font-family: Georgia, serif;
    }
  </style>

  <script type="text/ecmascript">
    <![CDATA[

	function init(evt)
	{
	    if ( window.svgDocument == null )
	    {
		svgDocument = evt.target.ownerDocument;
	    }

	    tooltip = svgDocument.getElementById('tooltip');
	}

	function ShowTooltip(evt, mouseovertext)
	{
	    tooltip.setAttributeNS(null,"x",evt.clientX+11);
	    tooltip.setAttributeNS(null,"y",evt.clientY+27);
	    tooltip.firstChild.data = mouseovertext;
	    tooltip.setAttributeNS(null,"visibility","visible");
	}

	function HideTooltip(evt)
	{
	    tooltip.setAttributeNS(null,"visibility","hidden");
	}

    ]]>
  </script>

  <text class="caption" x="10" y="35">Mouseover a square</text>
  <text class="caption" x="10" y="50">to display a tooltip</text>

  <rect id="rect1" x="160" y="10" width="60" height="60" fill="blue"
   onmousemove="ShowTooltip(evt, 'Left box')"
    onmouseout="HideTooltip(evt)"/>

  <rect id="rect2" x="240" y="10" width="60" height="60" fill="green"
   onmousemove="ShowTooltip(evt, 'Right box')"
    onmouseout="HideTooltip(evt)"/>

  <text class="tooltip" id="tooltip"
        x="0" y="0" visibility="hidden">Tooltip</text>
</svg>
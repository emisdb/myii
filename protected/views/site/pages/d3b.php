    <?php
	Yii::app()->clientScript->registerScriptFile("https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"); 
	$this->pageTitle="ds sample";
	?>
<h1>D3.JS Experiments</h1>
<div id="xsvg">
<svg id="svg_canvas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 width="380" height="100">

  <style>
    .tooltip{
	font-size: 12px;
    }
    .caption{
	font-size: 14px;
	font-family: Georgia, serif;
    }
  </style>


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
</div>
<script type="text/javascript">
	var svg=document.getElementById("svg_canvas");
</script>
	

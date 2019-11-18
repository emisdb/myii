    <?php
	Yii::app()->clientScript->registerScriptFile("https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"); 
	$this->pageTitle="ds sample";
	?>
<h1>D3.JS Experiments</h1>
<div style="height: 200px;"></div>
<div id="xsvg">
 <?php echo '<?xml version="1.0" encoding="UTF-8" standalone="no"'; ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onload="init(evt)" width="380" height="300">

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
		svgDoc = evt.target.ownerDocument;
	    }

	    tooltip = svgDoc.getElementById('tooltip');
	}

	function ShowTooltip(evt, mouseovertext)
	{
	    tooltip.setAttributeNS(null,"x",evt.clientX-10);
	    tooltip.setAttributeNS(null,"y",evt.clientY-10);
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
</div>
	

    <?php
	Yii::app()->clientScript->registerScriptFile("https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"); 
	$this->pageTitle="ds sample";
	?>
<h1>D3.JS Experiments</h1>
<div id="xsvg">
    <svg width="550" height="300" style="border: #000 dotted thin; background-color: #fff;">
	<line x1="0" y1="0" x2="550" y2="300" style="stroke:#8f0; stroke-width:3;"  />
		<circle ondblclick="alert('what the fuck!')" 
				cx="50" cy="50" r="75" style="fill:#bbb;stroke:#088;stroke-width:3;fill-opacity:0.9;"  />
		<rect x="130" y="80" width="80" height="80" rx="3" ry="10" style="fill:#f0f; stroke-width:3; stroke:#454;fill-opacity:0.2; stroke-opacity:0.9;" />
		<ellipse cx="280" cy="60" rx="60" ry="35" style="fill:#68f; stroke-width:3;stroke:#f86;" />
		<a xlink:href="<?php echo(Yii::app()->request->baseUrl."/index.php?r=project/admin");?>"> 
		<polygon points="40,200 80,200 100,250 20,250" style="fill:-webkit-linear-gradient(bottom ,#363 0%,#4a4 100%) repeat scroll 0 0 transparent;" />
		</a>
		<text x="60" y="250" fill="#fff">We do what we think</text>
   </svg>
 </div>
<p>
	<object width="380" height="100" data="<?php echo Yii::app()->request->baseUrl.'/images/tooltip_final_0.svg' ?>" type="image/svg+xml">
		
	</object></p>
 <?php echo '<?xml version="1.0" encoding="UTF-8" standalone="no"'; ?>
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
		svgDoc = evt.target.ownerDocument;
	    }

	    tooltip = svgDoc.getElementById('tooltip');
	}

	function ShowTooltip(evt, mouseovertext)
	{
		alert("go");
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
<script type="text/javascript">
	d3.select("#xsvg").append("p").text("Games with svg")
</script>
	

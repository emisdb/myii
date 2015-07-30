
 <div class="container-fluid" style="margin:50px">
     <div class="row">
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
         <div class="col-md-2 hidden-sm" style="height:500px;background-color: #8f8f8f">
  Theme: "<?php print_r(Yii::app()->theme); ?>"
  
    </div>
     <div class="col-md-4 col-sm-5 col-md-offset-1" style="background-color: #C9E0ED;">
 This is the view content for action "<?php echo $this->action->id; ?>".
        
     </div>
    <div class="col-md-4 col-sm-6 col-md-offset-1 col-sm-offset-1" style="background-color: #f7e1b5;">
 The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
   
    </div>
  </div>
 </div>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>
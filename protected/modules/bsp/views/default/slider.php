<div class="carousel slide" id="carousel">
    <ol class="carousel-indicators" style="background-color: #8f8f8f;">
        <li class="active" data-target="#carousel" data-slide-to="0"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_00.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8 col-lg-5 col-lg-offset-7 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/about_0'); ?>
            </div>
             <div class="col-xs-1">
            </div>

        </div>
        </div>
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/cent_upr_pred.png'); ?>
            <div class="carousel-caption">
                 <div class="container-fluid">
                 <div class="row">
                <div class="col-md-5 col-lg-4 col-md-offset-6 col-lg-offset-8 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/about_0_1'); ?>
            </div>
               <div class="col-md-1 col-xs-1 col-sm-1" style="background-color: #8f8f8f">
            </div>
          </div>
           </div>

        </div>
        </div>
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_00_01.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-6 hidden-sm col-md-offset-6 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/about_1'); ?>
            </div>    
 
        </div>
        </div>
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_01_enter.png'); ?>
            <div class="carousel-caption">
                 <div class="container-fluid">
                 <div class="row">
               <div class="col-md-5 col-lg-4 col-md-offset-6 col-lg-offset-8 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/about_2'); ?>
            </div>
               <div class="col-md-1 col-xs-1 col-sm-1" style="background-color: #8f8f8f">
            </div>
            </div>
           </div>

        </div>
        </div>
         
    </div>
    <a href="#carousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a href="#carousel"  class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
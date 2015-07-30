<div class="carousel slide" id="carousel">
    <ol class="carousel-indicators" style="background-color: #8f8f8f;">
        <li class="active" data-target="#carousel" data-slide-to="0"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
       <li data-target="#carousel" data-slide-to="4"></li>
     </ol>
    <div class="carousel-inner">
        <div class="item active">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_04_user.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/users_0'); ?>
            </div>

        </div>
        </div>
        <div class="item">
             <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_03_user_new.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-5 col-md-offset-7 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/users_1'); ?>
            </div>
       </div>
        </div>
        <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_02_man.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/users_2'); ?>
            </div>
       </div>
        </div>   
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_05_dep.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/deps_0'); ?>
            </div>
       </div>
        </div>   
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_07_exp_0.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8 col-xs-11 col-sm-11" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/deps_1'); ?>
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
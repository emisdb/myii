<div class="carousel slide" id="carousel">
    <ol class="carousel-indicators" style="background-color: #8f8f8f;">
        <li class="active" data-target="#carousel" data-slide-to="0"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
       <li data-target="#carousel" data-slide-to="4"></li>
      <li data-target="#carousel" data-slide-to="5"></li>
      <li data-target="#carousel" data-slide-to="6"></li>
      <li data-target="#carousel" data-slide-to="7"></li>
      <li data-target="#carousel" data-slide-to="8"></li>
     </ol>
    <div class="carousel-inner">
        <div class="item active">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_07_exp_0.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-5 col-md-offset-7" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/exps_0'); ?>
            </div>

        </div>
        </div>
        <div class="item">
             <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_07_exp_0.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/exps_1'); ?>
            </div>
       </div>
        </div>
        <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_08_exp_man.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/exps_2'); ?>
            </div>
       </div>
        </div>   
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_06_exp_use.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/exps_3'); ?>
            </div>
       </div>
        </div>   
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_09_exp_new.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/exps_4'); ?>
            </div>
       </div>
        </div>   
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_12_load.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/exps_5'); ?>
            </div>
       </div>
        </div> 
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_11_pays.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/pay_0'); ?>
            </div>
       </div>
        </div> 
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_12_pay_new.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/pay_1'); ?>
            </div>
       </div>
        </div>  
         <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_10_pay.png'); ?>
            <div class="carousel-caption">
                <div class="col-md-4 col-md-offset-8" style="background-color: #8f8f8f">
               <?php  echo $this->renderPartial('pages/pay_2'); ?>
            </div>
       </div>
        </div>      </div>
        <a href="#carousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a href="#carousel"  class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
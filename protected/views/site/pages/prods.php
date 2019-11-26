    <?php
	$css=Yii::app()->request->baseUrl."/css/grid-accordion.css";
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile($css);
	$css=Yii::app()->request->baseUrl."/css/grid-accordion-example.css";
	$cs->registerCssFile($css);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/jquery-1.4.2.min.js"); 
//        Yii::app()->getClientScript()->registerCoreScript('jquery',CClientScript::POS_HEAD); 
 	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.gridAccordion.min.js'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/prods.js'); 

	$this->pageTitle=Yii::app()->name . ' - продукты';
 

	?>
<div class="canvas_center"><!-- -->      
		<ul class="accordion">
                <li>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/paysys_inter.png '); ?>
                    <div class="caption" style="width:300px;height:100px;">
                    <?php echo CHtml::link('Paysys: Он-лайн программа учета заказов и их оплат.',array('/bsp','id'=>'slider')); ?>
                       
                     </div>
                </li>
                  <li>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/paysys.png '); ?>
                   <div class="caption">

                          <?php echo CHtml::link('Он-лайн документы',array('/bsp','id'=>'slider')); ?>
        <br/>Функции системы:<ul>
                           <li>Журнал типовых документов:
                           <ol>
                               <li>Счета</li>
                               <li>Оплаты</li>
                               <li>Отгрузки</li>
                           </ol></li>
                           <li>Справочники:
                           <ol>
                               <li>Своих юридических лиц</li>
                               <li>Клиентов</li>
                               <li>Номенклатуры</li>
                           </ol></li>
                        <li>Выписка типовых печатных форм:
                              <ol>
                               <li>Форма Счета</li>
                               <li>Форма накладной ТОРГ-12</li>
                               <li>Форма Счета-фактуры ПРФ-1137</li>
                           </ol></li>

                           </ul>
                             
                   </div>
                </li>
                 <li>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/map_inter.png '); ?>
                    <div class="caption">
                               Интернет приложение, обеспечивающее совместную работу баз данных и карт Яндекс Map и Google Map.
                    </div>
                </li>     
                <li>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/logistic.png '); ?>
                    <div class="caption">
                   Модуль для логистического планирования и выписки транспортной накладной для 1С Управление торговлей
                  </div>
                </li> 

                <li>
             <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/cent_upr_pred_txt.png'); ?>
                    <div class="caption">
                        Интернет-системы для ведения совместного удаленного реестра документов
                    </div>
                </li>
                <li>
                  <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/sellnet.png'); ?>
                    <div class="caption">Налаживание системы работы сети магазинов
                        <ul>
                           <li>Настройка системы учета удаленных участков: склада, офиса, торговых точек</li>
                           <li>Оборудование и настройка работы на рабочих местах торговых точек</li>
                           <li>Обеспечение оперативного обмена данных между всеми участками</li>
                          <li>Отработка процедур полного цикла документооборота</li>

                           </ul>
                    </div>
                </li>
                 <li>
                <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/academ.png'); ?>
                      <div class="caption">Интеграция различных систем предприятия с веб-приложением
                    </div>
              </li>
                <li>
               <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/lk.png'); ?>
                      <div class="caption">Создание систем индивидуальной работы с клиентами.
						  Обеспечение личного кабинета для клиентов компании. 
                    </div>
                </li>
                 <li>
               <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/digital.png'); ?>
                      <div class="caption">Цифровизация предприятия
                   </div>
                </li>
                  <li>
               <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/dig_it.png'); ?>
                      <div class="caption" style="width:300px;height:200px;top:5px;">Обеспечение перехода предприятия на цифровую систему управления. 
                         <ul>
                           <li>Создание интернет-системы торговли и обслуживания клинетов</li>
                           <li>Обеспечение работы предприятия в режиме цифровой системы</li>
                           <li>Обеспечение оперативного обмена данными между всеми участками</li>
                          <li>Выработка системы оперативного контроля предприятием</li>

                           </ul>
                   </div>
                </li>
                <li>
              <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/online.png'); ?>
                      <div class="caption">Система онлайн бронирования.
                   </div>
                        </li>
                 <li>
               <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/rule.jpg'); ?>
                      <div class="caption">Упрпвление предприятием он-лайн
                   </div>
                </li>
   		</ul>
 	</div><!---->  
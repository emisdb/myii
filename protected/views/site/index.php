    <?php

	Yii::app()->clientScript->registerScriptFile("https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.easing.1.3.js'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/accord.js'); 
	$css=Yii::app()->request->baseUrl."/css/accord.css";
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile($css);
	$this->pageTitle=Yii::app()->name . ' - главная';

	?>

<div class="canvas_center"><!-- -->
	<!-- Start HTML: Accordion Demo #1 -->
	<ul id="accordion1">
		<li class="slide1">
			<div class="slide_handle"><div>Web программирование</div></div>
			<div class="slide_content">
                                 Разработка и внедрение сайтов и web-приложений в сети Интернет :
				<div class="slide_caption">
                                    <ul>
                                        <li>
                                            создание и редакция сайтов на основе CMS Joomla и Wordpress, разработка Joomla компонентов и плагинов
                                        </li>
                                        <li>
                                            разработка сайтов и Web-приложений любой сложности на основе Yii Framework; 
                                           <?php echo CHtml::link('имеется ряд готовых разработок',array('/bsp')); ?> 
                                       </li>
                                        <li>
                                             используется весь набор современных веб-технологий: JQuery, JQuery UI, Ajax, HTML 5, Google Map API, Yandex Map API и проч.
                                        </li>
                                    </ul>
				</div>
			</div>
		</li>
		<li class="slide2">
			<div class="slide_handle"><div>Управление предприятием</div></div>
			<div class="slide_content">Базы данных, Системы учета, Системы управления предприятием
				<div class="slide_caption">
                                   <ul>
                                        <li>
                            Разработка, конфигурирование, внедрение и сопровождение баз данных
                            и программного обеспечения для постановки бухгалтерского, складского и оперативного учета,
                            а также для ведения анализа коммерческой деятельности предприятия.                                          </li>
                                        <li>
                            Создание и обеспечение работоспособности многопользовательской компьютеризированной системы для управления работой торгового, производственного, транспортного предприятия,
                            предприятия сферы услуг.  Налаживание системы работы сети магазинов.
                                        </li>
                                        <li>
                             Разработка системы управления ресурсами предприятия (ERP-системы),
                             системы управления кадрами и оплатой работ, системы ведения взаиморасчетов с клиентами и контрагентами, системы финансового планирования 
                                        </li>
                                        <li>
                            В настоящее время имеется ряд оригинальных разработок систем учета
                            и систем управления предприятием в области транспорта, производства, рекламы, оптовой и розничной торговли. 
                                        </li>
                                    </ul>
				</div>
			</div>
		</li>
		<li class="slide3">
			<div class="slide_handle"><div>Управление оборудованием</div></div>
			<div class="slide_content">Разработка систем управления промышленным и контрольным оборудованием
				<div class="slide_caption">
                                  <ul>
                                        <li>
                                Разработка систем контроля и обеспечения работы оборудования любой сложности и любых производителей.
                                Имеется опыт разработки систем высокой надежности и высокой точности (Системы управления воздушным движением).  
                                        </li>
                                        <li>
                                Имеются разработки на базе ОС QNX систем написанных на C++, в графической оболочке Photon, 
                                с использованием СУБД PostgreSQL, с обменом данными через коммуникационные порты в составе системы 
                                на базе сети промышленных компьютеров.                                          
                                        </li>
                                        <li>
                                Имеются разработки на Visual Basic с обеспечением обменом данных через многопортовые платы, 
                                с использованием СУБД MS SQL Server и Access
                                        </li>
                                    </ul>
				</div>
			</div>
		</li>
		<li class="slide4">
			<div class="slide_handle"><div>1С: Предприятие</div></div>
			<div class="slide_content">
                           <div style="text-shadow: none;">
                               Разработка и модификация элементов конфигураций оперативного и бухгалтерского учета системы 1С:Предприятие
			   </div>
                            <div class="slide_caption">
                       
                                  <ul>
                                        <li>
                                Модификация типовых конфигураций системы учета, дополнение нового функционала, новых элементов (справочников, документов, отчетов)
                                         </li>
                                        <li>
                                 Разработка механизмов переноса данных, систем обмена данными между различными базами данных 1С, а также баз данных и систем учета других производителей.           
                                          </li>
                                          <li>
                                  Большое количество готовых разработок, выделенных в отдельные продукты, обеспечивающих полноценную работу бизнес-процедур предприятий различных сфер деятельности. 
                                         </li>
                                    </ul>
				</div>
			</div>
		</li>
	</ul>
	<!-- End HTML: Accordion Demo #1 -->	
	</div><!---->


<?php
/* @var $this SiteController */

$this->pageTitle='Paysys - Платежи';

?>

<h1>Платежи</h1>
 <p>В реестре счетов видна информация по состоянию оплаты счета.
     В колонке "Оплата" видно </p>
 <ul>
     <li>количество платежей, произведенных по этому счету</li>
     <li>количество платежей, уже полученых заказчиком</li>
     <li>сумма оплаты</li>
 </ul> 
 <p>Кроме того эта колонка интерактивна и по ней можно получить расшифровку во всплывающем окне</p>

<?php 
echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_11_pays.png', 
'Платеж');
?>
 <p>Внести платеж можно оперативно прямо из реестра счетов во всплывающем окне.
     При введении платежа автоматически формируется номер счета-фактуры и накладной по выбранной фирме.
 Эта функция может быть использована для ведения сквозной нумерации документов компаний, которые работают с разными агентами.</p>

<?php 
echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_12_pay_new.png', 
'Новый платеж');
?>
<p>Кроме того имеется реестр платежей, в котором можно управлять заведенными платежами:
редактировать  и удалять их.</p>

<?php 
echo CHtml::image(Yii::app()->request->baseUrl.'/images/readme/scr_10_pay.png', 
'Платежи');
?>

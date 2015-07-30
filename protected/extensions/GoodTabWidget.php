<?php

class GoodTabWidget extends CWidget {

	protected $position;
	protected $lvl;
	protected $_next;
	protected $_par;	
	protected $iters;
	protected $siters;
	protected $rows;
	protected $rowss;

	public $with;
	public $togo;
	public $model;
	public $columns;
	public $next;
	public $par;
	public $pars;
	public $id;
	public $level;
	public $class;
	public $catname;
	public $picname;
	public $cont;
//	public $cont2;
	public $qry;
	
    public function init()
	{
		$css=Yii::app()->request->baseUrl."/css/gtw.css";
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile($css);
		$criteria=new CDbCriteria;
		$criteria->addInCondition($this->par,$this->pars);
		if(!is_null($this->with))
		{
			$criteria->with=$this->with;
		}
		$this->rows=$this->model->findAll($criteria);
		$this->position=0;
		$this->initAdd($criteria);
//		print_r($this->rows);

    }
  protected function initAdd($crit) 
  {
 		$connection=Yii::app()->db; 
		if(!is_null($this->qry))
		{
			for($i=0;$i<sizeof($this->qry);$i++)
			{
				$str=$this->qry[$i]['q']." WHERE ".$crit->condition." ORDER BY ".$this->qry[$i]['o'];	
				$command=$connection->createCommand($str);
				$dataReader=$command->query($crit->params);
				if(!is_null($dataReader))
					$this->rowss[]=$dataReader->readAll();
			}
		}
   }
   
   protected function fetchRowDumb() 
  {
	$ided=false;
	for($ii=0;sizeof($this->rows)>$ii;$ii++)
	{
//		echo ":$ii";
		$this->iters++;
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
	
	} 

	$this->position=$ii;
	return $ided;
  }
   protected function fetchRow() 
  {
	$ided=false;
	for($ii=$this->position;sizeof($this->rows)>$ii;$ii++)
	{
//		echo ":$ii";
		$this->iters++;
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
		
	} 
	if(!$ided)
	{
		for($ii=0;$this->position>$ii;$ii++)
		{
			$this->iters++;
//			echo ":$ii";
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
		} 
	}
	$this->position=$ii;
	return $ided;
  }
  
  /*
  процедура выводит информацию по массиву шаблонов в переменной cont.
  шаблон по следующему формату "буква"+"цифра",
  где буква означает тип данных, выводимый на отображение, а цифра - порядковый номер данных.
  обозначение букв:
  t - текст как он введен в значении шаблона
  v - имя параметра (колонки) основного массива данных (подставляется в строку на текущей итерации)
  q - вызывается функция getQry с параметром из значения шаблона и ключевым значением из текущей строки массива данных. параметр обозначает набор {массив,фильтр, формат}
  a - данные берутся из связанного набора (relation) и далее либо выводятся напрямую, либо (при наличии набора функций q ) обарбатываются в getQry  
  
  
  */
  
  
  protected function getValue($pos,$temp_row,$rowset=-1)
{
	$val=$temp_row['type'];
	if ($rowset<0) $rows=$this->rows;
	else  $rows=$this->rowss[$rowset];
	switch($val)
	{
	case 't':
		return $temp_row['value'];
		break;
	case 'v':
		return $rows[$pos][$temp_row['value']];
		break;
	case 'a':
		return $rows[$pos][$temp_row['relation']][$temp_row['field']];
		break;
	case 'q':
		return $this->getQ($temp_row,$pos);
		break;
	case 'x':
		$where=$this->getValue($pos,$temp_row['where']);
		if($temp_row['how']=='r')
		{
			if($temp_row['src']['type']=='q')
				return $this->getQ($temp_row['src'],$pos,$where,$temp_row['what']['format']);
			elseif($temp_row['src']['type']=='f')
			{
				$stri=array();
				$go=true;
				for($j=0;$j<sizeof($temp_row['src']['format']);$j++)
				{
						$res=$this->getValue($pos,$temp_row['src']['format'][$j]);
						if(strlen($res)>0)
						{
								if(!is_null($temp_row['src']['format'][$j]['condition'])) 
									$stri[]=array('c'=>'*','v'=>$res);
								else $stri[]=array('v'=>$res);
						}
						else
						if($temp_row['src']['format'][$j]['condition']=='x') $go=false;	
						
				}
//				print_r($stri);
				$str="";
				for($j=0;$j<sizeof($stri);$j++) 
				{
					$str.=((!$go)&&(!is_null($stri[$j]['c']))) ? '' : $stri[$j]['v'];  
				}
				$strx="";
				for($j=0;$j<sizeof($temp_row['what']['format']);$j++)
					$strx.=$this->getValue($pos,$temp_row['what']['format'][$j]);
//					echo "\n<br>$strx";
				return str_replace($strx,$str,$where);
			}
			
		}

	}
}
   protected function getQ($temp_row,$pos,$val='',$frmi='') 
{
		$rowss=$this->rowss[$temp_row['q']];
		$fltr=$temp_row['filter'];
		$frm=$temp_row['format'];
		$str="";$strx="";
		$ii=-1;	

		foreach($rowss as $row)
		{
			$ii++;
			if($row[$fltr]==$this->rows[$pos][$this->id]) //очень негибко
			{
				$dnum=sizeof($frm);
				if($dnum>0)
					for($j=0;$j<$dnum;$j++)
								$str.=$this->getValue($ii,$frm[$j],$temp_row['q']);
				if($frmi!=='')
				{
					$dnum=sizeof($frmi);
					if($dnum>0)
					{
						for($j=0;$j<$dnum;$j++)
								$strx.=$this->getValue($ii,$frmi[$j],$temp_row['q']);
						$val=str_replace($strx,$str,$val);
					}
					$str="";$strx="";	
				}
	
			}	
			
		}
		if($frmi!=='') return $val;
		else	return $str;

} 
  protected function displayRow($pos) 
  {
		$strout="";
 		$id=$this->rows[$pos][$this->id];
		$this->siters++;
	
		if ($this->siters%2>0) 	echo "<tr><td class='gtwleft' >";
		else  echo "<td class='gtwright'>";

		for($j=0;$j<sizeof($this->cont);$j++) echo $this->getValue($pos,$this->cont[$j]);

		if ($this->siters%2>0) 	echo "</td>";
		else echo "</td></tr>";
 }
	public function run() 
	{
//		return;
		if (!(sizeof($this->pars)>0)) return;
		$this->_next=null;
		$this->_par=$this->pars[0];
		$this->lvl=0;
		$next=0;
		$par=0;
		$id=0;
		$cal=0;
		$this->siters=0;
		$this->iters=0;
		
		echo ("<table id='gtw'>\n");
		while($cal<1000)
		{
			$cal++;
			if ($this->fetchRow())
			{
				$this->displayRow($this->position);
				$id=$this->rows[$this->position][$this->id];
				$next=$this->rows[$this->position][$this->next];
				$par=$this->rows[$this->position][$this->par];
				$this->_next=$id;
				$this->_par=$par;
			}
			else
			{
				$this->_next=null;
				if ($this->lvl<sizeof($this->pars)-1)
					$this->_par=$this->pars[++$this->lvl];
				else
					break;
	
			}
		}
			if ($this->siters%2>0) 	echo "<td class='gtwright'></td></tr>";
		echo ("</table>\n");

		//		echo "<h1>iters:".$this->iters."</h1>";
     }


}
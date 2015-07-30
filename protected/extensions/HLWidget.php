<?php

class HLWidget extends CWidget {

	private $position;
	private $lvl;
	private $_next;
	private $_par;	
	private $iters;
	private $rows;

	public $togo;
	public $model;
	public $columns;
	public $next;
	public $par;
	public $id;
	public $level;
	public $class;
	
    public function init()
	{
		$criteria=new CDbCriteria;
		if($this->columns!=null)
		{
			$cri="";
			foreach($this->columns as $row)
				if(strlen($row[0])>0) $cri[]=$row[0];
			$criteria->with=$cri;
		}
		$this->rows=$this->model->findAll($criteria);
		$this->position=0;
     }
   
   private function fetchRowDumb() 
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
   private function fetchRow() 
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

  private function displayRow($pos) 
  {
		$strout="";
 		$id=$this->rows[$pos][$this->id];
 		echo("<li><a href='".Yii::app()->request->baseUrl."/index.php?r=".$this->togo."&amp;id=$id'>");
		foreach($this->columns as $col)
		{
			if(strlen($col[0])>0)
				$row=$this->rows[$pos][$col[0]];
			else
				$row=$this->rows[$pos];
				
			if ($row[$col[1]]==null)
					$strout .= " ";
				else
				{
					if ($col[3]=='!')
					{
						if ($col[2]=='img')
							$strout ="<img src=\"".Yii::app()->request->baseUrl.PIC_PATH.$row[$col[1]]."\">";
						else
							$strout =" ".$row[$col[1]]." ";
					}
					else
					{
						if ($col[2]=='img')
							$strout .="<img src=\"".Yii::app()->request->baseUrl.PIC_PATH.$row[$col[1]]."\">";
						else
							$strout .=" ".$row[$col[1]]." ";
					}
				}
		}
		echo ("$strout</a>\n");
 }
	private function runlevel()
{
	$this->lvl++;
	if($this->lvl>$this->level) return;
	$next=0;
	$par=0;
	$id=0;
	$cal=0;
	$class=($this->class==null ? "" : "class=\"".$this->class."\"");
	echo ("<ul $class>\n");
	while($cal<100)
	{
		$cal++;
		$this->displayRow($this->position);
		$id=$this->rows[$this->position][$this->id];
		$next=$this->rows[$this->position][$this->next];
		$par=$this->rows[$this->position][$this->par];
		$this->_next=$id;
		$this->_par=$par;
		if($this->lvl==$this->level)
		{
			if (!$this->fetchRow()) break;			
		}
		else
		{
			$this->_next=null;
			$this->_par=$id;
			if ($this->fetchRow())
			{
				$this->runlevel();
				$this->_next=$id;
				$this->_par=$par;
				if (!$this->fetchRow()) break;
			}			
			else 
			{
				$this->_next=$id;
				$this->_par=$par;
				if (!$this->fetchRow()) break;
			}
		}
		echo "</li>\n";
	}
 	echo ("</ul>\n");
	$this->lvl--;

}	
	
	public function run() 
	{
		$this->_next=null;
		$this->_par=null;
		$this->lvl=0;
		if ($this->fetchRow())	$this->runlevel();
//		echo "<h1>iters:".$this->iters."</h1>";
     }


}
<?php
include "GoodTabWidget.php" ;
class Good2TabWidget extends GoodTabWidget {

	private $xpos;
	public $cont2;
  
    protected function displayTab($pos,$var=0) 
  {

		if($var==0)
				$row=$this->cont;
			else 
				$row=$this->cont2;
			
		for($j=0;$j<sizeof($row);$j++)
			{
				$str="";
				$str=$this->getValue($pos,$row[$j]);
				if($this->siters==1)
				{
					if(!is_null($row[$j][alt]))
					$str=$row[$j][alt];
				}
				echo $str;
			}

	
	}
  
  protected function displayRow($pos) 
  {
		$strout="";
 		$id=$this->rows[$pos][$this->id];
		$this->siters++;
	
		if ($this->siters%2>0) 	echo "<tr><td class='gtwleft' >";
		else  echo "<td class='gtwright'>";
		$this->displayTab($pos);
			if ($this->siters%2>0) 	echo "</td>";
		else
		{
			echo "</td></tr>";
			echo "<tr><td class='gtwleft bottom_td' >";			
			$this->displayTab($this->xpos,1);
			echo "</td>";
			echo "<td class='gtwright bottom_td'>";
			$this->displayTab($pos,1);
			echo "</td></tr>";
		}
 }
	public function run() 
	{
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
				$this->xpos=$this->position;
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
			if ($this->siters%2>0) 
			{
				echo "<td class='gtwright'></td></tr>";
				echo "<tr><td class='gtwleft bottom_td' >";			
				$this->displayTab($this->xpos,1);
				echo "</td>";
				echo "<td class='gtwright bottom_td'>";
				echo "</td></tr>";
			}
		echo ("</table>\n");

		//		echo "<h1>iters:".$this->iters."</h1>";
     }

}
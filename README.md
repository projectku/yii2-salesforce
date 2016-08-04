Sales Schedule for Yii 2
=======================

Sales Force for schedule sales 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ptrnov/yii2-salesforce "*"
```

or add

```
"ptrnov/yii2-salesforce": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \ptrnov\yii2-salesforce\Jadwal::listWeekOfYear() ?>
```

Use \ptrnov\yii2-salesforce\Jadwal;

#INFORMATION WEEK OF YEAR
$ary1=Jadwal::listWeekOfYear();				//current year
print_r($ary1);

$ary2=Jadwal::listWeekOfYear('2016');		//set manual
print_r($ary2);

#GET DATE FROM  YEAR,WEEK AND DAY
$tgl=getDateOfWeekAndDayname($year,$week,$day)	
echo $tgl;

#Example
//$tgl= Jadwal::getDateOfWeekAndDayname('2016','34','1');
//$tgl= Jadwal::getDateOfWeekAndDayname('2016',null,'1');
$tgl= Jadwal::getDateOfWeekAndDayname('2016','34',null);

#listWeekOfYear AND Layer (A,B,C,D)
#A=every week	  (not interlude)
#B=2week of month (interlude=1week) -> default set
#C=2week of month (interlude=2week)
#D=1week of month (interlude=3week)

$arry=listWeekOfYearLayer($year,$layer,$even,$weekActive,$dayInt)
#Example 
	B (default) -odd/ganjil	
		//$ary= Jadwal::listWeekOfYearLayer('2016','B','1');	
		//$ary= Jadwal::listWeekOfYearLayer('2016','B','1',null,'1');		
		$ary= Jadwal::listWeekOfYearLayer('2016','B','1','1','1');		
		print_r(ary);
	
	B (default) -even/genap
		//$ary= Jadwal::listWeekOfYearLayer('2016','B','2');		
		//$ary= Jadwal::listWeekOfYearLayer('2016','B','2',null,'1');		
		$ary= Jadwal::listWeekOfYearLayer('2016','B','2','1','1');		
		print_r(ary);
		
	A	odd/ganjil	
			//$ary= Jadwal::listWeekOfYearLayer('2016','A','1');		
			//$ary= Jadwal::listWeekOfYearLayer('2016','A','1',null,'1');		
			$ary= Jadwal::listWeekOfYearLayer('2016','A','1','1','1');	
			print_r(ary);
	
	A	even/genap
			//$ary= Jadwal::listWeekOfYearLayer('2016','A','2');
			//$ary= Jadwal::listWeekOfYearLayer('2016','A','2',null,'1');		
			$ary= Jadwal::listWeekOfYearLayer('2016','A','2','1','1');	
			print_r(ary);
	
	C	odd/ganjil	
			//$ary= Jadwal::listWeekOfYearLayer('2016','C','1');		
			//$ary= Jadwal::listWeekOfYearLayer('2016','C','1',null,'1');		
			$ary= Jadwal::listWeekOfYearLayer('2016','C','1','1','1');	
			print_r(ary);
	
	C	even/genap
			//$ary= Jadwal::listWeekOfYearLayer('2016','C','2');
			//$ary= Jadwal::listWeekOfYearLayer('2016','C','2',null,'1');		
			$ary= Jadwal::listWeekOfYearLayer('2016','C','2','1','1');	
			print_r(ary);

	D	odd/ganjil	
			//$ary= Jadwal::listWeekOfYearLayer('2016','D','1');		
			//$ary= Jadwal::listWeekOfYearLayer('2016','D','1',null,'1');		
			$ary= Jadwal::listWeekOfYearLayer('2016','D','1','1','1');	
			print_r(ary);
	
	D	even/genap
			//$ary= Jadwal::listWeekOfYearLayer('2016','D','2');
			//$ary= Jadwal::listWeekOfYearLayer('2016','D','2',null,'1');		
			$ary= Jadwal::listWeekOfYearLayer('2016','D','2','1','1');	
			print_r(ary);			
			
	Copy to Controller
	
	Use \ptrnov\yii2-salesforce\Jadwal;
	public function actionTest()
    {
			$ary= Jadwal::listWeekOfYearLayer('2016','A','1');
			//print_r(Jadwal::listWeekOfYearLayer('2016','A','1'));
			return $this->render('_test',[
				'dataArray'=>$ary
			]);
     }		
		
	create file _test.php then write
		<?php 
			print_r(dataArray);
			//ready to foreach
		?>
	
#NEW Function
#getArrayDateCust($year,$layer,$oddeven,$dayInt,$scdlGrp,$custId,$useId)
$ary= Jadwal::getArrayDateCust('2016','C','1','1','scdlGrp','cust.001','66');	

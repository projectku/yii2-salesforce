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

$ary1=Jadwal::listWeekOfYear();				//current year
print_r($ary1);

$ary2=Jadwal::listWeekOfYear('2016');		//set manual
print_r($ary2);

$tgl=getDateOfWeekAndDayname($year,$week,$day)	//get date from ($year,$week,$day)
echo $tgl;





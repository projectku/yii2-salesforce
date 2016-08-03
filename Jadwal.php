<?php
   namespace  ptrnov\salesforce;
   use Yii;
   use yii\helpers\ArrayHelper;
   
   
class Jadwal {
      public static function world() {
         return $currentWeekNumber = date('W');
      }
	  
	  public static function listWeekOfYear() {	
		//$this = new Jadwal();
		//public static function getListWeekOfYear($startOddEven=1) {		  
         $currentWeekNumber = date('W');
		 $ttlWeekOfYear= self::getIsoWeeksInYear();
		 // $result = [];
			// foreach ($array as $element) {
				// $value = static::getValue($element, $key);
				// $result[$value] = $element;
			// }
			$bil_awal = 1;
			while ($bil_awal <= 52) {
				if ($bil_awal % 2 == 0) {
					//echo "Bilangan genap = " . $bil_awal . "<br/>";
					$oddResult[]=$bil_awal;
					$bil_awal++;
				} else {
					//echo "Bilangan ganjil = " . $bil_awal . "<br/>";
					$evenResult[]=$bil_awal;
					$bil_awal++;
				}
			}
			
			$oddCount=count($oddResult);
			$evenCount=count($evenResult);
			$result[]=[					
					'tahun'=>date('Y'),
					'ttlWeek'=> $ttlWeekOfYear,
					'currWeek'=>$currentWeekNumber,
					'countOdd'=>$oddCount,
					'countEven'=>$evenCount,
					'arryOdd'=>$oddResult,
					'arryEvent'=>$evenResult,
			];
			
		return $result;
	}
	  
	private static function getIsoWeeksInYear() {
		$tgl = new \DateTime;
		$tgl->setISODate(date('Y'), 53);
		return ($tgl->format("W") === "53" ? 53 : 52);
	}
}  
?>
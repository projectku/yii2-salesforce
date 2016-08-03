<?php
namespace  ptrnov\salesforce;
use Yii;
use yii\helpers\ArrayHelper;
   
/**
 * Sales Force.
 *
 * Schedule Sales BaseArrayHelper.
 *
 * @author piter Novian <ptr.nov@gmail.com>
 * @since 1.0.0
 */
class Jadwal 
{
	public static function world() {
		return 'Check Sound';
	}

	/**
	 * INFO CURRENT YEAR
	 * @author piter Novian <ptr.nov@gmail.com>
	 * @since 1.0.0
	*/
	public static function listWeekOfYear($year=null) {			//public static function getListWeekOfYear($startOddEven=1) {			  
		$yearVal=$year!=null?$year:date('Y');
		$currentWeekNumber = date('W');							//get current week
		$ttlWeekOfYear= self::getIsoWeeksInYear($yearVal);		//get total week of year
		$bil_awal = 1;
		while ($bil_awal <= $ttlWeekOfYear) {
			if ($bil_awal % 2 == 0) {
				//echo "Bilangan genap = " . $bil_awal . "<br/>";
				$evenResult[]=$bil_awal;
				$bil_awal++;
			} else {
				//echo "Bilangan ganjil = " . $bil_awal . "<br/>";				
				$oddResult[]=$bil_awal;
				$bil_awal++;
			}
		}
		$evenCount=count($evenResult);				//sum array even/genap
		$oddCount=count($oddResult);				//sum array odd/ganjil		
		$result[]=[					
				'tahun'=>$yearVal,					//array Year
				'ttlWeek'=> $ttlWeekOfYear,			//array toral week of year
				'currWeek'=>$currentWeekNumber,		//array current week
				'countOdd'=>$oddCount,				//array week odd of year
				'countEven'=>$evenCount,			//array week even of year
				'arryOdd'=>$oddResult,				//array week odd
				'arryEvent'=>$evenResult,			//array week even
		];
		return $result;
	}
	
	/**
	 * PRIVATE GET TOTAL WeekOfYear
	 * @author piter Novian <ptr.nov@gmail.com>
	 * @since 1.0.0
	*/
	private static function getIsoWeeksInYear($year) {
		$tgl = new \DateTime;
		$tgl->setISODate($year, 53);
		return ($tgl->format("W") === "53" ? 53 : 52);
	}
	
	/**
	 * GET DATE FROM WeekOfYear and DayOfWeek 
	 * @author piter Novian <ptr.nov@gmail.com>
	 * @since 1.0.0
	*/
	public static function getDateOfWeekAndDayname($year,$week,$day) {
		$week_start = new \DateTime();
		$week_start->setISODate($year,$week,$day);
		return $week_start->format('Y-m-d');
	}
	
	
}  
?>
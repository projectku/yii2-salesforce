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
	 * INFO CURRENT YEAR | LAYER (A,B=default,C,D)
	 * @author piter Novian <ptr.nov@gmail.com>
	 * @since 1.0.0
	*/
	public static function listWeekOfYearLayer($year=null,$layer=null,$even='',$weekActive=null,$dayInt=null) { 				  
		$yearVal=$year!=null?$year:date('Y');
		$layerVal=$layer!=null?$layer:'B';
		$ttlWeekOfYear= self::getIsoWeeksInYear($yearVal);			//get total week of year
		$currentWeekNumber = date('W');								//get current week
		$setWeek=$weekActive!=''?$weekActive:$currentWeekNumber;	//get set week or current week		
		$tgl=self::getDateOfWeekAndDayname($yearVal,$setWeek,$dayInt);
		$bil_awal = (int)$even; //1=ganjil; 2=genap
		if ($even!=''){
			if ($even==1){ //GANJIL - ODD				
				if ($layerVal=='B'){
					while ($bil_awal <= $ttlWeekOfYear) {
						if ($bil_awal % 2 != 0) { //GANJIL									
							$aryWeek[]=$bil_awal;
							$bil_awal++;
						}else{
							$bil_awal++;
						}
					};					
				}elseif($layerVal=='A'){ //no interlude
					//ALL Ganjil Dan Genap |odd and even 
					while ($bil_awal <= $ttlWeekOfYear) {
							$aryWeek[]=$bil_awal;
							$bil_awal++;				
					}					
				}elseif($layerVal=='C'){ //3week interlude
					//ALL Ganjil Dan Genap |odd and even
					$i=0;
					while ($bil_awal <= $ttlWeekOfYear) {
						if ($i==0){
							$aryWeek[]=$bil_awal;
							$bil_awal++;
							$i=$i+1;
						}else{
							$bil_awal++;
							if ($i==2){
								$i=0;
							}else{
								$i=$i+1;
							}							
						}
					}					
				}elseif($layerVal=='D'){ //3week interlude
					//ALL Ganjil Dan Genap |odd and even
					$i=0;
					while ($bil_awal <= $ttlWeekOfYear) {
						if ($i==0){
							$aryWeek[]=$bil_awal;
							$bil_awal++;
							$i=$i+1;
						}else{
							$bil_awal++;
							if ($i==3){
								$i=0;
							}else{
								$i=$i+1;
							}							
						}
					}	
				}else{
					$result=0;
				}				
				$weekCount=count($aryWeek);					//sum array even/genap
				$result[]=[					
						'tahun'=>$yearVal,					//array Year
						'ttlWeek'=> $ttlWeekOfYear,			//array toral week of year
						'currWeek'=>$currentWeekNumber,		//array current week
						'countWeek'=>$weekCount,			//array week odd of year							
						'aryWeek'=>$aryWeek,				//array week odd
						'setDate'=>$tgl,					//date current / date set by week and day
				];	
				
			}elseif($even==2){//GENAP -EVEN
				if ($layerVal=='B'){
					while ($bil_awal <= $ttlWeekOfYear) {
						if ($bil_awal % 2 == 0) { //GENAP									
							$aryWeek[]=$bil_awal;
							$bil_awal++;
						}else{
							$bil_awal++;
						}
					}
						
				}elseif($layerVal=='A'){
					//ALL Ganjil Dan Genap |odd and even
					while ($bil_awal <= $ttlWeekOfYear) {
							$aryWeek[]=$bil_awal;
							$bil_awal++;				
					}					
				}elseif($layerVal=='C'){ //3week interlude
					//ALL Ganjil Dan Genap |odd and even
					$i=0;
					while ($bil_awal <= $ttlWeekOfYear) {
						if ($i==0){
							$aryWeek[]=$bil_awal;
							$bil_awal++;
							$i=$i+1;
						}else{
							$bil_awal++;
							if ($i==2){
								$i=0;
							}else{
								$i=$i+1;
							}							
						}
					}
				}elseif($layerVal=='D'){ //3week interlude
					//ALL Ganjil Dan Genap |odd and even
					$i=0;
					while ($bil_awal <= $ttlWeekOfYear) {
						if ($i==0){
							$aryWeek[]=$bil_awal;
							$bil_awal++;
							$i=$i+1;
						}else{
							$bil_awal++;
							if ($i==3){
								$i=0;
							}else{
								$i=$i+1;
							}							
						}
					}	
				}else{
					$result=0;
				}
				$weekCount=count($aryWeek);					//sum array even/genap
				$result[]=[					
						'tahun'=>$yearVal,					//array Year
						'ttlWeek'=> $ttlWeekOfYear,			//array toral week of year
						'currWeek'=>$currentWeekNumber,		//array current week
						'countWeek'=>$weekCount,			//array week odd of year							
						'aryWeek'=>$aryWeek,				//array week odd
						'setDate'=>$tgl,					//date current / date set by week and day
				];	
			}else{
				$result=0;
			}
		}else{
			 $result=0;
		}
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
	public static function getDateOfWeekAndDayname($year,$week=null,$day=null) {
		$currentWeekNumber = date('W');					//current week
		$setWeek=$week!=''?$week:$currentWeekNumber;	//get set week or current week	
		if($day!=null){			
			$week_start = new \DateTime();
			$week_start->setISODate($year,$setWeek,$day);
			return $week_start->format('Y-m-d');
		}else{
			return '0000-00-00';
		}
	}
	
	public static function getArrayDateCust($year=null,$layer=null,$oddeven='',$dayInt=null, $scdlGrp=null,$custId=null,$useId=null){
		$yearVal=$year!=null?$year:date('Y');
		$layerVal=$layer!=null?$layer:'B';
		$ttlWeekOfYear= self::getIsoWeeksInYear($yearVal);			//get total week of year
		$currentWeekNumber = date('W');								//get current week
		$bil_awal = (int)$oddeven; //1=ganjil; 2=genap
		
		$ary=self::listWeekOfYearLayer($yearVal,$layerVal,$bil_awal,$bil_awal,$dayInt);		
		$aryWeekVal=ArrayHelper::getColumn($ary,'aryWeek');		
		if ($oddeven!=''){
			foreach($aryWeekVal[0] as $key){
				// if ($key > 0) {
					// $koma= ',';
				// }else{
					// $koma= '';
				// };
				//$aryData .=$koma.$key;
				$aryDateRslt[]=[
					'scdlGrp'=>$scdlGrp,
					'custId'=>$custId,
					'user_id'=>$useId,
					'currenWeek'=>$key,
					'status'=>1,
					'tg'=>self::getDateOfWeekAndDayname($yearVal,$key,$dayInt)				
				];
			};
		}else{
			$aryDateRslt=0;
		}
		return $aryDateRslt;		
	}
	
}  
?>
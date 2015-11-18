<?php
	require_once ('PHPExcel/PHPExcel.php');
	require_once("dbconnect.php");
$fileElementName="myExcel";
	if (isset($_FILES[$fileElementName]['name'])) { //a file is uploaded
		$inputFileName = $_FILES[$fileElementName]['tmp_name']; //location of uploaded file

			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName); //create an instance from the uploaded file
			$objPHPExcel->setActiveSheetIndex(0);

//example 1, get worksheet information
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$highestRow = $objWorksheet->getHighestRow(); //e.q. 10
			$highestColumnIndex = $objWorksheet->getHighestColumn(); // e.g 'F'
			$highestColumn = PHPExcel_Cell::columnIndexFromString($highestColumnIndex); //e.q. 5
			echo ">>解析Excel檔案...讀取到 " . ($highestRow) . "筆資料, 內含 " . $highestColumn . " 個資料欄位 <br />";
			$comma = "";//.......
		$comma1="";
//example 2, fetch worksheet cell values
//$sql="insert into paper ( pID, `year`, title_C, title_E, abstract_C, abstract_E, type, award, affiliate ) values ";
$sql1="insert into author (pID, name, `order`) values ";
		for ($j=1;$j<=$highestRow;$j++) {
		$pID=$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $j)->getValue();
			$sql = $sql . "$comma ( $pID,". $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $j)->getValue();
			for ($i=2; $i<$highestColumnIndex; $i++) { 
				$v=mysqli_real_escape_string($conn,$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($i, $j)->getValue());
				$sql=$sql . ",'$v'";
			}
			$idx=0;
			for ($i=9;$i<$highestColumn;$i++) {
				$v=mysqli_real_escape_string($conn,$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($i, $j)->getValue());
				if ($v > " ") {
					$sql1=$sql1 . " $comma1 ( $pID, '$v', $idx )";
					$idx++;
					$comma1=",";
				}
			}
			$sql = $sql . ")";
			$comma=",";
			$comma=",";
			$comma=",";
			$comma=",";
		}
	}
echo "$sql <br> $sql1 <br>";
//mysqli_query($conn,$sql);
mysqli_query($conn,$sql1);
?>

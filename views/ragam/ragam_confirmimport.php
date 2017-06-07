<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$var_id=$_POST['var_id'];
	#$file_excel=$_POST['file_excel'];
	#$value_waktu=$_POST['value_waktu'];
	#$value_nilai=$_POST['value_nilai'];
	#$value_posisi=$_POST['value_posisi'];

	if ($tema_id=='' or $var_id=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
		

		if(isset($_FILES['file_excel']['name'])) {
			$namafile = $_FILES['file_excel']['name'];
			$ext = pathinfo($namafile, PATHINFO_EXTENSION);

			if ($ext == "xlsx" or $ext == "xls") {
				$namafile = $_FILES['file_excel']['tmp_name'];
				$inputFileName = $namafile;
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
				} catch (Exception $e) {
					die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
					. '": ' . $e->getMessage());
				}
				//Table used to display the contents of the file
				?>
				<div class="row">
				<div class="col-md-6">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Konfirmasi import file excel</h3>
            </div>
            <!-- /.box-header -->
             <form name="imporexcel" action="<?php echo $app_url.'/'.$page.'/saveimport/'; ?>" method="post" role="form">
            <div class="box-body">
            <p>Tema : <?php echo '('.$tema_id.') '.get_nama_ragamtema($tema_id);?> <br />
			Kategori : <?php echo '('.get_kategori_var($var_id).') '.get_nama_kategori(get_kategori_var($var_id));?><br />
			Variabel : <?php echo '('.$var_id.') '.get_nama_variabel($var_id);?>
			</p>
              <table class="table table-bordered table-striped">
                <tr>
                  <th>waktu</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                </tr>
               
              	<?php
				//  Get worksheet dimensions
				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow();
				$highestColumn = $sheet->getHighestColumn();
				
				//  Loop through each row of the worksheet in turn
				$i=1;

				for ($row = 2; $row <= $highestRow; $row++) {
					//  Read a row of data into an array
					$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, 
					NULL, TRUE, FALSE);
					echo "<tr>";
					//echoing every cell in the selected row for simplicity. You can save the data in database too.
					echo '<td><input type="text" name="data[waktu]['.$i.']" value="'.$rowData[0][0].'" class="form-control" /></td>
					<td><input type="text" name="data[nilai]['.$i.']" value="'.$rowData[0][1].'" class="form-control" /></td>
					<td><input type="text" name="data[posisi]['.$i.']" value="'.$rowData[0][2].'" class="form-control" /></td>
					';
					
					echo "</tr>";
					$i++;
				}
				$maxNilai=$i-1;
				?>
			</table>
			
			<div class="box-footer">
			<button type="submit" name="submit" value="simpankat" class="btn btn-info pull-right">Simpan</button>
			</div>
			<input type="hidden" name="tema_id" value="<?php echo $tema_id; ?>" />
			<input type="hidden" name="var_id" value="<?php echo $var_id; ?>" />
			<input type="hidden" name="max_value" value="<?php echo $maxNilai; ?>" />
			</form>
            </div>
            <!-- /.box-body -->
            </div>
          </div>
          <!-- /.box -->
			 <?php
			}
			else {
				echo 'Hanya menerima file excel extension xlsx atau xls';
			}
		}
		/*
		echo '
		tema_id : '.$tema_id.'<br />
		var_id : '.$var_id.'<br />
		value_waktu : '.$value_waktu.'<br />
		value_nilai : '.$value_nilai.'<br />
		value_posisi : '.$value_posisi.'<br />
		';
		if (save_newvalue($var_id,$value_waktu,$value_nilai,$value_posisi)==TRUE) echo "Nilai value berhasil disimpan";
		else echo 'Nilai value tidak bisa di simpan'; */
	}
	
	//if (save_newvar($var_id,$var_nama,$var_satuan,$var_posisi,$var_kat_id)==TRUE) echo "Variabel berhasil disimpan";
	//else echo "Variabel tidak berhasil disimpan";
	
}
?>
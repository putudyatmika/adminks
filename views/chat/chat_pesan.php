 <table class="table table-bordered table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th style="width: 150px">Waktu</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
					$r_chat=get_chat_all();
					if ($r_chat["error"]==false) {
						$i=1;
						$max_pesan=$r_chat["chat_pesan_total"];
						for ($i=1;$i<=$max_pesan;$i++) {
							echo '
							<tr>
								<td>'.$i.'</td>
								<td><strong>'.$r_chat["item"][$i]["chat_pesan_nama"].'</strong> ('.$r_chat["item"][$i]["chat_pesan_email"].') <span class="label label-danger pull-right" title=""> '.$r_chat["item"][$i]["chat_pesan_jumlah"].'</span>
								<br /> '.$r_chat["item"][$i]["chat_pesan_isi"].'</td>
								<td>'.tanggal_pendek($r_chat["item"][$i]["chat_pesan_waktu"],true,true).'</td>
								<td><div class="text-center"><div class="text-center"><a href="'.$app_url.'/'.$page.'/view/'.$r_chat["item"][$i]["chat_pesan_userid"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="'.$app_url.'/'.$page.'/edit/'.$r_chat["item"][$i]["chat_pesan_userid"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapususer/'.$r_chat["item"][$i]["chat_pesan_userid"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data user ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>
							</tr>
						';	
						}
						
					}
					else {
						echo '
						<tr>
						<td colspan="3"><p class="text-center">'.$r_chat["pesan_error"].'</p></td>
						</tr>
						';
					}
				?>
              </table>
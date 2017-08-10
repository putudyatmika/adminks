 <table class="table table-bordered table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th style="width: 20px">Email</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
					$r_chat=get_chat_user();
					if ($r_chat["error"]==false) {
						$i=1;
						$max_user=$r_chat["chat_user_total"];
						for ($i=1;$i<=$max_user;$i++) {
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_chat["item"][$i]["chat_user_nama"].' <span class="label label-primary pull-right" title=""> '.get_jumlah_chat_user($r_chat["item"][$i]["chat_user_id"]).'</span></td>
								<td>'.$r_chat["item"][$i]["chat_user_email"].'</td>
								<td><div class="text-center"><div class="text-center"><a href="'.$app_url.'/'.$page.'/view/'.$r_chat["item"][$i]["chat_user_id"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="'.$app_url.'/'.$page.'/edit/'.$r_chat["item"][$i]["chat_user_id"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapususer/'.$r_chat["item"][$i]["chat_user_id"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data user ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>
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
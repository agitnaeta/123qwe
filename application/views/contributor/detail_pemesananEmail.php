 <style type="text/css">

        @media print {

            #area { /* aligning the printable area */

                background-color: #333;

            }

        }

        </style>

<div id="area">

<div>

<br>

	<img>

	<img width="100%" height="auto" src="<?php echo base_url("assets/img/headerdetail.png");?>">

</div>

<table width="100%" class="table table-bodered">

<thead>

	<th align="left"colspan="6">

		

	</th>

</thead>

<thead>

	<th></th>

</thead>

	<tr>

		<td width="30%">No Invoice</td><td>: <?=$data['no_invoice'];?></td>

	</tr>

	<tr>

		<td>Subject</td><td>: <?=$data['subject'];?></td>

	</tr>

	<tr>	

		<td>Harga</td><td>: <?=rupiah((($data['harga']*10)/100)+$data['harga']);?> <span class='text-danger'> Sudah Termasuk PPN 10 %</span></td>
	

	</tr>

	<tr>	

		<td>Lama Hari</td><td>: <?=$data['lama_hari'];?></td>

	</tr>

	<tr>	

		<td>Kapasitas Download</td><td>: <?=$data['kapasitas_download'];?></td>

	</tr>

	<tr>	

		<td>Tanggal Pemesanan</td><td>: <?=dateindo($data['tanggal_deposit']);?></td>

	</tr>

</table>

<br>

<table class="table" width="100%">

	<thead>

		<th align="left" colspan="2">

			<u>#Informasi Transfer</u>

		</th>

	</thead>

	<thead>

		<th></th>

	</thead>

	<tr>

		<td>Informasi Rekening</td>

		<td>Informasi Konfirmasi</td>

	</tr>

	<tr>

		

		<td>

				<?php foreach ($bank->result() as $row):?>

					<label><?=$row->nama_bank;?></label>

					<p><?=$row->nama_pemilik;?></p>

					<p><?=$row->no_rekening;?></p>

				<?php endforeach;?>	

				<label>Nominal Transfer</label>

				<p><?=rupiah((($data['harga']*10)/100)+$data['harga']);?> <span class='text-danger'> Sudah Termasuk PPN 10 %</span></p>

		</td>

		<td width="40%">

								<div class='text-justify'>
Silahkan lakukan pembayaran sejumlah yang tertera di invoice, dan ditransfer ke No Rekening 

yang di tunjuk.

Setelah dilakukan pembayaran silahkan lanjut ke bagian “KONFIRMASI”.
</div>
		</td>

	</tr>

</table>

</div>

	<script type="text/javascript" src="<?php echo base_url("assets/js/js.js"); ?>"></script>

	<script type="text/javascript" src="<?php echo base_url("assets/js/print.js"); ?>"></script>

	<script type="text/javascript">

		$(

			function(){



				// Hook up the print link.

				$( ".print" )

					.attr( "href", "javascript:void( 0 )" )

					.click(

						function(){

							// Print the DIV.

							$( "#area" ).print({
								function  () {
									   var mywindow = window.open();
									    var is_chrome = Boolean(mywindow.chrome);
									    mywindow.document.write(data);

									   if (is_chrome) {
									     setTimeout(function() { // wait until all resources loaded 
									        mywindow.document.close(); // necessary for IE >= 10
									        mywindow.focus(); // necessary for IE >= 10
									        mywindow.print(); // change window to winPrint
									        mywindow.close(); // change window to winPrint
									     }, 250);
									   } else {
									        mywindow.document.close(); // necessary for IE >= 10
									        mywindow.focus(); // necessary for IE >= 10

									        mywindow.print();
									        mywindow.close();
									   }
								}
							});



							// Cancel click event.

							return( false );

						}

						)

				;



			}

			);



	</script>
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="<?php echo base_url('assets/images/icons/Ngartish.png')?>" alt="IMG-ABOUT" class="img-about img-responsive">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Our story
					</h3>

					<p class="p-b-28">
                            Ngartish adalah website untuk para seniman yang ingin mempublikasikan hasil karyanya dan berbagi melalui galeri online.
                            Kerya yang diposting dapat juga di jual melalui layanan lelang yang kami sediakan.
                    </p>

                    <div class="bo13 p-l-29 m-l-9 p-b-10">
                        <p class="p-b-11">
                            Melalui ngartish kami berharap para seniman jalanan atau yang tidak bisa memamerkan karyanya secara luas bisa lebih dikenal dan memiliki
                            kesempatan untuk mendapatkan keuntungan dari website dan layanan yang kami berikan. 
                        </p>
                    </div>
				</div>
			</div>
		</div>
	</section>

<div class="super_container">
	<div class="fs_menu_overlay"></div>
		<div class="container contact_container">
	
		<!-- Contact Us -->

		<div class="row">

			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h1>Contact Us</h1>
					<p>Ngartish - galeri online pertama</p>
					<div>
						<p>(+62) 8781924155 </p>
						<p>adm.ngartish@gmail.com</p>
					</div>
					<div>
						<p>Jam kerja : 08:00 s/d 21:00</p>
						<p>Libur: Minggu dan hari libur nasional</p>
					</div>
				</div>
			</div>

			<div class="col-lg-6 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Hubungi Kami</h1>
					<p>Lengkapi data form dan dapatkan info terbaru atau beri kami kritik atau saran.</p>
					<form action="<?=base_url('c_dashboard/send_email_from_users');?>" method="POST">
					<?php
					if($this->session->flashdata('success')){
						?>
						<script>
							swal({
							title: "Terima kasih",
							text: "<?php echo $this->session->flashdata('success'); ?>",
							timer: 3000,
							showConfirmButton: false,
							type: 'success'
							});
						</script>
						<?php
					}
					?>
						<?php
							foreach($panggisession as $session){
								$fullname 	= $session->fullname;
								$email		= $session->email; 	
							}
						?>
						<div>
							<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" required="required" data-error="Name is required." value="<?php echo $fullname;?>" readonly>
							<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required." value="<?php echo $email;?>" readonly>
							<textarea id="input_message" class="input_ph input_message" name="message"  placeholder="Message" rows="3" required data-error="Please, write us a message."></textarea>
						</div>
						<div>
							<button id="review_submit" name="critic" type="submit" class="red_button message_submit_btn trans_300" value="Kirim">Kirim</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

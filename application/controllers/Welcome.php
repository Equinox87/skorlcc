<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Welcome extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('babak') == NULL) {
			$this->session->set_userdata('babak', 0);
		}

		// var_dump($this->session->userdata());

		$tim1 = $this->session->userdata('nama_tim_1');
		$tim2 = $this->session->userdata('nama_tim_2');
		$tim3 = $this->session->userdata('nama_tim_3');
		$tim4 = $this->session->userdata('nama_tim_4');
		if ($tim1 == NULL || $tim1 == "") {
			$tim1 = "TBD";
		}
		if ($tim2 == NULL || $tim2 == "") {
			$tim2 = "TBD";
		}
		if ($tim3 == NULL || $tim3 == "") {
			$tim3 = "TBD";
		}
		if ($tim4 == NULL || $tim4 == "") {
			$tim4 = "TBD";
		}


		//session for start of babak

		$data['babak'] = $this->session->userdata('babak');
		$data['pengaturan'] = $this->session->userdata('pengaturan');
		$data['tim1'] = $tim1;
		$data['tim2'] = $tim2;
		$data['tim3'] = $tim3;
		$data['tim4'] = $tim4;
		$data['skortim1'] = $this->session->userdata('skortim1');
		$data['skortim2'] = $this->session->userdata('skortim2');
		$data['skortim3'] = $this->session->userdata('skortim3');
		$data['skortim4'] = $this->session->userdata('skortim4');

		//session for babak 1
		$data['nilaitiapsoal'] = $this->session->userdata('nilaitiapsoal');
		$data['jumlahsoal'] = $this->session->userdata('jumlahsoal');
		$data['inputsetting'] = $this->session->userdata('inputsetting');
		if ($data['nilaitiapsoal'] == NULL || $data['jumlahsoal'] == NULL) {
			$data['inputsetting'] = 1;
		} else {
			$data['inputsetting'] = 0;
		}
		$data['soalke'] = $this->session->userdata('soalke');
		$data['tim'] = $this->session->userdata('tim');
		$data['historybabak1'] = $this->session->userdata('historybabak1');

		//session for babak 2
		$data['historybabak2'] = $this->session->userdata('historybabak2');
		$data['inputsetting2'] = $this->session->userdata('inputsetting2');
		$data['nilaibenar'] = $this->session->userdata('nilaibenar');
		$data['salahpertama'] = $this->session->userdata('salahpertama');
		$data['salahkedua'] = $this->session->userdata('salahkedua');
		$data['jawablagi'] = $this->session->userdata('jawablagi');
		$data['jumlahsoal2'] = $this->session->userdata('jumlahsoal2');
		$data['kesempatan'] = $this->session->userdata('kesempatan');
		if ($data['kesempatan'] == NULL) {
			$this->session->set_userdata('kesempatan', 1);
		}
		if ($data['nilaibenar'] == NULL || $data['salahpertama'] == NULL) {
			$data['inputsetting2'] = 1;
		} else {
			$data['inputsetting2'] = 0;
		}

		//session for babak 3
		$data['historybabak3'] = $this->session->userdata('historybabak3');


		//session for babak 4
		$data['historybabak4'] = $this->session->userdata('historybabak4');
		$data['inputsetting4'] = $this->session->userdata('inputsetting4');
		$data['kelipatan'] = $this->session->userdata('kelipatan');
		$data['jumlahsoal4'] = $this->session->userdata('jumlahsoal4');
		$data['kelipatanpoin'] = $this->session->userdata('kelipatanpoin');
		if ($data['kelipatanpoin'] == NULL) {
			$data['kelipatanpoin'] = $data['kelipatan'];
		}
		if ($data['kelipatan'] == NULL || $data['jumlahsoal4'] == NULL) {
			$data['inputsetting4'] = 1;
		} else {
			$data['inputsetting4'] = 0;
		}

		//hitungpemenang
		$data['pemenang'] = max($data['skortim1'], $data['skortim2'], $data['skortim3'], $data['skortim4']);

		if ($data['pemenang'] == $data['skortim1']) {
			$data['pemenang'] = $data['tim1'];
		} else if ($data['pemenang'] == $data['skortim2']) {
			$data['pemenang'] = $data['tim2'];
		} else if ($data['pemenang'] == $data['skortim3']) {
			$data['pemenang'] = $data['tim3'];
		} else if ($data['pemenang'] == $data['skortim4']) {
			$data['pemenang'] = $data['tim4'];
		}


		//session untuk pengaturan
		$data['alasanedit'] = $this->session->userdata('alasanedit');


		//session untuk history
		$data['fullhistory'] = $this->session->userdata('fullhistory');

		$this->load->view('main', $data);
	}

	public function mulailomba()
	{
		var_dump($this->input->post());
		$post = $this->input->post();

		$this->session->set_userdata('babak', $post['babak']);
		$this->session->set_userdata('nama_tim_1', $post['tim1']);
		$this->session->set_userdata('nama_tim_2', $post['tim2']);
		$this->session->set_userdata('nama_tim_3', $post['tim3']);
		$this->session->set_userdata('nama_tim_4', $post['tim4']);

		redirect('home');
	}

	public function babak1setting()
	{
		$post = $this->input->post();
		$this->session->set_userdata('nilaitiapsoal', $post['nilai']);
		$this->session->set_userdata('jumlahsoal', $post['jumlah']);
		if ($this->session->userdata('soalke') == NULL) {
			$this->session->set_userdata('soalke', 1);
			$this->session->set_userdata('tim', 'A');
		}
		redirect('home');
	}

	public function babak1play()
	{
		//fungsi dimana babak 1 dijalankan
		$get = $this->input->get();
		$soalke = $get['soalke'];
		$tim = $get['tim'];
		$jumlahsoal = $this->session->userdata('jumlahsoal');
		//jika benar, maka menambah nilai dari tim bersangkutan
		if ($get['jawaban'] == "benar") {
			if ($get['tim'] == "A") {
				$nilai = $this->session->userdata('skortim1') + $this->session->userdata('nilaitiapsoal');
				$this->session->set_userdata('skortim1', $nilai);
				$timnext = "B";
			} else if ($get['tim'] == "B") {
				$nilai = $this->session->userdata('skortim2') + $this->session->userdata('nilaitiapsoal');
				$this->session->set_userdata('skortim2', $nilai);
				$timnext = "C";
			} else if ($get['tim'] == "C") {
				$nilai = $this->session->userdata('skortim3') + $this->session->userdata('nilaitiapsoal');
				$this->session->set_userdata('skortim3', $nilai);
				$timnext = "D";
			} else if ($get['tim'] == "D") {
				$nilai = $this->session->userdata('skortim4') + $this->session->userdata('nilaitiapsoal');
				$this->session->set_userdata('skortim4', $nilai);
				$timnext = "A";
			}

			$nilaisoal = $this->session->userdata('nilaitiapsoal');
			$history = $this->session->userdata('historybabak1');
			$history = $history . "</br>Tim $tim menjawab soal ke $soalke dengan benar, nilai ditambah $nilaisoal";
			$this->session->set_userdata('historybabak1', $history);
		} else {
			//jika jawaban salah maka hanya nambah history doang dan next tim
			if ($get['tim'] == "A") {
				$timnext = "B";
			} else if ($get['tim'] == "B") {
				$timnext = "C";
			} else if ($get['tim'] == "C") {
				$timnext = "D";
			} else if ($get['tim'] == "D") {
				$timnext = "A";
			}
			$nilaisoal = $this->session->userdata('nilaitiapsoal');
			$history = $this->session->userdata('historybabak1');
			$history = $history . "</br>Tim $tim menjawab soal ke $soalke dengan jawaban yang salah";
			$this->session->set_userdata('historybabak1', $history);
		}

		if ($soalke !== $jumlahsoal) {
			$nextsoal = $soalke + 1;
			$this->session->set_userdata('soalke', $nextsoal);
			$this->session->set_userdata('tim', $timnext);
		} else {
			//lanjut ke babak 2 kalau soal sudah mentok
			$this->session->set_userdata('babak', 2);
			$this->session->set_userdata('soalke', NULL);
		}

		redirect('home');
	}

	public function babak2setting()
	{
		$this->session->set_userdata('soalke', 1);
		$post = $this->input->post();
		$this->session->set_userdata('nilaibenar', $post['nilaibenar']);
		$this->session->set_userdata('salahpertama', $post['salahpertama']);
		$this->session->set_userdata('salahkedua', $post['salahkedua']);
		$this->session->set_userdata('jawablagi', $post['jawablagi']);
		$this->session->set_userdata('jumlahsoal2', $post['jumlah2']);
		if ($this->session->userdata('soalke') == NULL) {
			$this->session->set_userdata('soalke', 1);
		}
		redirect('home');
	}

	public function babak2play()
	{
		$post = $this->input->post();
		var_dump($post);

		//jika jawaban pass maka langsung next ke soal berikutnya
		if (isset($post['pass'])) {
			$nextsoal = $post['soalke'] + 1;
			$this->session->set_userdata('soalke', $nextsoal);
			$history = $this->session->userdata('historybabak2');
			$history = $history . '<br> Tidak ada yang menjawab soal ke ' . $post['soalke'] . ', soal dilewati';
			$this->session->set_userdata('historybabak2', $history);

			//kesempatan direset menjadi kesempatan pertama
			$this->session->set_userdata('kesempatan', 1);
		} else {
			if ($post['kesempatan'] == 1) {
				//jika kesempatan pertama	
				if (isset($post['benar'])) {
					//jika benar
					if ($post['tim'] == "A") {
						$nilai = $this->session->userdata('skortim1') + $this->session->userdata('nilaibenar');
						$this->session->set_userdata('skortim1', $nilai);
					} else if ($post['tim'] == "B") {
						$nilai = $this->session->userdata('skortim2') + $this->session->userdata('nilaibenar');
						$this->session->set_userdata('skortim2', $nilai);
					} else if ($post['tim'] == "C") {
						$nilai = $this->session->userdata('skortim3') + $this->session->userdata('nilaibenar');
						$this->session->set_userdata('skortim3', $nilai);
					} else if ($post['tim'] == "D") {
						$nilai = $this->session->userdata('skortim4') + $this->session->userdata('nilaibenar');
						$this->session->set_userdata('skortim4', $nilai);
					}

					$nextsoal = $post['soalke'] + 1;
					$this->session->set_userdata('soalke', $nextsoal);
					$history = $this->session->userdata('historybabak2');
					$history = $history . '<br> Tim ' . $post['tim'] . ' menjawab soal ke ' . $post['soalke'] . ' dengan benar, nilai +' . $this->session->userdata('nilaibenar');
					$this->session->set_userdata('historybabak2', $history);
				} else {
					//jika salah maka tim bersangkutan akan dikurangi nilainya dengan denda pertama, lalu lanjut ke kesempatan kedua
					if ($post['tim'] == "A") {
						$nilai = $this->session->userdata('skortim1') - $this->session->userdata('salahpertama');
						$this->session->set_userdata('skortim1', $nilai);
					} else if ($post['tim'] == "B") {
						$nilai = $this->session->userdata('skortim2') - $this->session->userdata('salahpertama');
						$this->session->set_userdata('skortim2', $nilai);
					} else if ($post['tim'] == "C") {
						$nilai = $this->session->userdata('skortim3') - $this->session->userdata('salahpertama');
						$this->session->set_userdata('skortim3', $nilai);
					} else if ($post['tim'] == "D") {
						$nilai = $this->session->userdata('skortim4') - $this->session->userdata('salahpertama');
						$this->session->set_userdata('skortim4', $nilai);
					}

					$history = $this->session->userdata('historybabak2');
					$history = $history . '<br> Tim ' . $post['tim'] . ' salah menjawab soal ke ' . $post['soalke'] . ' , nilai - ' . $this->session->userdata('salahpertama');
					$this->session->set_userdata('historybabak2', $history);
					$this->session->set_userdata('kesempatan', 2);

					//menyimpan data tim yang terakhir menjawab, agar kalau menjawab salah lagi maka akan berkurang nilainya	
					$this->session->set_userdata('timlastanswer', $post['tim']);
				}
			} else {
				//jika kesempatan kedua	
				if ($post['tim'] == $this->session->userdata('timlastanswer')) {
					if ($post['tim'] == "A") {
						$nilai = $this->session->userdata('skortim1') - $this->session->userdata('jawablagi');
						$this->session->set_userdata('skortim1', $nilai);
					} else if ($post['tim'] == "B") {
						$nilai = $this->session->userdata('skortim2') - $this->session->userdata('jawablagi');
						$this->session->set_userdata('skortim2', $nilai);
					} else if ($post['tim'] == "C") {
						$nilai = $this->session->userdata('skortim3') - $this->session->userdata('jawablagi');
						$this->session->set_userdata('skortim3', $nilai);
					} else if ($post['tim'] == "D") {
						$nilai = $this->session->userdata('skortim4') - $this->session->userdata('jawablagi');
						$this->session->set_userdata('skortim4', $nilai);
					}

					$history = $this->session->userdata('historybabak2');
					$history = $history . '<br> Tim ' . $post['tim'] . 'menjawab soal ke ' . $post['soalke'] . ' sebanyak 2 kali , nilai -' . $this->session->userdata('jawablagi');
				} else { //jika bukan tim yang sama
					if (isset($post['benar'])) {
						//jika benar
						if ($post['tim'] == "A") {
							$nilai = $this->session->userdata('skortim1') + $this->session->userdata('nilaibenar');
							$this->session->set_userdata('skortim1', $nilai);
						} else if ($post['tim'] == "B") {
							$nilai = $this->session->userdata('skortim2') + $this->session->userdata('nilaibenar');
							$this->session->set_userdata('skortim2', $nilai);
						} else if ($post['tim'] == "C") {
							$nilai = $this->session->userdata('skortim3') + $this->session->userdata('nilaibenar');
							$this->session->set_userdata('skortim3', $nilai);
						} else if ($post['tim'] == "D") {
							$nilai = $this->session->userdata('skortim4') + $this->session->userdata('nilaibenar');
							$this->session->set_userdata('skortim4', $nilai);
						}

						$history = $this->session->userdata('historybabak2');
						$history = $history . '<br> Tim ' . $post['tim'] . ' menjawab soal ke ' . $post['soalke'] . ' dengan benar, nilai +' . $this->session->userdata('nilaibenar');
						$this->session->set_userdata('historybabak2', $history);
						//kembalikan kesempatan ke 1
						$this->session->set_userdata('kesempatan', 1);
					} else {
						//jika salah maka tim bersangkutan akan dikurangi nilainya dengan denda kedua, lalu lanjut ke soal berikutnya
						if ($post['tim'] == $this->session->userdata('timlastanswer')) {
							//jika tim yang bersangkutan adalah tim yang menjawab salah sebelumnya
							if ($post['tim'] == "A") {
								$nilai = $this->session->userdata('skortim1') - $this->session->userdata('jawablagi');
								$this->session->set_userdata('skortim1', $nilai);
							} else if ($post['tim'] == "B") {
								$nilai = $this->session->userdata('skortim2') - $this->session->userdata('jawablagi');
								$this->session->set_userdata('skortim2', $nilai);
							} else if ($post['tim'] == "C") {
								$nilai = $this->session->userdata('skortim3') - $this->session->userdata('jawablagi');
								$this->session->set_userdata('skortim3', $nilai);
							} else if ($post['tim'] == "D") {
								$nilai = $this->session->userdata('skortim4') - $this->session->userdata('jawablagi');
								$this->session->set_userdata('skortim4', $nilai);
							}

							$history = $this->session->userdata('historybabak2');
							$history = $history . '<br> Tim ' . $post['tim'] . ' salah menjawab soal ke ' . $post['soalke'] . ' sebanyak 2 kali , nilai -' . $this->session->userdata('jawablagi');
						} else {
							//jika tim yang bersangkutan adalah tim yang belum menjawab sebelumya

							if ($post['tim'] == "A") {
								$nilai = $this->session->userdata('skortim1') - $this->session->userdata('salahkedua');
								$this->session->set_userdata('skortim1', $nilai);
							} else if ($post['tim'] == "B") {
								$nilai = $this->session->userdata('skortim2') - $this->session->userdata('salahkedua');
								$this->session->set_userdata('skortim2', $nilai);
							} else if ($post['tim'] == "C") {
								$nilai = $this->session->userdata('skortim3') - $this->session->userdata('salahkedua');
								$this->session->set_userdata('skortim3', $nilai);
							} else if ($post['tim'] == "D") {
								$nilai = $this->session->userdata('skortim4') - $this->session->userdata('salahkedua');
								$this->session->set_userdata('skortim4', $nilai);
							}

							$history = $this->session->userdata('historybabak2');
							$history = $history . '<br> Tim ' . $post['tim'] . ' salah menjawab soal ke ' . $post['soalke'] . ' , nilai -' . $this->session->userdata('salahkedua');
						}
					}
				}

				//seting history dan kesempatan
				$this->session->set_userdata('historybabak2', $history);
				$this->session->set_userdata('kesempatan', 1);

				//setting next soal
				$nextsoal = $post['soalke'] + 1;
				$this->session->set_userdata('soalke', $nextsoal);
			}
		} //akhir dari logic jika pass atau tidak

		$soalke = $this->session->userdata('soalke');
		$jumlahsoal = $this->session->userdata('jumlahsoal2');
		if ($soalke > $jumlahsoal) {
			//lanjut ke babak 3 kalau soal sudah mentok
			$this->session->set_userdata('babak', 3);
			$this->session->set_userdata('soalke', NULL);
		}

		//redirect ke home setelah semua proses selesai
		redirect('home');
	}

	public function babak3play()
	{
		$post = $this->input->post();
		// var_dump($post);

		//tambahkan skornya

		$nilai = $this->session->userdata('skortim1') + $post['tim1'];
		$this->session->set_userdata('skortim1', $nilai);
		$history = $this->session->userdata('historybabak3') . '<br/>Tim A mendapatkan skor ' . $post['tim1'];
		$this->session->set_userdata('historybabak3', $history);
		$nilai = $this->session->userdata('skortim2') + $post['tim2'];
		$this->session->set_userdata('skortim2', $nilai);
		$history = $this->session->userdata('historybabak3') . '<br/>Tim B mendapatkan skor ' . $post['tim2'];
		$this->session->set_userdata('historybabak3', $history);
		$nilai = $this->session->userdata('skortim3') + $post['tim3'];
		$this->session->set_userdata('skortim3', $nilai);
		$history = $this->session->userdata('historybabak3') . '<br/>Tim C mendapatkan skor ' . $post['tim3'];
		$this->session->set_userdata('historybabak3', $history);
		$nilai = $this->session->userdata('skortim4') + $post['tim4'];
		$this->session->set_userdata('skortim4', $nilai);
		$history = $this->session->userdata('historybabak3') . '<br/>Tim D mendapatkan skor ' . $post['tim4'];
		$this->session->set_userdata('historybabak3', $history);


		$this->session->set_userdata('babak', 4);
		$this->session->set_userdata('soalke', NULL);
		redirect('home');
	}

	public function babak4setting()
	{
		$post = $this->input->post();

		$kelipatan = $post['kelipatan'];
		$this->session->set_userdata('kelipatan', $kelipatan);
		$this->session->set_userdata('kelipatanpoin', $kelipatan);

		$this->session->set_userdata('jumlahsoal4', $post['jumlah']);
		if ($this->session->userdata('soalke') == NULL) {
			$this->session->set_userdata('soalke', 1);
		}

		redirect('home');
	}

	public function babak4play()
	{
		//fungsi dimana babak 1 dijalankan
		$post = $this->input->post();
		$soalke = $post['soalke'];
		$tim = $post['tim'];
		$jumlahsoal = $this->session->userdata('jumlahsoal4');
		if (isset($post['pass'])) {
			$history = $this->session->userdata('historybabak4');
			$history = $history . '<br> Tidak ada yang menjawab soal ke ' . $post['soalke'] . ', soal dilewati';
			$this->session->set_userdata('historybabak4', $history);
		} else {
			//jika benar, maka menambah nilai dari tim bersangkutan
			if (isset($post['benar'])) {
				if ($post['tim'] == "A") {
					$nilai = $this->session->userdata('skortim1') + $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim1', $nilai);
				} else if ($post['tim'] == "B") {
					$nilai = $this->session->userdata('skortim2') + $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim2', $nilai);
				} else if ($post['tim'] == "C") {
					$nilai = $this->session->userdata('skortim3') + $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim3', $nilai);
				} else if ($post['tim'] == "D") {
					$nilai = $this->session->userdata('skortim4') + $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim4', $nilai);
				}

				$nilaisoal = $this->session->userdata('kelipatanpoin');
				$history = $this->session->userdata('historybabak4');
				$history = $history . "</br>Tim $tim menjawab soal ke $soalke dengan benar, nilai ditambah $nilaisoal";
				$this->session->set_userdata('historybabak4', $history);
			} else {
				//jika jawaban salah maka dikurangi poin berdasarkan kelipatan soal
				if ($post['tim'] == "A") {
					$nilai = $this->session->userdata('skortim1') - $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim1', $nilai);
				} else if ($post['tim'] == "B") {
					$nilai = $this->session->userdata('skortim2') - $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim2', $nilai);
				} else if ($post['tim'] == "C") {
					$nilai = $this->session->userdata('skortim3') - $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim3', $nilai);
				} else if ($post['tim'] == "D") {
					$nilai = $this->session->userdata('skortim4') - $this->session->userdata('kelipatanpoin');
					$this->session->set_userdata('skortim4', $nilai);
				}

				$history = $this->session->userdata('historybabak4');
				$history = $history . '<br> Tim ' . $post['tim'] . ' salah menjawab soal ke ' . $post['soalke'] . ' , nilai -' . $this->session->userdata('kelipatanpoin');
				$this->session->set_userdata('historybabak4', $history);
			}
		}

		$kelipatan = $this->session->userdata('kelipatan');
		if ($soalke !== $jumlahsoal) {
			$nextsoal = $soalke + 1;
			$kelipatanpoin = $kelipatan * $nextsoal;
			$this->session->set_userdata('soalke', $nextsoal);
			$this->session->set_userdata('kelipatanpoin', $kelipatanpoin);
		} else {
			//lanjut ke babak 2 kalau soal sudah mentok
			$this->session->set_userdata('babak', 5);
			$this->session->set_userdata('soalke', NULL);
		}

		redirect('home');
	}

	public function history()
	{ }

	public function historyPlay()
	{ }

	public function pengaturan()
	{
		$this->session->set_userdata('pengaturan', 1);
		redirect('home');
	}

	public function pengaturanPlay()
	{
		$post = $this->input->post();
		if (isset($post['batal'])) {
			$this->session->set_userdata('pengaturan', 0);
		} else {
			//jika diatur
			$this->session->set_userdata('nama_tim_1', $post['tim1']);
			$this->session->set_userdata('skortim1', $post['skortim1']);
			$this->session->set_userdata('nama_tim_2', $post['tim2']);
			$this->session->set_userdata('skortim2', $post['skortim2']);
			$this->session->set_userdata('nama_tim_3', $post['tim3']);
			$this->session->set_userdata('skortim3', $post['skortim3']);
			$this->session->set_userdata('nama_tim_4', $post['tim4']);
			$this->session->set_userdata('skortim4', $post['skortim4']);

			//set alasan
			$alasan = $this->session->userdata('alasanedit');
			$alasan = $alasan . '</br>' . $post['alasan'];
			$this->session->set_userdata('alasanedit', $alasan);
			$this->session->set_userdata('pengaturan', 0);
		}
		?>
<script type="text/javascript">
	alert('pengaturan berhasil disimpan');
	window.location.href = '../home';
</script>
<?php

	}

	public function reset()
	{
		session_unset();
		session_destroy();
		redirect('home');
	}

	public function fullhistory()
	{
		$this->session->set_userdata('fullhistory', 1);
		redirect('home');
	}
	public function backfullhistory()
	{
		$this->session->set_userdata('fullhistory', 0);
		redirect('home');
	}

	public function printhistory()
	{
		$this->load->view('history');
	}
}
?>
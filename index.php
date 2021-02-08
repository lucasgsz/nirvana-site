<?php
$agendas;
session_start();
include('conexao.php');
$teste = "SELECT * FROM agenda";
 $rs =mysqli_query($conexao, $teste);
 $agendas = $conexao->query($teste);
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<title>Nirvana - Site Oficial</title>

		<!-- Swiper -->
        <link rel="stylesheet" href="css/swiper-bundle.css" />
        
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
		
		<!-- Estilo Padrão -->
		<link rel="stylesheet" href="css/style-index.css" />
		<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
		integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
		crossorigin="anonymous"
		/>
		<!-- Css Player de Musica -->
		<link rel="stylesheet" href="css/style-player.css" />
	</head>

	<body> 
        <!-- Navegação -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning w-100 position-fixed">
            <a class="navbar-brand text-uppercase" href="#">Nirvana</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-uppercase justify-content-center " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#agenda">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#integrantes">Integrantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#discografia">Discografia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#musicas">musicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#historia">Historia</a>
                    </li>

                    <!-- Botao para logar/Caso esteja logado some -->
                    <?php if(!isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="fazer-login.php">Login</a>
                    </li>
                    <?php endif ?>

                    <!-- Function para logout/menu admin -->
                    <?php if(isset($_SESSION['usuario'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Menu Admin
                        </a>
                        <ul class="dropdown-menu bg-warning" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="cadastro-agenda.php" target="_blank">Cadastrar Agenda</a>
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Deslogar</a></li>
                        </ul>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>

        <!-- Imagem Principal Nav / Player de Musica -->
        <div class="container-fluid px-0">
            <div class="overlay">
                <img class="img-fluid" src="images/teste-foto.png" />
            </div>
            <div class="player" id="player">
                <div class="container" id="container-player">
                <!-- Botoes -->
                <div class="audio-btns">
                    <div class="play-btns">
                    <a href="#container-player" onclick="prevAudio()"><i class="fa fa-backward"></i></a>
                    <a href="#container-player" onclick="togglePlayPause()" class="play-pause bg-warning"><i class="fa fa-play"></i
                    ></a>
                    <a class="#container-player" onclick="nextAudio()"><i class="fa fa-forward"></i></a>
                    </div>
                </div>
                <!-- Barra de Progresso -->
                <div class="seek bg-warning">
                    <div class="fill"></div>
                </div>
                </div>
                </div>
                
        </div>

        <!-- AGENDA -->
        <div class="container bg-warning mt-5 mb-5 p-5 text-uppercase" id="agenda">
            <h1 class="tituloBlocos ">Agenda</h1>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <!-- Swiper/Slide -->
                    <div class="swiper-container swiper-container-agenda">
                        <div class="swiper-wrapper">
                            <!-- loop-Php-->
                            <?php foreach($agendas as $agendaid){ ?>
                            <div class="swiper-slide swiper-slide-agenda">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Show</h4>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <p>Cidade:
                                                    <p> <?php echo $agendaid["cidade"]?> </p>
                                                </p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Data:
                                                    <p> <?php echo $agendaid["data"]?> </p>
                                                </p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Hora:
                                                    <p> <?php echo $agendaid["horario"]?> </p>
                                                </p>
                                            </li>
                                            <li class="list-group-item">
                                                <a  target="_blank" href="https://www.ingressorapido.com.br/">Compre seu
                                                    Ingresso Aqui!</a>
                                                    <?php if(isset($_SESSION['usuario'])): ?>
                                                <form action="apagar-agenda.php" method="GET">
                                                    <select name="idagenda" style="display: none;">
                                                        <option>
                                                            <?php echo $agendaid["id"]?>
                                                        </option>
                                                    </select>
                                                    <button type="submit" class="my-3 btn btn-danger">Apagar Agenda</button>
                                                </form>
                                                <?php endif ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- end slide -->
                        </div>
                        <div class="swiper-button-prev swiper-button-prev-agenda"></div>
                        <div class="swiper-button-next swiper-button-next-agenda"></div>
                    </div>
                    <!-- end swiper -->
                </div>
            </div>
        </div>

        <!-- INTEGRANTES DA BANDA -->
        <div class="container bg-warning mb-5 mt-5 p-5" id="integrantes">
            <h1 class="tituloBlocos">Integrantes</h1>
            <div class="col-12">
                <div class="row mt-5">
                        <div class="col-md-4">
                            <div class="card bg-warning border-0 w-100" style="width: 18rem;">
                                <img class="card-img-top" src="images/kurt.jpg" alt="Card image cap">
                                <span class="nomeCantor d-block">Kurt Kobain</span>
                                <span class="posicaoCantor">Vocalista/Guitarrista</span> 
                                <div class="card-body">
                                <p class="card-text">Dentre suas principais composições, o single Smells Like Teen Spirit, do segundo álbum do Nirvana, "Nevermind", foi o responsável pelo início do sucesso do grupo e do próprio Kurt, popularizando um subgênero do rock alternativo que a imprensa passou a chamar de grunge. Outras bandas grunge de Seattle, como Alice in Chains, Pearl Jam e Soundgarden, ganharam também um vasto público e, como resultado, o rock alternativo tornou-se um gênero dominante no rádio e na televisão nos Estados Unidos, do início à metade da década de 1990. O Nirvana foi considerada a banda "carro-chefe da Geração X", e seu vocalista, Kurt Cobain, viu-se ungido pela mídia como porta-voz da geração, mesmo contra sua vontade.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning border-0 w-100" style="width: 18rem;">
                                <img class="card-img-top" src="images/dave-foto.jpg" alt="Card image cap">
                                <span class="nomeCantor d-block">Dave Grohl</span>
                                <span class="posicaoCantor">bateristas</span> 
                                <div class="card-body">
                                <p class="card-text">Desde cedo tocou bateria em muitas bandas punk, e aos 14 anos, no começo da década de 1980, entrou para a banda Scream. A primeira vez que Dave viu o grupo Nirvana atuar, foi durante uma turné europeia do Scream. Depois, com a turné cancelada, o fim da banda Scream e ainda alguns problemas financeiros, ligou para Buzz Osborne, um amigo dele que conhecia Kurt e Krist, arranjou o número de telefone de Krist, ligou-lhe e foi para Seattle. Quando chegou, tocou com os dois, que na época tocavam, provisoriamente, com Dan Peters, baterista dos Mudhoney. Kurt e Krist perceberam que ele era o baterista que eles estavam à procura e Dave entrou para a banda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning border-0 w-100" style="width: 18rem;">
                                <img class="card-img-top" src="images/krist-foto.jpg" alt="Card image cap">
                                <span class="nomeCantor d-block">Krist Novoselic</span>
                                <span class="posicaoCantor">Baixista </span> 
                                <div class="card-body">
                                <p class="card-text">Depois que o Nirvana se separou após a morte de seu vocalista Kurt Cobain em 1994, Novoselic formou a Sweet 75 em 1995 e Eyes Adrift em 2002, lançando um álbum com cada banda. De 2006 a 2009, ele tocou na banda de punk rock Flipper e, em 2011, contribuiu com baixo e acordeão para a música "I Should Have Known" no álbum Wasting Light, do Foo Fighters. Atualmente, ele toca baixo e acordeão na banda Giants in the Trees, desde junho de 2017.</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>	

		<!-- DISCOGRAFIA -->
		<div class="container bg-warning mt-5 mb-5 p-5" id="discografia">
			<h1 class="tituloBlocos">Discografia</h1>
			<div class="row d-none d-lg-flex mt-5">
				<div class="col-12 d-flex justify-content-center">
						<!-- Disco 1 -->
					<div class="disco col-3">
						<p>1989</p>
						<img src="images/bleach-album.png" width="200px" />
						<p>Bleach</p>
						<a class="discografia__spotify" href="https://open.spotify.com/album/1KVGLuPtrMrLlyy4Je6df7" target="_blank">
							Link Para Spotify
					</a>
					</div>

					<!-- Disco 2 -->
					<div class="disco col-3">
						<p>1991</p>
						<img src="images/nevermind-album.jpg" width="200px" />
						<p>Nevermind</p>
						<a class="discografia__spotify" href="https://open.spotify.com/album/6yaiubHHJy8N8QcHy3julo" target="_blank">
							Link Para Spotify
					</a>
					</div>

					<!-- Disco 3 -->
					<div class="disco col-3">
						<p>1993</p>
						<img src="images/inutero-album.jpg" width="200px" />
						<p>In Utero</p>
						<a class="discografia__spotify" href="https://open.spotify.com/album/7wOOA7l306K8HfBKfPoafr" target="_blank">
							Link Para Spotify
					</a>
					</div>
				</div>
			</div>
			<div class="row d-lg-none mt-5">
				<div class="col-12">
					<div class="swiper-container swiper-container-disco">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<!-- Disco 1 -->
								<div class="disco">
									<p>1989</p>
									<img src="images/bleach-album.png" width="200px" />
									<p>Bleach</p>
									<img class="botaoSpotify" src="images/botao-spotify.png" />
								</div>
							</div>
							<div class="swiper-slide">
								<!-- Disco 2 -->
								<div class="disco">
									<p>1991</p>
									<img src="images/nevermind-album.jpg" width="200px" />
									<p>Nevermind</p>
									<img class="botaoSpotify" src="images/botao-spotify.png" />
								</div>
							</div>
							<div class="swiper-slide">
								<!-- Disco 3 -->
								<div class="disco">
									<p>1993</p>
									<img src="images/inutero-album.jpg" width="200px" />
									<p>In Utero</p>
									<img class="botaoSpotify" src="images/botao-spotify.png" />
								</div>
							</div>
						</div>
						<div class="swiper-pagination swiper-pagination-disco"></div>
					</div>
				</div>
			</div>
		</div>

		<!-- Musicas -->
		<div class="container bg-warning p-5" id="musicas">
			<h1 class="tituloBlocos">As melhores Musicas</h1>
			<div class="row d-none d-lg-flex">
				<div class="col-12">
					<div class="blocoMusicas">
						<!-- Musica 1 -->
						<div class="musica">
							<a>Smells like teen spirit</a>
							<a>Nevermind</a>
							<img class="img-fluid" src="images/smells-foto.jpg" />
							<a>Numeros</a>
							<span class="spotifyIcon"><img src="images/spotify-icon .png" />886.797.553</span>
							<span class="youtubeIcon"><img src="images/youtube-icon .png" />1.200.952.484</span>
						</div>
						<!-- Musica 2 -->
						<div class="musica msc2">
							<a>Come As You Are</a>
							<a>Nevermind</a>
							<img class="img-fluid" src="images/comeasyouhere-foto.jpg" />
							<a>Numeros</a>
							<span class="spotifyIcon"><img src="images/spotify-icon .png" />548.631.165 </span>
							<span class="youtubeIcon"><img src="images/youtube-icon .png" />382.841.844</span>
						</div>
						<!-- Musica 3 -->
						<div class="musica msc3">
							<a>Heart shaped box</a>
							<a>In Utero</a>
							<img class="img-fluid" src="images/heartshaped-foto.jpg" />
							<a>Numeros</a>
							<span class="spotifyIcon"><img src="images/spotify-icon .png" />298.570.044</span>
							<span class="youtubeIcon"><img src="images/youtube-icon .png" />19.482.643</span>
						</div>
						<!-- Musica 4 -->
						<div class="musica msc4">
							<a>Lithium</a>
							<a>Nevermind</a>
							<img class="img-fluid" src="images/lithium-foto.jpg" />
							<a>Numeros</a>
							<span class="spotifyIcon"><img src="images/spotify-icon .png" />285.710.502</span>
							<span class="youtubeIcon"><img src="images/youtube-icon .png" />196.008.341</span>
						</div>
						<!-- Musica 5 -->
						<div class="musica msc5">
							<a>Man Who Sold world</a>
							<a>MTV Unplugged</a>
							<img class="img-fluid" src="images/The-man-who.jpg" />
							<p>Numeros</p>
							<span class="spotifyIcon"><img src="images/spotify-icon .png" />185.399.532</span>
							<span class="youtubeIcon"><img src="images/youtube-icon .png" />329.851.473</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row d-lg-none mt-5">
				<div class="col-12">
					<div class="swiper-container swiper-container-musica">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="musica">
									<a>Smells like teen spirit</a>
									<a>Nevermind</a>
									<img class="img-fluid" src="images/nevermind-album.jpg" />
									<a>Numeros</a>
									<span class="spotifyIcon"><img src="images/spotify-icon .png" />886.797.553</span>
									<span class="youtubeIcon"><img src="images/youtube-icon .png" />1.200.952.484</span>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="musica">
									<a>Come As You Are</a>
									<a>Nevermind</a>
									<img class="img-fluid" src="images/comeasyouhere-foto.jpg" />
									<a>Numeros</a>
									<span class="spotifyIcon"><img src="images/spotify-icon .png" />548.631.165 </span>
							        <span class="youtubeIcon"><img src="images/youtube-icon .png" />382.841.844</span>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="musica">
									<a>Heart shaped box</a>
                                    <a>In Utero</a>
                                    <img class="img-fluid" src="images/heartshaped-foto.jpg" />
                                    <a>Numeros</a>
                                    <span class="spotifyIcon"><img src="images/spotify-icon .png" />298.570.044</span>
                                    <span class="youtubeIcon"><img src="images/youtube-icon .png" />19.482.643</span>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="musica">
									<a>Lithium</a>
							        <a>Nevermind</a>
							        <img class="img-fluid" src="images/lithium-foto.jpg" />
							        <a>Numeros</a>
							        <span class="spotifyIcon"><img src="images/spotify-icon .png" />285.710.502</span>
							        <span class="youtubeIcon"><img src="images/youtube-icon .png" />196.008.341</span>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="musica">
									<a>The Man Who Sold the world</a>
                                    <a>MTV Unplugged</a>
                                    <img class="img-fluid" src="images/The-man-who.jpg" />
                                    <p>Numeros</p>
                                    <span class="spotifyIcon"><img src="images/spotify-icon .png" />185.399.532</span>
                                    <span class="youtubeIcon"><img src="images/youtube-icon .png" />329.851.473</span>
								</div>
							</div>
						</div>
						<div class="swiper-pagination swiper-pagination-musica"></div>
					</div>
				</div>	
			</div>
		</div>

		<!-- Historia da Banda -->
		<div class="container mt-5 mb-5 bg-warning p-5" id="historia">
            <div class="row">
                <div class="col-md-5">
                    <div class="swiper-container swiper-container-historia swiper-container-texto">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide d-grid text-center">
                                <h3 class="text-center text-uppercase">primeiro show com casa cheia</h3>
                                <p class="">
                                    A base de fãs do Nirvana enlouqueceu nos últimos dias com um vídeo que chegou ao YouTube que mostra uma apresentação dos primórdios do lendário grupo.
                                </p>
                                <p>
                                    A base de fãs do Nirvana enlouqueceu nos últimos dias com um vídeo que chegou ao YouTube que mostra uma apresentação dos primórdios do lendário grupo.
                                </p>
                                <p>
                                    
                                O vídeo, datado de 28 de dezembro de 1988 e registrado no The Underground de Seattle, mostra a banda formada naquela época por Kurt Cobain (voz e guitarra) Krist Novoselic (baixo) e Chad Channing (bateria) interpretando “School”, faixa que seria lançada no ano seguinte em seu primeiro álbum, Bleach.
                                </p>
                            </div>
                            <div class="swiper-slide d-grid text-center">
                                <h3 class="text-center text-uppercase">Há quase 27 anos, o Nirvana fazia seu último show</h3>
                                <p>
                                    No dia 1º de março de 1994, Nirvana, a icônica banda de grunge, fez sua última apresentação. E foi um desastre. Apesar de muitos fãs acharem que o Acústico MTV de 1993 tenha sido o último show do grupo de Aberdeen por conta do clima de velório, Kurt Cobain e cia. subiram juntos pela útima vez num palco em um hangar em Munique, na Alemanha.
                                </p>
                                <p>
                                    O show foi realizado para 3 mil pessoas e contou com ingredientes terrivelmente digeridos pelos fãs que estavam assistindo. Vamos ao menu desagradável: acústica ruim, nada apta a sediar um show pauleira de uma banda de rock; no início de Come As You Are, clássico do Nirvana, os integrantes do grupo precisaram recomeçar a música por conta de uma efêmera falta de energia no pico. Você pode ouvir este momento no vídeo abaixo, a partir dos 17 minutos.
                                </p>
                            </div>
                            <div class="swiper-slide d-grid text-center">
                                <h3 class="text-center text-uppercase">O dia que o Nirvana Tocou em São Paulo</h3>
                                <p>
                                    Essa mitológica apresentação do Nirvana em São Paulo, em janeiro de 1993, é tida pela banda como a mais desastrosa da carreira do grupo de Kurt Cobain. A crítica musical brasileira malhou. Mas ninguém da platéia estava nem aí para isso. Gente do Nirvana disse à época que foi o maior público para o qual o grupo se apresentou. O show foi uma ZONA, mas o Nirvana tinha acabado de deixar a música pop uma zona, de qualquer modo. Então fazia sentido. A palavra que eu mais gosto de utilizar para definir esse concerto é: CATARSE. Ver o Nirvana, naquele instante, aqui em São Paulo, era como ver os Beatles em San Francisco em 1966. Estar no Morumbi naquela noite parecia ao mesmo tempo que alg... - Veja mais em https://popload.blogosfera.uol.com.br/2013/01/16/20-anos-o-dia-em-que-o-nirvana-tocou-em-sao-paulo-e-o-que-o-dave-grohl-disse-a-popload-sobre-o-show-alguns-anos-depois/?cmpid=copiaecola
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="swiper-container swiper-container-historia">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide "><img class="w-100" src="images/Primeiro-show-foto.jpg" ></div>
                            <div class="swiper-slide"><img class="w-100" src="images/ultimo-show.jpg"></div>
                            <div class="swiper-slide"><img class="w-100" src="images/nirvana-sp.png"></div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination swiper-pagination-historia"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev swiper-button-prev-historia"></div>
                        <div class="swiper-button-next swiper-button-next-historia"></div>
                    </div>
                </div>
            </div>
        </div>

		<!-- Footer -->
		<div class="container-fluid bg-warning ">
			<div class="row">
				<div class="col-12 text-center p-2">
					<a href="instagram.com">Instagram</a> I
					<a href="facebook.com">Facebook</a>
					<p>Nirvana Inc - Lucas Soares</p>
				</div>
			</div>
		</div>

		<!-- Bootstrap Js -->
		<script src="https://code.jquery.com/jquery-3.5.1.js"
				integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
        </script>
        <script src="script/player-musica.js"></script>
        
		<!-- Boostrap Js -->
		<script src="script/bootstrap.bundle.js"
				integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
				crossorigin="anonymous">
        </script>
        
		<!-- Script Player de Musica -->
		<script
				src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
				integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
				crossorigin="anonymous">
        </script>
        
		<!-- Swiper(Slides) Objetos/Variaveis -->
        <script src="script/swiper-bundle.js"></script>
		<script>	
			var mySwiperAgenda = new Swiper(".swiper-container-agenda", {
				slidesPerView: 1,
				navigation: {
					nextEl: ".swiper-button-next-agenda",
					prevEl: ".swiper-button-prev-agenda",
				},
				loop: true,

			});
			var mySwiperHistoria = new Swiper(".swiper-container-historia", {
				loop:true,
				pagination: {
					el: ".swiper-pagination-historia",
				},
				allowTouchMove: false,
				navigation: {
					nextEl: ".swiper-button-next-historia",
					prevEl: ".swiper-button-prev-historia",
				},
			});
			var mySwiperMusica = new Swiper(".swiper-container-musica", {
				loop: true,
				slidesPerView: 1,
				spaceBetween: 30,
				pagination: {
					el: ".swiper-pagination-musica",
				},
			});
			var mySwiperDisco = new Swiper(".swiper-container-disco", {
				loop: true,
				slidesPerView: 1,
				spaceBetween: 30,
				pagination: {
					el: ".swiper-pagination-disco",
				},
			});
		</script>
	</body>
</html>
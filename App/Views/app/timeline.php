<nav class="navbar navbar-expand-lg menu">
	<div class="container">
		<div class="navbar-nav">
			<a class="menuItem" href="/timeline">
				Home
			</a>

			<a class="menuItem" href="/exit">
				Sair
			</a>
			<img src="/img/twitter_logo.png" class="menuIco" />
		</div>
	</div>
</nav>

<div class="container mt-5">
	<div class="row pt-2">

		<div class="col-md-3">

			<div class="perfil">
				<div class="perfilTopo">

				</div>

				<div class="perfilPainel">

					<div class="row mt-2 mb-2">
						<div class="col mb-2">
							<span class="perfilPainelNome"><?php echo $this->view->user['name'];?></span>
						</div>
					</div>

					<div class="row mb-2">

						<div class="col">
							<span class="perfilPainelItem">Tweets</span><br />
							<span class="perfilPainelItemValor">0</span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguindo</span><br />
							<span class="perfilPainelItemValor">0</span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguidores</span><br />
							<span class="perfilPainelItemValor">0</span>
						</div>

					</div>

				</div>
			</div>

		</div>

		<div class="col-md-6">
			<div class="row mb-2">
				<div class="col tweetBox">
					<form method="post" action="/tweet">
						<textarea class="form-control" name="tweet" id="exampleFormControlTextarea1" rows="3"></textarea>

						<div class="col mt-2 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Tweet</button>
						</div>

					</form>
				</div>
			</div>
			<?php foreach ($this->view->tweets as $id_tweet => $tweet) { ?>
				<div class="row tweet">
					<div class="col">
						<p><strong><?= $tweet['name'] ?></strong> <span class="text text-muted">- <?= $tweet['data'] ?></span></p>
						<p><?= $tweet['tweet'] ?></p>
						<br />
						<form action="/delete" method="get">
							
							<div class="col d-flex justify-content-end">
								<button type="submit" class="btn btn-danger" name="idtweet" value="<?php echo $tweet['idtweet'] ?>"><small>Remover</small></button>
							</div>
						</form>
					</div>
				</div>
			<?php } ?>



		</div>


		<div class="col-md-3">
			<div class="quemSeguir">
				<span class="quemSeguirTitulo">Quem seguir</span><br />
				<hr />
				<a href="/whotofollow" class="quemSeguirTxt" >Procurar por pessoas conhecidas</a>
			</div>
		</div>

	</div>
</div>
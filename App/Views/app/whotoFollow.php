<nav class="navbar navbar-expand-lg menu">
	<div class="container">
		<div class="navbar-nav">
			<a class="menuItem" href="/timeline">
				Home
			</a>

			<a class="menuItem" href="/sair">
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
							<span class="perfilPainelNome">Nome do Usuário</span>
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
				<div class="col">
					<div class="card">
						<div class="card-body">
							<form method="GET" action="/whotofollow">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="findFor" placeholder="Quem você está procurando?">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit">Procurar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php foreach ($this->view->user as $indice_arr => $user) { ?>
				<div class="row mb-2">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<?= $user['name'] ?>
									</div>

									<div class="col-md-6 d-flex justify-content-end">
										<?php if ($_SESSION['iduser'] != $user['idUser']) {  ?>
											<div>
												<a href="#" class="btn btn-success">Seguir</a>
												<a href="#" class="btn btn-danger">Deixar de seguir</a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
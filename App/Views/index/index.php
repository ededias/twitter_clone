<div class="container-fluid h-100">
	<div class="row">
    
    <div class="col-md-6 banner">
    	<div class="row h-100 justify-content-center align-items-center">
    		<div>
				<div class="communicationItem">
					<i class="fas fa-search fa-2x mr-3"></i>
					Siga o que lhe interessa.
				</div>
				<div class="communicationItem">
					<i class="fas fa-user-friends fa-2x mr-3"></i>
					Saiba sobre o que as pessoas estão falando.
				</div>
				<div class="communicationItem">
					<i class="far fa-comment fa-2x mr-3"></i>
					Participe da conversa.
				</div>
			</div>
		</div>
    </div>

    <div class="col-md-6 pt-4 pl-5 pr-5">
		<form method="post" action="/autenticate">
			<div class="row">
				<div class="col">
					<input type="text" name="email" class="form-control" placeholder="E-mail">
				</div>
				<div class="col">
					<input type="password" name="password" class="form-control" placeholder="Senha">
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary mb-2">Entrar</button>
				</div>
				
			</div>
			<div class="row">
				<div class="col">
					<?php if($this->view->login == 'error') { ?>	
						<span class="text text-danger">E-mail ou senha invalidos </span>
					<?php }?>
				</div>
			</div>
		</form>

		<div class="row pt-5 pl-5 pr-5">
			<div class="col pl-5 pr-5">
				<img src="/img/twitter_logo.png" />
				<h1 class="title">Veja o que está acontecendo no mundo agora</h1>

				<h2 class="mt-5 subtitle">Participe hoje do Twitter.</h2>
				<a href="/register" class="btn btn-primary btn-block mb-2">Inscrever-se</a>
			</div>	
		</div>


    </div>

  </div>
</div>
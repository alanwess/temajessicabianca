<?php get_header(); //Template Name: Contato 
	
	if ( 'POST' == $_SERVER['REQUEST_METHOD']) {

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];

		$formularioEnviado = isset($nome) && isset($email) && isset($mensagem);

		if($formularioEnviado) {
			$enviou = enviar_email('inbox@jessicabianca.com.br','Solicitação de contato de '.$nome, 'Foi solicitado contato por '.$nome.' com o email '.$email.' contendo a seguinte mensagem: '.$mensagem);

			if($enviou) { 
				$message = '<div class="col-md-12" style="margin-top: 20px;"><div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Sucesso!</strong> Seu email de solicitação de contato foi enviado, em breve entraremos em contato <3.
						</div></div>';
			} else { 
				$message = '<div class="col-md-12" style="margin-top: 20px;"><div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Erro!</strong> Não foi possivel enviar o email de solicitação de contato...
						</div></div>';
			} 
		}

	}else{
		$message = "";
	}

?>

		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="https://jessicabianca.com.br/"><img src="https://jessicabianca.com.br/wp-content/themes/rhumanize/images/logo.jpg" alt="logo" width="40px" style="border-top-left-radius: 25px;border-bottom-right-radius: 1px;border-bottom-left-radius: 25px;border-top-right-radius: 25px;transform: rotate(-10deg);margin-right: 3px;"></a> Jéssica Bianca</h1>
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li><a href="<?= home_url( '/' ); ?>">Home</a></li>
							<li><a href="<?= home_url( '/pessoa' ); ?>">Para você</a></li>
							<li><a href="<?= home_url( '/empresa' ); ?>">Para empresa</a></li>
							<?php $count_posted = wp_count_posts('live')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/lives' ); ?>">Vídeos</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('post')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/postagens' ); ?>">Blog</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('parceiro')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/parceiros' ); ?>">Parceiros</a></li><?php endif; ?>
							<li class="active"><a href="<?= home_url( '/contato' ); ?>">Contato</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<section id="contato">
			<?= $message; ?>
			<div id="fh5co-contact" class="fh5co-section-gray">
				<div class="container">
					<form method="POST">
						<div class="row animate-box">
							<div class="col-md-6">
								<h3 class="section-title">Nossos canais</h3>
								<ul class="contact-info">
									<li><i class="icon-location-pin"></i>Atendimento presencial na região de Jundiaí/SP e São Paulo/SP</li>
									<li><i class="icon-phone2"></i>+55 11 941313955</li>
									<li><i class="icon-mail"></i><a href="mailto:inbox@jessicabianca.com.br">inbox@jessicabianca.com.br</a></li>
									<li><i class="icon-linkedin2"></i><a href="https://www.linkedin.com/in/jessicabiancarh/">RHumanize - Jéssica Bianca</a></li>
								</ul>
							</div>
							<div class="col-md-6">
								<div class="row">
									<form method="POST">
										<div class="col-md-6">
											<div class="form-group">
												<input name="nome" type="text" class="form-control" placeholder="Seu nome" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input name="email" type="email" class="form-control" placeholder="Seu email" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea name="mensagem" class="form-control" id="" cols="30" rows="7" placeholder="Sua mensagem" required></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="submit" value="Enviar mensagem" class="btn btn-primary">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>

<?php get_footer(); ?>
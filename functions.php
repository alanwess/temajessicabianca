<?php
	
	/*

		function meutema_gutenberg_support() {
			// 1. Responsividade nas mídias incorporadas, como o bloco do YouTube, por exemplo.
			add_theme_support( 'responsive-embeds' );
		 
			// 2. Estilo padrão de cada bloco.
			add_theme_support( 'wp-block-styles' );
		 
			// 3. Alinhamentos de blocos: largura completa (Full) e largura ampla (Wide)
			add_theme_support( 'align-wide' );
		 
			// 4. Paletas de cores.
			add_theme_support(
				'editor-color-palette',
				array(
					array(
						'name'  => __( 'Cor principal', 'foundationpress' ),
						'slug'  => 'principal',
						'color' => '#1779ba',
					),
					array(
						'name'  => __( 'Cor secundária', 'foundationpress' ),
						'slug'  => 'secundaria',
						'color' => '#767676',
					),
					array(
						'name'  => __( 'Sucesso', 'foundationpress' ),
						'slug'  => 'sucesso',
						'color' => '#3adb76',
					),
					array(
						'name'  => __( 'Atenção', 'foundationpress' ),
						'slug'  => 'atencao',
						'color' => '#ffae00',
					),
					array(
						'name'  => __( 'Alerta', 'foundationpress' ),
						'slug'  => 'alerta',
						'color' => '#cc4b37',
					),
				)
			);
			// 4. Desabilitar cores personalizadas.
			add_theme_support( 'disable-custom-colors' );
		 
			// 4. Tamanhos de fonte personalizados.
			add_theme_support(
				'editor-font-sizes',
				array(
					array(
						'name' => __( 'Pequeno', 'themeLangDomain' ),
						'size' => 12,
						'slug' => 'pequeno',
					),
					array(
						'name' => __( 'Normal', 'themeLangDomain' ),
						'size' => 16,
						'slug' => 'medio',
					),
					array(
						'name' => __( 'Grande', 'themeLangDomain' ),
						'size' => 20,
						'slug' => 'grande',
					),
				)
			);
			// 4. Desabilitar tamanhos de fonte personalizados.
			add_theme_support( 'disable-custom-font-sizes' );
		 
			// 5. Carregar estilos personalizados no editor. Bom para aumentar a largura do conteúdo dentro do editor de blocos.
			add_theme_support( 'editor-styles' );
			add_editor_style( 'editor-styles.css' );
			// 6. Modo escuro, para aumentar a compatibilidade do editor quando você carrega um fundo escuro no back end.
			add_theme_support( 'dark-editor-style' );
		}
		add_action( 'after_setup_theme', 'meutema_gutenberg_support' );
		
	*/
	include('class/class_SumarizeAlgorithmia.php');

	function custom_menu_page_removing() {
		remove_menu_page( 'jetpack' );                    //Jetpack* 
		remove_menu_page( 'upload.php' );                 //Media
		remove_menu_page( 'edit-comments.php' );          //Comments
		remove_menu_page( 'themes.php' );                 //Appearance
		remove_menu_page( 'plugins.php' );                //Plugins
	}
	add_action( 'admin_menu', 'custom_menu_page_removing' );

	add_action( 'init', 'wpse48017_remove_tags' );
	function wpse48017_remove_tags() {
	    global $wp_taxonomies;
	    $tax = 'post_tag'; // this may be wrong, I never remember the names on the defaults
	    if( taxonomy_exists( $tax ) )
	        unset( $wp_taxonomies[$tax] );
	}
	
	add_theme_support( 'post-thumbnails' );

	function get_titulo() {
		if(is_home() || is_front_page()) {
			echo get_bloginfo( 'description' );
			echo ' - ';
			bloginfo('name');
		} elseif (is_author()) {
			$author = get_queried_object();
    		$author_id = $author->ID;
    		echo get_author_name($author_id);
			echo ' - ';
			bloginfo('name');
		} elseif (is_search()){
			echo 'Buscando por resultados em "';
    		echo get_search_query();
			echo '" - ';
			bloginfo('name');
		} elseif (is_category()){
			$categoriaid = get_queried_object();
    		$categorianame = get_the_category_by_ID($categoriaid->term_id);
    		echo 'Pagina da categoria ';
    		echo $categorianame;
			echo ' - ';
			bloginfo('name');
		} elseif(is_404()){
			echo 'Nada encontrado neste endereço :(';
			echo ' - ';
			bloginfo('name');
		}else {
			the_title();
			echo ' - ';
			bloginfo('name');
		}
	}

	$new_page_content = '';

    $lista = array();
    array_push($lista, array("contato", "Contato", "contato.php"));
    array_push($lista, array("home", "Home", "front-page.php"));
    array_push($lista, array("lives-do-autor", "Lives do Autor", "autor-lives.php"));
    array_push($lista, array("blog-do-autor", "Blog do Autor", "autor-blog.php"));
    array_push($lista, array("busca", "Busca", "busca-geral.php"));
    array_push($lista, array("busca-de-lives", "Busca de Lives", "busca-lives.php"));
    array_push($lista, array("busca-de-postagens", "Busca de Postagens", "busca-postagens.php"));
    array_push($lista, array("lives-da-categoria", "Lives da Categoria", "categoria-lives.php"));
    array_push($lista, array("blog-da-categoria", "Blog da Categoria", "categoria-blog.php"));
    array_push($lista, array("lives", "Lives", "lives.php"));
    array_push($lista, array("parceiros", "Parceiros", "parceiros.php"));
    array_push($lista, array("postagens", "Blog", "postagens.php"));
    array_push($lista, array("pessoafisica", "Para você", "servicos-pessoa.php"));
    array_push($lista, array("pessoajuridica", "Para empresa", "servicos-empresa.php"));

    foreach ($lista as $itemlista) {
		if (isset($_GET['activated']) && is_admin()){
	  
	  		$new_page_name = $itemlista[0];
		    $new_page_title = $itemlista[1];
		    $new_page_template = $itemlista[2];
		    	  
		    $page_check = get_page_by_title($new_page_title);
		    $new_page = array(
		        'post_type' => 'page',
		        'post_name' => $new_page_name,
		        'post_title' => $new_page_title,
		        'post_content' => $new_page_content,
		        'post_status' => 'publish',
		        'post_author' => 1,
		    );
		    if(!isset($page_check->ID)){
		        $new_page_id = wp_insert_post($new_page);
		        if(!empty($new_page_template)){
		            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		        }
		    }
		  
		}
	}

	$homepage = get_page_by_title('Home');
	if ($homepage){
	    update_option('page_on_front', $homepage->ID );
	    update_option('show_on_front', 'page' );
	}

	function registrar_lives() {
		$descricao = 'Usado para listar as Vídeos';
		$singular = 'Vídeo';
		$plural = 'Vídeos';

		$labels = array(
			'name' => $plural,
			'singular_name' => $singular,
			'view_item' => 'Ver ' . $singular,
			'edit_item' => 'Editar ' . $singular,
			'new_item' => 'Novo ' . $singular,
			'add_new_item' => 'Adicionar nova ' . $singular
		);

		$supports = array(
			'title',
			'editor',
			'thumbnail'
		);

		$args = array(
			'labels' => $labels,
			'description' => $descricao,
			'public' => true,
			'menu_icon' => 'dashicons-format-video',
			'supports' => $supports,
			'taxonomies' => array( 'category' )
		);

		register_post_type( 'live', $args);	
	}
	add_action('init', 'registrar_lives');

	function registrar_pessoas() {
		$descricao = 'Usado para listar os serviços de pessoas';
		$singular = 'Pessoa';
		$plural = 'Pessoas';

		$labels = array(
			'name' => $plural,
			'singular_name' => $singular,
			'view_item' => 'Ver ' . $singular,
			'edit_item' => 'Editar ' . $singular,
			'new_item' => 'Novo ' . $singular,
			'add_new_item' => 'Adicionar novo ' . $singular
		);

		$supports = array(
			'title',
			'excerpt',
			'editor'
		);

		$args = array(
			'labels' => $labels,
			'description' => $descricao,
			'public' => true,
			'menu_icon' => 'dashicons-universal-access',
			'supports' => $supports
		);

		register_post_type( 'pessoa', $args);	
	}
	add_action('init', 'registrar_pessoas');

	function registrar_empresas() {
		$descricao = 'Usado para listar os serviços de empresas';
		$singular = 'Empresa';
		$plural = 'Empresas';

		$labels = array(
			'name' => $plural,
			'singular_name' => $singular,
			'view_item' => 'Ver ' . $singular,
			'edit_item' => 'Editar ' . $singular,
			'new_item' => 'Novo ' . $singular,
			'add_new_item' => 'Adicionar novo ' . $singular
		);

		$supports = array(
			'title',
			'excerpt',
			'editor'
		);

		$args = array(
			'labels' => $labels,
			'description' => $descricao,
			'public' => true,
			'menu_icon' => 'dashicons-building',
			'supports' => $supports
		);

		register_post_type( 'empresa', $args);	
	}
	add_action('init', 'registrar_empresas');

	function registrar_parceiros() {
		$descricao = 'Usado para listar os parceiros';
		$singular = 'Parceiro';
		$plural = 'Parceiros';

		$labels = array(
			'name' => $plural,
			'singular_name' => $singular,
			'view_item' => 'Ver ' . $singular,
			'edit_item' => 'Editar ' . $singular,
			'new_item' => 'Novo ' . $singular,
			'add_new_item' => 'Adicionar novo ' . $singular
		);

		$supports = array(
			'title'
		);

		$args = array(
			'labels' => $labels,
			'description' => $descricao,
			'public' => true,
			'menu_icon' => 'dashicons-businessman',
			'supports' => $supports
		);

		register_post_type( 'parceiro', $args);	
	}
	add_action('init', 'registrar_parceiros');

	function adicionar_meta_info_lives() {
		add_meta_box(
			'informacoes_live',
			'Informações da Live',
			'informacoes_live_container',
			'live',
			'normal',
			'high'
		);
	}
	add_action('add_meta_boxes', 'adicionar_meta_info_lives');

	function informacoes_live_container( $post ) { 
		$lives_meta_data = get_post_meta( $post->ID ); 
		?>

		<style>
			.metabox {
				display: flex;
				justify-content: space-between;
			}

			.metabox-item {
				flex-basis: 30%;

			}

			.metabox-item label {
				font-weight: 700;
				display: block;
				margin: .5rem 0;

			}

			.input-addon-wrapper {
				height: 30px;
				display: flex;
				align-items: center;
			}

			.input-addon {
				display: block;
				border: 1px solid #CCC;
				border-bottom-left-radius: 5px;
				border-top-left-radius: 5px;
				height: 100%;
				width: 30px;
				text-align: center;
				line-height: 30px;
				box-sizing: border-box;
				background-color: #888;
				color: #FFF;
			}

			.metabox-input {
				width: 150px;
				height: 30px;
				border: 1px solid #CCC;
				margin: 0;
			}
		</style>

		<div class="metabox-item" style="margin-top: 10px;">
			<label>Link da Live/Vídeo (Facebook) ou ID do Vídeo (Youtube):</label>
			<input type="text" name="livelink_id" style="width: 100%" value="<?= $lives_meta_data['livelink_id'][0]; ?>">
		</div>
		<div class="metabox-item" style="margin-top: 10px;">
			<label>Hora/Minuto da Live/Vídeo:</label>
			<input type="text" name="horalive_id" style="width: 40px" value="<?= $lives_meta_data['horalive_id'][0]; ?>">:<input type="text" name="minlive_id" style="width: 40px" value="<?= $lives_meta_data['minlive_id'][0]; ?>">
		</div>
		<div class="metabox-item" style="margin-top: 10px;">
			<label>Dia da Live/Vídeo:</label>
			<select name="d_dia_id" style="width: 30%"><?php
				if($lives_meta_data['d_dia_id'][0] != ''){ echo '<option value="'.$lives_meta_data['d_dia_id'][0].'">'.$lives_meta_data['d_dia_id'][0].'</option>';}
		   		for ( $i = 1; $i <= 31; $i++ ) {
		   			echo '<option value="'.$i.'">'.$i.'</option>';
		   		}
		   	?></select>
   			 <select name="d_mes_id" style="width: 30%"><?php
   			 	 $i = 0;
   			 	 $months = array( 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' );
   				 foreach ( $months as $month ) {
   				    if(intval($lives_meta_data['d_mes_id'][0]) == $i) $inicio = "<option value=".$i.">".$month."</option>";
   				    $fim = $fim."<option value=".$i.">".$month."</option>";
   					$i++;
   				 }
   				 echo $inicio.$fim;
   			 ?></select>
   			 <select name="d_ano_id" style="width: 30%"><?php
   				 if($lives_meta_data['d_ano_id'][0] != ''){ echo '<option value="'.$lives_meta_data['d_ano_id'][0].'">'.$lives_meta_data['d_ano_id'][0].'</option>'; }
   				 for ( $i = 2018; $i <= 2030; $i++ ) {
   					 echo '<option value="'.$i.'">'.$i.'</option>';
   				 }
   			 ?></select>
		</div>
		<div class="metabox-item" style="margin-top: 10px;">
			<label>Origem da Live/Vídeo:</label>
			<select name="tipo_live_id" style="width: 100%">
		   		<?php if($lives_meta_data['tipo_live_id'][0] != '') echo '<option value="'.$lives_meta_data['tipo_live_id'][0].'">'.$lives_meta_data['tipo_live_id'][0].'</option>'; ?>
		   		<option value="Facebook">Facebook</option>
		   		<option value="Youtube">Youtube</option>
		   	</select>
		</div>
		<div class="metabox-item" style="margin-top: 10px;">
			<label>Estado da Live/Vídeo:</label>
			<select name="estado_live_id" style="width: 100%">
		   		<?php if($lives_meta_data['estado_live_id'][0] != '') echo '<option value="'.$lives_meta_data['estado_live_id'][0].'">'.$lives_meta_data['estado_live_id'][0].'</option>'; ?>
		   		<option value="Offline">Offline</option>
		   		<option value="Online">Online</option>
		   	</select>
		</div>

	<?php

	}

	function salvar_meta_info_live( $post_id ) {
		if( isset($_POST['livelink_id']) ) {
			update_post_meta( $post_id, 'livelink_id', sanitize_text_field( $_POST['livelink_id'] ) );
		}
		if( isset($_POST['horalive_id']) ) {
			update_post_meta( $post_id, 'horalive_id', sanitize_text_field( $_POST['horalive_id'] ) );
		}
		if( isset($_POST['minlive_id']) ) {
			update_post_meta( $post_id, 'minlive_id', sanitize_text_field( $_POST['minlive_id'] ) );
		}
		if( isset($_POST['d_dia_id']) ) {
			update_post_meta( $post_id, 'd_dia_id', sanitize_text_field( $_POST['d_dia_id'] ) );
		}
		if( isset($_POST['d_mes_id']) ) {
			update_post_meta( $post_id, 'd_mes_id', sanitize_text_field( $_POST['d_mes_id'] ) );
		}
		if( isset($_POST['d_ano_id']) ) {
			update_post_meta( $post_id, 'd_ano_id', sanitize_text_field( $_POST['d_ano_id'] ) );
		}
		if( isset($_POST['tipo_live_id']) ) {
			update_post_meta( $post_id, 'tipo_live_id', sanitize_text_field( $_POST['tipo_live_id'] ) );
		}
		if( isset($_POST['estado_live_id']) ) {
			update_post_meta( $post_id, 'estado_live_id', sanitize_text_field( $_POST['estado_live_id'] ) );
		}
	}

	add_action('save_post', 'salvar_meta_info_live');

	function adicionar_meta_info_pessoa() {
		add_meta_box(
			'informacoes_pessoa',
			'Informações de Serviço para Pessoas',
			'informacoes_pessoa_container',
			'pessoa',
			'normal',
			'high'
		);
	}
	add_action('add_meta_boxes', 'adicionar_meta_info_pessoa');

	function informacoes_pessoa_container( $post ) { 
		$servicos_meta_data = get_post_meta( $post->ID ); ?>

		<style>

			.metabox-item label {
				font-weight: 700;
				display: block;
				margin: .5rem 0;

			}

			.input-addon-wrapper {
				height: 30px;
				display: flex;
				align-items: center;
			}

			.input-addon {
				display: block;
				border: 1px solid #CCC;
				border-bottom-left-radius: 5px;
				border-top-left-radius: 5px;
				height: 100%;
				width: 30px;
				text-align: center;
				line-height: 30px;
				box-sizing: border-box;
				background-color: #fff;
				padding-top: 8px;
			}

			.metabox-input {
				width: 100vh;
				height: 30px;
				border: 1px solid #CCC;
				margin: 0;
			}

		</style>
		<div class="metabox">			
			<div class="metabox-item">
				<label for="link-input">Icone (Font Awesome):</label>
				<input id="link-input" class="metabox-input" type="text" name="pessoa_icone_id"
					value="<?= $servicos_meta_data['pessoa_icone_id'][0]; ?>">
			</div>
			<div class="metabox-item">
				<label for="link-input">Valor do serviço:</label>
				<input id="link-input" class="metabox-input" type="text" name="pessoa_valor_id"
					value="<?= $servicos_meta_data['pessoa_valor_id'][0]; ?>">
			</div>
		</div>

	<?php

	}

	function salvar_meta_info_pessoa( $post_id ) {
		if( isset($_POST['pessoa_icone_id']) ) {
			update_post_meta( $post_id, 'pessoa_icone_id', sanitize_text_field( $_POST['pessoa_icone_id'] ) );
		}
		if( isset($_POST['pessoa_valor_id']) ) {
			update_post_meta( $post_id, 'pessoa_valor_id', sanitize_text_field( $_POST['pessoa_valor_id'] ) );
		}
	}
	add_action('save_post', 'salvar_meta_info_pessoa');

	function adicionar_meta_info_empresa() {
		add_meta_box(
			'informacoes_empresa',
			'Informações de Serviço para Empresas',
			'informacoes_empresa_container',
			'empresa',
			'normal',
			'high'
		);
	}
	add_action('add_meta_boxes', 'adicionar_meta_info_empresa');

	function informacoes_empresa_container( $post ) { 
		$servicos_meta_data = get_post_meta( $post->ID ); ?>

		<style>

			.metabox-item label {
				font-weight: 700;
				display: block;
				margin: .5rem 0;

			}

			.input-addon-wrapper {
				height: 30px;
				display: flex;
				align-items: center;
			}

			.input-addon {
				display: block;
				border: 1px solid #CCC;
				border-bottom-left-radius: 5px;
				border-top-left-radius: 5px;
				height: 100%;
				width: 30px;
				text-align: center;
				line-height: 30px;
				box-sizing: border-box;
				background-color: #fff;
				padding-top: 8px;
			}

			.metabox-input {
				width: 100vh;
				height: 30px;
				border: 1px solid #CCC;
				margin: 0;
			}

		</style>
		<div class="metabox">			
			<div class="metabox-item">
				<label for="link-input">Icone (Font Awesome):</label>
				<input id="link-input" class="metabox-input" type="text" name="empresa_icone_id"
					value="<?= $servicos_meta_data['empresa_icone_id'][0]; ?>">
			</div>
			<div class="metabox-item">
				<label for="link-input">Valor do serviço:</label>
				<input id="link-input" class="metabox-input" type="text" name="empresa_valor_id"
					value="<?= $servicos_meta_data['empresa_valor_id'][0]; ?>">
			</div>
		</div>

	<?php

	}

	function salvar_meta_info_empresa( $post_id ) {
		if( isset($_POST['empresa_icone_id']) ) {
			update_post_meta( $post_id, 'empresa_icone_id', sanitize_text_field( $_POST['empresa_icone_id'] ) );
		}
		if( isset($_POST['empresa_valor_id']) ) {
			update_post_meta( $post_id, 'empresa_valor_id', sanitize_text_field( $_POST['empresa_valor_id'] ) );
		}
	}
	add_action('save_post', 'salvar_meta_info_empresa');

	function adicionar_meta_info_parceiros() {
		add_meta_box(
			'informacoes_parceiro',
			'Informações do Parceiro',
			'informacoes_parceiro_container',
			'parceiro',
			'normal',
			'high'
		);
	}
	add_action('add_meta_boxes', 'adicionar_meta_info_parceiros');

	function informacoes_parceiro_container( $post ) { 
		$parceiros_meta_data = get_post_meta( $post->ID ); 
		?>

		<style>
			.metabox {
				display: flex;
				justify-content: space-between;
			}

			.metabox-item {
				flex-basis: 30%;

			}

			.metabox-item label {
				font-weight: 700;
				display: block;
				margin: .5rem 0;

			}

			.input-addon-wrapper {
				height: 30px;
				display: flex;
				align-items: center;
			}

			.input-addon {
				display: block;
				border: 1px solid #CCC;
				border-bottom-left-radius: 5px;
				border-top-left-radius: 5px;
				height: 100%;
				width: 30px;
				text-align: center;
				line-height: 30px;
				box-sizing: border-box;
				background-color: #888;
				color: #FFF;
			}

			.metabox-input {
				width: 150px;
				height: 30px;
				border: 1px solid #CCC;
				margin: 0;
			}
		</style>

		<div class="metabox-item" style="margin-top: 10px;">
			<label>Nome do parceiro:</label>
			<input type="text" name="nomeparceiro_id" style="width: 100%" value="<?= $parceiros_meta_data['nomeparceiro_id'][0]; ?>">
		</div>
		<div class="metabox-item" style="margin-top: 10px;">
			<label>Link do logo do parceiro:</label>
			<input type="text" name="logoparceiro_id" style="width: 100%" value="<?= $parceiros_meta_data['logoparceiro_id'][0]; ?>">
		</div>
		<div class="metabox-item" style="margin-top: 10px;">
			<label>Link do parceiro:</label>
			<input type="text" name="linkparceiro_id" style="width: 100%" value="<?= $parceiros_meta_data['linkparceiro_id'][0]; ?>">
		</div>

	<?php

	}

	function salvar_meta_info_parceiro( $post_id ) {
		if( isset($_POST['nomeparceiro_id']) ) {
			update_post_meta( $post_id, 'nomeparceiro_id', sanitize_text_field( $_POST['nomeparceiro_id'] ) );
		}
		if( isset($_POST['logoparceiro_id']) ) {
			update_post_meta( $post_id, 'logoparceiro_id', sanitize_text_field( $_POST['logoparceiro_id'] ) );
		}
		if( isset($_POST['linkparceiro_id']) ) {
			update_post_meta( $post_id, 'linkparceiro_id', sanitize_text_field( $_POST['linkparceiro_id'] ) );
		}
	}

	add_action('save_post', 'salvar_meta_info_parceiro');

	function enviar_email($email, $titulo, $mensagem) {
			return wp_mail($email, $titulo, $mensagem);
	}

	function the_breadcrumb() {
			echo '<ol class="breadcrumb">';
		if (!is_home()) {
			echo '<li class="breadcrumb-item"><a href="';
			echo get_option('home');
			echo '">';
			echo '<i class="fa fa-home"></i> Home';
			echo "</a></li>";
			if (is_category() || is_single()) {
				echo '<li class="breadcrumb-item">';
				the_category(' </li><li> ');
				if (is_single()) {
					echo '</li><li class="breadcrumb-item-active">';
					the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				echo '<li class="breadcrumb-item-active">';
				echo the_title();
				echo '</li>';
			}
		}
		elseif (is_tag()) {single_tag_title();}
		elseif (is_day()) {echo'<li class="breadcrumb-item">Arquivo para '; the_time('F jS, Y'); echo'</li>';}
		elseif (is_month()) {echo'<li class="breadcrumb-item">Arquivo para '; the_time('F, Y'); echo'</li>';}
		elseif (is_year()) {echo'<li class="breadcrumb-item">Arquivo para '; the_time('Y'); echo'</li>';}
		elseif (is_author()) {echo'<li class="breadcrumb-item">Arquivo do Autor'; echo'</li>';}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo '<li class="breadcrumb-item">Arquivo'; echo'</li>';}
		elseif (is_search()) {echo'<li class="breadcrumb-item">Resultados de busca'; echo'</li>';}
		echo '</ol>';
	}

    function cfw_add_user_social_links( $user_contact ) {

	    $user_contact['twitter']   = __('Twitter', 'textdomain');
	    $user_contact['facebook']  = __('Facebook', 'textdomain');
	    $user_contact['linkedin']  = __('LinkedIn', 'textdomain');
	    $user_contact['googleplus'] = __('Google Plus', 'textdomain');
	    $user_contact['instagram'] = __('Instagram', 'textdomain');
	    $user_contact['youtube']   = __('Youtube', 'textdomain');
	    $user_contact['skype']     = __('Skype', 'textdomain');
	    $user_contact['whatsapp']  = __('Whatsapp', 'textdomain');
	    return $user_contact;
	}
	add_filter('user_contactmethods', 'cfw_add_user_social_links');

	function tt_reading_time($postID) {
		 $content = get_post_field('post_content');
		 $word_count = str_word_count(strip_tags($content));
		 $char_count = mb_strlen(strip_tags($content), "UTF-8");
		 
		 $char_lmin=1200; $lmin = 60;
		 
		 $x = $char_count * $lmin;
		 $x = $x / $char_lmin;
		 
		 if ($char_count <= 1200) {
		 $tempo .= '< 1 min';
		 }
		 else {
		 if ($x > 3599) $tempo .= gmdate("H:i:s", $x) . ' min';
		 else $tempo .= gmdate("i:s", $x) . ' min';
		 }
		 return $tempo;
	}

	function scrapeImage($text) {
    	$pattern = '/src=[\'"]?([^\'" >]+)[\'" >]/';
    	preg_match($pattern, $text, $link);
    	$link = $link[1];
    	$link = urldecode($link);
    	return $link;
	}

	function getPostViews_offpost($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 Visualizações";
	    }
		else if ($count == '1') {
			return "1 visualização";
		}
	    return $count.' Visualizações';
	}

	function getPostViews_inpost($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "1";
	    }
		else if ($count == '1') {
			return "2";
		}
	    return $count;
	}

	function getPostViews_offlive($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 Visualizações";
	    }
		else if ($count == '1') {
			return "1 visualização";
		}
	    return $count.' Visualizações';
	}

	function getPostViews_inlive($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "1 Visualização";
	    }
		else if ($count == '1') {
			return "2 Visualizações";
		}
	    return $count.' Visualizações';
	}
	
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	// Remove issues with prefetching adding extra views
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	function tm_additional_profile_fields( $user ) {

	    $funcao_user = get_the_author_meta('funcao_user', $user->ID );

	    ?>
	    <h3>Informações Extras</h3>

	    <table class="form-table">
	    	<tr>
	    	<th><label>Função: </label></th>
	   		<td><input id="funcao_user" type="text" name="funcao_user" style="width:50%" value="<?= $funcao_user; ?>"></td>
	   		</tr>
	    </table>
	    <?php
	}

	add_action( 'show_user_profile', 'tm_additional_profile_fields' );
	add_action( 'edit_user_profile', 'tm_additional_profile_fields' );

	function tm_save_profile_fields( $user_id ) {

	    if ( ! current_user_can( 'edit_user', $user_id ) ) {
	   	 return false;
	    }

	    update_usermeta( $user_id, 'funcao_user', $_POST['funcao_user'] );
	}

	add_action( 'personal_options_update', 'tm_save_profile_fields' );
	add_action( 'edit_user_profile_update', 'tm_save_profile_fields' );


	function sumarizeByText($text){

		$sentences = preg_split('/\r\n|\r|\n/', $text);
		$sumar_obj = new SumarizeAlgorithmia();
		$new_sentences = array();

		foreach ($sentences as $sentence){
			$new_sentences[] = $sumar_obj->SumarizebyText($sentence);
		}
		
		return implode("<br>", $new_sentences);

	}

?>
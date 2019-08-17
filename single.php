<?php get_header(); ?>  

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
							<?php $count_posted = wp_count_posts('post')->publish; if ($count_posted > 0): ?><li class="active"><a href="<?= home_url( '/postagens' ); ?>">Blog</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('parceiro')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/parceiros' ); ?>">Parceiros</a></li><?php endif; ?>
							<li><a href="<?= home_url( '/contato' ); ?>">Contato</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<section id="blog">
			<div id="fh5co-blog-section" class="fh5co-section-gray">
			    <!-- Main container -->
			    <main class="container blog-page">

			      <div class="row"> 
			        <div class="col-md-8 col-lg-9 heading-section animate-box">
			          <article class="post">
					     <div class="row">
					        <nav aria-label="breadcrumb">
					          <?php the_breadcrumb(); ?>
					        </nav>
					      </div>

						<?php 
			              if( have_posts() ):
			                while( have_posts() ):
			                  the_post();
			                  setPostViews(get_the_ID());
			                  $id_post = $post->ID;
			                  $link = get_the_permalink();
			            ?>
			              <div class="blog-content">
			                <h3><?php the_title(); ?></h3>
			                <small><i>Tempo de leitura: &nbsp;<i class="fa fa-clock-o"></i> <?= tt_reading_time(get_the_author_meta( 'ID' )); ?> <br>Visualizações: &nbsp;<i class="fa fa-eye"></i> <?= getPostViews_inpost(get_the_ID()); ?> <br>Comentários: &nbsp;<i class="fa fa-comments"></i> <span class="fb-comments-count" data-href="<?= the_permalink(); ?>"></span></i></small>
			                <div class="col-md-12" style="margin-bottom: 20px;">
				                <ul class="social-icons" style="margin-top: 10px; margin-bottom: 20px;">
								  <li class="title">Compartilhar no</li>
				                  <?php

				                    $useragent=$_SERVER['HTTP_USER_AGENT'];

				                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))):

				                  ?>
				                  <li><a class="whatsapp" href="whatsapp://send?text=*<?php the_title(); ?>* -  <?= the_permalink(); ?>"><i class="fab fa-whatsapp"></i></a></li>
				                  <?php else: ?>
				                  <li><a class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?= the_permalink(); ?>&media=<?= get_the_post_thumbnail_url($post->ID,'full'); ?>"><i class="fab fa-pinterest"></i></a></li>
				                  <?php endif; ?>
				                  <li><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?= the_permalink(); ?>"><i class="fab fa-facebook"></i></a></li>
				                  <li><a class="google-plus" href="https://plus.google.com/share?url=<?= the_permalink(); ?>"><i class="fab fa-google-plus"></i></a></li>
				                  <li><a class="twitter" href="http://twitter.com/share?url=<?= the_permalink(); ?>&text=<?php the_title(); ?> em <?= $terms2[0]->name ?>"><i class="fab fa-twitter"></i></a></li>
				                  <li><a class="linkedin" href="javascript:void(0)" onclick="window.open( 'http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>', 'sharer', 'toolbar=0, status=0, width=626, height=436');return false;" title="<?php the_title(); ?>"><i class="fab fa-linkedin"></i></a></li>
				                </ul>
				            </div>
			                <div class="col-md-12 text-box-team" style="margin-top: 20px;">
			                	<img width="100%" src="<?= get_the_post_thumbnail_url(); ?>" alt="img" style="margin-bottom: 20px;">
			                	<div style="text-align: justify"><?php the_content(); ?></div>
			                </div>
			              </div>
			              	 <div class="col-md-12" style="margin-bottom: 20px;">
				           		<ul class="social-icons" style="margin-top: 10px; margin-bottom: 20px;">
								  <li class="title">Compartilhar no</li>
				                  <?php

				                    $useragent=$_SERVER['HTTP_USER_AGENT'];

				                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))):

				                  ?>
				                  <li><a class="whatsapp" href="whatsapp://send?text=*<?php the_title(); ?>* -  <?= the_permalink(); ?>"><i class="fab fa-whatsapp"></i></a></li>
				                  <?php else: ?>
				                  <li><a class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?= the_permalink(); ?>&media=<?= get_the_post_thumbnail_url($post->ID,'full'); ?>"><i class="fab fa-pinterest"></i></a></li>
				                  <?php endif; ?>
				                  <li><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?= the_permalink(); ?>"><i class="fab fa-facebook"></i></a></li>
				                  <li><a class="google-plus" href="https://plus.google.com/share?url=<?= the_permalink(); ?>"><i class="fab fa-google-plus"></i></a></li>
				                  <li><a class="twitter" href="http://twitter.com/share?url=<?= the_permalink(); ?>&text=<?php the_title(); ?> em <?= $terms2[0]->name ?>"><i class="fab fa-twitter"></i></a></li>
				                  <li><a class="linkedin" href="javascript:void(0)" onclick="window.open( 'http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>', 'sharer', 'toolbar=0, status=0, width=626, height=436');return false;" title="<?php the_title(); ?>"><i class="fab fa-linkedin"></i></a></li>
				                </ul>
				            </div>
				          	<div class="col-md-12">
				              	<ul class="post-meta">
					                <li>
					                  <h4>Links relacionados do Post</h4>
					                </li>
					                <li>
					                  <strong>Categoria: </strong>
					                  <?php  
						                    $categories = get_the_category();
						                    $separator = ' ';
						                    $output = '';
						                    if ( ! empty( $categories ) ) {
						                        foreach( $categories as $category ) {
						                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'Veja todos os posts em %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						                        }
						                        echo trim( $output, $separator );
						                    }
						              ?>
					                </li>
					                <li>
					                  <strong>Autor: </strong>
					                  <?= '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a>'; ?>
					                </li>
				              	</ul>
				            </div>
				       	<?php
			                endwhile;
			              endif;

			              $args = array(
		                      'post_type'        => 'post'
		                    );

		                    $loop = new WP_Query( $args );
		                    if( $loop->have_posts()): 
		                      $count = $loop->post_count;
		           				
			              	  if($count >= 2):
		              	?>
			              <i><small><font size="2px">Continue lendo nossos posts:</font></small></i>
				          <nav>
				            <ul class="pager">
				              <li><?= previous_post_link( '%link', '&#171; %title'); ?></li>
				              <li><?= next_post_link( '%link', '%title &#187;' ); ?></li>
				            </ul>
				          </nav>
				        <?php
				        	   endif;
				        	endif;
				        ?>

			          </article>
			        </div>

			        <div class="col-md-4 col-lg-3">
			          <div class="widget">
			            <h6 class="widget-title">Buscar</h6>
			            <div class="widget-body">
			              	<form role="search" method="get" class="search-form" action="busca-de-postagens">
							    <input class="form-control" type="text" name="busca" value="" placeholder="Digite algo para pesquisar" >
							    <div class="text-center" style="padding-top: 20px">
							    	<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Buscar</button>
								</div>
							</form>
			            </div>
			          </div>

			          <div class="widget">
			            <h6 class="widget-title">Autor do Post</h6>
			            <div class="widget-body">
			              <a href="<?= get_author_posts_url(get_the_author_meta( 'ID' ));?>">
			                <div class="team-member form-subscribenews">
			                  <h5><?= get_author_name(); ?></h5>
			                  <img width="150px" height="150px" src="<?php if(in_array('wp-user-avatar/wp-user-avatar.php', apply_filters('active_plugins', get_option('active_plugins')))){ echo scrapeImage(get_wp_user_avatar($post->post_author)); } ?>" alt="avatar">
			                  <p style="margin-top: 25px">"<?= get_the_author_meta('description'); ?>"</p>
			                  <a href="<?= get_author_posts_url(get_the_author_meta( 'ID' ));?>" class="btn btn-primary">Ver mais</a>
			                </div>
			              </a>
			            </div>
			          </div>

			          <div class="widget">
			            <h6 class="widget-title">Posts populares</h6>
			            <ul class="widget-body media-list">
			              <?php

			                $args = array(
			                    'post_type' => 'post',
			                    'posts_per_page' => 4
			                );

			                $loop = new WP_Query( $args );
			                if( $loop->have_posts() ):
			                  while( $loop->have_posts() ):
			                    $loop->the_post();
			                    if($post->ID != $id_post):
			              ?>
			              	<li>
			                  <div class="thumb"><a href="<?= the_permalink(); ?>"><img width="100%" src="<?= get_the_post_thumbnail_url(); ?>" alt="img" style="margin-bottom: 20px;"></div>
			                  <div class="content">
			                    <h5><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h5>
			                    <time datetime="2016-04-04 20:00">
			                      <?php echo get_the_date(); ?>
                      			  <br> 
			                      <?php  
			                        $categories = get_the_category();
			                        $separator = ' ';
			                        $output = '';
			                        if ( ! empty( $categories ) ) {
			                            foreach( $categories as $category ) {
			                                $output .= 'Em: <a href="#" alt="' . esc_attr( sprintf( __( 'Veja todos os posts em %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			                            }
			                            echo trim( $output, $separator );
			                        }
			                      ?>
			                    </time>
			                  </div>
			                </li>	
			              <?php
			              			endif;
			                	endwhile;
			                endif;
			              ?>		  
			            </ul>
			        </div>
			      	
			      	<div class="widget">
			            <h6 class="widget-title">Lives recentes</h6>
			            <ul class="widget-body media-list">
			            	<?php

				                $args = array(
				                    'post_type' => 'live',
				                    'posts_per_page' => 4
				                );

				                $loop = new WP_Query( $args );
				                if( $loop->have_posts() ):
				                  while( $loop->have_posts() ):
				                    $loop->the_post();
			              	?>
			              	<li>
			                  <div class="thumb"><a href="<?= the_permalink(); ?>"><img width="100%" src="<?= get_the_post_thumbnail_url(); ?>" alt="" style="-webkit-filter: brightness(0.50);filter: brightness(0.50);"></a></div>
			                  <div class="content">
			                    <h5><a href="<?= the_permalink(); ?>"><?php the_title(); ?></h5>
			                    <time datetime="2016-04-04 20:00">
			                      <?php echo get_the_date(); ?><br>
			                      <i class="fa fa-eye"></i> <?= getPostViews_offlive(get_the_ID()); ?>
			                    </time>
			                  </div>
			                </li>
			                <?php
				                	endwhile;
				                endif;
			              	?>		  
			            </ul>

			        </div>
			      </div>

			      <div class="row">
			        <div class="col-md-12 col-lg-12">
			          <div class="container">
			            <header>
			              <h3>Comentários</h3>
			              <small><font size="1px">(Mantido pelo Facebook)</font></small>
			            </header>
			            <div class="fb-comments" width="100%" data-href="<?= $link; ?>" data-numposts="5"></div>
			            <br><br>
			          </div>
			        </div>
			      </div>
			    </main>
			    <!-- END Main container -->
			</div>
		</section>

<?php get_footer(); ?>
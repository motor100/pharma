<script>
jQuery(document).ready(function($) {
	$('.catalog-tabs').tabs({active:0});
});
</script>
<!--<main class="main-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1>ПЕРВАЯ ПРОИЗВОДСТВЕННАЯ НАТУРОПАТИЧЕСКАЯ АПТЕКА</h1>
                <p class="under">
                    Природные лекарства для здоровой и осознанной жизни<br>
                    Готовые комплексы и индивидуальные рецепты
                </p>-->
				<?php //echo do_shortcode('[wpb-pcf-button]'); ?>
<!--                 <a href="#shop" class="link-button red to-anchor">Перейти в каталог</a> -->
            <!--</div>
        </div>
    </div>
    <div class="arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="24" viewBox="0 0 38 24" fill="none">
            <path d="M37.5344 1.36889C36.9135 0.744874 35.9062 0.744874 35.2854 1.36889L19.0009 19.2373L2.71472 1.36889C2.09386 0.744874 1.08649 0.744874 0.46564 1.36889C-0.155213 1.99291 -0.155213 3.00501 0.46564 3.62896L17.7956 22.6439C18.1266 22.9766 18.5669 23.1191 18.9993 23.097C19.4332 23.1191 19.872 22.9766 20.203 22.6439L37.5344 3.62729C38.1552 3.00339 38.1552 1.99291 37.5344 1.36889Z" fill="#184E66"/>
        </svg>
    </div>
</main>-->
<!--
<section class="catalog-shop" id="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="sec-title" id="catalog">Каталог продукции</p>
            </div>
            <div class="tax-wrapper">
              <?php //render_parents_catalog(); ?>
            </div>
        </div>
    </div>
</section>
-->
<!--
<section class="about-shop">
    <img class="about-fly" src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/paprika.png" alt="fly">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="img-box">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/about.jpg" alt="about">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-side">
                    <p class="sec-title">О НАС</p>
                    <div class="about-text">
                        <p>Мы команда врачей и фармацевтов, специализирующихся на естественных методах оздоровления и восстановления здоровья.</p>
                        <p>Мы создаем новую культуру здорового образа жизни и осознанного отношения к своему здоровью и здоровью окружающей среды.</p>
                        <p>Мы считаем, что болезнь – это не случайность, а возможность увидеть себя по-новому, что-то изменить в своей жизни, трансформировать негативное в прогрессивное и эволюционное.</p>
                    </div>
                    <a href="<?php //the_permalink('37'); ?>" class="link-button green">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</section>
-->


<section class="banner">
	<div class="title">
		от природы к человеку
	</div>
	<div class="all-ban">
		<div class="relative">
			<div class="about">
				<div class="v1">Первая</div>
				<div class="v2">производственная</div>
				<div class="v2">натуропатическая</div>
				<div class="v1">Аптека</div>
				<div class="btm-img"></div>
			</div>
		</div>
		<div class="var-banner">
			<div class="bn">
				<div class="img">
					 <?php echo do_shortcode('[slick-slider image_fit="true"]'); ?>
				</div>
				<div class="name">
					<!--акция или новость-->
				</div>
			</div>
		</div>
	</div>
</section>

<section class="catalog">
	<div class="title">
		Каталог
	</div>
	<div class="curved violet v2">
		<div class="one"></div>
		<div class="two"></div>
		<div class="three"></div>
	</div>
	<div class="catalog-tabs">
		<div class="groups">
			<div class="container">
				<div class="row">				
					<ul class="clear">
						<li><a href="#tabs-1"><div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/catalog-groups/1.png" alt=""></div>по сериям</a></li>
						<li><a href="#tabs-2"><div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/catalog-groups/2.png" alt=""></div>по направлениям</a></li>
						<li><a href="#tabs-3"><div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/catalog-groups/3.png" alt=""></div>подбор</a></li>
						<li><a href="#tabs-4"><div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/catalog-groups/4.png" alt=""></div>обучение</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="curved green v2">
			<div class="one"></div>
			<div class="two"></div>
			<div class="three"></div>
		</div>
		<div class="container">
			<div class="row">
				<div id="tabs-1">
					<div class="cat-wrapper">
						<?php render__catalog('183'); ?>
					</div>
				</div>
				<div id="tabs-2">
					<div class="cat-wrapper">
						<?php render__catalog('96'); ?>
					</div>
				</div>
				<div id="tabs-3">
					<div class="cat-wrapper">
						<?php
						$args = array(
						'tax_query' => array(
						'relation' => 'AND',
						array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => 'klasternii_analiz'
						)),
						'posts_per_page' => 20, 
						'post_type' => 'product', 
						'orderby' => 'title',
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						?>
						<div class="children__item">
							<div class="children__image">
								<a href="<?php echo get_permalink( $loop->post->ID ) ?>">
									<img class="ww100" src="<? echo get_the_post_thumbnail_url($loop->post->ID); ?>">
								</a>
							</div>
							<a class="subcat__link" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a>
						</div>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
				<div id="tabs-4">
					<div class="cat-wrapper">
						<?php
						$args = array(
						'tax_query' => array(
						'relation' => 'AND',
						array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => 'vebinary'
						)),
						'posts_per_page' => 20, 
						'post_type' => 'product', 
						'orderby' => 'title',
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						?>
						<div class="children__item">
							<div class="children__image">
								<a href="<?php echo get_permalink( $loop->post->ID ) ?>">
									<img class="ww100" src="<? echo get_the_post_thumbnail_url($loop->post->ID); ?>">
								</a>
							</div>
							<a class="subcat__link" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a>
						</div>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="offer m-b-200">
	<div class="title">
		Предложение недели
	</div>
	<div class="container">
        <div class="row">
			<div class="all-offer">
				<div class="items">
					<?php
						$args = array(
						'tax_query' => array(
						'relation' => 'AND',
						array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => 'predlozhenie-4'
						)),
						'posts_per_page' => 4, 
						'post_type' => 'product', 
						'orderby' => 'title',
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						if (get_post_meta( get_the_ID(), '_sale_price', true)) {$price = get_post_meta( get_the_ID(), '_sale_price', true); } else
							{$price = get_post_meta( get_the_ID(), '_regular_price', true);}
					?>
					<div class="children__item">
						<div class="children__image">
							<div class="circle-green favorite"></div>
							<a href="<?php echo get_permalink( $loop->post->ID ) ?>">
								<img src="<? echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php the_title(); ?>">
							</a>
						</div>
						<a class="subcat__link m-b-10" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a>
						<div class="price black"><span><? echo $price; ?> &#8381;</span></div>
						
					</div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div class="item">
					<?php
						$args = array(
						'tax_query' => array(
						'relation' => 'AND',
						array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => 'promo'
						)),
						'posts_per_page' => 1, 
						'post_type' => 'product', 
						'orderby' => 'title',
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						if (get_post_meta( get_the_ID(), '_sale_price', true)) {$price = get_post_meta( get_the_ID(), '_sale_price', true); } else
							{$price = get_post_meta( get_the_ID(), '_regular_price', true);}
						$full_price = get_post_meta( get_the_ID(), '_regular_price', true);
					?>
					<div style="max-height:630px;">
						<a href="<?php echo get_permalink( $loop->post->ID ) ?>"><img src="<? echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php the_title(); ?>"></a>
					</div>
					<div class="info">
						<a href="<?php echo get_permalink( $loop->post->ID ) ?>"><div class="m-b-10"><?php the_title(); ?></div></a>
						<? if ($full_price != $price) {?>
						<div class="full_price"><span><? echo $full_price; ?> &#8381;</span></div>
						<?}?>
						<div class="price"><span><? echo $price; ?> &#8381;</span><div class="circle-green favorite"></div></div>
					</div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
				
				<!--<div class="items">
					<div class="children__item">
						<div class="children__image">
							<div class="circle-green favorite"></div>
							<a href="">
								<img src="/wp-content/uploads/catalog-cat.jpg" alt="Комплексы Flowers Energy">
							</a>
						</div>
						<a class="subcat__link m-b-10" href="">Товар 1</a>
						<div class="price black"><span>700 &#8381;</span></div>
					</div>
					<div class="children__item">
						<div class="children__image">
							<div class="circle-green favorite"></div>
							<a href="">
								<img src="/wp-content/uploads/catalog-cat.jpg" alt="Комплексы Flowers Energy">
							</a>
						</div>
						<a class="subcat__link m-b-10" href="">Товар 2</a>
						<div class="price black"><span>480 &#8381;</span></div>
					</div>
					<div class="children__item">
						<div class="children__image">
							<div class="circle-green favorite"></div>
							<a href="">
								<img src="/wp-content/uploads/catalog-cat.jpg" alt="Комплексы Flowers Energy">
							</a>
						</div>
						<a class="subcat__link m-b-10" href="">Товар 3</a>
						<div class="price black"><span>1500 &#8381;</span></div>
					</div>
					<div class="children__item">
						<div class="children__image">
							<div class="circle-green favorite"></div>
							<a href="">
								<img src="/wp-content/uploads/catalog-cat.jpg" alt="Комплексы Flowers Energy">
							</a>
						</div>
						<a class="subcat__link m-b-10" href="">Товар 4</a>
						<div class="price black"><span>900 &#8381;</span></div>
					</div>
				</div>-->
				<!--<div class="item">
					<div>
						<img src="/wp-content/uploads/offer-big-tmp.jpg" alt="">
					</div>
					<div class="info">
						<div class="m-b-10">Товар 5</div>
						<div class="price"><span>1100 &#8381;</span><div class="circle-green favorite"></div></div>
					</div>
				</div>-->
			</div>
		</div>
	</div>
</section>

<section class="advantages">
	<div class="curved transparent m-b-30">
		<div class="one"></div>
		<div class="two"></div>
		<div class="three"></div>
	</div>
    <div class="container">
        <div class="row">
            <div class="title">Наши<br/>преимущества:</div>
			<div class="items">
				<div>
					<div>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/advantage/01.png" alt="">
					</div>
					<div class="advantage-title">
						Единственный специализированный компаундинг в России
					</div>
					<div class="advantage-n">
						<i>1</i>
					</div>
					<div class="advantage-desc">
						Природа уже создала все необходимое для здоровья и благополучия.
						Мы производим лекарства нового поколения "для здоровья", а не "от болезней".
					</div>
				</div>
				<div>
					<div>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/advantage/02.png" alt="">
					</div>
					<div class="advantage-title">
						 Фармацевтическая производственная лицензия
					</div>
					<div class="advantage-n">
						<i>2</i>
					</div>
					<div class="advantage-desc">
						Для Вас работает команда опытных врачей и фармацевтов. Для нас важно качество наших препаратов, мы аптека полного цикла - от заготовки сырья до производства персонального лекарства.
					</div>
				</div>
				<div>
					<div>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/advantage/03.png" alt="">
					</div>
					<div class="advantage-title">
						Персонализированные натуральные лекарства
					</div>
					<div class="advantage-n">
						<i>3</i>
					</div>
					<div class="advantage-desc">
						Мы придерживаемся принципа персонального изготовления препаратов под каждого пациента с его особыми потребностями. У каждого своя причина заболеть - и лекарство должно быть персональным.
					</div>
				</div>
				<div>
					<div>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/advantage/04.png" alt="">
					</div>
					<div class="advantage-title">
						Удобная доставка
					</div>
					<div class="advantage-n">
						<i>4</i>
					</div>
					<div class="advantage-desc">
						Аптека имеет официальное разрешение на диcтанционную продажу лекарственных средств. Мы осуществляем доставку по всем городам России, Казахстана, Белоруссии аккредитованной компанией Boxberry.
					</div>
				</div>
			</div>
        </div>
    </div>
</section>

<section class="offer">
	<div class="container">
        <div class="row">
			<?php the_content(); ?>
        </div>
    </div>
</section>


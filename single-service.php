<?php
get_header();
?>

		<!-- Service -->
		<section class="inner service">
			<div class="wrapper">


            <?php while ( have_posts() ) :the_post(); ?>
                    <div class="inner__content">
                        <h2 class="inner__title inner-title"><span><?php the_title(); ?></h2>
                        <div class="inner__img blue-noise">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>

                        <?php $image_data = wayup_get_attachment(get_post_thumbnail_ID(get_the_ID())); ?>

                            <p class="inner__short"><?php echo $image_data['description'] ?></p>
                            <span class="inner__price">$390</span>
                        </div>
                        <div class="inner__text">
                            <p>Каждая сделка рассматривается нами как уникальная и ее реализация является нашей приоритетной задачей. С большой степенью ответственности мы подходим к разрешению вопросов в области инкорпорации и деятельности компаний, акционерных соглашений, других способов структуризации отношений между участниками, иных вопросов в области корпоративного права. 
                            Мы также разрабатываем варианты по использованию институтов коллективных инвестиций для существенного снижения рисков рейдерского захвата и иных недружественных действий с имуществом, для оптимизации налоговой нагрузки.</p>
                            <p>Преимуществом компании является наличие опыта решения ситуаций, прямо неурегулированных в законодательстве или не имеющих практики разрешения. </p>
                            <p>Мы оказываем содействие в решении любой юридической задачи в вопросах слияний и поглощений, корпоративного права, независимо от ее сложности (консультации, аналитика, реализация сделок).</p>
                            <a href="order.html" class="inner__btn btn">Заказать</a>
                        </div>
                    </div>
            <?php endwhile; ?>

				
				
			<!-- Slider -->
				<div class="cases">
					<h4 class="cases__cap">Посмотрите наши последние кейсы</h4>
					<div class="cases__slider">
						<div class="cases__slide">
							<div class="cases__item">
								<div class="cases__block">
									<h3 class="cases__heading">Представление интересов компании PPD</h3>
									<a href="#" class="cases__link link-more">
										Читать больше
										<svg width="18" height="20">
											<use xlink:href="#nav-right"/>
										</svg>
									</a>
								</div>
								<div class="cases__img">
									<img src="img/case4.jpg" alt="Изображение">
								</div>
							</div>
						</div>
						<div class="cases__slide">
							<div class="cases__item">
								<div class="cases__block">
									<h3 class="cases__heading">Вывод денег через текущие платежи</h3>
									<a href="#" class="cases__link link-more">
										Читать больше
										<svg width="18" height="20">
											<use xlink:href="#nav-right"/>
										</svg>
									</a>
								</div>
								<div class="cases__img">
									<img src="img/case2.jpg" alt="Изображение">
								</div>
							</div>
						</div>
						<div class="cases__slide">
							<div class="cases__item">
								<div class="cases__block">
									<h3 class="cases__heading">Взыскание задолженности с дебитора</h3>
									<a href="#" class="cases__link link-more">
										Читать больше
										<svg width="18" height="20">
											<use xlink:href="#nav-right"/>
										</svg>
									</a>
								</div>
								<div class="cases__img">
									<img src="img/case1.jpg" alt="Изображение">
								</div>
							</div>
						</div>
						<div class="cases__slide">
							<div class="cases__item">
								<div class="cases__block">
									<h3 class="cases__heading">Урегулирование налогового спора</h3>
									<a href="#" class="cases__link link-more">
										Читать больше
										<svg width="18" height="20">
											<use xlink:href="#nav-right"/>
										</svg>
									</a>
								</div>
								<div class="cases__img">
									<img src="img/case3.jpg" alt="Изображение">
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section><!-- End slider -->


<?php
get_footer();
?>
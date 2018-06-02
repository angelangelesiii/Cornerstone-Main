<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cornerstone_Main
 */

get_header(); 

$content_post = get_post($post->ID);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main events-type">
			<section class="location-section clearfix">
				<?php 
				$locationQuery = new WP_Query(array(
					'post_type' 			=> 'location',
					// 'posts_per_page' 		=> '6',
					'orderby'				=> 'title',
					'order'					=> 'ASC'
				));
	
				if ($locationQuery->have_posts()): ?>

				<!-- START MAP -->
				<div class="location-map acf-map">
	
				<?php
					while($locationQuery->have_posts()): $locationQuery->the_post();
					$location = get_field('location_location');
				?>
	
					<!-- LOCATION: <?php the_title(); ?> -->
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
						<h3><?php the_title(); ?></h3>
					</div>
	
				<?php endwhile; ?>
				
				</div>
				<!-- END MAP -->
	
				<?php
				endif; 
				wp_reset_postdata(); ?>

				<div class="location-list">
					<h1>There's a Cornerstone for You</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt libero hic in soluta iure, reprehenderit molestias distinctio ratione aspernatur ut eaque, beatae praesentium itaque temporibus dolore! Deleniti, earum mollitia? Excepturi at accusantium cumque cum commodi! Quidem quam laudantium reprehenderit est, sunt ex eum excepturi. Quibusdam, dolorum vero. Maxime saepe, nam ducimus fugit accusantium inventore, nihil laudantium facilis possimus nostrum iusto repudiandae porro odio unde quam perspiciatis? Debitis quidem quis ipsum, culpa fugit, quisquam est praesentium dignissimos, reprehenderit autem id laboriosam blanditiis fuga omnis earum veritatis ea eaque atque tempore minus! Eius itaque hic est non, odit, doloribus placeat natus praesentium molestiae suscipit nam perspiciatis alias rerum accusamus perferendis voluptas officia sequi sunt animi? Tempora porro ipsam eius nesciunt quasi voluptates officia. Amet, aspernatur veritatis soluta quas fugit assumenda perspiciatis qui non quos! Aspernatur excepturi at consequatur corporis blanditiis quo! Sequi repellat ea pariatur molestias nesciunt perspiciatis, dignissimos quos. Blanditiis, ab! Laborum, explicabo obcaecati! Temporibus, quod impedit quo excepturi officiis ut accusantium consequuntur? Perspiciatis dolor sunt labore. Odit nulla animi consequatur et esse est ullam ipsa modi sequi libero, necessitatibus deserunt recusandae perspiciatis iusto ad, minima quae commodi voluptates sed ipsum repellendus odio. Ab ipsum voluptate vitae maiores obcaecati ut laudantium.</p>
					<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse quod aspernatur non. Reprehenderit tempore est similique! Nobis magnam culpa cumque quod explicabo possimus perspiciatis, pariatur enim facilis. Itaque necessitatibus deserunt consectetur architecto exercitationem iusto cupiditate rerum, iste molestiae, molestias sit tenetur ut odit rem distinctio ad. Dignissimos necessitatibus nobis quaerat rerum, qui assumenda delectus dolores, mollitia voluptates libero incidunt reprehenderit aliquid dolorem autem officia eaque sunt earum sit. Minima consectetur quia nostrum architecto in iure consequatur corporis voluptates? Corporis nesciunt ducimus eos vitae blanditiis provident ipsa velit minima fugit dicta, quae placeat et obcaecati nemo, aspernatur nisi repudiandae quis? Illum nostrum repellendus distinctio delectus saepe! Repudiandae est dolores, aperiam illum dolore saepe, voluptates sequi debitis ipsum possimus, minus dolor similique quam animi atque maiores ab. Rerum saepe error dicta ab exercitationem maiores laboriosam eum recusandae nobis iste voluptatibus, obcaecati expedita optio accusamus quos vitae? Quam ratione eaque voluptas aut atque, et aspernatur magnam beatae omnis quod iusto distinctio enim maiores velit, nulla numquam quia sapiente dicta, laborum itaque suscipit quos! Excepturi omnis tempore vel recusandae sed reprehenderit laboriosam officiis. Atque consequuntur officia minus iure repudiandae blanditiis earum. Sunt nesciunt fuga est! Nihil saepe cum amet obcaecati commodi voluptate quidem repellat!</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut quia, asperiores doloremque dolorum laborum maiores voluptate soluta ea esse commodi officia facere voluptas architecto, optio incidunt reiciendis eos dolores laudantium voluptatem? Assumenda laborum omnis nulla officia sunt aperiam voluptatum quam possimus blanditiis aut beatae provident a, similique corporis dicta non quas. Vero voluptates iure voluptatibus repellendus cupiditate, nostrum nam repellat, est modi sequi, nobis debitis iste rem nulla sunt non mollitia dolor eos doloribus expedita recusandae! Commodi veniam temporibus culpa quam quas. Possimus velit natus voluptatum quidem cupiditate ea recusandae dicta explicabo sunt, fugit repellat rem suscipit cumque eligendi perferendis repudiandae labore quasi nobis esse, quae sint voluptatem minima. Rem, mollitia officia sapiente ab iste enim nobis beatae. Labore dolore hic corrupti minima non, amet maxime laboriosam expedita numquam voluptate enim sint? Velit exercitationem corrupti quibusdam dolore quasi perspiciatis explicabo ipsum, facilis aliquid sunt iure enim reprehenderit in dignissimos nostrum commodi repudiandae sit! Pariatur eaque earum maiores iusto. At aut laboriosam eaque officiis sequi necessitatibus animi expedita ad vitae, rem doloremque ab, ducimus optio delectus voluptatibus libero dignissimos, dolore dolores molestias praesentium totam cupiditate! Reiciendis dolor sed cupiditate, voluptate eius distinctio libero ut vero, beatae nam architecto odio placeat minima.</p>
				</div>

				<div class="trigger"></div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

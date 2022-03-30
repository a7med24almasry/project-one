<?php
session_start();
include "vendor/config.php";
include "vendor/functions.php";
include "layout/header.php";
include "lang/$_lang.php";
?>
	<?php include "layout/search_bar.php";?>
<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="aside">
					<div class="website-nav">
						<div class="website_list">
							<ul>
								<li>
									<a href="index/<?=$_lang?>"><i class="fas fa-home"></i> <?=$lang['Home']?></a>
								</li>
								<li>
									<a href="<?=$_lang?>/pages/trend.php?<?=$_lang?>"><?=$lang['Trend']?></a>
								</li>
								<li>
									<a href="<?=$_lang?>/pages/most_downloaded.php"><?=$lang['most downloaded']?></a>
								</li>
								<li>
									<a href="<?=$_lang?>/pages/top24.php"><?=$lang['top_24']?></a>
								</li>
								<li>
									<a href="<?=$_lang?>/pages/top_rated.php"><?=$lang['top_rated']?></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="website-nav website-category mt-5">
						<h6><?= $lang['Android']?></h6>
						<div class="grid_nav">
							<div class="row">
							<?php
								$category = mysqli_query($connect,"SELECT * FROM `categories` WHERE `platform`='android' ORDER BY `id` DESC LIMIT 12");
								$category_num = mysqli_num_rows($category);
								if($category_num != 0){
									while($category_row = mysqli_fetch_array($category)){
										$category_title = html_entity_decode($category_row ['title_'.$_lang]);
										$category_slug = html_entity_decode($category_row ['slug']);
										$category_icon = html_entity_decode($category_row ['fa_icon']);
								
							?>
								<div class="col-md-4 category">
									<a href="<?=$_lang?>/store/apps/category/id/<?=$category_slug?>">
									<div class="category_icon">
										<i class="<?=$category_icon?>"></i>
										<span><?=$category_title?></span>
									</div></a>
								</div>
								<?php
									}
								}
								?>
							</div>
						</div>
						<h6><?=$lang['Ios']?></h6>
						<div class="grid_nav">
							<div class="row">
							<?php
								$category = mysqli_query($connect,"SELECT * FROM `categories` WHERE `platform`='ios'");
								$category_num = mysqli_num_rows($category);
								if($category_num != 0){
									while($category_row = mysqli_fetch_array($category)){
										$category_title = html_entity_decode($category_row ['title_'.$_lang]);
										$category_slug = html_entity_decode($category_row ['slug']);
										$category_icon = html_entity_decode($category_row ['fa_icon']);
								
							?>
								<div class="col-md-4 category">
									<a href="<?=$_lang?>/store/apps/category/id/<?=$category_slug?>">
									<div class="category_icon">
										<i class="<?=$category_icon?>"></i>
										<span><?=$category_title?></span>
									</div></a>
								</div>
								<?php
									}
								}
								?>
							</div>
						</div>
					</div>
					<div class="top_five">
					<h6><?=$lang['Top_Five']?></h6>
						<ul>
							<?php
							$_top_five = mysqli_query($connect,"SELECT * FROM `application` ORDER BY `rating` DESC LIMIT 5");
							$_top_num = mysqli_num_rows($_top_five);
							$i=0;
							if($_top_num != 0){
								while($_top_row= mysqli_fetch_array($_top_five)){
									$i++;
									$_top_title = html_entity_decode($_top_row['title_'.$_lang]);
									$_top_img = htmlentities($_top_row['image']);
									$_top_rating = htmlentities($_top_row['rating']);
									$top_app_id = htmlentities($_top_row['appId']);

							?>
							<li>
								<div class="top_five_number">
									<div class="number">
										<?=$i?>
									</div>
									<div class="top_img">
										<a  title="<?=$_top_title?>" href="<?=$_lang?>/store/apps/details?id=<?=$top_app_id?>" >
											<img src="assets/img/icons/<?=$_top_img?>" alt="<?=$_top_title?>" title="<?=$_top_title?>">
										</a>
									</div>
									<div class="top_text">
										<h3>
											<a title="<?=$_top_title?>" href="<?=$_lang?>/store/apps/details?id=<?=$top_app_id?>"><?=$_top_title?></a>
										</h3>
										<p><?=$lang['Votes']?> <?=$_top_rating?></p>
									</div>
								</div>
							</li>
							<?php
								}
								}?>
						</ul>
				</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="website_body">
					<div class="row">
						<div class="col-12">
							<div class="slider">
								<div class="carousel slide" data-bs-ride="carousel" id="carouselExampleControls">
									<div class="carousel-inner">
									<?php
									    $counter = 1;
										$slider_app = mysqli_query($connect,"SELECT * FROM `application` ORDER BY `id` DESC LIMIT 3");
										$slider_num = mysqli_num_rows($slider_app);
										if($slider_num !=0){
											while($slider_row = mysqli_fetch_array($slider_app)){
												$slider_img = htmlentities($slider_row['image']);
												$slider_title = html_entity_decode($slider_row['title_'.$_lang]);
												$slider_rating = floor(htmlentities($slider_row['rating']));
												$slider_app_id = htmlentities($slider_row['appId']);

										?>
										<div class="carousel-item <?php if($counter <= 1){echo " active"; } ?>">
											<div class="carousel__items">
												<img alt="<?=$slider_title?>" src="assets/img/icons/<?=$slider_img?>">
												<h1><?=$slider_title?></h1>
												<div class="rating">
												<?php echo Rate_stars($slider_rating) ?>
											</div><a href="<?=$_lang?>/store/apps/details?id=<?=$slider_app_id?>"><?=$lang['download']?></a>
											</div>
										</div>
										<?php
										    $counter++;
											}
											}
										?>
									</div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleControls" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleControls" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="most_apps">
								<h6><?=$lang['Most_Popular_Apps']?></h6>
								<div class="most__apps">
									<div class="owl-carousel">
										<?php
										$most_App =mysqli_query($connect,"SELECT * FROM `application` ORDER BY `download` DESC LIMIT 12 ");
										$most_app_num = mysqli_num_rows($most_App);
										if($most_app_num != 0){
											while($most_App_row = mysqli_fetch_array($most_App)){
												$most_img = htmlentities($most_App_row['image']);
												$most_title = html_entity_decode($most_App_row['title_'.$_lang]);
												$most_app_id = htmlentities($most_App_row['appId']);
												$most_app_rating = floor(htmlentities($most_App_row['rating']));									
										?>
										<div>
											<div class="carousel_img">
												<a title="<?=$most_title?>" href="<?=$_lang?>/store/apps/details?id=<?=$most_app_id?>"><img alt="<?=$most_title?>" src="assets/img/icons/<?=$most_img?>"></a>
												<div class="rating">
												<?php echo Rate_stars($most_app_rating) ?>
												</div><a title="<?=$most_title?>" href="<?=$_lang?>/store/apps/details?id=<?=$most_app_id?>"><?php echo shortTitle($most_title,15)?></a>
											</div>
										</div>
										<?php
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="new__apps">
								<h1><?=$lang['NewApps']?></h1>
								<div class="new_apps_container">
									<div class="row">
										<?php
											$last_App =mysqli_query($connect,"SELECT * FROM `application` ORDER BY `id` DESC LIMIT 12");
											$last_app_num = mysqli_num_rows($last_App);
											if($last_app_num != 0){
												while($last_App_row = mysqli_fetch_array($last_App)){
													$last_img = htmlentities($last_App_row['image']);
													$last_title = html_entity_decode($last_App_row['title_'.$_lang]);
													$last_app_id = htmlentities($last_App_row['appId']);
													$last_app_rating = floor(htmlentities($last_App_row['rating']));									
											?>
										<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
											<a title="<?=$last_title ?>" href="<?=$_lang?>/store/apps/details.php?lang=<?=$_lang?>&id=<?=$last_app_id?>">
											<div class="app_over" style="background-image: url(assets/img/icons/<?=$last_img?>);">
												<div class="overlay"><?=$last_app_rating?> <span class="over_rating"><i class="fas fa-star"></i></span>
												</div>
											</div>
											</a>
											<div class="app">
												<a title="<?=$last_title ?>" href="<?=$_lang?>/store/apps/details?id=<?=$last_app_id?>" ><?php echo shortTitle($last_title,15)?></a>
											</div>
										</div>
										<?php
												}
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="new__apps">
								<h1><?=$lang['MostRating']?></h1>
								<div class="new_apps_container">
									<div class="row">
									<?php
											$last_App =mysqli_query($connect,"SELECT * FROM `application` ORDER BY `rating` DESC LIMIT 12");
											$last_app_num = mysqli_num_rows($last_App);
											if($last_app_num != 0){
												while($last_App_row = mysqli_fetch_array($last_App)){
													$last_img = htmlentities($last_App_row['image']);
													$last_title = html_entity_decode($last_App_row['title_'.$_lang]);
													$last_app_id = htmlentities($last_App_row['appId']);
													$last_app_rating = floor(htmlentities($last_App_row['rating']));									
											?>
										<div class="col-md-4">
											<div class="app_item">
												<div class="app_item_img">
												<img alt="<?=$last_title?>" width="75px" height="75px" src="assets/img/icons/<?=$last_img?>">
												</div>
												<div class="app_description">
													<h3><a href="<?=$_lang?>/store/apps/details?id=<?=$last_app_id?>" title="<?=$last_title?>"><?=$last_title?></a></h3>
													<div class="app_star">
														<?=Rate_stars($last_app_rating )?>
													</div>
												</div>
											</div>
										</div>
										<?php
												}
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include "layout/footer.php"?>
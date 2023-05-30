<?php 
	use MediaConverterPro\lib\Config;
?>

				<div class="dl-result">
					<div id="download">
						<noscript>
							<div class="videolist">
								<h1><?php echo Config::_WEBSITE_DOMAIN; ?></h1>
								<h2><?php echo $translations['download']; ?> MP3, MP4, WEBM, 3GP, M4A</h2>
								<?php foreach ($videoInfo as $video) { ?>
									<?php $isScrapedInfo = empty($video['likeCount']) && empty($video['dislikeCount']); ?>
									<div class="videoInfo">
										<h3><a href="<?php echo WEBROOT . $urlLang . preg_replace("/[^\p{L}\p{N}]+/u", "-", $video['title']) . "(" . $video['id'] . ")"; ?>" title="<?php echo htmlspecialchars($video['title'], ENT_QUOTES); ?>"><?php echo $video['title']; ?></a></h3>
										<img src="https://img.youtube.com/vi/<?php echo $video['id']; ?>/default.jpg" title="<?php echo htmlspecialchars($video['title'], ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($video['title'], ENT_QUOTES); ?>" />
										<blockquote>
											<p><?php echo $translations['nojs_vid_duration'] . " " . $video['duration']; ?></p>
											<p><?php echo $translations['nojs_vid_uploader'] . " " . $video['channelTitle']; ?></p>
											<p><?php echo $translations['nojs_vid_date'] . " " . $video['publishedAt']; ?></p>
											<p><?php echo $translations['nojs_vid_views'] . " " . $video['viewCount']; ?></p>
											<?php if (!$isScrapedInfo) { ?>
												<p><?php echo $translations['nojs_vid_likes'] . " " . $video['likeCount']; ?></p>
											<?php } ?>
											<?php if (false) { ?>
												<p><?php echo $translations['nojs_vid_dislikes'] . " " . $video['dislikeCount']; ?></p>
											<?php } ?>
										</blockquote>
									</div>
								<?php } ?>
							</div>
						</noscript>
					</div><!-- /.download -->
				</div><!-- /.dl-result -->
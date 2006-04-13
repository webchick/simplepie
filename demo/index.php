<?php

// Start counting time for the page load
$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

// Include SimplePie
// Located in the parent directory
include('../simplepie.inc');

// Create a new instance of the SimplePie object
$feed = new SimplePie();

// Set these Configuration Options
$feed->bypass_image_hotlink();
$feed->strip_ads(true);

// Make sure that page is getting passed a URL
if (!empty($_GET['feed'])) {

	// Use the URL that was passed to the page in SimplePie
	$feed->feed_url($_GET['feed']);
}

// Initialize the whole SimplePie object.  Read the feed, process it, parse it, cache it, and 
// all that other good stuff.  The feed's information will not be available to SimplePie before 
// this is called.
$feed->init();

// When we end our PHP block, we want to make sure our DOCTYPE is on the top line to make 
// sure that the browser snaps into Standards Mode.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<title>SimplePie: Demo</title>

<link rel="stylesheet" href="./for_the_demo/simplepie.css" media="screen, projector" />
<script type="text/javascript" src="./for_the_demo/sifr.js"></script>
<script type="text/javascript" src="./for_the_demo/sleight.js"></script>

</head>

<body id="bodydemo">

<ul id="menu">
	<!-- Must all be on the same line due to spacing bugs. -->
	<li id="demo"><a href="index.php">Demo</a>|</li><li><a href="http://simplepie.org/support/">Bug Reports &amp; Feature Requests</a>|</li><li><a href="http://simplepie.org/docs/reference/">Function Reference</a>|</li><li><a href="http://simplepie.org/blog/">Weblog</a></li>
</ul>

<div id="site">

	<div id="content">

		<div id="" class="chunk">
			<form action="" method="get" name="sp_form" id="sp_form">
				<div id="sp_input">


					<!-- If a feed has already been passed through the form, then make sure that the URL remains in the form field. -->
					<p><strong>Feed URL:</strong>&nbsp;<input type="text" name="feed" value="<?php if ($feed->subscribe_url()) echo $feed->subscribe_url(); ?>" class="text" id="feed_input" />&nbsp;<input type="submit" value="Read" class="button" /></p>


				</div>
			</form>


			<?php
			// Check to see if there are more than zero errors (i.e. if there are any errors at all)
			if (sizeof($SIMPLEPIE_ERRORS) > 0) {

				// If so, start a <div> element with a classname so we can style it.
				echo '<div class="sp_errors">' . "\r\n";

				// Go through each error...
				foreach ($SIMPLEPIE_ERRORS as $error) {

					// ... and display it.
					echo '<p>' . $error . '</p>' . "\r\n";
				}

				// Close the <div> element we opened.
				echo '</div>' . "\r\n";
			}
			?>


			<!-- Here are some sample feeds. -->
			<p class="sample_feeds"><strong>Or try one of the following:</strong> <a href="?feed=http://afterdawn.com/news/afterdawn_rss.xml#feed" title="Ripping, Burning, DRM, and the Dark Side of Consumer Electronics Media">Afterdawn</a>, <a href="?feed=http://feeds.feedburner.com/ajaxian#feed" title="AJAX and Scripting News">Ajaxian</a>, <a href="?feed=http://inessential.com/xml/rss.xml#feed" title="Developer of NetNewsWire">Brent Simmons</a>, <a href="?feed=http://www.crazyapplerumors.com/?feed=rss2#feed" title="Hilarity at its best">Crazy Apple Rumors</a>, <a href="?feed=http://del.icio.us/rss/#feed" title="The defacto social bookmarking site">del.icio.us</a>, <a href="?feed=http://digg.com/rss/index.xml#feed" title="Tech news.  Better than Slashdot.">Digg</a>, <a href="?feed=http://www.flickr.com/services/feeds/photos_public.gne?format=rss2#feed" title="Flickr Photos">Flickr</a>, <a href="?feed=http://gvod.blogspot.com/atom.xml#feed" title="Google Video of the Day">GVOD</a>, <a href="?feed=http://mir.aculo.us/xml/rss/feed.xml#feed" title="Weblog for the developer of Scriptaculous">mir.aculo.us</a>, <a href="?feed=http://images.apple.com/trailers/rss/newtrailers.rss#feed" title="Apple's QuickTime movie trailer site">Movie Trailers</a>, <a href="?feed=http://nick.typepad.com/blog/index.rss#feed" title="Developer of TopStyle and FeedDemon">Nick Bradbury</a>, <a href="?feed=http://feeds.feedburner.com/ok-cancel#feed" title="Usability comics and commentary">OK/Cancel</a>, <a href="?feed=http://osnews.com/files/recent.rdf#feed" title="News about every OS ever">OS News</a>, <a href="?feed=http://technorati.com/watchlists/rss.html?wid=29290#feed" title="Technorati watch for SimplePie">Technorati</a>, <a href="?feed=http://thinksecret.com/rss.xml#feed" title="Credible Mac Rumors">Think Secret</a>, <a href="?feed=http://youtube.com/rss/global/recently_added.rss#feed" title="Funny user-submitted videos">You Tube</a>, <a href="?feed=http://zeldman.com/rss/#feed" title="The father of the web standards movement">Zeldman</a>, <a href="" onclick="document.getElementById('more').style.display='block'; return false;"><strong>MORE &raquo;</strong></a></p>
			<p class="sample_feeds" id="more" style="display:none;"><strong>Test Feeds (hover to see what's tested):</strong> <a href="?feed=http://www.andybudd.com/index.rdf#feed" title="Test: Bypass Image Hotlink Blocking">Andy Budd</a>, <a href="?feed=http://www.ameinfo.com/rss/arabic/1558.xml#feed" title="Test: Windows-1256 Encoding">Arabic Language</a>, <a href="?feed=http://feeds.feedburner.com/AskANinja#feed" title="Test: Embedded Enclosures">Ask a Ninja</a>, <a href="?feed=http://www.atomenabled.org/atom.xml#feed" title="Test: Atom 1.0 Support">AtomEnabled.org</a>, <a href="?feed=http://www.channelfrederator.com/rss#feed" title="Test: Embedded Enclosures">Channel Frederator</a>, <a href="?feed=http://odeo.com/channel/32022/rss#feed" title="Test: Embedded Odeo Player">Dominic Sagolla</a>, <a href="?feed=http://www.dooce.com/atom.xml#feed" title="Test: Ad Stripping">Dooce</a>, <a href="?feed=http://blogs.law.harvard.edu/xml/rss.xml#feed" title="Test: Tag Stripping">Harvard Law</a>, <a href="?feed=http://hagada.org.il/hagada/html/backend.php#feed" title="Test: Window-1255 Encoding">Hebrew Language</a>, <a href="?feed=http://korfball.hu/rss_news.xml#feed" title="ISO-8859-2">Hungarian Language</a>, <a href="?feed=http://www.infoworld.com/rss/news.xml#feed" title="Test: Ad Stripping">InfoWorld</a>, <a href="?feed=http://phobos.apple.com/WebObjects/MZStore.woa/wpa/MRSS/topsongs/limit=10/rss.xml#feed" title="Test: Tag Stripping">iTunes</a>, <a href="?feed=http://blog.japan.cnet.com/lessig/index.rdf#feed" title="Test: EUC-JP Encoding">Japanese Language</a>, <a href="?feed=http://nurapt.kaist.ac.kr/~jamaica/htmls/blog/rss.php#feed" title="Test: EUC-KR Encoding">Korean Language</a>, <a href="?feed=http://macnn.com/podcasts/macnn.rss#feed" title="Test: Embedded Enclosures">MacNN</a>, <a href="?feed=http://weblog.philringnalda.com/feed/#feed" title="Test: Atom 1.0 Support">Phil Ringnalda</a>, <a href="?feed=http://photocast.mac.com/turboderek/iPhoto/top-rides/index.rss#feed" title="Test: iPhoto 6 Photocasting">Photocast #1</a>, <a href="?feed=http://photocast.mac.com/turboderek/iPhoto/best-of-the-ladies/index.rss#feed" title="Test: iPhoto 6 Photocasting">Photocast #2</a>, <a href="?feed=http://photocast.mac.com/awalker/iPhoto/christmas-2005/index.rss#feed" title="Test: iPhoto 6 Photocasting">Photocast #3</a>, <a href="?feed=http://www.pariurisportive.com/blog/xmlsrv/rss2.php?blog=2#feed" title="Test: ISO-8859-1 Encoding">Romanian Language</a>, <a href="?feed=http://www.erased.info/rss2.php#feed" title="Test: KOI8-R Encoding">Russian Language</a>, <a href="?feed=http://ubb.frostyplace.com.tw/rdf.php#feed" title="Test: BIG5 Encoding">Taiwanese Language</a>, <a href="?feed=http://www.tbray.org/ongoing/ongoing.atom#feed" title="Test: Atom 1.0 Support">Tim Bray</a>, <a href="?feed=http://tuaw.com/rss.xml#feed" title="Test: Ad Stripping">TUAW</a>, <a href="?feed=http://www.tvgasm.com/atom.xml#feed" title="Test: Bypass Image Hotlink Blocking">TVgasm</a>, <a href="?feed=http://feeds.feedburner.com/web20Show#feed" title="Test: Embedded Enclosures">Web 2.0 Show</a>, <a href="?feed=http://whitecollarruckus.libsyn.com/rss#feed" title="Test: Embedded Enclosures">White Collar Ruckus</a></p>
			<a name="feed"></a>
		</div>

		<div id="sp_results">


			<!-- As long as the feed has data to work with... -->
			<?php if ($feed->data): ?>
				<div class="chunk focus" align="center">

					<!-- If the feed has a link back to the site that publishes it (which 99% of them do), link the feed's title to it. -->
					<h3 class="header"><?php if ($feed->get_feed_link()) echo '<a href="' . $feed->get_feed_link() . '">'; echo $feed->get_feed_title(); if ($feed->get_feed_link()) echo '</a>'; ?></h3>

					<!-- If the feed has a description, display it. -->
					<?php echo $feed->get_feed_description(); ?>

				</div>


				<!-- Add subscribe links for several different aggregation services -->
				<p class="subscribe"><strong>Subscribe:</strong> <a href="<?php echo $feed->subscribe_aol(); ?>">My AOL</a>, <a href="<?php echo $feed->subscribe_bloglines(); ?>">Bloglines</a>, <a href="<?php echo $feed->subscribe_google(); ?>">Google Reader</a>, <a href="<?php echo $feed->subscribe_msn(); ?>">My MSN</a>, <a href="<?php echo $feed->subscribe_newsburst(); ?>">Newsburst</a>,<br /><a href="<?php echo $feed->subscribe_newsgator(); ?>">Newsgator</a>, <a href="<?php echo $feed->subscribe_odeo(); ?>">Odeo</a>, <a href="<?php echo $feed->subscribe_pluck(); ?>">Pluck</a>, <a href="<?php echo $feed->subscribe_podnova(); ?>">Podnova</a>, <a href="<?php echo $feed->subscribe_rojo(); ?>">Rojo</a>, <a href="<?php echo $feed->subscribe_yahoo(); ?>">My Yahoo!</a>, <a href="<?php echo $feed->subscribe_feed(); ?>">Desktop Reader</a></p>


				<!-- Let's begin looping through each individual news item in the feed. -->
				<?php foreach($feed->get_items() as $item): ?>
					<div class="chunk">

						<!-- If the item has a permalink back to the original post (which 99% of them do), link the item's title to it. -->
						<h4><?php if ($item->get_permalink()) echo '<a href="' . $item->get_permalink() . '">'; echo $item->get_title(); if ($item->get_permalink()) echo '</a>'; ?>&nbsp;<span class="footnote"><?php echo $item->get_date('j M Y'); ?></span></h4>

						<!-- Display the item's primary content. -->
						<?php echo $item->get_description(); ?>

						<?php
						// Check for enclosures.  If an item has any, set the first one to the $enclosure variable.
						if ($enclosure = $item->get_enclosure(0)) {

							// Use the embed() method to embed the enclosure into the page inline.
							echo '<div align="center">';
							echo '<p>' . $enclosure->embed("audio:./for_the_demo/place_audio.png, video:./for_the_demo/place_video.png, alt:<img src='./for_the_demo/mini_podcast.png' class='download' border='0' title='Download the Podcast (" . $enclosure->get_extension() . "; " . $enclosure->get_size() . " MB)' />, altclass:download") . '</p>';
							echo '<p class="footnote" align="center">(' . $enclosure->get_type() . '; ' . $enclosure->get_size() . ' MB)</p>';
							echo '</div>';
						}
						?>

						<!-- Add links to add this post to one of a handful of services. -->
						<p class="footnote" align="center"><a href="<?php echo $item->add_to_blinklist(); ?>" title="Add post to Blinklist">Blinklist</a> | <a href="<?php echo $item->add_to_delicious(); ?>" title="Add post to del.icio.us">Del.icio.us</a> | <a href="<?php echo $item->add_to_digg(); ?>" title="Digg this!">Digg</a> | <a href="<?php echo $item->add_to_furl(); ?>" title="Add post to Furl">Furl</a> | <a href="<?php echo $item->add_to_myweb20(); ?>" title="Add post to My Web 2.0">My Web 2.0</a> | <a href="<?php echo $item->add_to_newsvine(); ?>" title="Add post to Newsvine">Newsvine</a> | <a href="<?php echo $item->add_to_reddit(); ?>" title="Add post to Reddit">Reddit</a> | <a href="<?php echo $item->add_to_spurl(); ?>" title="Add post to Spurl">Spurl</a> | <a href="<?php echo $item->search_technorati(); ?>" title="Who's linking to this post?">Technorati</a></p>

					</div>

				<!-- Stop looping through each item once we've gone through all of them. -->
				<?php endforeach; ?>

				</div>

			<!-- From here on, we're no longer using data from the feed. -->
			<?php endif; ?>

		</div>

		<div>
			<!-- Display how fast the page was rendered. -->
			<p class="footnote">Page processed in <?php $mtime = explode(' ', microtime()); echo round($mtime[0] + $mtime[1] - $starttime, 3); ?> seconds.</p>

			<!-- Display the version of SimplePie being loaded. -->
			<p class="footnote">Powered by <a href="<?php echo $feed->url; ?>"><?php echo $feed->name . ' ' . $feed->version . ', Build ' . $feed->build; ?></a>.  Run the <a href="sp_compatibility_test.php">SimplePie Compatibility Test</a>.  SimplePie is &copy; 2004&ndash;<?php echo date('Y'); ?>, <a href="http://www.skyzyx.com">Skyzyx Technologies</a>, and licensed under the <a href="http://creativecommons.org/licenses/LGPL/2.1/">LGPL</a>.</p>
		</div>

	</div>

</div>

<script type="text/javascript">
//<![CDATA[

// Load the sIFR font for the feed's title.
if(typeof sIFR == "function"){
	sIFR.replaceElement(named({sSelector:"h3.header", sFlashSrc:"./for_the_demo/yanone-kaffeesatz-bold.swf", sColor:"#000000", sHoverColor:"#666666", sBgColor:"#EEFFEE", sFlashVars:"textalign=center"}));
};

//]]>
</script>

</body>
</html>
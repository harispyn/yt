<?php 

	namespace MediaConverterPro\lib;

	class Config
	{	
		#####################
		### BASIC OPTIONS ###
		#####################
		
		// License Key received at the time of software purchase. 
		// You can also login and find it here: https://shop.rajwebconsulting.com/clientarea.php
		const _LICENSE_KEY = 'YOUR_LICENSE_KEY_HERE';
		// Database login info for ALL database tables
		// The SAME database is used for software licensing, IP Rotation (see below), or both.
		const _SERVER = 'localhost';
		const _DB_USER = 'DATABASE_USER';
		const _DB_PASSWORD = 'DATABASE_PASSWORD';
		const _DATABASE = 'DATABASE_NAME';
		// Database table that stores software license's local key
		// This table is created "automatically" by the software's initial "Config Check" utility
		// OR, see "ymckey.sql" in the "/docs" folder for the SQL required to "manually" build this table.
		// (Note: In the vast majority of use cases, you should NOT change the "ymckey" default value!)
		const _DB_LOCAL_KEY_TABLE = 'ymckey';
		// IP version to use for remote license check requests
		// Valid values are "4" (i.e., IPv4) and "6" (i.e., IPv6).
		// (In most cases, the default value should be used.)
		const _LICENSE_REQ_IP_VERSION = '4';
		
		// Website Name (appears in navbar)
		const _WEBSITE_NAME = "MyConverterSite";
		// Website Domain (appears in footer, page metadata, and downloaded/converted file name branding)
		const _WEBSITE_DOMAIN = "MyConverterSite.com";

		// FFmpeg Server Path. This is the absolute path of FFmpeg binary file. (Note: PHP must have permission to access this directory!)
		const _FFMPEG_PATH = "/usr/bin/ffmpeg";
		// cURL Server Path. This is the absolute path of cURL binary file.
		const _CURL_PATH = "/usr/bin/curl";
		// Node.js Server Path. This is the absolute path of Node.js binary file. (Note: PHP must have permission to access this directory!)
		const _NODEJS_PATH = "/usr/bin/node";

		// The root directory and location of the application, relative to the web root.
		const _APPROOT = '/'; // Directory names must be preceded and followed by a '/'. A value of '/' indicates the web root directory.
		
		#region Public Fields
		// YouTube API Keys (Get API Keys from https://console.developers.google.com and/or review '/docs/#youtubeAPI' and '/docs/#youtubeAPIMultiple').
		// You may have one or more API keys. If you have multiple keys, then one is randomly selected from the array per request.
		// The use of multiple keys enables you to effectively extend the daily API quota/limit and is recommended for sites with moderate-to-heavy traffic.
		public static $_youtubeApiKeys = array(
			// "YOUR_API_KEY_HERE"
		);
		#region

		########################
		### ADVANCED OPTIONS ###
		########################

		// Access Control and Interface for website
		// This constant accepts 3 possible values: "web", "api", or "hybrid".
		// 1) When set to "web", the default front-end website interface displays. If any APIs are "publicly" enabled (see Config::$_apiAllowedDomains, below), then an additional "API" instructions page is visible in site menu links.
		// 2) When set to "api", access to front-end website interface is disabled completely, and only direct API access is allowed.
		// 3) When set to "hybrid", and any APIs are "publicly" enabled (see Config::$_apiAllowedDomains, below), then the default front-end website interface is replaced with an alternate interface that consists of only API, FAQ, and Contact pages. (The "API" instructions page serves as the homepage.) If neither API is "publicly" enabled, then the "hybrid" value behaves the same as "web"!
		// See Config::$_apiAllowedDomains, below, to regulate and whitelist API access
		const _WEBSITE_INTERFACE = 'web'; 	
		
		// Template Folder Name 
		const _TEMPLATE_NAME = "default"; // "default", "default-alt", "xeon", and "xeon-alt" templates are available	
		
		// Default Website Language
		const _DEFAULT_LANGUAGE = "en";  // You MUST choose from available languages in "app/Languages/index.php"
		
		/*** FYI - The following group of constants are generally used in the context of YouTube API requests! ***/
		// Default "Country Group" 
		// Value can be a continent name or any name that you choose to categorize a group of countries in the Config::$_countries array. 
		// The default available values are "Africa", "Asia", "Americas", "Europe", and "Oceania".
		const _DEFAULT_COUNTRY_GROUP = "Americas";
		// Default Country
		// Must be a valid, lowercase, ISO 3166-1 alpha-2 country code
		// Scroll down to $_countries array to see default list of available countries.
		const _DEFAULT_COUNTRY = "us";  
		// Front page "Top Videos" category
		// 0 for all video categories; 10 for music videos only
		const _TOP_VIDEOS_CATEGORY = 10; 	
		// Number of additional video results returned when the "Load more videos" button is clicked
		// (FYI - Maximum number of "total possible" search results is 50 !!)
		// (Note: This value is also used when search results are obtained via YouTube.com search scraping instead of the YouTube API!)
		const _RESULTS_PER_PAGE = 5;
		
		// Enable YouTube.com Search Scraping
		const _ENABLE_SEARCH_SCRAPING = true; // When true, search results are generated by "scraping" search results directly from YouTube's website, thereby replacing ALL requests to YouTube's "search" API endpoint. Since requests to this endpoint consume the most YouTube API "units", this setting effectively extends the daily quota of your YouTube API key(s), your key(s) will last much longer, and significantly less keys are required for busy sites. By default, search scraping leverages ONLY the primary server IP. Optionally, and alternatively, you can instead enable IP rotation (by setting _ENABLE_IP_ROTATION_FOR_SEARCH to true and using IPs in the _DB_IPS_TABLE2 database table, below) for YouTube.com search scraping requests.
		const _SEARCH_SCRAPING_POPULATES_VID_INFO = false; // When true, and _ENABLE_SEARCH_SCRAPING is also true, search results will be populated with video data derived directly from YouTube.com search scraping, thereby eliminating YouTube API requests that would otherwise be made to BOTH the "search" AND "videos" endpoints. Minor and/or infrequent exceptions include "Top Videos" charts, playlist searches, and scraped video page URL searches that return no results (which still rely on requests to the YouTube API's "videos", "playlistItems", and "videos" endpoints, respectively). Thus, this setting ensures that the vast majority of keyword searches uses no YouTube API "units", further reducing (and nearly eliminating) API consumption.
		
		// Enable YouTube Direct download, a.k.a. "Highspeed Mode" (true = enabled, false = disabled)
		const _YOUTUBE_DIRECT_DOWNLOAD = true;

		// Enable/Disable video title links in search results 
		const _ENABLE_VIDEO_LINKS = true;
		// Enable/Disable all search query links, including video tag links in search results
		const _ENABLE_SEARCH_LINKS = true;
		
		// Enable .webp instead of the default .jpg for video thumbnail images
		// Compared to .jpg, .webp images are smaller files, faster to load, and generally better for SEO.
		// Warning: YouTube does NOT yet have .webp versions for some older videos! So, if no .webp version is available for a given video, then a placeholder image is displayed instead (when this option is enabled).
		const _ENABLE_WEBP_THUMBS = true;
		
		// File Brand (Shows your Domain Name "_WEBSITE_DOMAIN" in Downloaded/Converted File Name)
		const _FILE_BRAND = true;
		
		// Music Web Player (true = enabled, false = disabled)
		const _MUSIC_PLAYER = true;	
		
		// When true, "dynamic" sitemaps containing links to popular videos are automatically created for each supported country (see Config::$_countries array, below)
		// These sitemaps supplement a basic sitemap that contains only "static" page links (see Config::$_sitemapStaticPages array, below)
		const _ENABLE_DYNAMIC_SITEMAPS = true;
		
		// Facebook widget settings
		const ENABLE_FACEBOOK_LIKE_BOX = true; // Enable or disable Facebook Like Box in Sidebar
		const FACEBOOK_PAGE_NAME = "facebook"; // E.g., https://facebook.com/{Facebook page name}
		
		// Social sharing buttons (AddThis) settings
		// Visit https://www.addthis.com/get/share/ to create an account and generate buttons
		// You must select "Inline" Tool Type from the AddThis configurator
		// _ADDTHIS_SCRIPT_URL and _ADDTHIS_CSS_CLASS values can be extracted from generated button codes 
		const _ENABLE_ADDTHIS_WIDGET = false;
		const _ADDTHIS_SCRIPT_URL = "WIDGET_SCRIPT_URL";
		const _ADDTHIS_CSS_CLASS = "addthis_inline_share_toolbox";
		
		// Enable/Disable Google's "Invisible" reCAPTCHA for search form submissions
		const _ENABLE_RECAPTCHA = false;
		const _RECAPTCHA_KEY = 'YOUR_RECAPTCHA_KEY_HERE';
		const _RECAPTCHA_SECRET = 'YOUR_RECAPTCHA_SECRET_HERE';

		// The file type label that appears on download buttons in video charts, search results, and the Iframe/Button API as well as the file type ("ftype") property value in JSON API responses.
		const _MERGED_VIDEO_STREAM_LABEL = "mkv";
		
		// Determine the kind of file downloaded from YouTube and used for MP3 conversion
		// This constant accepts 2 possible values: "DASH" or "non-DASH".
		// 1) When set to "DASH", an Audio-Only stream is downloaded from YouTube. The resulting audio is generally the best quality available. If no high-quality, Audio-Only stream is available, then "non-DASH" video (see #2 below) is downloaded instead.
		// 2) When set to "non-DASH", a composite video + audio version of a given video is downloaded from YouTube. The resulting file's audio quality is generally less than high-quality "DASH" audio.
		const _MP3_DOWNLOAD_SOURCE = "DASH";

		// Enable MP3 downloads "without" requiring FFmpeg conversion, dramatically reducing CPU resource consumption and ideal for servers/hosting plans with limited resources!
		// When enabled, "all" MP3 qualities (defined in Config::$_mp3Qualities, below) result in the download of the highest-quality, Audio-Only DASH stream available (usually 160kb), and the subsequent audio files' extension is renamed to .mp3.
		// Note: The resulting MP3 files will lack file metadata (e.g., bitrate, duration, track info, etc.) and may not be playable in all audio players. 
		// Note: If multiple MP3 qualities are defined in Config::$_mp3Qualities, then "all" qualities will download the "same" file (regardless of the advertised bitrate). If this is undesirable, then you can 1) eliminate all but one quality from Config::$_mp3Qualities and 2) set the remaining quality to whatever bitrate number suits you.
		const _ENABLE_SIMULATED_MP3 = false;
		
		// Enable "non-DASH", composite video + audio downloads 
		// No FFmpeg is required.
		// (This is typically lower quality video, but YouTube Direct download is available.)
		const _ENABLE_NONDASH_VIDEO = true;
		
		// Enable the download of merged "video streams"
		// Video-only and audio-only tracks are combined via FFmpeg stream copy.
		// (Supports all video qualities, but no YouTube Direct download is available.)
		const _ENABLE_MERGED_VIDEO_STREAMS = true;
		
		// Videos as well as Video- and Audio-Only streams are downloaded in multiple parts (or "chunks") via a series of HTTP requests.
		// This generally speeds up downloads affected by YouTube bandwidth throttling.
		const _ENABLE_CHUNKED_DOWNLOAD = true;
		const _DOWNLOAD_CHUNK_SIZE = 1000000;  // 1 MB in bytes, by default. Adjust value as needed for optimal performance.
		
		// When enabled, Debug Mode inserts FFmpeg/cURL command-line output/errors directly into downloaded MP3 and Video/Merged Stream files.
		// Downloaded files can subsequently be opened in a text editor to troubleshoot commands' standard output and errors.
		const _DEBUG_MODE = false;
		
		// Other Constants
		const _REQUEST_USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36';  // User agent used for some HTTP requests
		const _REQUEST_IP_VERSION = 4; // Force IPv4, force IPv6, or don't force any IP version for audio/video download link generation and browser download requests. Valid values are "4" (force IPv4), "6" (force IPv6), or "-1" (don't force IP version). Note: When "-1", the web server chooses either IPv4 or IPv6 for these requests.
		const _ENABLE_UNICODE_SUPPORT = true;  // When true, allows Unicode characters in file names and video titles. A false value replaces/removes Unicode characters. Note: Not all operating systems support Unicode characters!

		// MP3 Caching Constants
		const _CACHE_FILES = false;  // When true, IF a given MP3 file has been converted before AND it is still stored on the server, then the file is delivered directly from the server rather than being downloaded/converted again. This establishes a MP3 file cache on your server, which can significantly save server resources (i.e., bandwidth used for downloading and CPU used for FFmpeg conversions). Note: Only MP3 files are cached at this time because only MP3 downloads require FFmpeg.
		const _CACHE_AFTER_X = 1;  // The number of times (greater than zero!!) that a video can be converted to any quality MP3 before it is eventually saved to the cache. (DO NOT set this value to zero!!) E.g., a value of 5 saves an MP3 in the cache after 5 downloads of the same video. This setting ensures that only "more popular" files are cached, which subsequently ensures more efficient use of available cache space (and a generally more effective cache).
		const _MAX_ALLOWED_DURATION_DIFFERENCE = 2;  // Value, measured in seconds, used to determine and delete incomplete files in your cache (when caching is enabled). I.e., YouTube's reported video duration is compared to the duration of the cached file on your server. If the difference in durations is more than _MAX_ALLOWED_DURATION_DIFFERENCE seconds, then the corresponding cached file is 1) deemed "incomplete" and 2) deleted from your server.
		const _MAX_CACHE_SIZE = 100000000;  // The maximum size, in KB, that the cache folder size can become before the oldest cached files are deleted (via "inc/schedule.php" cron job). Note: Because file deletions are performed as a regularly scheduled task on the server, the actual size of the cache folder may exceed this value between scheduled tasks. So, it is IMPORTANT that this value is set to significantly lower than the actual space available for the cache folder on the hard drive! You can further mitigate this issue by increasing the _CACHE_SIZE_BUFFER constant value, running the scheduled task more often, and/or ensuring that you always have plenty of unused, available hard disk space.
		const _CACHE_SIZE_BUFFER = 1000000;  // If the cache folder size is greater than _MAX_CACHE_SIZE, then the oldest files in the cache are deleted one at a time (via "inc/schedule.php" cron job) until the cache size is less than _MAX_CACHE_SIZE minus this value, in KB.
		const _CACHE_PATH = '/store/cache/files/';  // Path to top-level directory where cached MP3 files are stored.

		// Rotating IPs Constants
		// Used to circumvent temporary YouTube IP bans and/or CAPTCHAs that may occur when 1) scraping YouTube.com for video info/links, 2) scraping YouTube.com for search results, and/or 3) downloading videos.
		// "IP Rotation" uses either the "ips"/"ips_search" Database table(s) OR the Tor network (see "More Database Constants" and "Tor Constants" sections, below). The default method is the DATABASE METHOD.
		// (Note: You can use the DATABASE METHOD or TOR METHOD, but NOT both!)
		// (IMPORTANT: The _ENABLE_IP_ROTATION_FOR_SEARCH and _ENABLE_IP_ROTATION_FOR_VIDEOS settings (see below) operate independently, so _ENABLE_IP_ROTATION_FOR_VIDEOS does NOT need to be "true" for _ENABLE_IP_ROTATION_FOR_SEARCH to work, and vice versa. Furthermore, with exception to _DISABLE_IP_FOR_DOWNLOAD, _ENABLE_IP_ROTATION_FOR_SEARCH uses the exact SAME "Rotating IPs Constants" section values that _ENABLE_IP_ROTATION_FOR_VIDEOS does or would. E.g., the _IP_ROTATION_METHOD and _IP_REQUEST_TIMEOUT values apply to BOTH the _ENABLE_IP_ROTATION_FOR_VIDEOS "and" _ENABLE_IP_ROTATION_FOR_SEARCH settings.)
		const _ENABLE_IP_ROTATION_FOR_VIDEOS = false;  // When true, enables IP rotation (using IPs in the _DB_IPS_TABLE database table, below) for all YouTube requests related to 1) scraping YouTube.com for video info/links AND 2) downloading videos.
		const _ENABLE_IP_ROTATION_FOR_SEARCH = false;  // When true, enables IP rotation (using IPs in the _DB_IPS_TABLE2 database table, below) for all YouTube requests related to scraping YouTube.com for search results. (Note: _ENABLE_SEARCH_SCRAPING, above, "must" be set to true for this setting to work!!)
		const _IP_ROTATION_METHOD = "sequential";  // Either "round-robin" or "sequential". The "round-robin" method distributes requests equally to each IP in rotation. The "sequential" method uses the same IP for all requests until that IP is banned, and then (and only then) advances to the next IP in rotation. This value only applies to the DATABASE METHOD (and not the TOR METHOD, which always behaves "sequentially").
		const _MAX_CURL_TRIES = 10;  // Maximum number of times code tries a HTTP request, regardless of IP rotation method used, before giving up. (When using the DATABASE METHOD, this value will vary depending on the number of IPs in the rotation. The default value (10) is reasonable if there are 5 total IPs in the rotation -- in which case, each IP is maximally used twice for "each" HTTP request before the code gives up and displays an error.)
		const _IP_CONNECT_TIMEOUT = 25;  // Maximum time, in seconds, that a given "proxy" IP can attempt to connect to YouTube before timing out. (This value does NOT apply to IPs configured as "interfaces", when using the DATABASE METHOD.) This can be useful when one or more proxies are not working as expected. Note: Be VERY CAREFUL when reducing the default value!! Do not set this value too low, or otherwise valid requests will fail! If you must reduce the default value, do so in small increments until the "bad" proxy or proxies are effectively addressed.
		const _IP_REQUEST_TIMEOUT = 35;  // Maximum time, in seconds, that a given "proxy" IP's request to YouTube can persist before timing out. (This value does NOT apply to IPs configured as "interfaces", when using the DATABASE METHOD.) This can be useful when one or more proxies are not working as expected. Note: Be VERY CAREFUL when reducing the default value!! Do not set this value too low, or otherwise valid requests will fail! If you must reduce the default value, do so in small increments until the "bad" proxy or proxies are effectively addressed.
		const _IP_BAN_PAUSE = 43200;  // When using the "round-robin" DATABASE METHOD, this is the length of time, in seconds, to wait before checking if a previously banned IP (that is temporarily disabled in the rotation) is still banned. So, after every _IP_BAN_PAUSE seconds, a given banned IP will either be re-enabled in the rotation (if the ban has been released) or it will continue to be disabled for another _IP_BAN_PAUSE seconds.
		const _DISABLE_IP_FOR_DOWNLOAD = true;  // When true, the code will first try to use the primary server IP for video/audio file downloads. In this case, the current IP in rotation is only used if the initial download request fails. (Related HTTP requests will still only use the current IP in rotation.) When set to false, an IP in rotation will be used for ALL requests, including video/audio downloads. At this time, a "true" value is recommended because downloads via the primary server IP will generally be faster than proxy downloads (IF you are rotating "proxy" IPs).

		// More Database Constants
		// (These Database Constants are only used "if" _ENABLE_IP_ROTATION_FOR_VIDEOS and/or _ENABLE_IP_ROTATION_FOR_SEARCH is enabled and Tor is NOT enabled!)
		// You CAN use the same IPs in both the "ips" AND "ips_search" Database tables.
		// If you get errors when using the DATABASE METHOD, please first ensure that your additional IPs are configured to operate as "outgoing network interfaces" and/or "proxies". If the IPs are configured correctly, then you must add more IPs to the corresponding database table(s)! The number of IPs in rotation is directly proportional to the amount of traffic to your site, so keep adding IPs until you no longer get errors!
		const _DB_IPS_TABLE = 'ips';  // Database table that stores IPs used for IP rotation, as per _ENABLE_IP_ROTATION_FOR_VIDEOS above. Use the online tool (https://rajwebconsulting.com/build-sql/) or see "ips.sql" in the "/docs" folder for the SQL required to build this table.
		const _DB_IPS_TABLE2 = 'ips_search';  // Database table that stores IPs used for IP rotation, as per _ENABLE_IP_ROTATION_FOR_SEARCH above. Use the online tool (https://rajwebconsulting.com/build-sql/) or see "ips_search.sql" in the "/docs" folder for the SQL required to build this table.

		// Tor Constants
		// (Tor, when enabled below, is used "instead of" the Database "if" (and "only if") _ENABLE_IP_ROTATION_FOR_VIDEOS and/or _ENABLE_IP_ROTATION_FOR_SEARCH is also enabled!)
		const _ENABLE_TOR_PROXY = false;  // Enable the use of Tor for IP rotation (i.e., the TOR METHOD) instead of the default DATABASE METHOD. (See https://hub.docker.com/r/rajwebconsulting/tor-proxy for Tor setup instructions.)
		const _TOR_PROXY_PASSWORD = "YOUR_TOR_PASSWORD";  // Tor password used for control protocol request authentication, which is required to change Tor proxy IP.
		const _TOR_PROXY_PORT = '9250';
		const _TOR_CONTROL_PORT = '9251';

		// Redis (Database Caching) Constants
		// Optionally enable Redis to cache database data in memory and subsequently reduce database load.
		const _ENABLE_REDIS_CACHING = false;
		const _REDIS_SERVER = '127.0.0.1';
		const _REDIS_PORT = 6379;
		const _REDIS_PASSWORD = 'YOUR_PASSWORD_HERE';
		
		#region Public Fields
		// List of domains and/or IP addresses, separated by commas, that are allowed access to the JSON, Button, and JSON "Search" APIs.
		// In general, for all APIs, add IP address for PHP consumption and domain for AJAX/HTML consumption.
		// If a domain/IP needs access to multiple APIs, then it must be included in each of the corresponding 'json', 'button', and/or 'search' subarrays!
		// If the 'json', 'button', or 'search' subarray is empty, then this enables unrestricted, public access to the corresponding API.
		// Do NOT prepend domains/IPs with 'http://' or 'https://'!!	
		// Do NOT prepend domains with 'www' or any other subdomain!!
		// IMPORTANT: When using the JSON "Search" API, "both" the _ENABLE_SEARCH_SCRAPING "and" _SEARCH_SCRAPING_POPULATES_VID_INFO constant values (see the "YouTube.com Search Scraping" section above) MUST be set to true in order to eliminate 99.99% of potential YouTube API consumption!! 
		public static $_apiAllowedDomains = array(
			'json' => array(
				'access.is.forbidden'
			),
			'button' => array(
				'access.is.forbidden'
			),
			'search' => array(
				'access.is.forbidden'
			)
		);
		
		public static $_videoHosts = array(
			1 => array(
				'name' => 'YouTube',
				'abbreviation' => 'yt',
				'url_root' => array(
					'http://www.youtube.com/watch?v=',
					'http://m.youtube.com/watch?v=',
					'http://youtu.be/'
				),
				'url_example_suffix' => 'HMpmI2F2cMs',
				'allow_https_urls' => true,
				'src_video_type' => 'flv',
				'video_qualities' => array(
					'hd' => 'hd720',  // high definition
					'hq' => 'large',  // high quality
					'sd' => 'medium',  // standard definition
					'small' => 'small',  // low definition
					'au' => 'audio'  // audio only
				),
				'icon_style' => 'fa fa-youtube',
				'download_host' => 'googlevideo.com'
			)
		);			
		
		// YouTube Itags
		public static $_itags = array(
			'videos' => array(
				'22' => array('quality' => '720', 'ftype' => 'MP4'),
				'43' => array('quality' => '360', 'ftype' => 'WEBM'),
				'18' => array('quality' => '360', 'ftype' => 'MP4'),
				'5' => array('quality' => '240', 'ftype' => 'FLV'),
				'36' => array('quality' => '240', 'ftype' => '3GP'),
				'17' => array('quality' => '144', 'ftype' => '3GP')
			),
			'audiostreams' => array(
				'139' => array('bitrate' => '48', 'codec' => 'AAC'),
				'140' => array('bitrate' => '128', 'codec' => 'AAC'),
				'141' => array('bitrate' => '256', 'codec' => 'AAC'),
				//'171' => array('bitrate' => '128', 'codec' => 'Vorbis'),
				'249' => array('bitrate' => '48', 'codec' => 'Opus'),
				'250' => array('bitrate' => '64', 'codec' => 'Opus'),
				'251' => array('bitrate' => '160', 'codec' => 'Opus'),
				'256' => array('bitrate' => '192', 'codec' => 'AAC'),
				'258' => array('bitrate' => '384', 'codec' => 'AAC'),
				'327' => array('bitrate' => '256', 'codec' => 'AAC')
			),
			'videostreams' => array(
				// MP4
				'160' => array('quality' => '144', 'framerate' => '15', 'resolution' => '144-mp4'),
				'133' => array('quality' => '240', 'framerate' => '30', 'resolution' => '240-mp4'),
				'134' => array('quality' => '360', 'framerate' => '30', 'resolution' => '360-mp4'),
				'135' => array('quality' => '480', 'framerate' => '30', 'resolution' => '480-mp4'),
				'136' => array('quality' => '720', 'framerate' => '30', 'resolution' => 'hd-mp4'),
				'298' => array('quality' => '720', 'framerate' => '60', 'resolution' => 'hd-mp4'),
				'137' => array('quality' => '1080', 'framerate' => '30', 'resolution' => 'fullhd-mp4'),
				'299' => array('quality' => '1080', 'framerate' => '60', 'resolution' => 'fullhd-mp4'),
				'264' => array('quality' => '1440', 'framerate' => '30', 'resolution' => '2k-mp4'),
				'266' => array('quality' => '2160', 'framerate' => '30', 'resolution' => '4k-mp4'),
				'138' => array('quality' => '2160', 'framerate' => '30', 'resolution' => '4k-mp4'),
				'304' => array('quality' => '1440', 'framerate' => '60', 'resolution' => '2k-mp4'),
				'305' => array('quality' => '2160', 'framerate' => '30', 'resolution' => '4k-mp4'),
				'394' => array('quality' => '144', 'framerate' => '30', 'resolution' => '144-mp4'),
				'395' => array('quality' => '240', 'framerate' => '30', 'resolution' => '240-mp4'),
				'396' => array('quality' => '360', 'framerate' => '30', 'resolution' => '360-mp4'),
				'397' => array('quality' => '480', 'framerate' => '30', 'resolution' => '480-mp4'),
				'398' => array('quality' => '720', 'framerate' => '60', 'resolution' => 'hd-mp4'),
				'399' => array('quality' => '1080', 'framerate' => '60', 'resolution' => 'fullhd-mp4'),
				'400' => array('quality' => '1440', 'framerate' => '60', 'resolution' => '2k-mp4'),
				'401' => array('quality' => '2160', 'framerate' => '60', 'resolution' => '4k-mp4'),
				'402' => array('quality' => '4320', 'framerate' => '60', 'resolution' => '8k-mp4'),
				'571' => array('quality' => '4320', 'framerate' => '60', 'resolution' => '8k-mp4'),
				'694' => array('quality' => '144', 'framerate' => '60', 'resolution' => '144-mp4'),
				'695' => array('quality' => '240', 'framerate' => '60', 'resolution' => '240-mp4'),
				'696' => array('quality' => '360', 'framerate' => '60', 'resolution' => '360-mp4'),
				'697' => array('quality' => '480', 'framerate' => '60', 'resolution' => '480-mp4'),
				'698' => array('quality' => '720', 'framerate' => '60', 'resolution' => 'hd-mp4'),
				'699' => array('quality' => '1080', 'framerate' => '60', 'resolution' => 'fullhd-mp4'),
				'700' => array('quality' => '1440', 'framerate' => '60', 'resolution' => '2k-mp4'),
				'701' => array('quality' => '2160', 'framerate' => '60', 'resolution' => '4k-mp4'),
				// WEBM
				'278' => array('quality' => '144', 'framerate' => '15', 'resolution' => '144-webm'),
				'242' => array('quality' => '240', 'framerate' => '30', 'resolution' => '240-webm'),
				'243' => array('quality' => '360', 'framerate' => '30', 'resolution' => '360-webm'),
				'244' => array('quality' => '480', 'framerate' => '30', 'resolution' => '480-webm'),
				'247' => array('quality' => '720', 'framerate' => '30', 'resolution' => 'hd-webm'),
				'302' => array('quality' => '720', 'framerate' => '60', 'resolution' => 'hd-webm'),
				'248' => array('quality' => '1080', 'framerate' => '30', 'resolution' => 'fullhd-webm'),
				'303' => array('quality' => '1080', 'framerate' => '60', 'resolution' => 'fullhd-webm'),
				'271' => array('quality' => '1440', 'framerate' => '30', 'resolution' => '2k-webm'),
				'313' => array('quality' => '2160', 'framerate' => '30', 'resolution' => '4k-webm'),
				'308' => array('quality' => '1440', 'framerate' => '60', 'resolution' => '2k-webm'),
				'315' => array('quality' => '2160', 'framerate' => '60', 'resolution' => '4k-webm'),
				'272' => array('quality' => '4320', 'framerate' => '60', 'resolution' => '8k-webm'),
				'330' => array('quality' => '144', 'framerate' => '60', 'resolution' => '144-webm'),
				'331' => array('quality' => '240', 'framerate' => '60', 'resolution' => '240-webm'),
				'332' => array('quality' => '360', 'framerate' => '60', 'resolution' => '360-webm'),
				'333' => array('quality' => '480', 'framerate' => '60', 'resolution' => '480-webm'),
				'334' => array('quality' => '720', 'framerate' => '60', 'resolution' => 'hd-webm'),
				'335' => array('quality' => '1080', 'framerate' => '60', 'resolution' => 'fullhd-webm'),
				'336' => array('quality' => '1440', 'framerate' => '60', 'resolution' => '2k-webm'),
				'337' => array('quality' => '2160', 'framerate' => '60', 'resolution' => '4k-webm')								
			), 
			'mergedstreams' => array(
				// Merge Video + Audio
				// MP4
				'8k-mp4' => array('audio' => '140'),
				'4k-mp4' => array('audio' => '140'),
				'2k-mp4' => array('audio' => '140'),
				'fullhd-mp4' => array('audio' => '140'),
				'hd-mp4' => array('audio' => '140'),
				'480-mp4' => array('audio' => '140'),
				'360-mp4' => array('audio' => '140'),
				'240-mp4' => array('audio' => '140'),
				'144-mp4' => array('audio' => '140'),
				// WEBM
				'8k-webm' => array('audio' => '251'),
				'4k-webm' => array('audio' => '251'),
				'2k-webm' => array('audio' => '251'),
				'fullhd-webm' => array('audio' => '251'),
				'hd-webm' => array('audio' => '251'),
				'480-webm' => array('audio' => '251'),
				'360-webm' => array('audio' => '251'),
				'240-webm' => array('audio' => '250'),
				'144-webm' => array('audio' => '249')
			)
		);
			
		// Available MP3 Qualities, in kbps
		// Add/Remove values as needed
		// These values are uniformly applied to default website interface "and" included APIs
		public static $_mp3Qualities = array(320, 256, 192, 128, 64);

		// Add/Remove page names to automatically populate a sitemap containing ONLY static pages
		// Static page examples include the homepage, FAQ page, API page (if enabled), and Contact page
		// Different language versions/URLS of/for each static page are automatically added to the sitemap
		// Note: If this array is empty, then the sitemap is NOT generated!
		public static $_sitemapStaticPages = array(
			'@index', // i.e., homepage
			'@faq',
			//'@developer', // i.e., API page
			'@contact'
		);
		
		// Media Units
		public static $_mediaUnits = array(
			'quality' => 'p',
			'bitrate' => ' kbps',			
			'framerate' => 'fps',			
		);
							
		// Country List	for "Top Videos" (add more or edit as needed...)
		// See comments above for _DEFAULT_COUNTRY_GROUP and _DEFAULT_COUNTRY constants
		public static $_countries = array(
			'Africa' => array(
				'dz' => 'Algeria',
				'eg' => 'Egypt',
				'gh' => 'Ghana',
				'ke' => 'Kenya',
				'ly' => 'Libya',
				'ma' => 'Morocco',
				'ng' => 'Nigeria',
				//'sn' => 'Senegal',
				'za' => 'South Africa',
				'tz' => 'Tanzania',
				'tn' => 'Tunisia',
				'ug' => 'Uganda',
				'zw' => 'Zimbabwe'
			),
			'Americas' => array(
				'ar' => 'Argentina',
				'bo' => 'Bolivia',
				'br' => 'Brazil',
				'ca' => 'Canada',
				'co' => 'Colombia',
				'cr' => 'Costa Rica',
				'cl' => 'Chile',
				'do' => 'Dominican Republic',
				//'ec' => 'Ecuador',
				//'sv' => 'El Salvador',
				'gt' => 'Guatemala',
				'hn' => 'Honduras',
				'jm' => 'Jamaica',
				'mx' => 'Mexico',
				'ni' => 'Nicaragua',
				'pa' => 'Panama',
				'py' => 'Paraguay',
				'pe' => 'Peru',
				'pr' => 'Puerto Rico',
				'us' => 'United States',
				'uy' => 'Uruguay',
				've' => 'Venezuela'
			),
			'Asia' => array(
				'am' => 'Armenia',
				'az' => 'Azerbaijan',
				'bh' => 'Bahrain',
				'bd' => 'Bangladesh',
				'ge' => 'Georgia',
				'hk' => 'Hong Kong SAR China',
				'in' => 'India',
				'id' => 'Indonesia',
				'iq' => 'Iraq',
				'il' => 'Israel',
				'jp' => 'Japan',
				'jo' => 'Jordan',
				'kz' => 'Kazakhstan',
				'kw' => 'Kuwait',
				'lb' => 'Lebanon',
				'my' => 'Malaysia',
				'np' => 'Nepal',
				//'om' => 'Oman',
				'pk' => 'Pakistan',
				'ph' => 'Philippines',
				'qa' => 'Qatar',
				'sa' => 'Saudi Arabia',
				'sg' => 'Singapore',
				'kr' => 'South Korea',
				'tw' => 'Taiwan',
				'th' => 'Thailand',
				'tr' => 'Turkey',
				'ae' => 'United Arab Emirates',
				'vn' => 'Vietnam',
				//'ye' => 'Yemen'
			),
			'Europe' => array(
				'at' => 'Austria',
				'by' => 'Belarus',
				'be' => 'Belgium',
				//'ba' => 'Bosnia-Herzegovina',
				'bg' => 'Bulgaria',
				'hr' => 'Croatia',
				'cz' => 'Czech Republic',
				'dk' => 'Denmark',
				//'ee' => 'Estonia',
				'fi' => 'Finland', 
				'fr' => 'France', 
				'de' => 'Germany', 
				'gr' => 'Greece', 
				'hu' => 'Hungary',
				'is' => 'Iceland',
				'ie' => 'Ireland',
				'it' => 'Italy',
				'lv' => 'Latvia',
				'lt' => 'Lithuania',
				'lu' => 'Luxembourg',
				'nl' => 'Netherlands',
				'no' => 'Norway',
				'pl' => 'Poland',
				'pt' => 'Portugal',
				'ro' => 'Romania',
				'ru' => 'Russia',
				'rs' => 'Serbia',
				'sk' => 'Slovakia',
				'si' => 'Slovenia',
				'es' => 'Spain',
				'se' => 'Sweden',
				'ch' => 'Switzerland', 
				'ua' => 'Ukraine',
				'gb' => 'United Kingdom'
			),
			'Oceania' => array(
				'au' => 'Australia',
				'nz' => 'New Zealand',
				'pg' => 'Papua New Guinea'
			)
		);	
		
		// List of YouTube video IDs that are intentionally "blocked" and thus cannot be downloaded/converted
		// E.g., this can be used to disable video download/conversion at the copyright holder's request
		// Each video ID added to the array must be in the format, e.g.: 'J_ub7Etch2U' => 'block'
		public static $_blockedVideos = array(
			'J_ub7Etch2U' => 'block',
			'YOUTUBE_VIDEO_ID_HERE' => 'block'
		);
		
		// List of Plugins, generally sold separately, that are currently enabled/active in the "vendors" directory
		// Plugin support will be expanded upon in future software versions!
		public static $_plugins = array(
			//'AntiCaptcha' => true
		);
		#endregion	
	}
 ?>
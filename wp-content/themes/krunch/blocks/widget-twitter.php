
<?php
require 'twitter/tmhOAuth.php';
require 'twitter/tmhUtilities.php';
$tmhOAuth = new tmhOAuth(array(
  'consumer_key'    => 'o7ZyvqOk3QojgA1QTB8tkWWoc',
  'consumer_secret' => 'gC9lI3xocdDS5q6GabLfhp0obYs1AGXVTxU8lUIIv4dj79neGx',
  'user_token'      => '67026441-6c0BEl5brsccoCHCJwFZPi5kw9VzpFsdzcBN4VC8b',
  'user_secret'     => 'EEJup7090GDKVB73dwHdVYBLLmiqT8ts1kuOhe1B3uao5',
));

$code = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/user_timeline'), array(
  'include_entities' => '1',
  'include_rts'      => '1',
  'screen_name'      => 'krunchuk',
  'count'            => 3,
));

if ($code == 200) {
	
	echo "<ul class='twitterFeed unstyled'>";
	
	$timeline = json_decode($tmhOAuth->response['response'], true);
	foreach ($timeline as $tweet) :
		$entified_tweet = tmhUtilities::entify_with_options($tweet);
		$is_retweet = isset($tweet['retweeted_status']);

		$diff = time() - strtotime($tweet['created_at']);
		if ($diff < 60*60)
			$created_at = floor($diff/60) . ' minutes ago';
		elseif ($diff < 60*60*24)
			$created_at = floor($diff/(60*60)) . ' hours ago';
		else
			$created_at = date('dS M Y', strtotime($tweet['created_at']));
	?>
	<li>
	    <p><?= $entified_tweet ?></p>
	    <p class="tweetTime"><?= $created_at; ?></p>
	</li>
	<?php
  	endforeach;
	
	echo "</ul>";
	
} else {
	tmhUtilities::pr($tmhOAuth->response);
}
?>
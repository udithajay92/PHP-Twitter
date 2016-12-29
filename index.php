<?php include "twitteroauth.php";?>

<?php
$consumer = "HiORQPVmRAerM9lVeHO3eGH6k";
$consumersecret = "rIjiobdG38wZXJMTeJRE21Tq1mdQSUFTFMP0VbU3TUb6j69Elw";
$accesstoken = "3792089893-iAEVGO8EQB4u9qxTrm2mdihzJstmh6SsvekLQOV";
$accesstokensecret = "zVStZ62aRuUmHDvYIbHU7eJ8eJqllXRGmLvXOXqPtQ9hb";

$twitter = new TwitterOAuth($consumer,$consumersecret,$accesstoken,$accesstokensecret);

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=twd&result_type=recent&count=50');

?>

<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Twitter API</title>
		<style type="text/css">
		body {
    background-color: #b0c4de;
    font-family: arial;
    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 400px;
}
			blockquote.twitter-tweet {
  display: inline-block;
  font-family: "Helvetica Neue", Roboto, "Segoe UI", Calibri, sans-serif;
  font-size: 12px;
  font-weight: bold;
  line-height: 16px;
  border-color: #eee #ddd #bbb;
  border-radius: 5px;
  border-style: solid;
  border-width: 1px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
  margin: 10px 5px;
  padding: 0 16px 16px 16px;
  max-width: 468px;
}
 
blockquote.twitter-tweet p {
  font-size: 16px;
  font-weight: normal;
  line-height: 20px;
}
 
blockquote.twitter-tweet a {
  color: inherit;
  font-weight: normal;
  text-decoration: none;
  outline: 0 none;
}
 
blockquote.twitter-tweet a:hover,
blockquote.twitter-tweet a:focus {
  text-decoration: underline;
}
		</style>
	</head>

	<body>

		<form action="" method="post">
			<label>Search : <input type="text" name="keyword" style="background-image:url(images/form_bg.jpg);background-repeat:repeat-x;border:1px solid #d1c7ac;width: 230px;color:#333333;padding:3px;margin-right:4px;margin-bottom:8px;font-family:tahoma, arial, sans-serif;"/></label>
			
		</form>
		

		<?php
			if (isset($_POST['keyword'])){
				$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=recent&count=50');

				foreach($tweets->statuses as $tweet){

						$id = $tweet->id_str; 
						echo '<blockquote class="twitter-tweet" lang="en"><p lang="en" dir="ltr"></p>&mdash;<a href="https://twitter.com/djssolitario/status/'.$id.'">'.
						'</a></blockquote><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
					
						echo '<table>';
						echo '<tr>';
						echo '<td>';
						echo 'Created at - '.$tweet->created_at.'';
						echo '</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>';
						echo 'Re-tweets count - '.$tweet->retweet_count.'';
						echo '</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>';
						echo 'Favourites count - '.$tweet->favorite_count.'';
						echo '</td>';
						echo '</tr>';
						echo '</table>';

					    //echo '<img src="'.$tweet->user->profile_image_url.'"/>';
						//echo 'Text - '.$tweet->text.'<br>';
						//echo 'Created at - '.$tweet->created_at.'<br><br>';
					
				}
			}

		?>
	</body>
</html>
<?php
include("feeds.php");

// kiválasztani pár feed linkjét random
$randFeedsKey = array_rand($feed_links, 10);

$textArr = array();
foreach ($randFeedsKey as $feed_key) {
    $xml = simplexml_load_file($feed_links[$feed_key], null, LIBXML_NOERROR);
    if ($xml === false) {
        continue;
    }
  //  $feed = array();
		foreach($xml->channel->item as $entry) {
		   $sentence = "$entry->title";
      //$sentence = preg_replace('~[^-\p{L}\p{N}]++~u', ' ', $sentence);
      $exploded = explode(" ", $sentence);
      $exploded = array_filter($exploded);

      $half_num = floor(count($exploded)/2);

      $first_half = array_slice($exploded, 0, $half_num+1);
      $second_half = array_slice($exploded, $half_num, $half_num+1);
      // $first_half = implode(" ", $first_half);
      // $second_half = implode(" ", $second_half);
      $sentence = array();
      $sentence[0] = $first_half;
      $sentence[1] = $second_half;
      // $sentence = array_flip($sentence);
      $textArr[] = $sentence;
		}
}

$output = array();
for ($i=0; $i < 20; $i++) {
  $newSentence = array();

  $gram1 = $textArr[array_rand($textArr)];

  $newSentence += $gram1[0];

do {
  $gram2 = $textArr[array_rand($textArr)];
  $newSentence = array_merge($newSentence, $gram2[1]);

} while (count($newSentence, 1) < 4);

  $output[] = $newSentence;
}

$news ="";
foreach ($output as $new) {
  $news .= '<li class="list-group-item"><h4>'.implode(" ", array_values($new))."</h4></li>";
}

echo '<ul class="list-group">';
echo $news;
echo "</ul>"
 ?>

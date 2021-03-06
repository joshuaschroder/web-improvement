<?php
	
	$article = '3';
	$code = 'Health and Safety Code';
	$prefix = 'HSC';
	
	$chapters = array (
	"11",
	"12",
	"13",
	"31",
	"32",
	"33",
	"34",
	"35",
	"36",
	"37",
	"39",
	"40",
	"41",
	"42",
	"43",
	"45",
	"47",
	"48",
	"61",
	"62",
	"63",
	"64",
	"81",
	"82",
	"84",
	"85",
	"87",
	"88",
	"89",
	"92",
	"93",
	"94",
	"95",
	"96",
	"98",
	"101",
	"103",
	"104",
	"105",
	"107",
	"108",
	"112",
	"114",
	"115",
	"117",
	"121",
	"122",
	"141",
	"142",
	"144",
	"145",
	"146",
	"161",
	"162",
	"164",
	"166",
	"171",
	"181",
	"182",
	"191",
	"192",
	"193",
	"194",
	"222",
	"241",
	"242",
	"243",
	"244",
	"245",
	"247",
	"248",
	"250",
	"251",
	"252",
	"253",
	"254",
	"255",
	"259",
	"260",
	"263",
	"281",
	"283",
	"311",
	"312",
	"314",
	"321",
	"322",
	"323",
	"341",
	"345",
	"361",
	"382",
	"385",
	"401",
	"430",
	"431",
	"432",
	"433",
	"435",
	"436",
	"437",
	"438",
	"439",
	"440",
	"441",
	"461",
	"462",
	"463",
	"464",
	"466",
	"467",
	"481",
	"483",
	"485",
	"486",
	"501",
	"502",
	"503",
	"505",
	"506",
	"507",
	"508",
	"531",
	"532",
	"533",
	"534",
	"535",
	"551",
	"552",
	"553",
	"554",
	"555",
	"571",
	"572",
	"573",
	"574",
	"575",
	"577",
	"578",
	"591",
	"592",
	"593",
	"594",
	"595",
	"597",
	"612",
	"614",
	"615",
	"671",
	"672",
	"673",
	"694",
	"751",
	"755",
	"756",
	"757",
	"773",
	"774",
	"777",
	"779",
	"781",
	"782",
	"821",
	"822",
	"826",
	"828",
	"829",
	"832",
	"841",
	"1001",
	"1002",
	);
	
	include_once('/home/codio/workspace/scripts/simplehtmldom/simple_html_dom.php');	
	$html = file_get_html('http://ecology-sandra.codio.io:3000/scripts/sb219/input/ARTICLE-' . $article. '.htm');
	$titleCode = strtoupper($code);
	$header ="<!DOCTYPE html>\n\t<html>\n\t\t<head>\n\t\t\t<title></title>\n\t\t</head>\n\t<body>\n\t\t<h1>ARTICLE " . $article . " - " . $titleCode . "</h1>\n";
	$footer ="\n\t</body>\n</html>";
	
	foreach ($chapters as $chapter) {
		
		$file = '/home/codio/workspace/scripts/sb219/output/' .$prefix. '-Chap-' . $chapter . '-SB219.html';
		$match1 = "Chapter " . $chapter . ",";
		$match2 = "Section " . $chapter . ".";
		$match3 = "Sections " . $chapter . ".";
		$match4 = "The following provisions of the " .$code . " are repealed";
		
		file_put_contents($file, $header, FILE_APPEND);
		echo $header;
		
		foreach($html->find('section') as $section)  {
			foreach($section->find('h3') as $h3) {
				if (strpos($h3, $match1) !== false || strpos($h3, $match2) !== false || strpos($h3, $match3) !== false || strpos($h3, $match4) !== false)  {
					file_put_contents($file, $section, FILE_APPEND);
					echo $section;
				}
			}
		}
		file_put_contents($file, $footer, FILE_APPEND);
		echo $footer;
		echo "<hr/> Output to " . $file . "<hr/>";
	}	
	
?>
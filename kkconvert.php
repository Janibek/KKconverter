<?php
mb_internal_encoding('utf-8');
/******************* converter ********************
 Kazakh (Қазақша)
 Convert text from Kazakh Arabic to Cyrillic script. Altai,Caina. 2014.1.1
 Author: Janibek Sheryazdan
 Contact: +86 18290936662, QQ 616575108, zhanibek@qq.com
******************* converter ********************/
function artokz($text){
	$text = str_replace("\n", "╧ \n", $text);
	$text = str_replace("،", "،╧ ", $text) ;
	$cyr = array(
		'/بىز/' => 'ءبىز', '/سىز/' => 'ءسىز', '/بىر/' => 'ءبىر',
		// Do not let them affect the string
		'/\-/' => '╧ -', '/\./' => '╧ .', '/\«/' => '╧ «',
		// HAMZA
		'/ءا/ui' => 'ә', '/ءو/ui' => 'ө', '/ءۇ/ui' => 'ү', '/ءى/ui' => 'і',
		'/يۋ/ui' => 'ю', '/يو/ui' => 'ё', '/يا/ui' => 'ия', '/تس/ui' => 'ц',
		// All matching string
 		'/ا/ui' => 'а', '/ب/ui' => 'б', '/ۆ/ui' => 'в', '/گ/ui' => 'г', '/ع/ui' => 'ғ', '/د/ui' => 'д', '/ە/ui' => 'е', '/ج/ui' => 'ж',
 		'/ي/ui' => 'и', '/ز/ui' => 'з', '/ك/ui' => 'к', '/ق/ui' => 'қ', '/ل/ui' => 'л', '/م/ui' => 'м', '/ن/ui' => 'н', '/ڭ/ui' => 'ң',
 		'/و/ui' => 'о', '/پ/ui' => 'п', '/ر/ui' => 'р', '/س/ui' => 'с', '/ت/ui' => 'т', '/ۋ/ui' => 'у', '/ۇ/ui' => 'ұ', '/ف/ui' => 'ф', '/ح/ui' => 'х',
 		'/ھ/ui' => 'һ', '/چ/ui' => 'ч', '/ش/ui' => 'ш', '/شش/ui' => 'щ', '/ى/ui' => 'ы',
 		'/\،/' => ',', '/\؟/' => '?',
 		// They love letters [ й і я ]
 		'/([аәөоүұе])и/ui' => '$1й', '/([кг])ы/ui' => '$1і', '/([жш])а([й])/ui' => '$1ә$2',
 		'/([аәеоөұүыі])йя/ui' => '$1я',
 		'/қазыр/ui' => 'қазір',
			);
		foreach( $cyr as $k => $v ) {
			$text = preg_replace( $k, $v, $text );
		}
		// Begin operating by word
		$w = explode(' ', $text);
		$res = "";
		for ($i="0"; $i<count($w); $i=$i+1) {
			// Front я letters
			if(mb_substr(trim($w[$i]), 1, 1) == "я") {
				$w[$i] = str_replace("ия", "я", $w[$i]);
				}
				$w[$i] = preg_replace("/(.)ц/", "$1тс", $w[$i]);
				
				// These letters do not match
				if ( !preg_match('/[хғқфв]/u', $w[$i]) ) {
					// Match letters
					if(preg_match('/[ء]/u', mb_substr(trim($w[$i]), 0, 1))){
					//if ( preg_match('/[ء]/u', $w[$i]) ) {
						$w[$i] = str_replace("а", "ә", $w[$i]);
						$w[$i] = str_replace("ы", "і", $w[$i]);
						$w[$i] = str_replace("о", "ө", $w[$i]);
						$w[$i] = str_replace("ұ", "ү", $w[$i]);
						$w[$i] = str_replace("я", "ә", $w[$i]);
					}
					if ( preg_match('/[к]/u', $w[$i]) ) {
						//$w[$i] = preg_replace("/(к)а/", "$1ә", $w[$i]);
						$w[$i] = preg_replace("/а(к)/", "ә$1", $w[$i]);
						$w[$i] = preg_replace("/а(.+к)/", "ә$1", $w[$i]);
					}
					if ( preg_match('/[еі]/u', $w[$i]) ) {
						$w[$i] = preg_replace("/а/", "ә", $w[$i],1);
					}
					if ( preg_match('/[г]/u', $w[$i]) ) {
						$w[$i] = str_replace("ұ", "ү", $w[$i]);
						$w[$i] = preg_replace("/(г)а/", "$1ә", $w[$i]);
						$w[$i] = preg_replace("/а(г)/", "ә$1", $w[$i]);
						$w[$i] = preg_replace("/а(.+г)/", "ә$1", $w[$i]);
					}
					if ( preg_match('/[екәөүі]/u', $w[$i]) ) {
						$w[$i] = str_replace("ы", "і", $w[$i]);
						$w[$i] = str_replace("о", "ө", $w[$i]);
						$w[$i] = str_replace("ұ", "ү", $w[$i]);
					}
					if(preg_match('/[әөб]/u', mb_substr($w[$i], 0, 1)) && preg_match('/[тср]/u', $w[$i]) && strpos($w[$i], "мен") !== false || strpos($w[$i], "бен") !== false) {
					    $w[$i] = str_replace("ә", "а", $w[$i]);
					    $w[$i] = str_replace("і", "ы", $w[$i]);
					    /// ө
					    $w[$i] = str_replace("ө", "о", $w[$i]);
					}
					if(preg_match('/[әөбт]/u', mb_substr($w[$i], 0, 1)) && preg_match('/[тсә]/u', $w[$i]) && strpos($w[$i], "пен") !== false) {
					    $w[$i] = str_replace("ә", "а", $w[$i]);
					    $w[$i] = str_replace("і", "ы", $w[$i]);
					    /// ө
					    $w[$i] = str_replace("ө", "о", $w[$i]);
					}
					if(preg_match('/[р]/u', mb_substr($w[$i], 0, 1)) && preg_match('/[е]/u', $w[$i]) && preg_match('/[т]/u', $w[$i])) {
					    $w[$i] = str_replace("ә", "а", $w[$i]);
					}
				}
				// Delete HAMZA
				$w[$i] = str_replace("ء", "", $w[$i]);
				
				//$res = $res . $w[$i] . " ";
			}
			$res = join(" ",$w);
			// Direct conversion of some string
			$res = str_replace("естетикә", "эстетика", $res);
			$res = str_replace("естірә", "эстыра", $res);
			$res = str_replace("екөнөмикә", "экономика", $res);
			$res = str_replace("електрөн", "электрон", $res);
			$res = str_replace("көмп", "комп", $res);
			$res = str_replace("мәтериял", "материал", $res);
			$res = str_replace("идеядән", "идеядан", $res);
			$res = str_replace("сөнімен", "сонымен", $res);
			$res = str_replace("өнімен", "онымен", $res);
			$res = str_replace("╧ ", "", $res);
			// The first letter is uppercase
			/// Bul jer bas arippen jondelgen
			$pat = preg_split('/([\n.?!]+)/', $res, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
			$ret = '';
			foreach ($pat as $a => $b) {
				$ret .= ($a & 1) == 0?
					mb_strtoupper(mb_substr(trim($b),0,1)) . mb_substr(trim($b),1):
					$b.' ';
			}
			$res = trim($ret);
			////
			$res = str_replace("\n ", "\n", $res);
			///$res = mb_strtoupper(mb_substr(trim($res), 0, 1)) . mb_substr(trim($res), 1);
			// The results
			return $res;
}
?>

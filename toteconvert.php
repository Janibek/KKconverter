<?php
/******************* converter ********************
 Kazakh (Қазақша)
 Convert text from Kazakh Cyrillic to Arabic script. Altai,Caina. 2014.1.1
 Author: Janibek Sheryazdan
 Contact: +86 18290936662, QQ 616575108, zhanibek@qq.com
******************* converter ********************/
function tote($text){
	
	$arb = array(
		'/[аә]/ui' => 'ا', '/б/ui' => 'ب', '/в/ui' => 'ۆ', '/г/ui' => 'گ', '/ғ/ui' => 'ع', '/д/ui' => 'د', '/[еэ]/ui' => 'ە',
		'/ж/ui' => 'ج', '/з/ui' => 'ز', '/[ий]/ui' => 'ي', '/к/ui' => 'ك', '/қ/ui' => 'ق', '/л/ui' => 'ل', '/м/ui' => 'م',
		'/н/ui' => 'ن', '/ң/ui' => 'ڭ', '/[оө]/ui' => 'و', '/п/ui' => 'پ', '/р/ui' => 'ر', '/с/ui' => 'س', '/т/ui' => 'ت',
		'/у/ui' => 'ۋ', '/[ұү]/ui' => 'ۇ', '/ф/ui' => 'ف', '/х/ui' => 'ح', '/һ/ui' => 'ھ', '/ц/ui' => 'تس', '/ч/ui' => 'چ',
		'/ш/ui' => 'ش', '/[ыі]/ui' => 'ى', '/ё/ui' => 'يو', '/ю/ui' => 'يۋ', '/я/ui' => 'يا', '/щ/ui' => 'شش',
		'/[ъь]/ui' => '', '/\,/' => '،', '/џ/ui' => 'ۇ', '/يي/ui' => 'ي', '/ۇلى/ui' => ' ۇلى', '/ششش/ui' => 'شش', '/ۋۋ/ui' => 'ۋ',
		// symbol conversion between a-z0-9. [ ؟ -> ? ]
		'/\?/' => '؟', '/([A-Za-z0-9"\/])؟/' => '$1?',
			);
		// The next control HAMZA [ ء ]
		$matches = preg_split( '/[\b\s\-\.:,>«0-9]+/', $text, -1, PREG_SPLIT_OFFSET_CAPTURE);
		$start = 0;
		$ret = '';
		foreach( $matches as $m ) {
			$ret .= substr( $text, $start, $m[1] - $start );
			if ( preg_match('/[әөүіӘӨҮІ]/u', $m[0]) && !preg_match('/[еэгғкқЕЭГҒКҚ]/u', $m[0]) )
			{
				$ret .= 'ء'.$m[0];
			} else {
				$ret .= $m[0];
			}
			$start = $m[1] + strlen($m[0]);
		}
		// Convert Text
		$text =& $ret;
		foreach( $arb as $k => $v ) {
			$text = preg_replace( $k, $v, $text );
		}
		// Arabic text results
		return $text;
}
?>

<?php
/* This php function writes out Tim William's javascript for munging an email address
to make it hard for spammer harvestors to read it.
The original javascript is at http://www.u.arizona.edu/~trw/spam/
Feeling paranoid, I modified the version at phpbuilder.com to randomize the cipher
http://www.phpbuilder.com/snippet/detail.php?type=snippet&id=927
*/

function mungeemail ($address,$linkname) {

$cipherorig = "aZbcYXdeWVfUTghSiRQjklPmONnMoLpqKJrIHstGuFvEwDxCyBz1A234568790" ;
$cipher = str_shuffle($cipherorig);
$cipherlength = strlen($cipher) ;
$addresslength = strlen($address) ;
$shift = $addresslength ;

echo
"<script type=\"text/javascript\" language=\"javascript\">
   <!--
   // eMail Obfuscator Script 2.1 by Tim Williams - freeware
   
{
" ;
    
    for ($j=0; $j<$addresslength; $j++) { 
    	$nextchar = substr($address,$j,1) ;
		if (strpos($cipher,$nextchar)===false) {
			$coded .= substr($address,$j,1) ;
		} else {
			$chr = (strpos($cipher,$nextchar) + $shift) % $cipherlength ;
			$coded .= substr($cipher,$chr,1) ;
		}
    } 
 
echo
"coded = \"$coded\" 
cipher = \"$cipher\" 
shift=coded.length
link=\"\"
for (i=0; i<coded.length; i++){
	if (cipher.indexOf(coded.charAt(i))==-1){
		ltr=coded.charAt(i)
		link+=(ltr)
	}
	else {
		ltr = (cipher.indexOf(coded.charAt(i))-shift+cipher.length) % cipher.length
		link+=(cipher.charAt(ltr))
	}				
}

document.write(\"<a href=\'mailto:\"+link+\"\'>$linkname</a>\")

}
//-->
</script>
<noscript>
  <p>Sorry, but a Javascript-enabled browser is required to email me.</p>
</noscript>
" ;

}

?>
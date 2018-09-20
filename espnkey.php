<?php

$string = $_SERVER['HTTP_REFERER'];
$stringToSearch = "http://mygoodstream.pw/";

//echo $string;
if ( (stripos($string,$stringToSearch) !== false) ) 
$kjfnej = "";
// else
 //die("Forbidden"); 


$urls = $_SERVER['REQUEST_URI'];
//echo $urls ;

$urls = str_replace('/espn/espnkey.php?url=', '', $urls);

 $urls = base64_decode($urls) ;


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://mygoodstream.pw/espn/espncook.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result1 = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://watch.graph.api.espn.com/api?query=query%20Airings%20(%20%24countryCode%3A%20String!%2C%20%24deviceType%3A%20DeviceType!%2C%20%24tz%3A%20String!%2C%20%24type%3A%20AiringType%2C%20%24categories%3A%20%5BString%5D%2C%20%24networks%3A%20%5BString%5D%2C%20%24packages%3A%20%5BString%5D%2C%20%24eventId%3A%20String%2C%20%24packageId%3A%20String%2C%20%24start%3A%20String%2C%20%24end%3A%20String%2C%20%24day%3A%20String%2C%20%24limit%3A%20Int%20)%20%7B%20airings(%20countryCode%3A%20%24countryCode%2C%20deviceType%3A%20%24deviceType%2C%20tz%3A%20%24tz%2C%20type%3A%20%24type%2C%20categories%3A%20%24categories%2C%20networks%3A%20%24networks%2C%20packages%3A%20%24packages%2C%20eventId%3A%20%24eventId%2C%20packageId%3A%20%24packageId%2C%20start%3A%20%24start%2C%20end%3A%20%24end%2C%20day%3A%20%24day%2C%20limit%3A%20%24limit%20)%20%7B%20id%20airingId%20simulcastAiringId%20name%20type%20startDateTime%20shortDate%3A%20startDate(style%3A%20SHORT)%20authTypes%20adobeRSS%20duration%20feedName%20image%20%7B%20url%20%7D%20network%20%7B%20id%20type%20abbreviation%20name%20shortName%20adobeResource%20isIpAuth%20%7D%20source%20%7B%20url%20authorizationType%20hasPassThroughAds%20hasNielsenWatermarks%20hasEspnId3Heartbeats%20commercialReplacement%20%7D%20packages%20%7B%20name%20%7D%20sport%20%7B%20id%20name%20abbreviation%20code%20%7D%20league%20%7B%20id%20name%20abbreviation%20code%20%7D%20franchise%20%7B%20id%20name%20%7D%20program%20%7B%20id%20code%20categoryCode%20isStudio%20%7D%20tracking%20%7B%20nielsenCrossId1%20nielsenCrossId2%20comscoreC6%20trackingId%20%7D%20%7D%20%7D&variables=%7B%22countryCode%22%3A%22US%22%2C%22deviceType%22%3A%22DESKTOP%22%2C%22tz%22%3A%22UTC%2B0100%22%2C%22type%22%3A%22LIVE%22%2C%22networks%22%3A%5B%22espn2%22%5D%2C%22packages%22%3Anull%2C%22limit%22%3A500%7D&apiKey=0dbf88e8-cc6d-41da-aa83-18b5c630bc5c");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = "Authority: watch.graph.api.espn.com";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
 $headers[] = "If-None-Match: \"0594d5bcd5bc828d8581273f6439db9cc\"";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

//echo $result;


$data1= json_decode($result, TRUE);

 $isd = $data1['data']['airings']['0']['id'] ;


//echo $isd ;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://watch.product.api.espn.com/api/product/v3/watchespn/web/event?id=".$isd."&lang=en&tz=UTC+0100&deviceType=desktop&countryCode=US&zipcode=07107");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = "Referer: http://www.espn.com/watch/player?id=3404155";
$headers[] = "Origin: http://www.espn.com";
$headers[] = "Accept-Language: en-US";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$data3 = json_decode($result, TRUE);

 $adobe = $data3['page']['contents']['streams']['0']['adobeRSS'] ;
 
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
 
 
 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://sp.auth.adobe.com/adobe-services/authorize");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "resource_id=".urlencode($adobe)."&requestor_id=ESPN&authentication_token=%3CsignatureInfo%3EPUQUmZ1k8TZZTbtCGmRHQKrdlCVRkRMPsHcVKpoFtHVf4TrUOPlX5phtRBWa0PmLj46PfimheI287%2F62ueVCoMf5GNnKtrRwkQbvLd08e7OdQUCMYnGhoZAYIZjPjZBoa1IAc6iNBS5Ji2PGU4LinmmZx%2FMpn%2FKoE4RJP81k4FQ%3D%3CsignatureInfo%3E%3CsimpleAuthenticationToken%3E%3CsimpleTokenAuthenticationGuid%3EMTgwNzI4MTI1MzU5OTEx%3C%2FsimpleTokenAuthenticationGuid%3E%3CsimpleSamlSessionIndex%3ELLybs6QlcUG%2FgDzXhPZ1rJCAePJqQ0A8rprjnJQuQwapXtMJM1nck1CuH2t1YRAQ%3C%2FsimpleSamlSessionIndex%3E%3CsimpleTokenRequestorID%3EESPN%3C%2FsimpleTokenRequestorID%3E%3CsimpleTokenDomainName%3Eadobe.com%3C%2FsimpleTokenDomainName%3E%3CsimpleTokenExpires%3E2018%2F10%2F15+11%3A48%3A46+GMT+-0700%3C%2FsimpleTokenExpires%3E%3CsimpleTokenMsoID%3EATTOTT%3C%2FsimpleTokenMsoID%3E%3CsimpleTokenDeviceID%3E%3CsimpleTokenFingerprint%3Ea55ed41bee894414b8e32cf62cea7ff2%3C%2FsimpleTokenFingerprint%3E%3CsimpleTokenDeviceIDFragments%3E%3CsimpleTokenBrowserInfo%3Ecc032be14477ea206b4f1f50ab9ca5b31f449ba1%3C%2FsimpleTokenBrowserInfo%3E%3CsimpleTokenPlatformInfo%3E7b653c1a1342f29b6e1ca16ef44b1d14c98a11e3%3C%2FsimpleTokenPlatformInfo%3E%3CsimpleTokenVendorInfo%3Ecc8e98f676a9099f4f8840652b2e587444f3ba68%3C%2FsimpleTokenVendorInfo%3E%3CsimpleTokenIpAddr%3E7d46079c1ed44fe0034496a45b574d4056e5d1b4%3C%2FsimpleTokenIpAddr%3E%3C%2FsimpleTokenDeviceIDFragments%3E%3C%2FsimpleTokenDeviceID%3E%3CsimpleSamlNameID%3ErTvuFHCK9kM%3D%3C%2FsimpleSamlNameID%3E%3Cttl%3E2592000%3C%2Fttl%3E%3C%2FsimpleAuthenticationToken%3E&mso_id=ATTOTT&generic_data=&userMeta=1");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');


$uk = '196.16.225.34:8000';
$pauk = 'CW5URN:JARhUF' ;


curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,15);
curl_setopt($ch, CURLOPT_PROXY, $uk);
curl_setopt($ch, CURLOPT_PROXYUSERPWD,$pauk);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
$headers = array();
$headers[] = "Ap_11: Win32";
$headers[] = "Origin: https://sp.auth.adobe.com";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
$headers[] = "Ap_21: a55ed41bee894414b8e32cf62cea7ff2";
$headers[] = "Cookie: passgw=gw-ap-prod-uw2; ppc=!d8uhAryWz7raxEr4XJr0c5Na8HXvT8MBbSD1uYjctXxlQNb61NaYhAr+ZTmtTHK2FZmhkTE/woAthq206yHChYDIlnqsBdYgd3zyFyPRVVIequals; client_type=html5; client_version=3.4.2; JSESSIONID=3BC3E1FF1B29081D353189FDFDBA3148; redirect_url=http%3A%2F%2Fwww.espn.com%2Fwatch%2F%3Fid%3D3430355; oiosaml-fragment=; pass_sfp=b7a16442808169fd562382f59b914953--b50e5531fe9b338f1adafb8d3f2b7f0f977f779209004a01cfda10d5cd025fa8--a55ed41bee894414b8e32cf62cea7ff2--k7SbyqlVN%2BdezMd28Gu0daA5Zfg%3D";
$headers[] = "Connection: keep-alive";
$headers[] = "Ap_42: Google Inc.";
$headers[] = "Ap_z: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36";
$headers[] = "Ap_19: rTvuFHCK9kM=";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "Accept: */*";
$headers[] = "Referer: https://sp.auth.adobe.com/entitlement/js/AccessEnablerProxy.html?925f2c3d39000521e496";
$headers[] = "Ap_23: LLybs6QlcUG/gDzXhPZ1rJCAePJqQ0A8rprjnJQuQwapXtMJM1nck1CuH2t1YRAQ";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
 
 $xml = simplexml_load_string($result);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
$result = $array['authzToken'] ;

 $link2 = urlencode($result);

 


 
 
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://sp.auth.adobe.com/adobe-services/shortAuthorize");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "authz_token=".$link2."&requestor_id=ESPN&generic_data=%7B%7D&session_guid=5b9a785720bca11122d65905&hashed_guid=false");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,15);
curl_setopt($ch, CURLOPT_PROXY, $uk);
curl_setopt($ch, CURLOPT_PROXYUSERPWD,$pauk);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
$headers = array();
$headers[] = "Ap_11: Win32";
$headers[] = "Origin: https://sp.auth.adobe.com";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
$headers[] = "Ap_21: a55ed41bee894414b8e32cf62cea7ff2";
$headers[] = "Cookie: passgw=gw-ap-prod-uw2; ppc=!d8uhAryWz7raxEr4XJr0c5Na8HXvT8MBbSD1uYjctXxlQNb61NaYhAr+ZTmtTHK2FZmhkTE/woAthq206yHChYDIlnqsBdYgd3zyFyPRVVIequals; client_type=html5; client_version=3.4.2; JSESSIONID=3BC3E1FF1B29081D353189FDFDBA3148; redirect_url=http%3A%2F%2Fwww.espn.com%2Fwatch%2F%3Fid%3D3430355; oiosaml-fragment=; pass_sfp=b7a16442808169fd562382f59b914953--b50e5531fe9b338f1adafb8d3f2b7f0f977f779209004a01cfda10d5cd025fa8--a55ed41bee894414b8e32cf62cea7ff2--k7SbyqlVN%2BdezMd28Gu0daA5Zfg%3D";
$headers[] = "Connection: keep-alive";
$headers[] = "Ap_42: Google Inc.";
$headers[] = "Ap_z: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36";
$headers[] = "Ap_19: rTvuFHCK9kM=";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "Accept: */*";
$headers[] = "Referer: https://sp.auth.adobe.com/entitlement/js/AccessEnablerProxy.html?925f2c3d39000521e496";
$headers[] = "Ap_23: LLybs6QlcUG/gDzXhPZ1rJCAePJqQ0A8rprjnJQuQwapXtMJM1nck1CuH2t1YRAQ";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
 
 //echo $result;
 
$iu = base64_encode($result) ;
$token = urlencode($iu) ;

$good = urlencode(base64_encode($adobe)) ;
 //echo $good;

 
 


$new  = "https://broadband.espn.go.com/espn3/auth/watchespn/startSession?channel=espn1&v=2.0.0&partner=watchespn&platform=web&token=".$token."&resource=".$good."&tokenType=ADOBEPASS&SWID=6CC938E5-74F0-4CB2-9277-5E5987167842" ;

 //echo $new;
 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $new);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,15);
curl_setopt($ch, CURLOPT_PROXY, $uk);
curl_setopt($ch, CURLOPT_PROXYUSERPWD,$pauk);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);




$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

 $data1 = json_decode($result, TRUE);

$link1 = $data1['session']['token'] ;
 
  


 $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $urls);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
 $headers[] = "Connection: keep-alive";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Cookie: UNID=59e790b9-6f86-4068-bd06-f62eb7f0d7af; _mediaAuth=".$link1;
$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
echo $result ;
?>
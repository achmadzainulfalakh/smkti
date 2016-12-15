<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$str = file_get_contents( 'https://www.gravatar.com/' . md5( strtolower( trim($commentator_email))) . '.php' );
$profile = unserialize( $str );
if ( is_array( $profile ) && isset( $profile['entry'][0]['id'] ) )
    echo "id=" . $profile['entry'][0]['id']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['hash'] ) )
    echo "hash=" . $profile['entry'][0]['hash']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['requestHash'] ) )
    echo "requesthash=" . $profile['entry'][0]['requestHash']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['profileUrl'] ) )
    echo "profileUrl=" . $profile['entry'][0]['profileUrl']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['preferredUsername'] ) )
    echo "preferredUsername=" . $profile['entry'][0]['preferredUsername']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['thumbnailUrl'] ) )
    echo "thumbnailUrl=" . $profile['entry'][0]['thumbnailUrl']."</br>";
//if ( is_array( $profile ) && isset( $profile['entry'][0]['photos'] ) )
//    echo $profile['entry'][0]['photos']."</br>";
//if ( is_array( $profile ) && isset( $profile['entry'][0]['name'] ) )
//    echo $profile['entry'][0]['name']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['displayName'] ) )
    echo "displayName=" . $profile['entry'][0]['displayName']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['aboutMe'] ) )
    echo "aboutMe=" . $profile['entry'][0]['aboutMe']."</br>";
if ( is_array( $profile ) && isset( $profile['entry'][0]['currentLocation'] ) )
    echo "currentLocation=" . $profile['entry'][0]['currentLocation']."</br>";
//if ( is_array( $profile ) && isset( $profile['entry'][0]['urls'] ) )
//    echo $profile['entry'][0]['urls']."</br>";
	






	foreach ($profile['entry'][0] as $value=>$value_value) {
		if ( is_array($value)){
			foreach ($value as $v=>$v_value) {
				if ( is_array($v)){
					foreach ($v as $val=>$val_value) {
						echo "--Key=" . $val . ", Value=" . $val_value . "<br/>";
						 
					}
				} else {
						echo "-Key=" . $v . ", Value=" . $v_value . "<br/>";		
					}
					
			}
		} else {
			echo  "Value=" . $value . "<br/>";
		}
		
	}

	
 

<?php
namespace app\tache;
class GestionImage{
	public static $instance;
	public static function get_instance(){
		if(is_null(self::$instance)){
			self::$instance=new GestionImage();
		}
		return self::$instance;
	}
	public function redimmensionner($image_source,$image_dest, $width, $height, $quality){
		$extension=explode('.', $image_source);
		
		if($extension[4]=='jpg' || $extension[4]=='jpeg'){
			$image_gd=imagecreatefromjpeg($image_source);
		}elseif($extension[4]=='png'){
			$image_gd=imagecreatefrompng($image_source);
		}else{
			die('une extension invalide');
		}
		$sizes=getimagesize($image_source);

		$text_color=imagecolorallocate($image_gd, 62, 62, 62);
		imagestring($image_gd, 5, $sizes[0]-60, $sizes[1]-15, 'HandMade', $text_color);
		

		$image_final=imagecreatetruecolor($width ,$height);
		$traitement=imagecopyresampled($image_final, $image_gd, 0, 0, 0, 0, $width, $height, $sizes[0], $sizes[1]);
		imagejpeg($image_final,$image_dest ,100);
		imagejpeg($image_gd, $image_source, 100);
	}
	public function sauvegarde_initial_image_au_format_jpeg($image){

	}
	
}
?>
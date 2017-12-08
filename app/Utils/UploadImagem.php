<?php
/**
 * Created by PhpStorm.
 * User: josuecamelo - josueprg@gmail.com
 * Date: 31/01/2016
 * Time: 13:00
 */

namespace App\Utils;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use League\Flysystem\Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadImagem {
	static $tamanhoImgW = 765;
	static $tamanhoThumbW = 150;
	static $tamanhoThumbH = 150;

	public static function do_UploadImg($files = [], $destino = [], $entityId = null, $nomesImgs) {
		if (!File::exists($destino['pathNormal'])) {
			//File::makeDirectory($destino['pathNormal'], 0777, true);
			//File::makeDirectory($destino['pathNormal'], 0775, true, true);
			File::makeDirectory($destino['pathNormal'], 0777, true, true);
		}

		if (!File::exists($destino['pathThumbs'])) {
			//File::makeDirectory($destino['pathThumbs'], 0777, true);
			//File::makeDirectory($destino['pathThumbs'], 0775, true, true);
			File::makeDirectory($destino['pathThumbs'], 0777, true, true);
		}

		if (is_array($files)) {
			self::uparImgArray($files, $destino, $nomesImgs);
		} else {
			self::uparImg($files, $destino, $nomesImgs);
		}
	}

	public static function fazerUpload($files = [], $destino = [], $nomesImgs) {
//        if(!File::exists($destino['pathNormal'])) {
//            File::makeDirectory($destino['pathNormal'], 0777, true);
//        }
//
//        if(!File::exists($destino['pathThumbs'])) {
//            File::makeDirectory($destino['pathThumbs'], 0777, true);
//        }

		if (!file_exists($destino)) {
			File::makeDirectory($destino, 0777, true);
		}

		foreach ($files as $key => $file) {
			//$path = $destino['pathNormal'].$nomesImgs[$key]->imagem;
//            $file->move($destino['pathNormal'], $nomesImgs[$key]->imagem);
			$file->move($destino, $nomesImgs[$key]);

			/*$proporcaoIdeal = $this->getProporcaoIdeal($path);
			$proporcaoIdealThumb = $this->getProporcaoThumb($path);


			//Imagem Normal
			//$this->redimensionar($proporcaoIdeal['w'], $proporcaoIdeal['h'], $destino['pathNormal'].$nomesImgs[$key]->imagem, $destino['pathNormal'].$nomesImgs[$key]->imagem, 100);
			$img = new SimpleImage("{$destino['pathNormal']}{$nomesImgs[$key]->imagem}");
			$img->resize($proporcaoIdeal['w'], $proporcaoIdeal['h'])->save("{$destino['pathNormal']}{$nomesImgs[$key]->imagem}");

			//Imagem Thumb
			$img = new SimpleImage("{$destino['pathNormal']}{$nomesImgs[$key]->imagem}");
			$img->resize($proporcaoIdeal['w'], $proporcaoIdeal['h'])
				//->crop($proporcaoIdealThumb['w'], $proporcaoIdealThumb['h'], $proporcaoIdeal['w'], $proporcaoIdeal['h'])
				->save("{$destino['pathThumbs']}/{$nomesImgs[$key]->imagem}");
			//fazer crop na imagem
			$this->myCropFunc(270, 170, $destino['pathThumbs'].$nomesImgs[$key]->imagem, $destino['pathThumbs'].$nomesImgs[$key]->imagem, 100);*/
		}
	}

	public static function singleUpload($file, $nome, $path) {
		if (!File::exists($path)):
			File::makeDirectory($path, 0777, true, true);
		endif;

		//$allow = ['jpg','gif','png','jpeg'];

		//if(in_array(strtolower($file->getClientOriginalExtension()),$allow)){
		$nomeFinal = $nome . '.' . strtolower($file->getClientOriginalExtension());

		$file->move($path, $nomeFinal);
		//new UploadedFile($path, $nome, null, null, true);
		//dd($file->getTmpName);
		//move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);
		//}

		///return isset($nomeFinal) ? $nomeFinal : null;


		return $nomeFinal;
	}

	protected static function uparImg($file, $destino = [], $nomesImgs = []) {
		$key = 0;

		$path = $destino['pathNormal'] . $nomesImgs[$key];
		$file->move($destino['pathNormal'], $nomesImgs[$key]);

		$proporcaoIdeal = self::getProporcaoIdeal($path);
		$proporcaoIdealThumb = self::getProporcaoThumb($path);

		//Imagem Normal
		$img = Image::make($destino['pathNormal'] . $nomesImgs[$key]);
		$img->resize($proporcaoIdeal['w'], $proporcaoIdeal['h']);
		$img->save($destino['pathNormal'] . $nomesImgs[$key]);
		//Imagem Thumb
		$img = Image::make($destino['pathNormal'] . $nomesImgs[$key]);
		$img->resize($proporcaoIdealThumb['w'], $proporcaoIdealThumb['h']);
		$img->save($destino['pathThumbs'] . $nomesImgs[$key]);
		//fazer crop na imagem
		self::myCropFunc(
			self::getLarguraThumb(),
			self::getAlturaThumb(),
			$destino['pathThumbs'] . $nomesImgs[$key],
			$destino['pathThumbs'] . $nomesImgs[$key],
			80
		);
	}

	protected static function uparImgArray($files = [], $destino = [], $nomesImgs = []) {
		foreach ($files as $key => $file) {
			$path = $destino['pathNormal'] . $nomesImgs[$key]->imagem;
			$file->move($destino['pathNormal'], $nomesImgs[$key]->imagem);

			$proporcaoIdeal = self::getProporcaoIdeal($path);
			$proporcaoIdealThumb = self::getProporcaoThumb($path);

			//Imagem Normal
			$img = Image::make($destino['pathNormal'] . $nomesImgs[$key]->imagem);
			$img->resize($proporcaoIdeal['w'], $proporcaoIdeal['h']);
			$img->save($destino['pathNormal'] . $nomesImgs[$key]->imagem);
			//Imagem Thumb
			$img = Image::make($destino['pathNormal'] . $nomesImgs[$key]->imagem);
			$img->resize($proporcaoIdealThumb['w'], $proporcaoIdealThumb['h']);
			$img->save($destino['pathThumbs'] . $nomesImgs[$key]->imagem);
			//fazer crop na imagem
			self::myCropFunc(
				self::getLarguraThumb(),
				self::getAlturaThumb(),
				$destino['pathThumbs'] . $nomesImgs[$key]->imagem,
				$destino['pathThumbs'] . $nomesImgs[$key]->imagem,
				80
			);
		}
	}

	protected function stringParaWeb($string) {
		$string = strtolower(Str::slug($string, '-'));
		return $string;
	}

	public static function tamanhoImagem($imagem) {
		return list($width, $height, $type, $attr) = getimagesize($imagem);
	}

	public static function getProporcaoIdeal($destino) {
		//tamanho da imagem antiga
		$tamImg = self::tamanhoImagem($destino);
		$tam = explode(' ', $tamImg[3]);
		$largura = (int)str_replace('"', '', str_replace('width="', '', $tam[0]));
		$altura = (int)str_replace('"', '', str_replace('height="', '', $tam[1]));
		$tam = ['width' => $largura, 'height' => $altura];

		// Cria uma taxa proporcional para conversão
		$size = self::getLarguraImagem();

		$tax = $tam['width'] / $tam['height'];
		if ($tax < 1) {
			$newWidth = round($size * $tax);
			$newHeight = $size;
		} else {
			$newWidth = $size;
			$newHeight = round($size / $tax);
		}

		return ['w' => $newWidth, 'h' => $newHeight];
	}

	public static function setLarguraImagem($w) {
		self::$tamanhoImgW = $w;
	}

	protected static function getLarguraImagem() {
		return self::$tamanhoImgW;
	}

	protected static function getLarguraThumb() {
		return self::$tamanhoThumbW;
	}

	public static function setLarguraThumb($w) {
		self::$tamanhoThumbW = $w;
	}

	protected static function getAlturaThumb() {
		return self::$tamanhoThumbH;
	}

	public static function setAlturaThumb($h) {
		self::$tamanhoThumbH = $h;
	}

	protected static function getProporcaoThumb($origem) {
		//tamanho da imagem antiga
		$tamImg = self::tamanhoImagem($origem);
		$tam = explode(' ', $tamImg[3]);
		$largura = (int)str_replace('"', '', str_replace('width="', '', $tam[0]));
		$altura = (int)str_replace('"', '', str_replace('height="', '', $tam[1]));
		$tam = ['width' => $largura, 'height' => $altura];

		// Cria uma taxa proporcional para conversão
		$tax = $tam['width'] / $tam['height'];

		if ($tax < 1) {
			$size = self::getAlturaThumb();
			$newWidth = round($size * $tax);
			$newHeight = $size;
		} else {
			$size = self::getAlturaThumb();
			$newWidth = $size;
			$newHeight = round($size / $tax);
		}

		return ['w' => $newWidth, 'h' => $newHeight];
	}

	protected static function myCropFunc($max_width, $max_height, $source_file, $dst_dir, $quality = 80) {
		$imgsize = getimagesize($source_file);
		$width = $imgsize[0];
		$height = $imgsize[1];
		$mime = $imgsize['mime'];

		//resize and crop image by center
		switch ($mime) {
			case 'image/gif':
				$image_create = "imagecreatefromgif";
				$image = "imagegif";
				break;
			//resize and crop image by center
			case 'image/png':
				$image_create = "imagecreatefrompng";
				$image = "imagepng";
				$quality = 6;
				break;
			//resize and crop image by center
			case 'image/jpeg':
				$image_create = "imagecreatefromjpeg";
				$image = "imagejpeg";
				$quality = 60;
				break;
			default:
				return false;
				break;
		}

		$dst_img = imagecreatetruecolor($max_width, $max_height);

		$src_img = $image_create($source_file);
		$width_new = $height * $max_width / $max_height;
		$height_new = $width * $max_height / $max_width;


		if ($width_new > $width) {
			$h_point = (($height - $height_new) / 2);
			imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
		} else {
			$w_point = (($width - $width_new) / 2);
			imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
		}

		$image($dst_img, $dst_dir, $quality);

		if ($dst_img) imagedestroy($dst_img);
		if ($src_img) imagedestroy($src_img);
	}
}
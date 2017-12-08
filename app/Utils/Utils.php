<?php

/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 30/01/2016
 * Time: 16:08
 */
namespace App\Utils;

class Utils
{
    public static function gerarUrlVideo($vid_link)
    {
        // youtube get video id
        if (strpos($vid_link, 'youtu'))
        {
            $ret = preg_replace('~(?#!js YouTubeId Rev:20160125_1800)
			# Match non-linked youtube URL in the wild. (Rev:20130823)
			https?://          # Required scheme. Either http or https.
			(?:[0-9A-Z-]+\.)?  # Optional subdomain.
			(?:                # Group host alternatives.
			  youtu\.be/       # Either youtu.be,
			| youtube          # or youtube.com or
			  (?:-nocookie)?   # youtube-nocookie.com
			  \.com            # followed by
			  \S*?             # Allow anything up to VIDEO_ID,
			  [^\w\s-]         # but char before ID is non-ID char.
			)                  # End host alternatives.
			([\w-]{11})        # $1: VIDEO_ID is exactly 11 chars.
			(?=[^\w-]|$)       # Assert next char is non-ID or EOS.
			(?!                # Assert URL is not pre-linked.
			  [?=&+%\w.-]*     # Allow URL (query) remainder.
			  (?:              # Group pre-linked alternatives.
				[\'"][^<>]*>   # Either inside a start tag,
			  | </a>           # or inside <a> element text contents.
			  )                # End recognized pre-linked alts.
			)                  # End negative lookahead assertion.
			[?=&+%\w.-]*       # Consume any URL (query) remainder.
			~ix', 'https://www.youtube.com/embed/$1',
                $vid_link);

            return $ret;
        }
        // vimeo get video id
        elseif (strpos($vid_link, 'vimeo'))
        {
            if (preg_match("/(?:https?:\/\/)?(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $vid_link, $id))
                return 'https://player.vimeo.com/video/' . $id[3];
            else
                return 'Url não Reconhecida pelo algoritmo!';
        }
        else
            return 'Url não Reconhecida pelo algoritmo!';
    }

	public static function geradorSenha($tamanho = 8){
		$ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
		$mi = "abcdefghijklmnopqrstuvyxwz";
		$nu = "0123456789";
		$si = "!@#$%?-&*()_+=^~|";
		$senha = "";

		$senha .= str_shuffle($ma);
		$senha .= str_shuffle($mi);
		$senha .= str_shuffle($nu);
		$senha .= str_shuffle($si);

		$senha = self::removerAcentos(substr(str_shuffle($senha), 0, $tamanho));

		return $senha;
	}

	public static function formatoNumber($valor){
		$simb = array(',', '.');
		$virgula = false;
		$ponto = false;

		$pos = strripos($valor, $simb[0]);
		if ($pos === false) {
			$virgula = false;
		}else{
			$virgula = true;
		}

		$pos = strripos($valor, $simb[1]);
		if ($pos === false) {
			$ponto = false;
		}else{
			$ponto = true;
		}

		if($virgula && !$ponto){
			$valor = str_replace(',', '.', $valor);
		}else if($virgula && $ponto){
			$valor = explode(',', $valor);
			$valor = str_replace('.', '',$valor[0]) . '.' . $valor[1];
		}

		return $valor;
	}

	protected static function removerAcentos($string, $slug = false) {
		$string = strtolower($string);
		// Código ASCII das vogais
		$ascii['a'] = range(224, 230);
		$ascii['e'] = range(232, 235);
		$ascii['i'] = range(236, 239);
		$ascii['o'] = array_merge(range(242, 246), array(240, 248));
		$ascii['u'] = range(249, 252);
		// Código ASCII dos outros caracteres
		$ascii['b'] = array(223);
		$ascii['c'] = array(231);
		$ascii['d'] = array(208);
		$ascii['n'] = array(241);
		$ascii['y'] = array(253, 255);

		foreach ($ascii as $key=>$item) {
			$acentos = '';
			foreach ($item AS $codigo) $acentos .= chr($codigo);
			$troca[$key] = '/['.$acentos.']/i';
		}

		$string = preg_replace(array_values($troca), array_keys($troca), $string);

		// Slug?
		if ($slug) {
			// Troca tudo que não for letra ou número por um caractere ($slug)
			$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
			// Tira os caracteres ($slug) repetidos
			$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
			$string = trim($string, $slug);
		}

		return $string;
	}

	protected static function removerAcentosMod2($string){
		return preg_replace(
			array(
				"/(á|à|ã|â|ä)/",
				"/(Á|À|Ã|Â|Ä)/",
				"/(é|è|ê|ë)/",
				"/(É|È|Ê|Ë)/",
				"/(í|ì|î|ï)/",
				"/(Í|Ì|Î|Ï)/",
				"/(ó|ò|õ|ô|ö)/",
				"/(Ó|Ò|Õ|Ô|Ö)/",
				"/(ú|ù|û|ü)/",
				"/(Ú|Ù|Û|Ü)/",
				"/(ñ)/","/(Ñ)/"
			),explode(" ","a A e E i I o O u U n N")
			 ,$string);
	}
}
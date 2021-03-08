<?php
/*
   Plugin Name: AWT - Youtube Video Shortcode
   Plugin URI: https://advweb.in/
   description: Boost page speed by loading Youtube Video on click using shortcode. [youtube_video id="w3jLJU7DT5E"]
   Version: 1.0.1
   Author: Samir
   Author URI: https://github.com/samirdev3
   License: GPL2
*/
if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Youtube shortcode
**/
if(! function_exists('awt_yt_video')){
	add_shortcode( 'youtube_video', 'awt_yt_video' );
	function awt_yt_video( $atts ) {
		$a = shortcode_atts( array(
			'id' => '',
		), $atts );
		return '<div class="yt-container yt-box"><div class="yt-sub-box"><img class="image" src="https://img.youtube.com/vi/'.$a["id"].'/mqdefault.jpg" /><svg class="play-btn" style="width:10%" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m511.914062 256c0-141.386719-114.59375-256-255.957031-256-141.359375 0-255.957031 114.613281-255.957031 256s114.597656 256 255.957031 256c141.363281 0 255.957031-114.613281 255.957031-256zm0 0" fill="#F44336"/><path d="m414.019531 54.628906c34.210938 43.527344 54.617188 98.421875 54.617188 158.085938 0 141.386718-114.59375 256-255.957031 256-59.652344 0-114.539063-20.410156-158.058594-54.628906 46.863281 59.621093 119.628906 97.914062 201.335937 97.914062 141.363281 0 255.957031-114.613281 255.957031-256 0-81.722656-38.285156-154.5-97.894531-201.371094zm0 0" fill="#cc3328"/><path d="m179.933594 362.148438v-200.90625c0-11.878907 13.15625-19.039063 23.128906-12.585938l155.207031 100.453125c9.128907 5.90625 9.128907 19.261719 0 25.171875l-155.207031 100.453125c-9.972656 6.453125-23.128906-.707031-23.128906-12.585937zm0 0" fill="#fff"/><path d="m358.269531 249.109375-155.207031-100.453125c-9.972656-6.453125-23.132812.707031-23.132812 12.585938v7.960937l50.402343 34.6875c41.816407 28.78125 41.011719 90.808594-1.53125 118.496094l-48.871093 31.800781v7.960938c0 11.878906 13.160156 19.039062 23.132812 12.585937l155.207031-100.453125c9.128907-5.90625 9.128907-19.261719 0-25.171875zm0 0" fill="#fff"/></svg></div><iframe class="yt-player" width="560" height="315" data-src="https://www.youtube.com/embed/'.$a["id"].'?autoplay=1&rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>';
	}
}

/**
* Youtube shortcode output
**/
if(! function_exists('awt_yt_video_scripts')){
	add_action('wp_footer', 'awt_yt_video_scripts');
	function awt_yt_video_scripts(){
		global $post;
		if((!is_home() || !is_front_page()) && (is_page() || is_single())){
			if(has_shortcode( $post->post_content, 'youtube_video')){ ?>
		<script>var $btn=document.querySelectorAll(".play-btn"),$image=document.querySelectorAll(".image"),$iframe=document.querySelectorAll(".yt-player");$btn.forEach(function(e,t){e.addEventListener("click",function(){var e=$iframe[t].getAttribute("data-src");this.parentElement.style.display="none",$iframe[t].setAttribute("src",e)})});</script>
		<style>.yt-container{width:100%!important;padding-top:56.25%;height:0;position:relative;max-width:inherit!important;overflow:hidden;border-radius:6px}.yt-box .image,.yt-container iframe{width:100%;height:100%;position:absolute;top:0;left:0;background:#000;border:none}.yt-box .play-btn{position:absolute;top:50%;left:50%;width:10%;min-width:35px;transform:translate(-50%,-50%);cursor:pointer}.yt-box .image{z-index:10}.yt-box .play-btn{z-index:20}.yt-sub-box::after{content:'';position:absolute;top:0;left:0;width:100%;height:100%;background:black;opacity:0.4;z-index:12}</style>
		<?php }
		}
	}
}
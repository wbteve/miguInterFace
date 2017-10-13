<?php

/**
 * Created by PhpStorm.
 * User: xiangl
 * Date: 2015/8/20 0020
 * Time: 9:49
 */
class HTML
{
    public static function operating($val){
        $html = '
		<table class="mtable mt10" align="center" cellpadding="10" cellspacing="0" width="99%">
			<tr>
				<td align="right" width="100">昵称：</td>
				<td>'.$val['nickname'].'</td>
			</tr>
			<tr>
				<td align="right">用户组：</td>
				<td>'.$val['name'].'</td>
			</tr>
			<tr>
				<td align="right">操作：</td>
				<td>'.$val['edit'].'</td>
			</tr>
			<tr>
				<td align="right">操作内容：</td>
				<td>'.$val['content'].'</td>
			</tr>
			<tr>
				<td align="right">操作时间：</td>
				<td>'.date('Y-m-d H:i:s',$val['oTime']).'</td>
			</tr>
		</table>
		';
        return $html;
    }



    public static function move($mvui,$xiaotu){
        $html = '
			<style type="text/css">
				.ui-a{background-color:#898989;height:320px;text-align: center;width:175px;}
				#b-2{background-color:#898989;height:320px;text-align: center;width:175px;}
				#h-8,#h-9,#h-10{height:100px;background-color:#898989;text-align: center;width: 175px;}
				#h-9,#h-10{margin-top:10px;}
				
                .ui-s:nth-child(3n){margin-bottom: 0px;}
                .ui-s{text-align: center; width:175px; background-color: #898989;height:100px; margin-bottom: 10px;}
                .ui-s a{position: absolute;top:0;left:0;background-color:#898989;padding:5px 10px;}
                .ui-s a img{position: absolute;top:0;left:0;background-color:#898989;}
                .ui-s{position: relative;}
			</style>
		';


        $datu=count($mvui);
        $xt=count($xiaotu);
        $xiao=ceil($xt/3);
        //大图的宽度是175
        //小图的也是175
        //总宽度就是
        if($xt%3==0){
            $zong=($datu*175+175+$xiao*175+175+300).'px';
        }else{
            $zong=($datu*175+175+$xiao*175+300).'px';
        }


        // print_r($mvui);die();
        $html .= '<div class="modules" id="dddd" style="margin-top:20px;overflow-x: scroll;width: 100%"><div id="cccc" style="width:'.$zong.';height:400px;">';
        //print_r($mvui);
        $html .= '<div id="aaaa">';
        foreach($mvui as $key => $val){

            $html .='<div class="fl model1 mr10">
				<div id="'.$val[0]['position'].'" class="ui-a" >';
            $arr = MvUiManager::getKey($val[0]['position'],$mvui);
            $html .='<ul>';
            $html .= empty($arr)?'':'<li><img src="'.$arr[0]['pic'].'" width="175px" height="320px">';
            $html .= '<a href="javascript:void(0)" style="" pos="'.$val[0]['position'].'">'.(empty($arr)?'点击上传':'点击修改').'</a>';
            $html .= '<a href="javascript:void(0)" epg="'.$val[0]['epg'].'" gid="'.$val[0]['gid'].'" class="del" dss="'.$val[0]['id'].'" pos="'.$val[0]['position'].'" style="margin-left: 131px">删除</a>';
            $html .= '</li></ul>';
            $html .= '</div>
			</div>';
        }
        foreach($mvui as $key=>$val){
            $shuzu=$key;
        }
        if(!empty($shuzu)){
            $barr=explode('-',$shuzu);
            $ba = $barr[1];
            //$b=$barr[1]+1;


            $max = 9999;
            $len = strlen($max);
            for($i=$ba+1; $i<=9999;$i++){
                $len2=$len-strlen($i);
                $s='';
                for($j=0;$j<$len2;$j++){
                    $s.='0';
                }
                $b=$s.$i;
//                echo $b;
                break;
            }

        }else{
            $b='0001';
        }

//style="background:url(../../file/4.png)"
        $html .='<div class="fl model1 mr10" >
				<div id=b-'.$b.' class="ui-a">';
        $arr = MvUiManager::getKey("b-$b",$mvui);
        $html .='<ul>';
        $html .= empty($arr)?'':'<li><img src="'.$arr[0]['pic'].'" width="175px" height="320px">';
        $html .= '<a href="javascript:void(0)" style="" pos=b-'.$b.'>'.(empty($arr)?'':'').'<img src="../../file/4.png"></a>';
        $html .= '</li></ul>';
        $html .= '</div>
			</div>';
        $html .= '</div>';


        //x小图
        $html .='<div class="box" id="bbbb">';
        $i=0;
        foreach($xiaotu as $key => $val) {
            if($i%3==0){
                $html.='<div style="float:left; margin-right: 10px;height:320px" >';
            }
            $html .= '<div id="'.$val[0]['position'].'" class="ui-s">';
            $arr = MvUiManager::getKey($val[0]['position'],$xiaotu);
            $html .=empty($arr)?'': '<img src="'.$arr[0]['pic'].'"  alt="" width="175px" height="100px">';
            $html .= '<a href="javascript:void(0)" style="" pos="'.$val[0]['position'].'">'.(empty($arr)?'点击上传':'点击修改').'</a>';
            $html .= '<a href="javascript:void(0)" class="ss" xss="'.$val[0]['id'].'" style="margin-left: 131px">删除</a>';
            $html .= '</div>';
            $i++;
            if($i%3==0){
                $html .='</div>';
            }
        }
//        $datu = count($mvui);
//        $xt   = count($xiaotu);
//        $xiao = ceil($xt/3);
//        echo $xiao;
        $html .='<script>

                 // var aaaa = document.getElementById("aaaa").offsetWidth;
                 // var bbbb = document.getElementById("bbbb").offsetWidth;
                //  var s=aaaa+bbbb;
                    //alert(aaaa);
                   // alert(bbbb);
                   //alert(typeof(aaaa));
                //  document.getElementById("cccc").style.width=s+50+"px";
                 // document.getElementById("dddd").style.width=s+50+"px";

                 // alert(s+"px");

                 </script>';

        // print_r($xiaotu);

        foreach($xiaotu as $k=>$v){
            $shuzus=$k;
        }
        //   print_r($shuzus);
        foreach($xiaotu as $k=>$v){
            $shuzus=$k;
        }
        //   print_r($shuzus);
        if(!empty($shuzus)){
            $barrs=explode('-',$shuzus);
            //$s=$barrs[1]+1;
            $bas = $barrs[1];


            $max = 9999;
            $len = strlen($max);
            for($i=$bas+1; $i<=9999;$i++){
                $len2=$len-strlen($i);
                $ss='';
                for($j=0;$j<$len2;$j++){
                    $ss.='0';
                }
                $s=$ss.$i;
                break;
            }
        }else{
            $s='0001';
        }

        //echo $s;
        $html.='<div  height="320px" style="float:left;">';
        $html .= '<div id=s-'.$s.'  class="ui-s" style="">';
        $arr = MvUiManager::getKey("s-$s",$xiaotu);
        $html .=empty($arr)?'': '<img src="'.$arr[0]['pic'].'"  alt=""  width="175px" height="100px">';
        $html .= '<a href="javascript:void(0)" style="" pos=s-'.$s.'>'.(empty($arr)?'':'').'<img src="../../file/3.png"></a>';
        $html .= '</div>';
        $html .='</div>';

        $html .='</div></div>';


        return $html;
    }

    public static function moves($mvui,$xiaotu){
        $html = '
			<style type="text/css">
				.ui-a{background-color:#898989;height:320px;text-align: center;width:175px;}
				#b-2{background-color:#898989;height:320px;text-align: center;width:175px;}
				#h-8,#h-9,#h-10{height:100px;background-color:#898989;text-align: center;width: 175px;}
				#h-9,#h-10{margin-top:10px;}

                .ui-s:nth-child(3n){margin-bottom: 0px;}
                .ui-s{text-align: center; width:175px; background-color: #898989;height:100px; margin-bottom: 10px;}
                .ui-s a{position: absolute;top:0;left:0;background-color:#898989;padding:5px 10px;}
                .ui-s a img{position: absolute;top:0;left:0;background-color:#898989;}
                .ui-s{position: relative;}
			</style>
		';


        $datu=count($mvui);
        $xt=count($xiaotu);
        $xiao=ceil($xt/3);
        //大图的宽度是175
        //小图的也是175
        //总宽度就是
        if($xt%3==0){
            $zong=($datu*175+175+$xiao*175+175+300).'px';
        }else{
            $zong=($datu*175+175+$xiao*175+300).'px';
        }


        // print_r($mvui);die();
        $html .= '<div class="modules" id="dddd" style="margin-top:20px;overflow-x: scroll;width: 100%"><div id="cccc" style="width:'.$zong.';height:400px;">';
        //print_r($mvui);
        $html .= '<div id="aaaa">';
        foreach($mvui as $key => $val){

            $html .='<div class="fl model1 mr10">
				<div id="'.$val[0]['position'].'" class="ui-a" >';
            $arr = MvUiManager::getKey($val[0]['position'],$mvui);
            $html .='<ul>';
            $html .= empty($arr)?'':'<li><img src="'.$arr[0]['pic'].'" width="175px" height="320px">';
            $html .= '<a href="javascript:void(0)" style="" pos="'.$val[0]['position'].'">'.(empty($arr)?'点击上传':'点击修改').'</a>';
            //$html .= '<a href="javascript:void(0)" epg="'.$val[0]['epg'].'" gid="'.$val[0]['gid'].'" class="del" dss="'.$val[0]['id'].'" pos="'.$val[0]['position'].'" style="margin-left: 131px">删除</a>';
            $html .= '</li></ul>';
            $html .= '</div>
			</div>';
        }
        foreach($mvui as $key=>$val){
            $shuzu=$key;
        }
        if(!empty($shuzu)){
            $barr=explode('-',$shuzu);
            $ba = $barr[1];
            //$b=$barr[1]+1;


            $max = 9999;
            $len = strlen($max);
            for($i=$ba+1; $i<=9999;$i++){
                $len2=$len-strlen($i);
                $s='';
                for($j=0;$j<$len2;$j++){
                    $s.='0';
                }
                $b=$s.$i;
//                echo $b;
                break;
            }

        }else{
            $b='0001';
        }
//style="background:url(../../file/4.png)"
        $html .='<div class="fl model1 mr10" >
				<div id=b-'.$b.' class="ui-a">';
        $arr = MvUiManager::getKey("b-$b",$mvui);
        $html .='<ul>';
        $html .= empty($arr)?'':'<li><img src="'.$arr[0]['pic'].'" width="175px" height="320px">';
        $html .= '<a href="javascript:void(0)" style="" pos=b-'.$b.'>'.(empty($arr)?'':'').'<img src="../../file/4.png"></a>';
        $html .= '</li></ul>';
        $html .= '</div>
			</div>';
        $html .= '</div>';


        //x小图
        $html .='<div class="box" id="bbbb">';
        $i=0;
        foreach($xiaotu as $key => $val) {
            if($i%3==0){
                $html.='<div style="float:left; margin-right: 10px;height:320px" >';
            }
            $html .= '<div id="'.$val[0]['position'].'" class="ui-s">';
            $arr = MvUiManager::getKey($val[0]['position'],$xiaotu);
            $html .=empty($arr)?'': '<img src="'.$arr[0]['pic'].'"  alt="" width="175px" height="100px">';
            $html .= '<a href="javascript:void(0)" style="" pos="'.$val[0]['position'].'">'.(empty($arr)?'点击上传':'点击修改').'</a>';
            //$html .= '<a href="javascript:void(0)" class="ss" xss="'.$val[0]['id'].'" style="margin-left: 131px">删除</a>';
            $html .= '</div>';
            $i++;
            if($i%3==0){
                $html .='</div>';
            }
        }
//        $datu = count($mvui);
//        $xt   = count($xiaotu);
//        $xiao = ceil($xt/3);
//        echo $xiao;
        $html .='<script>

                 // var aaaa = document.getElementById("aaaa").offsetWidth;
                 // var bbbb = document.getElementById("bbbb").offsetWidth;
                //  var s=aaaa+bbbb;
                    //alert(aaaa);
                   // alert(bbbb);
                   //alert(typeof(aaaa));
                //  document.getElementById("cccc").style.width=s+50+"px";
                 // document.getElementById("dddd").style.width=s+50+"px";

                 // alert(s+"px");

                 </script>';

        // print_r($xiaotu);
        foreach($xiaotu as $k=>$v){
            $shuzus=$k;
        }
        //   print_r($shuzus);
        if(!empty($shuzus)){
            $barrs=explode('-',$shuzus);
            //$s=$barrs[1]+1;
            $bas = $barrs[1];


            $max = 9999;
            $len = strlen($max);
            for($i=$bas+1; $i<=9999;$i++){
                $len2=$len-strlen($i);
                $ss='';
                for($j=0;$j<$len2;$j++){
                    $ss.='0';
                }
                $s=$ss.$i;
                break;
            }
        }else{
            $s='0001';
        }

        //   print_r($shuzus);
        //echo $s;
        $html.='<div  height="320px" style="float:left;">';
        $html .= '<div id=s-'.$s.'  class="ui-s" style="">';
        $arr = MvUiManager::getKey("s-$s",$xiaotu);
        $html .=empty($arr)?'': '<img src="'.$arr[0]['pic'].'"  alt=""  width="175px" height="100px">';
        $html .= '<a href="javascript:void(0)" style="" pos=s-'.$s.'>'.(empty($arr)?'':'').'<img src="../../file/3.png"></a>';
        $html .= '</div>';
        $html .='</div>';

        $html .='</div></div>';


        return $html;
    }

    public static function selv($mvui){

        $html='<style type="text/css">
                #h-01,#h-02,#h-03,#h-04,#h-05,#h-06,#h-07,#h-08,#h-09,#h-10,#h-11,#h-12,#h-13,#h-14,#h-15,#h-16,#h-17,#h-18,#h-19,#h-20{width:200px;height:110px;margin-top:5px}
            </style>';

        $html .='     <div class="modules" style="margin-top:5px;">
                <div class="fl mr10">
                    <div id="h-01" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-01',$mvui);
        // print_r($arr);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-01">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-01" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-02" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-02',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-02">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-02" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
        <div id="h-03" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-03',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-03">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-03" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-04" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-04',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-04">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-04" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-05" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-05',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-05">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-05" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            </div>
            <div class="fl mr10">
                <div id="h-06" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-06',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-06">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-06" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-07" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-07',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-07">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-07" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-08" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-08',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-08">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-08" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-09" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-09',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-09">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-09" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-10" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-10',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-10">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-10" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            </div>
            <div class="fl mr10">
                <div id="h-11" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-11',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-11">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-11" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-12" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-12',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-12">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-12" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-13" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-13',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-13">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-13" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-14" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-14',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-14">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-14" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-15" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-15',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-15">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-15" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            </div>
            <div class="fl mr10">
                <div id="h-16" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-16',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-16">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-16" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-17" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-17',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-17">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-17" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-18" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-18',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-18">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-18" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-19" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-19',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-19">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-19" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>
            <div id="h-20" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-20',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-20">'.(empty($arr)?'点击上传':'点击修改').'</a>';
        $html .=empty($arr[0]['id'])?'':'<a href="javascript:void(0)" class="del" pos="h-20" del="'.$arr[0]["id"].'">删除</a>';
        $html .= '</div>
            <div class="clear"></div>';

        $html .= '
            </div>';
        return $html;
    }

    public static function selvs($mvui){

        $html='<style type="text/css">
                #h-01,#h-02,#h-03,#h-04,#h-05,#h-06,#h-07,#h-08,#h-09,#h-10,#h-11,#h-12,#h-13,#h-14,#h-15,#h-16,#h-17,#h-18,#h-19,#h-20{width:200px;height:110px;margin-top:5px}
            </style>';

        $html .='     <div class="modules" style="margin-top:5px;">
                <div class="fl mr10">
                    <div id="h-01" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-01',$mvui);
        // print_r($arr);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-01">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-02" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-02',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-02">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
        <div id="h-03" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-03',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-03">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-04" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-04',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-04">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-05" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-05',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-05">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            </div>
            <div class="fl mr10">
                <div id="h-06" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-06',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-06">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-07" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-07',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-07">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-08" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-08',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-08">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-09" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-09',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-09">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-10" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-10',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-10">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            </div>
            <div class="fl mr10">
                <div id="h-11" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-11',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-11">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-12" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-12',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-12">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-13" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-13',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-13">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-14" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-14',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-14">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-15" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-15',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-15">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            </div>
            <div class="fl mr10">
                <div id="h-16" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-16',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-16">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-17" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-17',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-17">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-18" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-18',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-18">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-19" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-19',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-19">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>
            <div id="h-20" class=" ui-a">';
        $arr = MvSeuiManager::getKey('h-20',$mvui);
        $html .= empty($arr)?'':'<img src="'.$arr[0]['pic'].'" width="100%" height="100%">';
        $html .= '<a href="javascript:void(0)" style="" pos="h-20">'.(empty($arr)?'点击上传':'点击修改').'</a>';

        $html .= '</div>
            <div class="clear"></div>';

        $html .= '
            </div>';
        return $html;
    }





}

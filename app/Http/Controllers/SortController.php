<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortController extends Controller
{
   /**
    * sortform.bladeから配列を受け取り、sort.bladeにソート結果を渡す
    * 
    * @param string $request-$numArray:ビューで入力された配列
    * @param string $request-$formFlag:ビューで指定された昇順・降順フラグ
    * @param string $request-$formcount:ビューで指定された実行回数
    * 
    * @return array $num:ソートした配列
    * @return string $sumTime:処理時間
    * @return string $count:実行回数
    * 
    */
    public function show(Request $request){
        //ビューから受け取った値
        $numArray = $request->input('numArray');
        $formFlag = $request->input('formFlag');
        $formcount = $request->input('formcount');
        //配列
        $num = array();
        $num = explode(',',$numArray);
        //空の箱
        $k;
        //0:昇順　1：降順
        $flag = $formFlag;
        //実行回数
        $numCount = $formcount;
        //テスト用
        $count=0;

        /** @TODO 実行回数分だけ繰り返し、その時間を計測する */
        $startTime = microtime(true);
        //実行回数分だけ繰り返す
        for($i=0;$i<$numCount;$i++){
            sort($num);
            $count+=1;
        }
        $endTime = microtime(true);
        $sumTime = $endTime - $startTime;
        $sumTime = sprintf("%.20f", $sumTime);

        /** 計測した時間もビューに渡し表示する */
        return view('/sort')->with(['num'=>$num,'sumTime'=>$sumTime,'count'=>$count,]);
    }


    /**
     * 受け取った配列を昇順・降順に並び替える
     * 
     * @param array $num:ソートしたい配列
     * @return array $num:ソートした配列
     * 
     */
    public function sort($num){
        //ソートを実行
        for($i=0;$i<count($num);$i++){
            for($j=$i+1;$j<=count($num)-1;$j++){
                //昇順
                if($flag==0){
                    if($num[$i]>$num[$j]){
                        //別の箱を用意して入れ替える
                        $k = $num[$j];
                        $num[$j]=$num[$i];
                        $num[$i]=$k;
                    }
                }
                //降順
                if($flag==1){
                    if($num[$i]<$num[$j]){
                        //別の箱を用意して入れ替える
                        $k = $num[$i];
                        $num[$i]=$num[$j];
                        $num[$j]=$k;
                    }
                }
            }
        }
        return $num;
    }
}

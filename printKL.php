<?php

/**
 * printKL
 *
 * @author hiroki
 */
class printKL {
    
    const KUROKAMI = 'Kurokami';
    const LONG = 'Long';
    
    /*
     *  printKurogamiLong
     * 
     *  @param $people 人数
     */
    public function printKurogamiLong ($people = 100) {
        
        // 数値チェック
        if (!is_numeric($people) && $people >= 0){
            echo 'Input is not number';
            exit;
        }
        
        // 小数点切り捨て
        $people = floor($people);
        
        // 割合値初期化
        $kurokamiLongPeople = 0;
        $kurokamiPeople = 0;
        $longPeople = 0;
        
        for ($i = 1; $i <= $people ; $i++) {
            
            // 黒髪判定
            $kuroFlg = (($i % 3) == 0) ? true : false;
            
            // ロング判定
            $longFlg = (($i % 5) == 0) ? true : false;
            
            // 判定結果表示
            // 黒髪ロング
            if ( $kuroFlg && $longFlg ) {
                echo self::KUROKAMI.self::LONG . "\r";
                $kurokamiLongPeople += 1;
            // 黒髪のみ
            } elseif ($kuroFlg) {
                echo self::KUROKAMI . "\r";
                $kurokamiPeople += 1;
            // ロングのみ
            } elseif ($longFlg) {
                echo self::LONG . "\r";
                $longPeople += 1;
            // その他
            } else {
                echo $i . "\r";
            }
        }
        
        echo "\r";
        
        // 0割り算対策
        $kurokamiLongPercent = ($kurokamiLongPeople == 0) ? 0 : ceil(($kurokamiLongPeople / $people) * 100 );
        $kurokamiPercent = ($kurokamiPeople == 0) ? 0 : ceil(($kurokamiPeople / $people) * 100 );
        $longPercent = ($longPeople == 0) ? 0 : ceil(($longPeople / $people) * 100 );
        
        // 割合表示
        echo '黒髪ロング割合：' . $kurokamiLongPercent . "% \r";
        echo '黒髪のみ割合：' . $kurokamiPercent . "% \r";
        echo 'ロング割合：' . $longPercent . "% \r";
    }
    
}

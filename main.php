<?php
    $trees = ['tree1'=>'apple-tree', 'tree2'=>'apple-tree','tree3'=>'apple-tree','tree4'=>'apple-tree',
    'tree5'=>'apple-tree','tree6'=>'apple-tree','tree7'=>'apple-tree','tree8'=>'apple-tree','tree9'=>'apple-tree',
    'tree10'=>'apple-tree','tree11'=>'pear-tree','tree12'=>'pear-tree','tree13'=>'pear-tree','tree14'=>'pear-tree',
    'tree15'=>'pear-tree','tree16'=>'pear-tree','tree17'=>'pear-tree','tree18'=>'pear-tree','tree19'=>'pear-tree',
    'tree20'=>'pear-tree','tree21'=>'pear-tree','tree22'=>'pear-tree','tree23'=>'pear-tree','tree24'=>'pear-tree',
    'tree25'=>'pear-tree'];
    
    class Tree {
        public $number;
        public $tree_type;
        public $fruit_number;
        public $fruit_weight;
    }
    class Apple {
        public $total_fruit_number;
        public $total_fruit_weight;
    }
    class Pear {
        public $total_fruit_number;
        public $total_fruit_weight;
    }

    function initialize($trees){
        $i = 0;
        foreach($trees as $key => $val){
            $t[$i] = new Tree();
            $t[$i]->number = $key;
            $t[$i]->tree_type = $val;
            if($t[$i]->tree_type == 'apple-tree'){
                $length = rand(40, 50);
                $t[$i]->tree_type = 'apple-tree';
            }
            else{
                $length = rand(0, 20);
                $t[$i]->tree_type = 'pear-tree';
            }
            for($j = 0; $j < $length; $j++){
                if($t[$i]->tree_type == 'apple-tree'){
                    $t[$i]->fruit_weight[$j] = rand(150, 180);
                }
                else{
                    $t[$i]->fruit_weight[$j] = rand(130, 170);
                }
            }
            $t[$i]->fruit_number = $length;
            $i++;
        }
        $a = new Apple();
        $p = new Pear();
        $a->total_fruit_number = 0;
        $a->total_fruit_weight = 0;
        $p->total_fruit_number = 0;
        $p->total_fruit_weight = 0;
        for($i = 0; $i < count($t); $i++){
            if($t[$i]->tree_type == 'apple-tree'){
                $a->total_fruit_number += $t[$i]->fruit_number;
                for($j=0; $j<count($t[$i]->fruit_weight); $j++){
                    $a->total_fruit_weight += $t[$i]->fruit_weight[$j];
                }
            }
            else{
                $p->total_fruit_number += $t[$i]->fruit_number;
                if($t[$i]->fruit_weight == 0){

                }
                else{
                    for($j=0; $j<count($t[$i]->fruit_weight); $j++){
                        $p->total_fruit_weight += $t[$i]->fruit_weight[$j];
                    }
                }
            }
        }
        echo "Количество яблок - ".$a->total_fruit_number.". Общий вес яблок - ".round($a->total_fruit_weight/1000)."кг"."(".$a->total_fruit_weight."гр).";
        echo '</br>';
        echo "Количество груш - ".$p->total_fruit_number.". Общий вес груш - ".round($p->total_fruit_weight/1000)."кг"."(".$p->total_fruit_weight."гр).";
        
    }
    initialize($trees);
?>
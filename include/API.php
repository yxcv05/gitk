<?php

class API{

    public static function getInfo($db,$category){

        $statement = $db->prepare("select distinct goods.id,goods.price,goods.title,goods.img
                                 from goods_desc
                                 join goods on goods.id= goods_desc.id_goods                                      
                                 where goods.category = '$category'
                                 GROUP BY goods_desc.id");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return ($results);
    }

    public static function search($db,$query){

        $statement = $db->prepare("select distinct goods.id,goods.price,goods.title,goods.img
                                 from goods_desc
                                 join goods on goods.id= goods_desc.id_goods     
                                
                                 where goods.title = '$query'
                                 GROUP BY goods_desc.id");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return ($results);
    }
    public static function sort($db,$category, $type){

        $statement = $db->prepare("select distinct goods.id,goods.price,goods.title,goods.img
                                 from goods_desc
                                 join goods on goods.id= goods_desc.id_goods     
                                 
                                 where goods.category = '$category'
                                 GROUP BY goods_desc.id
                                 ORDER BY goods.price $type");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return ($results);
    }
    public static function compare($db,$ids){
        $arr_id=explode(",",$ids);
        $arr_id=array_unique($arr_id);
        $str_id = implode(" or goods.id = ",$arr_id);

        $statement = $db->prepare("select distinct goods.id,goods.price,goods.title,goods.img
                                 from goods_desc
                                 join goods on goods.id= goods_desc.id_goods
                                 where goods.id = $str_id
                                 GROUP BY goods_desc.id");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $arrayRes = array();

        foreach($results as $key => $values) {
            $statement = $db->prepare("select distinct description.description
                                 from goods_desc
                                 join goods on goods.id= goods_desc.id_goods     
                                 join description on description.id= goods_desc.id_desc
                                 where goods.id = ($key+1)
                                 GROUP BY goods_desc.id");
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_ASSOC);
            $arrayRes[]=[
                "id" => $results[$key]["id"],
                "price" => $results[$key]["price"],
                "title" => $results[$key]["title"],
                "img" => $results[$key]["img"],
                "description" => $res
            ];

        }

        $arrayKeys = array();

       foreach($arrayRes as $key => $values){ // проходим циклом по всему исходному массиву

           foreach($values["description"] as $key2 => $values2) {
               $temp = $values2['description'];
               $statement = $db->prepare("select distinct goods.id
                                 from goods_desc
                                 join goods on goods.id= goods_desc.id_goods     
                                 join description on description.id= goods_desc.id_desc
                                 where (goods.id = $str_id) and (description.description = '$temp')
                                 GROUP BY goods_desc.id");
               $statement->execute();
               $res2 = $statement->fetchAll(PDO::FETCH_ASSOC);
               if (count($res2) > 1){
                   $arrayRes[$key]["equ"][] = $temp;
               }
           }
        }


        return ($arrayRes);
    }
}


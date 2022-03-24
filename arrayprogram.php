<?php
        // $array = array(1,2,5,6,7,8,8);               //index or numeric array
                        // 0 1 2 3 4 5 6
        // $array = array('St1234'=>'abc','st345'=>'xyz');  //associative array
        $array = array(                                     // multidimensional array
               array(1,2,4,5,6),
            //    0
            //       0 1 2 3 4
               array(2,4,6,7,8,5)
            //    1
            //       0 1 2 3 4 5
               );
            //    $array[0]= 'yes';
               for($i = 0 ; $i<count($array);$i++){
                    for($j = 0; $j < count($array[$i]) ; $j++){
                        echo $array[$i][$j].'<br>';
                        /*
                        i = 0 
                        i<2;
                        j = 0
                        j < 5
                            $array[0][0];
                            j = 1+0=1
                            1<5
                            $array[0][1]
                            j = 1+1 = 2
                            2<5
                            $array[0][2]
                            |
                            |
                            j = 3 + 1
                            j = 4;
                            4<5;
                            $array[0][4]
                            j = 5 < 5
                            i = 1+0 = 1;
                            j = 0
                            $array[1][0]
                            1+1 = 2 ; 2<2 x
                        */
                    }
               }
        // foreach ($array as $key => $value) {
        //   echo 'The key is '.$key.' '.$value.'<br>';
        // }

?>
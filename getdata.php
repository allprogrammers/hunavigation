<?php
    $rooms = Array(
			'noone'=>Array(
					'name'=>'nothing found',
					'a'=>'a'
				),
			'e012'=>Array(
					'name'=>'ragoonwala club',
					'a'=>'b',
					'b'=>'c',
					'c'=>'d'
				),
			'e013'=>Array(
					'a'=>'k',
					'b'=>'c',
					'c'=>'d'
				),
			'e014'=>Array(
					'a'=>'b',
					'b'=>'c',
					'c'=>'d'
				),
			'e015'=>Array(
					'a'=>'b',
					'b'=>'c',
					'c'=>'d'
				)
			);

    if(isset($_GET['room'])){
        if(array_key_exists($_GET['room'],$rooms)){
            echo json_encode($rooms[$_GET['room']]);
        }else{
            echo json_encode($rooms['noone']);
        } 
    }
?>

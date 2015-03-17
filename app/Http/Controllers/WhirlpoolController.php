<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WhirlpoolController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($rowid='1', $colid='1', $orientation='U')
	{
		

		return view('whirlpool.show')->with('rowid',$rowid)
		->with('colid',$colid)
		->with('orientation',$orientation)
		->with('images',['/images/'.$rowid.$colid.$orientation.'.png']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function submit($rowid='1', $colid='1', $orientation='U', Request $request){
		//validation?
		//(rowid, colid, orientation)?->filter, moves(L,F,R,W)
		//
		//	
		
		$vector = array();
		$vector['row'] = $rowid;
		$vector['col'] = $colid;
		$vector['orientation'] = $orientation;


		$images[]= '/images/'.$rowid.$colid.$orientation.'.png';
		for($n=1;$n<=4;$n++){
			$move = $request['token'.$n];
			if($move == null){
				$move = 'W';
			}
			print_r ($vector=$this->move($vector,$move));
			if($move != 'W'){
				$images[]='/images/'.$vector['row'].$vector['col'].$vector['orientation'].'.png';
			}
			if($this->check_whirl($vector['row'],$vector['col'])){
				echo 'in whirl';
				print_r( $vector = $this->move_whirl($vector));

				$images[]='/images/'.$vector['row'].$vector['col'].$vector['orientation'].'.png';
			}
			echo '</br>';
			

		}
		return view('whirlpool.show')
			->with('rowid',$rowid)
			->with('colid',$colid)
			->with('orientation',$orientation)
			->with('images',$images);
			
	}
	private function move($vector,$move){
		echo $move.':moving,';
		
		switch($vector['orientation']){
			case 'U': 
				if($move != 'W'){
					$vector['row']++;
				}
				if($move == 'L'){
					$vector['col']--;
					$vector['orientation'] = 'L';
				}
				if($move == 'R'){
					$vector['col']++;
					$vector['orientation'] = 'R';
				}

			break;
			case 'R': 
				if($move != 'W'){
					$vector['col']++;
				}
				if($move == 'L'){
					$vector['row']++;
					$vector['orientation'] = 'U';
				}
				if($move == 'R'){
					$vector['row']--;
					$vector['orientation'] = 'D';
				}
			break;
			case 'D': 
				if($move != 'W'){
					$vector['row']--;
				}
				if($move == 'L'){
					$vector['col']++;
					$vector['orientation'] = 'R';
				}
				if($move == 'R'){
					$vector['col']--;
					$vector['orientation'] = 'L';
				}
			break;
			case 'L': 
				if($move != 'W'){
					$vector['col']--;
				}
				if($move == 'L'){
					$vector['row']--;
					$vector['orientation'] = 'D';
				}
				if($move == 'R'){
					$vector['row']++;
					$vector['orientation'] = 'U';
				}
			break;
			

		}
		
		return $vector;

		 
	}
	private function check_whirl($row,$col){
		return (($row == 2 || $row == 3) && ($col == 2 || $col == 3));
	}
	private function move_whirl($vector){
		
		if ($vector['row'] == 2){
			$vector['row'] = 3;
		}
		else{
			$vector['row'] = 2;
		}
		if($vector['col'] ==2){
			$vector['col'] = 3;
		}
		else{
			$vector['col'] = 2;
		}
		switch($vector['orientation']){
			case 'U': $vector['orientation'] = 'R';
			break;
			case 'R': $vector['orientation'] = 'D';
			break;
			case 'D': $vector['orientation'] = 'L';
			break;
			case 'L': $vector['orientation'] = 'U';
			break;
		}
		

		return $vector;
	}


}

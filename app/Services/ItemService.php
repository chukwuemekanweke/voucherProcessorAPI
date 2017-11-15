<?php

/**
* Author: Harrison Grant
* created on 05/11/2017
**/

namespace App\Services;

use App\Repositories\ItemRepository;
use Illuminate\Http\Request;

class ItemService {
    private $repository;

    public function __construct (ItemRepository $itemRepository){
        $this->repository = $itemRepository;
    }

    public function getAll($n){
        if(!$this->repository->getAll($n)){
            return response()->json(['message' => 'the resource you requested was not found']);
        }
        return $this->repository->getAll($n);
    }

    public function getById($id){
        if(!$this->repository->getById($id)){
            return response()->json(['message' => 'the resource you requested was not found']);
        }
        return $this->repository->getById($id);
    }

    public function create(Request $request){
        $item = ['name' => $request->name,
            'price' => $request->price,
            'voucher_id' => $request->voucher
        ];
        if(!$this->repository->create($item)){
            return response()->json(['message' => 'the resource was not created', 'data' => $item], 500);
        }
        return response()->json(['message' => 'the resource was successfully created', 'data' => $item], 200);
    }

    public function update($id, Request $request){
        $item = ['name' => $request->name,
            'price' => $request->price,
            'voucher_id' => $request->voucher
        ];
        if(!$this->repository->update($id, $item)){
            return response()->json(['message' => 'the resource was not updated', 'data' => $item], 500);
        }
        return response()->json(['message' => 'the resource was successfully updated', 'data' => $item], 200);
    }

    public function delete($id){
        if(!$this->repository->delete($id)) {
            return response()->json(['message' => 'the resource was not deleted']);
        }
        return response()->json(['message' => 'the resource was successfully deleted']);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: ositadinma_nwangwu
 * Date: 11/6/2017
 * Time: 4:11 PM
 */

namespace App\Services;


use App\Models\OfficeEntityUser;
use App\Repositories\OfficeEntityRepository;
use App\Repositories\OfficeEntityUserRepository;
use Illuminate\Http\Request;
use App\Http\Requests\OfficeEntityRequest;

class OfficeEntityService
{
    protected $repository;

    public function __construct(OfficeEntityRepository $repository, OfficeEntityUserRepository $officeEntityUserRepository)
    {
        $this->repository = $repository;
        $this->officeEntityUserRepository = $officeEntityUserRepository;
    }

    public function getEntities($n = null)
    {
        if (!$this->repository->getAll($n)) {
            return response()->json(['message' => 'the resource you requested was not found']);
        }
        return $this->repository->getAll($n);
    }

    public function getEntity($id)
    {
        if (!$this->repository->getById($id)) {
            return response()->json(['message' => 'the resource you requested was not found']);
        }
        return $this->repository->getById($id);
    }

    public function search($text, $n)
    {
        $officeEntities = $this->repository->search($text, $n, "/api/office_entities/find?q=". $text ."n=" .$n);
        return $officeEntities
            ?: response()->json(['message' => 'the resource you requested was not found']);
    }

    public function createEntity(OfficeEntityRequest $request)
    {
        $createdOfficeEntity = $this->repository->create($request->getAttributesArray());
        if (!$createdOfficeEntity) {
            return response()->json(['message' => 'the resource was not created', 'data' => $request->getAttributesArray()], 500);
        }
        $employees = $request->employees;
        foreach($employees as $userId){
            $officeEntityUser = new OfficeEntityUser();
            $officeEntityUser->userId = $userId;
            $officeEntityUser->officeEntityId = $createdOfficeEntity->id;
            $this->officeEntityUserRepository->create($officeEntityUser->getAttributesArray());
        }
        
        return response()->json(['message' => 'the resource was successfully created', 'data' => $request->getAttributesArray()], 200);
    }
    public  function updateEntity($id, OfficeEntityRequest $request)
    {
        if(!$this->repository->getById($id)){
            return response()->json(['message' => 'The resource you requested was not found']);
        }
        $this->repository->update($id, $request->getAttributesArray());
        $this->officeEntityUserRepository->deleteByParam('office_entity_id', $id);
        $employees = $request->employees;
        foreach($employees as $userId){
            $officeEntityUser = new OfficeEntityUser();
            $officeEntityUser->userId = $userId;
            $officeEntityUser->officeEntityId = $id;
            $this->officeEntityUserRepository->create($officeEntityUser->getAttributesArray());
        }
        return response()->json(['message' => 'The update was successful', $request->getAttributesArray()]);
    }

    public function delete($id)
    {
        if (!$this->repository->delete($id)) {
            return response()->json(['message' => 'the resource was not deleted'], 404);
        }
        return response()->json(['message' => 'the resource was successfully deleted'], 200);
    }
}
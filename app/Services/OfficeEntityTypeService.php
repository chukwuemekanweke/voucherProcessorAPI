<?php
/**
 * Created by PhpStorm.
 * User: ositadinma_nwangwu
 * Date: 11/4/2017
 * Time: 8:40 PM
 */

namespace App\Services;


use App\Repositories\OfficeEntityTypeRepository;
use Illuminate\Http\Request;
use App\Http\Requests\OfficeEntityTypeRequest;

class OfficeEntityTypeService
{
    protected $repository;

    public function __construct(OfficeEntityTypeRepository $repo)
    {
        $this->repository = $repo;
    }

    public function getEntityTypes(int $n = null, array $fields = null)
    {
        if (!$this->repository->getAll($n, $fields)) {
            return response()->json(['message' => 'The resource you requested was not found']);
        }
        return $this->repository->getAll($n);
    }

    public function getEntityType($id)
    {
        if (!$this->repository->getById($id)) {
            return response()->json(['message' => 'The resource you requested was not'], 404);
        }
        return $this->repository->getById($id);
    }

    public function createEntityType(OfficeEntityTypeRequest $request)
    {
        if (!$this->repository->create($request->getAttributesArray())) {
            return response()->json(['message' => 'something went wrong and the entity type could not be create'], 503);
        }
        return response()->json(['message' => 'The Office Entity Type was created successfully', 'data' => $request->getAttributesArray()], 200);
    }

    public function updateEntityType($id, OfficeEntityTypeRequest $request)
    {
        if (!$this->repository->getById($id)) {
            return response()->json(['message' => 'The resource you requested was not found']);
        }
        $this->repository->update($id, $request->getAttributesArray());
        return response()->json(['message' => 'The update was successful', $request->getAttributesArray()]);
    }

    public function deleteEntityType($id)
    {
        if (!$this->repository->delete($id)) {
            return response()->json(['message' => 'the request could not be completed.', 'data', $id], 404);
        }
        return response()->json(['message' => 'the Office Entity Type was successfully deleted'], 200);
    }


}
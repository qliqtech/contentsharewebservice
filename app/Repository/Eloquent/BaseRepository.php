<?php


namespace App\Repository\Eloquent;


use App\Helpers\TimeHelper;
use App\Repository\IEloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements IEloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param  Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public  function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): Model
    {
        return $this->model->find($id);
    }

    public function update($id,array $attributes){

        $record = $this->model->find($id);

        $record->fill($attributes);

        return $record->save();

    }

    public function listall(): Collection
    {
        return $this->model->all();
    }

    public function delete($id,$isDeletedBy)
    {
        $record = $this->model->find($id);

        $record->IsDeleted = true;

        $record->DeletedBy = $isDeletedBy;


        $record->IsDeletedOn = TimeHelper::getCurrentDateTime();

        $record->IsActive = false;

        return $record->save();
    }

    public function activate($id,$isDeletedBy)
    {
        $record = $this->model->find($id);

        $record->DeactivatedOn = Null;

        $record->IsActive = true;

        return $record->save();
    }

    public function deactivate($id,$isDeletedBy)
    {
        $record = $this->model->find($id);

        $record->DeactivatedOn = TimeHelper::getCurrentDateTime();

        $record->IsActive = false;

        return $record->save();
    }

    public function checkownership($itemid,$currentuserid)
    {
        $record = $this->model->find($itemid);



        if($record->created_by == $currentuserid){


            return true;
        }


        return false;
    }
}

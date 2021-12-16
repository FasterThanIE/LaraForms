<?php

namespace FasterThanIE\LaraForms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class FormBuilder extends Builder
{
    /**
     * @var array
     */
    private $fields = [];

    /**
     * @var Model
     */
    private $model;

    /**
     * @var bool
     */
    private $autoFillFields = false;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return array
     */
    public function generateForm(): array
    {
        return $this->autoFillFields ?
            $this->generateFormTypesFromSQL($this->getFieldsWithColumns($this->model)->toArray())
            : $this->fields;
    }

    /**
     * @param array $fields
     * @return array
     */
    private function generateFormTypesFromSQL(array $fields): array
    {
        $return = [];
        foreach ($fields as $fieldName => $fieldType)
        {
            if(array_key_exists($fieldType, self::TYPE_MAPPER))
            {
                $return[$fieldName] = self::TYPE_MAPPER[$fieldType];
            } else {
                $return[$fieldName] = null;
            }
        }
        return $return;
    }

    /**
     * @param bool $autoFillFields
     * @return FormBuilder
     */
    public function setAutoFillFields(bool $autoFillFields): self
    {
        $this->autoFillFields = $autoFillFields;
        return $this;
    }

    /**
     * @param Model $model
     * @return Collection
     */
    private function getFieldsWithColumns(Model $model)
    {
        $builder = Schema::getConnection()->getSchemaBuilder();
        $columns = $builder->getColumnListing($model->getTable());
        return collect($columns)->mapWithKeys(function ($item, $key) use ($builder, $model) {
            $key = $builder->getColumnType($model->getTable(), $item);
            return [$item => $key];
        });
    }
}

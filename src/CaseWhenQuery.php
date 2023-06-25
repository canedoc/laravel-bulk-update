<?php

namespace Candooc\BulkInsert;

class CaseWhenQuery
{
    private array $conditions = [];

    private string $thenColumn = '';

    private string $sql = '';

    private array $bindings = [];

    public static function from(string $column, array $conditions): self
    {
        $query = new self();
        $query->thenColumn = $column;
        $query->conditions = $conditions;

        return $query;
    }

    public function toSql(): string
    {
        foreach ($this->conditions as $condition) {
            $this->compileToCasWhen($condition);
        }

        return $this->sql = "case {$this->sql} else  {$this->thenColumn} end";
    }

    public function getBindings(): array
    {
        return $this->bindings;
    }

    private function compileToCasWhen(array $condition): void
    {
        $thenValue = $condition[$this->thenColumn];
        unset($condition[$this->thenColumn]);

        $whenConditions = [];
        foreach ($condition as $column => $value) {
            if (is_null($value)) {
                $whenConditions[] = "$column is NULL";
            } else {
                $whenConditions[] = "$column = ?";
                $this->addBindings([$value]);
            }
        }

        $whenQuery = implode(' and ', $whenConditions);

        $this->addBindings([$thenValue]);
        $this->sql .= " when $whenQuery then ? ";
    }

    private function addBindings(array $bindings): void
    {
        $this->bindings = array_merge($this->bindings, $bindings);
    }
}

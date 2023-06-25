<?php

namespace Candooc\BulkInsert;

class BulkUpdate
{
    public function bulkUpdate(): \Closure
    {
        return function (array $data): int {
            $originalBindings = $this->getRawBindings();

            foreach($data as $columnToUpdate => &$conditionalUpdate) {
                if (! is_array($conditionalUpdate)) {
                    continue;
                }

                $query = CaseWhenQuery::from($columnToUpdate, $conditionalUpdate);

                $conditionalUpdate = \DB::raw($query->toSql());
                foreach($query->getBindings() as $binding) {
                    $this->addBinding($binding, 'from');
                }
            }

            try {
                return $this->update($data);
            } finally {
                $this->bindings = $originalBindings;
            }
        };
    }
}

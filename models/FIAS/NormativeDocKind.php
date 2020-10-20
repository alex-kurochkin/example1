<?php

declare(strict_types=1);

namespace app\models\FIAS;

class NormativeDocKind extends AbstractFiasModel
{

    protected string $tableName = 'NormativeDocKinds';

    protected array $map = [
        'id' => 'id',
        'name' => 'name',
    ];

    protected string $id;
    protected string $name;
}

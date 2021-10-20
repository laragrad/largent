<?php

namespace Laragrad\Largent\Example\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laragrad\Uuid\Models\Concerns\HasUuidPrimaryKey;
use Laragrad\Largent\Models\Accountable;
use Laragrad\Largent\Models\AccountableEntityInterface;

class TmpBankPayment extends Model implements AccountableEntityInterface
{
    use HasFactory;
    use HasUuidPrimaryKey;
    use Accountable;
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    public $timestamps = false;
  
    protected $appCode = 0x7ff;
    
    protected $entityCode = 0x0001;
    
    protected $casts = [
        'doc_sum' => 'float',
        'rest_sum' => 'float',
    ];
}

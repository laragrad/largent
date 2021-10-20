<?php

namespace Laragrad\Largent\Example\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laragrad\Uuid\Models\Concerns\HasUuidPrimaryKey;
use Laragrad\Largent\Models\AccountableEntityInterface;
use Laragrad\Largent\Models\Accountable;

class TmpBill extends Model implements AccountableEntityInterface
{
    use HasFactory;
    use HasUuidPrimaryKey;
    use Accountable;
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    public $timestamps = false;
    
    protected $appCode = 0x7ff;
    
    protected $entityCode = 0x0002;
    
    protected $casts = [
        'bill_sum' => 'float',
        'paid_sum' => 'float',
    ]; 
}

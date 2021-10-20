<?php 

namespace Laragrad\Largent\Services;

use Laragrad\Largent\Support\LargentHelper;
use Laragrad\Largent\Models\Operation;

class OperationService
{
    /**
     * 
     * @param Operation $operation
     * @return \Laragrad\Largent\Models\Operation
     */
    public function executeOperation(Operation $operation)
    {
        LargentHelper::checkTransactionStarted();
        
        return $operation->handler()->execute();
        
    }
    
    /**
     *
     * @param Operation $operation
     * @return \Laragrad\Largent\Models\Operation
     */
    public function deleteOperation(Operation $operation)
    {
        LargentHelper::checkTransactionStarted();
        
        return $operation->handler()->delete();
        
    }
}
<?php 

namespace Laragrad\Largent\Example\Handlers;

use Laragrad\Largent\Handlers\OperationHandler;
use Laragrad\Largent\Models\Entry;
use Laragrad\Largent\Example\Models\TmpBankPayment;
use Laragrad\Largent\Example\Models\TmpBill;

class ExampleOperationHandler extends OperationHandler
{
    /**
     * 
     * {@inheritDoc}
     * @see \Laragrad\Largent\Handlers\OperationHandler::prepareEntriesToExecute()
     */
    protected function makeEntries()
    {
        $entry = new Entry();
        
        $entry->type_code = 9999;
        $entry->entry_date = $this->operation->operation_date;
        $entry->accounting_date = $this->operation->accounting_date;
        
        $entry->db_account_code = $entry->entryConfig('db_account_code');
        $entry->db_entity_id = $this->operation->details['bank_payment_id'];
        $entry->db_sum = - $this->operation->details['sum'];
        $entry->db_currency_code = 'USD';
        
        $entry->cr_account_code = $entry->entryConfig('cr_account_code');
        $entry->cr_entity_id = $this->operation->details['bill_id'];
        $entry->cr_sum = $this->operation->details['sum'];
        $entry->cr_currency_code = 'USD';
        
        $this->operation->entries->add($entry);
        
        return $this;
    }
}
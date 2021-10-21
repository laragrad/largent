<?php

/**
 * Example of laragrad/largent configuration
 */

use Laragrad\Largent\Models\Entry;
use Laragrad\Largent\Models\Operation;
use Laragrad\Largent\Models\AccountableEntityInterface;

return [

    /**
     * Type of key type used for all models
     * that implements Largent\Models\AccountableEntityInterface
     *
     * 'int' or 'uuid'
     *
     * @string
     */
    'entity_key_type' => 'int',

    /**
     * Default currency code
     *
     * @string
     */
    'default_currency_code' => env('SYS_CURRENCY_CODE', 'USD'),

    /**
     * Operation configuration
     */
    'operation' => [

        /**
         * Operation types
         */
        'types' => [
            // 9999 => [
            //     'handler' => \Laragrad\Largent\Example\Handlers\ExampleOperationHandler::class,
            //     'validation' => [
            //         'rules' => [
            //             'type_code' => ['integer', 'required'],
            //             'details' => ['array', 'required'],
            //             'details.bank_payment_id' => ['uuid', 'required'],
            //             'details.bill_id' => ['uuid', 'required'],
            //             'details.sum' => ['numeric', 'required'],
            //         ],
            //     ],
            // ],
        ],
    ],

    /**
     * Entry configuration
     */
    'entry' => [
        /**
         * Entry compensation kinds
         */
        'compensation_kinds' => [
            Entry::ENTRY_COMPENSATION_KIND_REVERSE => [
                //
            ],
            Entry::ENTRY_COMPENSATION_KIND_STORNO => [
                //
            ],
        ],
        /**
         * Entry system types
         */
        'sys_types' => [
            Entry::ENTRY_SYS_TYPE_NORMAL => [
                'is_compensation' => false,
            ],
            Entry::ENTRY_SYS_TYPE_REVERSE => [
                'is_compensation' => true,
            ],
            Entry::ENTRY_SYS_TYPE_STORNO => [
                'is_compensation' => true,
            ],
        ],
        /**
         * Entry types
         */
        'types' => [
            // 9999 => [
            //     'db_account_code' => 'bank_pay_rest_sum',
            //     'cr_account_code' => 'bill_payed_sum',
            //     'handler' => null,
            // ],
        ],
    ],

    /**
     * Account types
     */
    'account' => [
        // 'bank_pay_rest_sum' => [
        //     'entity' => \Laragrad\Largent\Example\Models\TmpBankPayment::class,
        //     'column' => 'rest_sum',
        //     'kind' => AccountableEntityInterface::ACCOUNT_KIND_PASSIVE,
        // ],
        // 'bill_payed_sum' => [
        //     'entity' => \Laragrad\Largent\Example\Models\TmpBill::class,
        //     'column' => 'paid_sum',
        //     'kind' => AccountableEntityInterface::ACCOUNT_KIND_PASSIVE,
        // ],
    ],

    /**
     * Accountable entities
     * -- There is the list of entities that has an account attributes
     */
    'entities' => [
        // \Laragrad\Largent\Example\Models\TmpBankPayment::class => [
        //     'accounts' => [
        //         'bank_pay_rest_sum',
        //     ],
        // ],
        // \Laragrad\Largent\Example\Models\TmpBill::class => [
        //     'accounts' => [
        //         'bill_payed_sum',
        //     ],
        // ],
    ],
];
<?php

$config = array(
    'child_kyc' => array(
        array(
            'field' => 'head_name',
            'label' => 'Head Name',
            'rules' => 'trim|required|min_length[3]'
        ),
        array(
            'field' => 'head_designation',
            'label' => 'Designation',
            'rules' => 'trim|min_length[3]'
        ),
        array(
            'field' => 'head_email',
            'label' => 'Email Id',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'head_contact',
            'label' => 'Contact Number',
            'rules' => 'trim|required|min_length[10]'
        ),
        array(
            'field' => 'office_address',
            'label' => 'Address',
            'rules' => 'trim|min_length[3]'
        ),
        array(
            'field' => 'bank_name',
            'label' => 'Bank Name',
            'rules' => 'trim|min_length[3]'
        ),
        array(
            'field' => 'bank_branch',
            'label' => 'Branch Name',
            'rules' => 'trim|min_length[3]'
        ),
        array(
            'field' => 'account_number',
            'label' => 'Account Number',
            'rules' => 'trim|is_natural'
        ),
        array(
            'field' => 'ifsc_code',
            'label' => 'IFSC Code',
            'rules' => 'trim|alpha_numeric|min_length[3]'
        )
    ),
    'bankGuarantee' => array(
        array(
            'field' => 'clientname',
            'label' => 'Client / Firm Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'projectname',
            'label' => 'Project Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'amount',
            'label' => 'Gauarantee Amount',
            'rules' => 'trim|required|numeric'
        ),
        array(
            'field' => 'bankname',
            'label' => 'Bank Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'branch',
            'label' => 'Branch Address',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'accountnumber',
            'label' => 'Account Number',
            'rules' => 'trim|required|numeric'
        ),
        array(
            'field' => 'ifsc_code',
            'label' => 'IFSC Code',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'time_period',
            'label' => 'Time Period',
            'rules' => 'trim|required|numeric'
        ),
        array(
            'field' => 'create_on',
            'label' => 'Valid From',
            'rules' => 'trim|required'
        )
    ),
    'add_bank' => array(
        array(
            'field' => 'bank_name',
            'label' => 'Bank Name',
            'rules' => 'trim|required|min_length[3]|is_unique[bank_account.bank_name]'
        ),
        array(
            'field' => 'branch_address',
            'label' => 'Branch Address',
            'rules' => 'trim|required|min_length[3]'
        ),
        array(
            'field' => 'account_number',
            'label' => 'Account Number',
            'rules' => 'trim|required|numeric|min_length[3]'
        ),
        array(
            'field' => 'ifsc_account',
            'label' => 'IFSC Code',
            'rules' => 'trim|required|min_length[3]'
        ),
        array(
            'field' => 'avail_amount',
            'label' => 'Amount',
            'rules' => 'trim|required|numeric'
        ),
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'create_on',
            'label' => 'Create Date',
            'rules' => 'trim|required'
        )
    ),
    'update_bank' => array(
        array(
            'field' => 'branch_address',
            'label' => 'Branch Address',
            'rules' => 'trim|required|min_length[3]'
        ),
        array(
            'field' => 'account_number',
            'label' => 'Account Number',
            'rules' => 'trim|required|numeric|min_length[3]'
        ),
        array(
            'field' => 'ifsc_account',
            'label' => 'IFSC Code',
            'rules' => 'trim|required|min_length[3]'
        ),
        array(
            'field' => 'avail_amount',
            'label' => 'Amount',
            'rules' => 'trim|required|numeric'
        ),
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'create_on',
            'label' => 'Create Date',
            'rules' => 'trim|required'
        )
    )
);

<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'country'                  => 'Country',
            'country_helper'           => 'Select Country',
            'province'                 => 'Province',
            'province_helper'          => 'Select Province',
            'city'                     => 'City',
            'city_helper'              => 'Select City',
        ],
    ],
    'country' => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'short_code'        => 'Short Code',
            'short_code_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'province' => [
        'title'          => 'Provinces',
        'title_singular' => 'Province',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'country'           => 'Country',
            'country_helper'    => 'Select Country',
            'name'              => 'Province Name',
            'name_helper'       => 'Enter Province Name',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'city' => [
        'title'          => 'Cities',
        'title_singular' => 'City',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'province'          => 'Province',
            'province_helper'   => 'Select Province',
            'name'              => 'City Name',
            'name_helper'       => 'Enter City Name',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'dealer' => [
        'title'          => 'Dealers',
        'title_singular' => 'Dealer',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => 'Enter Name',
            'father_name'        => 'Father Name',
            'father_name_helper' => 'Enter Father Name',
            'phone'              => 'Phone',
            'phone_helper'       => 'Enter Phone',
            'cnic'               => 'Cnic',
            'cnic_helper'        => 'Enter CNIC',
            'city'               => 'City',
            'city_helper'        => 'Select city',
            'dob'                => 'Date of Birth',
            'dob_helper'         => ' ',
            'doj'                => 'Date of Joining',
            'doj_helper'         => ' ',
            'gender'             => 'Gender',
            'gender_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'referred_by'        => 'Referred By',
            'referred_by_helper' => ' ',
        ],
    ],
    'plot' => [
        'title'          => 'Plots',
        'title_singular' => 'Plot',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'plotid'                       => 'Plot ID',
            'plotid_helper'                => ' ',
            'latitude'                     => 'Latitude',
            'latitude_helper'              => ' ',
            'longitude'                    => 'Longitude',
            'longitude_helper'             => ' ',
            'area'                         => 'Area',
            'area_helper'                  => ' ',
            'sector'                       => 'Sector',
            'sector_helper'                => ' ',
            'block'                        => 'Block',
            'block_helper'                 => ' ',
            'city'                         => 'City',
            'city_helper'                  => ' ',
            'plot_type'                    => 'Plot Type',
            'plot_type_helper'             => ' ',
            'plot_type_other'              => 'If Other,',
            'plot_type_other_helper'       => ' ',
            'size'                         => 'Plot Size',
            'size_helper'                  => ' ',
            'boulevard'                    => 'Boulevard',
            'boulevard_helper'             => ' ',
            'main_road'                    => 'Main Road',
            'main_road_helper'             => ' ',
            'facing_park'                  => 'Facing Park',
            'facing_park_helper'           => ' ',
            'corner'                       => 'Corner',
            'corner_helper'                => ' ',
            'twoor_more_sides_open'        => 'Twoor More Sides Open',
            'twoor_more_sides_open_helper' => ' ',
            'prefred_choice'               => 'Prefred Choice',
            'prefred_choice_helper'        => ' ',
            'price_per_marla'              => 'Price Per Marla',
            'price_per_marla_helper'       => ' ',
            'total_price'                  => 'Total Price',
            'total_price_helper'           => ' ',
            'land_charges'                 => 'Land Charges',
            'land_charges_helper'          => ' ',
            'development_charges'          => 'Development Charges',
            'development_charges_helper'   => ' ',
            'comments'                     => 'Comments',
            'comments_helper'              => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'client' => [
        'title'          => 'Client',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'clientid'                  => 'Client ID',
            'clientid_helper'           => ' ',
            'membership_no'             => 'Membership No',
            'membership_no_helper'      => ' ',
            'date_of_membership'        => 'Date Of Membership',
            'date_of_membership_helper' => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'cnic_nicop_no'             => 'Cnic Nicop No',
            'cnic_nicop_no_helper'      => ' ',
            'passport_no'               => 'Passport No',
            'passport_no_helper'        => ' ',
            'father_name'               => 'Father Name',
            'father_name_helper'        => ' ',
            'profession'                => 'Profession',
            'profession_helper'         => ' ',
            'spouse_name'               => 'Spouse Name',
            'spouse_name_helper'        => ' ',
            'spouse_profession'         => 'Spouse Profession',
            'spouse_profession_helper'  => ' ',
            'education'                 => 'Education',
            'education_helper'          => ' ',
            'nationality'               => 'Nationality',
            'nationality_helper'        => ' ',
            'religion'                  => 'Religion',
            'religion_helper'           => ' ',
            'resident_villa_no'         => 'Resident Villa No',
            'resident_villa_no_helper'  => ' ',
            'street_no'                 => 'Street No',
            'street_no_helper'          => ' ',
            'sector'                    => 'Sector',
            'sector_helper'             => ' ',
            'city'                      => 'City',
            'city_helper'               => ' ',
            'date_of_birth'             => 'Date Of Birth',
            'date_of_birth_helper'      => ' ',
            'marital_status'            => 'Marital Status',
            'marital_status_helper'     => ' ',
            'present_address'           => 'Present Address',
            'present_address_helper'    => ' ',
            'office_contact'            => 'Office Contact',
            'office_contact_helper'     => ' ',
            'home_contact'              => 'Home Contact',
            'home_contact_helper'       => ' ',
            'phone'                     => 'Phone No.',
            'phone_helper'              => ' ',
            'fax'                       => 'Fax',
            'fax_helper'                => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'permanent_address'         => 'Permanent Address',
            'permanent_address_helper'  => ' ',
            'domicile'                  => 'Domicile',
            'domicile_helper'           => ' ',
            'next_of_kin'               => 'Next Of Kin',
            'next_of_kin_helper'        => ' ',
            'relation_kin'              => 'Relation Kin',
            'relation_kin_helper'       => ' ',
            'cnic_ni_cop_kin_no'        => 'Cnic NiCop Kin No',
            'cnic_ni_cop_kin_no_helper' => ' ',
            'passport_no_kin'           => 'Passport No Kin',
            'passport_no_kin_helper'    => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'picture'                   => 'Picture',
            'picture_helper'            => ' ',
            'cnic_pic'                  => 'Cnic Picture',
            'cnic_pic_helper'           => ' ',
            'signature'                 => 'Signature Picture',
            'signature_helper'          => ' ',
            'thumb'                     => 'Thumb Picture',
            'thumb_helper'              => ' ',
            'referred_by'               => 'Referred By',
            'referred_by_helper'        => ' ',
        ],
    ],
    'application' => [
        'title'          => 'Clients Applications',
        'title_singular' => 'Clients Application',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'client'                      => 'Client',
            'client_helper'               => 'Select Client',
            'plot'                        => 'Select Plot',
            'plot_helper'                 => 'Select Plot',
            'dealer'                      => 'If Client through Dealer',
            'dealer_helper'               => 'Select Dealer',
            'agent'                       => 'Agent',
            'agent_helper'                => ' ',
            'manager'                     => 'Manager',
            'manager_helper'              => ' ',
            'discount'                    => 'Discount',
            'discount_helper'             => ' ',
            'comments'                    => 'Comments',
            'comments_helper'             => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'total_after_discount'        => 'Total After Discount',
            'total_after_discount_helper' => ' ',
            'no_of_installments'          => 'No Of Installments',
            'no_of_installments_helper'   => ' ',
            'form_no'                     => 'Form No',
            'form_no_helper'              => ' ',
            'payment_type'                => 'Payment Type',
            'payment_type_helper'         => ' ',
            'installments_period'         => 'Installments Period',
            'installments_period_helper'  => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'Payments',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'application'              => 'Select Application Form No.',
            'application_helper'       => ' ',
            'challan_no'               => 'Challan No',
            'challan_no_helper'        => ' ',
            'payment_mode'             => 'Payment Mode',
            'payment_mode_helper'      => ' ',
            'date'                     => 'Payment Date',
            'date_helper'              => ' ',
            'amount'                   => 'Amount',
            'amount_helper'            => ' ',
            'payment_type'             => 'Payment Type',
            'payment_type_helper'      => ' ',
            'payment_medium'           => 'Payment Medium',
            'payment_medium_helper'    => ' ',
            'bank_name'                => 'Bank Name',
            'bank_name_helper'         => ' ',
            'bank_slip_no'             => 'Bank Slip No',
            'bank_slip_no_helper'      => ' ',
            'bank_payment_date'        => 'Bank Payment Date',
            'bank_payment_date_helper' => ' ',
            'account_no_from'          => 'Account No Paid From',
            'account_no_from_helper'   => ' ',
            'bank_name_to'             => 'Bank Name To Paid',
            'bank_name_to_helper'      => ' ',
            'account_no_to'            => 'Account No To Paid',
            'account_no_to_helper'     => ' ',
            'depositor_name'           => 'Depositor Name',
            'depositor_name_helper'    => ' ',
            'depositor_cnic'           => 'Depositor Cnic',
            'depositor_cnic_helper'    => ' ',
            'depositor_contact'        => 'Depositor Contact No',
            'depositor_contact_helper' => ' ',
            'cachier_name'             => 'Cachier Name',
            'cachier_name_helper'      => ' ',
            'cashier_cnic'             => 'Cashier CNIC',
            'cashier_cnic_helper'      => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
            'remarks'                  => 'Remarks',
            'remarks_helper'           => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'installment'              => 'Installment',
            'installment_helper'       => ' ',
            'cheque_no'                => 'Cheque No.',
            'cheque_no_helper'         => ' ',
        ],
    ],
    'installment' => [
        'title'          => 'Installments',
        'title_singular' => 'Installment',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'application'        => 'Select Application',
            'application_helper' => ' ',
            'due_date'           => 'Due Date',
            'due_date_helper'    => ' ',
            'amount'             => 'Amount',
            'amount_helper'      => ' ',
            'comments'           => 'Comments',
            'comments_helper'    => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'location' => [
        'title'          => 'Locations',
        'title_singular' => 'Location',
    ],
    'booking' => [
        'title'          => 'Bookings',
        'title_singular' => 'Booking',
    ],
];

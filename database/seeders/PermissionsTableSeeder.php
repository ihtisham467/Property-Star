<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'country_create',
            ],
            [
                'id'    => 18,
                'title' => 'country_edit',
            ],
            [
                'id'    => 19,
                'title' => 'country_show',
            ],
            [
                'id'    => 20,
                'title' => 'country_delete',
            ],
            [
                'id'    => 21,
                'title' => 'country_access',
            ],
            [
                'id'    => 22,
                'title' => 'province_create',
            ],
            [
                'id'    => 23,
                'title' => 'province_edit',
            ],
            [
                'id'    => 24,
                'title' => 'province_show',
            ],
            [
                'id'    => 25,
                'title' => 'province_delete',
            ],
            [
                'id'    => 26,
                'title' => 'province_access',
            ],
            [
                'id'    => 27,
                'title' => 'city_create',
            ],
            [
                'id'    => 28,
                'title' => 'city_edit',
            ],
            [
                'id'    => 29,
                'title' => 'city_show',
            ],
            [
                'id'    => 30,
                'title' => 'city_delete',
            ],
            [
                'id'    => 31,
                'title' => 'city_access',
            ],
            [
                'id'    => 32,
                'title' => 'dealer_create',
            ],
            [
                'id'    => 33,
                'title' => 'dealer_edit',
            ],
            [
                'id'    => 34,
                'title' => 'dealer_show',
            ],
            [
                'id'    => 35,
                'title' => 'dealer_delete',
            ],
            [
                'id'    => 36,
                'title' => 'dealer_access',
            ],
            [
                'id'    => 37,
                'title' => 'plot_create',
            ],
            [
                'id'    => 38,
                'title' => 'plot_edit',
            ],
            [
                'id'    => 39,
                'title' => 'plot_show',
            ],
            [
                'id'    => 40,
                'title' => 'plot_delete',
            ],
            [
                'id'    => 41,
                'title' => 'plot_access',
            ],
            [
                'id'    => 42,
                'title' => 'client_create',
            ],
            [
                'id'    => 43,
                'title' => 'client_edit',
            ],
            [
                'id'    => 44,
                'title' => 'client_show',
            ],
            [
                'id'    => 45,
                'title' => 'client_delete',
            ],
            [
                'id'    => 46,
                'title' => 'client_access',
            ],
            [
                'id'    => 47,
                'title' => 'application_create',
            ],
            [
                'id'    => 48,
                'title' => 'application_edit',
            ],
            [
                'id'    => 49,
                'title' => 'application_show',
            ],
            [
                'id'    => 50,
                'title' => 'application_delete',
            ],
            [
                'id'    => 51,
                'title' => 'application_access',
            ],
            [
                'id'    => 52,
                'title' => 'payment_create',
            ],
            [
                'id'    => 53,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 54,
                'title' => 'payment_show',
            ],
            [
                'id'    => 55,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 56,
                'title' => 'payment_access',
            ],
            [
                'id'    => 57,
                'title' => 'installment_create',
            ],
            [
                'id'    => 58,
                'title' => 'installment_edit',
            ],
            [
                'id'    => 59,
                'title' => 'installment_show',
            ],
            [
                'id'    => 60,
                'title' => 'installment_delete',
            ],
            [
                'id'    => 61,
                'title' => 'installment_access',
            ],
            [
                'id'    => 62,
                'title' => 'location_access',
            ],
            [
                'id'    => 63,
                'title' => 'booking_access',
            ],
            [
                'id'    => 64,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

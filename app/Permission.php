<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [

            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_saps',
            'add_saps',
            'edit_saps',
            'delete_saps', 
            
            'view_departments',
            'add_departments',
            'edit_departments',
            'delete_departments', 

            'view_tickets',
            'add_tickets',
            'edit_tickets',
            'delete_tickets', 
            
            'view_applications',
            'add_applications',
            'edit_applications',
            'delete_applications', 

        ];
    }
}

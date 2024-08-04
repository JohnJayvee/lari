<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Auth;
use DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Define gates based on user's level and module ID
        Gate::define('can_view', function ($level, $moduleId) {
            // Retrieve the user's permissions from the database
            $permissionValue = DB::table('permissiontable')
                ->leftJoin('moduletable', 'permissiontable.moduleid', '=', 'moduletable.moduleid')
                ->select('permissiontable.canview')
                ->where('permissiontable.userlevelid', '=', $level)
                ->where('moduletable.moduleid', '=', $moduleId)
                ->first();
        
            return $permissionValue !== null && $permissionValue->canview == 1;
        });


        // Define gates based on user's level and module ID
        Gate::define('can_edit', function ($level, $moduleId) {
            // Retrieve the user's permissions from the database
            $permissionValue = DB::table('permissiontable')
                ->leftjoin('moduletable', 'permissiontable.moduleid', '=', 'moduletable.moduleid')
                ->select('permissiontable.canedit')
                ->where('permissiontable.userlevelid','=', $level)
                ->where('moduletable.moduleid','=', $moduleId)->first();

            return $permissionValue !== null && $permissionValue->canedit == 1;
        });
        

        // Define gates based on user's level and module ID
        Gate::define('can_delete', function ($level, $moduleId) {
            // Retrieve the user's permissions from the database
            $permissionValue = DB::table('permissiontable')
                ->leftjoin('moduletable', 'permissiontable.moduleid', '=', 'moduletable.moduleid')
                ->select('permissiontable.candelete')
                ->where('permissiontable.userlevelid','=', $level)
                ->where('moduletable.moduleid','=', $moduleId)->first();
            
            return $permissionValue !== null && $permissionValue->candelete == 1;
        });


        // Define gates based on user's level and module ID
        Gate::define('can_add', function ($level, $moduleId) {
            // Retrieve the user's permissions from the database
            $permissionValue = DB::table('permissiontable')
                ->leftjoin('moduletable', 'permissiontable.moduleid', '=', 'moduletable.moduleid')
                ->select('permissiontable.canadd')
                ->where('permissiontable.userlevelid','=', $level)
                ->where('moduletable.moduleid','=', $moduleId)->first();
            
            return $permissionValue !== null && $permissionValue->canadd == 1;
        });
        

        // Define gates based on user's level and module ID
        Gate::define('can_print', function ($level, $moduleId) {
            // Retrieve the user's permissions from the database
            $permissionValue = DB::table('permissiontable')
                ->leftjoin('moduletable', 'permissiontable.moduleid', '=', 'moduletable.moduleid')
                ->select('permissiontable.canprint')
                ->where('permissiontable.userlevelid','=', $level)
                ->where('moduletable.moduleid','=', $moduleId)->first();
            
            return $permissionValue !== null && $permissionValue->canprint == 1;
        });

    }
}

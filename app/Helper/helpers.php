<?php
use Google\Cloud\Storage\StorageClient;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/*-----------------------------Get Settings-------------------------------*/
if (!function_exists('getsettings')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function getsettings($get = null)
    {
        if ($get != null) {
            if (DB::table('settings')->where('slug', $get)->count() == 1) {

                $settings_component = DB::table('settings')
                    ->where('slug', $get)
                    ->first()->value;
                return $settings_component;

            } else {
                return "";
            }
        } else {
            return $get;
        }
    }
}

/*-----------------------------Update Settings-------------------------------*/
if (!function_exists('updatesettings')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function updatesettings($get = null, $value = null)
    {
        if ($get != null) {
            if (DB::table('settings')->where('slug', $get)->count() == 1) {
                DB::table('settings')
                    ->where('slug', $get)
                    ->update(array('value' => $value));
                return true;
            } else {
                DB::table('settings')
                    ->insert(array(
                        'slug' => $get,
                        'value' => $value
                    ));
                return true;
            }
        } else {
            return false;

        }
    }
}

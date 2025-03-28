<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $app_setting_data = Setting::all();
        $app_setting_configs = config('constants.app_settings');

        if (count($app_setting_data)) {
            foreach ($app_setting_configs as &$setting) {
                $key = $setting['key'];

                $data = $app_setting_data->where('key', $key)->firstOrFail();

                if (isset($data)) {
                    $setting['value'] = $data['value'];
                }
            }
            unset($setting);
        }

        $app_settings = $app_setting_configs;

        return view('admin.settings.index', compact('app_settings'));
    }

    public function save(Request $request)
    {
        $request_data = $request->all();
        $app_settings = Setting::all();
        $data = config('constants.app_settings');

        foreach ($data as $app_setting) {
            $key = $app_setting['key'];
            $data = $request_data[$key] ?? null;
            if ($key == 'logo') {
                if ($data) {
                    $path = $request->file('logo')->store('uploads', 'public');
                    $app_setting['value'] = $path;
                }
            } else {
                $app_setting['value'] = $data . '' ?? null;
            }

            if (is_null($app_settings) || $app_settings->isEmpty()) {
                Setting::create($app_setting);
            } else {
                $objData = $app_settings->where('key', $key)->firstOrFail();
                if ($objData) {
                    $objData->update($app_setting);
                } else {
                    Setting::create($app_setting);
                }
            }
        }

        return redirect()->route('admin.settings.index');
    }
}

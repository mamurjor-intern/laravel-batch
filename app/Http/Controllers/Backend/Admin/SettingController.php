<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * ENV Data Set
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    protected function changeEnvData(array $data)
    {
        if (count($data) > 0) {
            $env = file_get_contents(base_path() . '/.env');
            $env = preg_split('/\s+/', $env);

            foreach ($data as $key => $value) {
                foreach ($env as $env_key => $env_value) {
                    $entry = explode("=", $env_value, 2);
                    if ($entry[0] == $key) {
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        $env[$env_key] = $env_value;
                    }
                }
            }
            $env = implode("\n", $env);

            file_put_contents(base_path() . '/.env', $env);
            return true;
        } else {
            return false;
        }

    }

    public function general(){
        $this->setPageTitle('Setting - General');
        return view('backend.pages.setting.general');
    }

    public function generalStore(Request $request){
        $headerLogo = $this->imageUpload($request->file('header_logo'),'media/logo/',null, null);
        $footerLogo = $this->imageUpload($request->file('footer_logo'),'media/logo/',null, null);

        Setting::updateOrCreate(['key'=>'header-logo'],['value'=>$headerLogo]);
        Setting::updateOrCreate(['key'=>'footer-logo'],['value'=>$footerLogo]);

        toastr()->success('Data has been saved.');
        return back();
    }

    public function emailConfigure(Request $request){
        // env set value
        $this->changeEnvData([
            'MAIL_DRIVER'       => $request->mail_mailer,
            'MAIL_HOST'         => $request->mail_host,
            'MAIL_PORT'         => $request->mail_port,
            'MAIL_USERNAME'     => $request->mail_username,
            'MAIL_PASSWORD'     => $request->mail_password,
            'MAIL_ENCRYPTION'   => $request->mail_encryption,
            'MAIL_FROM_ADDRESS' => $request->mail_from_address
        ]);
    }

}

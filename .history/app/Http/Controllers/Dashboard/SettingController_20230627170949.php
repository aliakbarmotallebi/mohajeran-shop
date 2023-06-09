<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Uilits\SMSTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.settings.settings');
    }

    public function store(Request $request)
    {

        settings()->set('APP_VERSION', $request->get('APP_VERSION'));
        settings()->set('MIN_ORDER_PRICE', $request->get('MIN_ORDER_PRICE'));
        settings()->set('WORKING_TIME', $request->get('WORKING_TIME'));
        settings()->set('INSTANT_MESSAGINGS', $request->get('INSTANT_MESSAGINGS'));
        settings()->set('SLIDER_TITLE', $request->get('SLIDER_TITLE'));
        settings()->set('INSTANT_MESSAGINGS_START', $request->get('INSTANT_MESSAGINGS_START'));
        settings()->set('INSTANT_MESSAGINGS_END', $request->get('INSTANT_MESSAGINGS_END'));
        settings()->set('INSTANT_MESSAGINGS_DEFAULT', $request->get('INSTANT_MESSAGINGS_DEFAULT'));
        settings()->set('SLIDER_COLOR', $request->get('SLIDER_COLOR'));

        if($request->has('SLIDER_IMAGE')) {
            $file = $this->upload($request->file('SLIDER_IMAGE'));
            settings()->set('SLIDER_IMAGE', $file);
        }

        alert()->success('اطلاعات سیستم با موفقیت تغییر یافت');

        return redirect()->back();
    }

    public function transportation(Request $request)
    {
        return view('dashboard.settings.transportation');
    }

    public function transportationStore(Request $request)
    {
        return view('dashboard.settings.transportation');
    }
    
    
    public function groupSendMessageQueue(Request $request)
    {
        return view('dashboard.settings.send-message');
    }

    public function submitGroupSendMessageQueue(Request $request)
    {
        $this->validate($request,[
            'message'=>'required|min:6',
            'checkbox' =>'accepted'
        ]);
        
        $massge  = " درود مشتری گرامی. [نام و نام خانوادگی] ";
        $massge .= $request->get('message');
        (new SMSTools())
            ->text($massge)
            ->sendNumberGroup();
 
        return redirect()->route('dashboard.settings.send-message');
    }

    protected function upload(UploadedFile $file)
    {
        $name = md5(Str::random(25)) . "." . $file->getClientOriginalExtension();

        $fullImageName = "/uploads/sliders/". $name;

        $file->move(public_path("/uploads/sliders/") , $name);

        return $fullImageName;
    }
}

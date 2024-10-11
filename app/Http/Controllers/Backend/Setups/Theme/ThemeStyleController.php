<?php

namespace App\Http\Controllers\Backend\Setups\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThemeColorModal;
use App\Models\CustomerMenuColourM;
use App\Models\ButtonColorM;
use App\Models\TabColorModel;
use App\Models\ModalTheColorM;

class ThemeStyleController extends Controller
{
     public function index()
    {
        return view('backend.setups.themeStyle.index');
    }

    public function customersArea()
    {
        return view('backend.setups.themeStyle.customersArea');
    }

    public function buttons()
    {
        return view('backend.setups.themeStyle.buttons');
    }
    public function tabs()
    {
        return view('backend.setups.themeStyle.tabs');
    }
    public function modals()
    {
        return view('backend.setups.themeStyle.modals');
    }
    public function general()
    {
        return view('backend.setups.themeStyle.general');
    }
    public function custom()
    {
        return view('backend.setups.themeStyle.custom');
    }

    // public function sidebarcolorupdate(Request $request)
    // {

    //     $request->validate([
    //         'sidebar' => 'required',
    //     ]);
    //     ThemeColorModal::updateOrCreate([], ['sidebar_color' => $request->sidebar]);

    //     return redirect()->back()->with('success', 'Sidebar color updated successfully!');
    // }

    public function sidebarcolorupdate(Request $request)
{



    $request->validate([
        'sidebar_color' => 'required',
        'sidebar_link_color' => 'required',
        'sidebar_active_item_background_color' => 'required',
        'sidebar_active_item_color' => 'required',
        'top_header_background_color' => 'required',
        'header_link_color' => 'required',
    ]);

    ThemeColorModal::updateOrCreate([], [
        'sidebar_color' => $request->sidebar_color,
        'sidebar_link_color' => $request->sidebar_link_color,
        'sidebar_active_item_background_color' => $request->sidebar_active_item_background_color,
        'sidebar_active_item_color' => $request->sidebar_active_item_color,
        'top_header_background_color' => $request->top_header_background_color,
        'header_link_color' => $request->header_link_color,
    ]);

    return redirect()->back()->with('success', 'Theme colors updated successfully!');
}

public function customerolorupdate(Request $request)
{

    $request->validate([
        'navigation_bg_cl' => 'required',
        'nav_link_cl' => 'required',
        'footer_bg_cl' => 'required',
        'footer_txt_cl' => 'required',
    ]);

    CustomerMenuColourM::updateOrCreate([], [
        'navigation_bg_cl' => $request->navigation_bg_cl,
        'nav_link_cl' => $request->nav_link_cl,
        'footer_bg_cl' => $request->footer_bg_cl,
        'footer_txt_cl' => $request->footer_txt_cl,
    ]);

    return redirect()->back()->with('success', 'Customer colors updated successfully!');
}


public function buttoncolorupdate(Request $request)
{
    $request->validate([
        'btn_default' => 'required',
        'btn_primary' => 'required',
        'btn_info' => 'required',
        'btn_success' => 'required',
        'btn_danger' => 'required',
    ]);

    ButtonColorM::updateOrCreate([], [
        'btn_default' => $request->btn_default,
        'btn_primary' => $request->btn_primary,
        'btn_info' => $request->btn_info,
        'btn_success' => $request->btn_success,
        'btn_danger' => $request->btn_danger,
    ]);

    return redirect()->back()->with('success', 'Button colors updated successfully!');

}



public function tabcolorupdate(Request $request)
{
    $request->validate([
        'tab_bg' => 'required',
        'tab_link_bg' => 'required',
        'tab_link_hov' => 'required',
        'tab_act_bdr' => 'required',
    ]);

    TabColorModel::updateOrCreate([], [
        'tab_bg' => $request->tab_bg,
        'tab_link_bg' => $request->tab_link_bg,
        'tab_link_hov' => $request->tab_link_hov,
        'tab_act_bdr' => $request->tab_act_bdr,
    ]);

    return redirect()->back()->with('success', 'Tab colors updated successfully!');
}


public function modalcolorupdate(Request $request)
{
    $request->validate([
        'head_bg' => 'required',
        'head_clr' => 'required',
        'close_btn_clr' => 'required',
        'head_txt_clr' => 'required',
    ]);

    ModalTheColorM::updateOrCreate([], [
        'head_bg' => $request->head_bg,
        'head_clr' => $request->head_clr,
        'close_btn_clr' => $request->close_btn_clr,
        'head_txt_clr' => $request->head_txt_clr,
    ]);

    return redirect()->back()->with('success', 'Modal colors updated successfully!');
}

}

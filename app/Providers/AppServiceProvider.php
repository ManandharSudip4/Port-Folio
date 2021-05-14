<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\message;
use App\Models\perInfo;
use App\Models\smedia;
use App\Models\skill;
use App\Models\contact;
use App\Models\education;
use App\Models\workingexp;
use App\Models\workcategory;
use App\Models\work;
use App\Models\blog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    
    {
        $mess = message::where('status','unseen')->get();
        View::share('mess', $mess);
        $infos = perInfo::all();
        View::share('info', $infos);
        $medias = smedia::all();
        View::share('medias', $medias);
        $skills = skill::where('skilltype','Technical')->get();
        View::share('skills', $skills);
        $skillsp = skill::where('skilltype','Professional')->get();
        View::share('skillsp', $skillsp);
        $contacts = contact::all();
        View::share('contacts', $contacts);
        $educations = education::orderBy('id','desc')->get();
        View::share('educations', $educations);
        $workingexps = workingexp::orderBy('id','desc')->get();
        View::share('workingexps', $workingexps);
        $workCats = workcategory::all();
        View::share('workCats', $workCats);
        $works = work::all();
        View::share('works', $works);
        $blogs = blog::all();
        View::share('blogs',$blogs);
        // $me = message::where('status', 'unseen')->count();
        // View::share('me', $me);
    }
}

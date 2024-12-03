<?php
namespace App\Http\ViewComposers;

use App\Models\Ads;
use App\Models\Content;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $pengumuman = Content::where('topic', '=', 'Pengumuman')->where('published', '=', 1)->orderBy('created_at', 'DESC')->skip(0)->take(5)->get();
        $berita = Content::where('topic', '=', 'Berita')->where('published', '=', 1)->orderBy('created_at', 'DESC')->skip(0)->take(5)->get();

        $count_pengumuman = Content::where('topic', '=', 'Pengumuman')->where('published', '=', 1)->count();
        $count_berita = Content::where('topic', '=', 'Berita')->where('published', '=', 1)->count();
        $count_event = Content::where('topic', '=', 'Event')->where('published', '=', 1)->count();
        $count_post = Content::where('topic', '=', 'Artikel')->where('published', '=', 1)->count();

        $ad_sidetop = Ads::where('position', '=', 'Samping 1')->first();
        $ad_sidebot = Ads::where('position', '=', 'Samping 2')->first();

        $view->with('pengumuman', $pengumuman)
                ->with('berita', $berita)
                ->with('count_pengumuman', $count_pengumuman)
                ->with('count_berita', $count_berita)
                ->with('count_event', $count_event)
                ->with('count_post', $count_post)
                ->with('ad_sidetop', $ad_sidetop)
                ->with('ad_sidebot', $ad_sidebot);
    }
}
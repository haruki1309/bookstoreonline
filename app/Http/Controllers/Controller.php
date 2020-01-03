<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Topic;
use App\Models\Category;
use App\Models\Book;
use App\Models\Author;
use App\Models\Translator;
use App\Models\PublishingCompany;
use App\Models\Publisher;
use App\Models\Language;
use App\Models\Age;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {   
        //--------------------category-----------------------
        $data = array(
            'menuAuthor' => Author::inRandomOrder()->take(10)->get(),
            'menuTranslator' => Translator::inRandomOrder()->take(10)->get(),
            'menuPublisher' => Publisher::inRandomOrder()->take(10)->get(),
            'menuPublishingCom' => PublishingCompany::inRandomOrder()->take(10)->get(),
            'menuLanguage' => Language::inRandomOrder()->take(10)->get(),
            'menuAge' => Age::inRandomOrder()->take(10)->get(),
            'menuTopic' => Topic::inRandomOrder()->take(10)->get(),
            'menuCategory' => Category::inRandomOrder()->take(10)->get()
        );
        //----------------------------------------------------- 

        view()->share($data);
    }
}

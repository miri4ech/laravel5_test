<?php 
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class TitleComposer {

    /**
     * @var String
     */
    protected $title;

    public function __construct()
    {
        $this->title = 'タイトル';
    }

    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('title', $this->title);
    }
}

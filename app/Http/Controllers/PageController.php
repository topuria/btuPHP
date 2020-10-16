<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageFormRequest;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sortBy = 'id';
        $sortDirection = 'ASC';

        if (request('sortby') || request('sortdir')) {
            $sortBy = request('sortby');
            $sortDirection = request('sortdir');
        }

        $pages = Page::orderBy($sortBy, $sortDirection)->paginate(6);

        return view('page/index', compact('pages'));
    }
    public function create()
    {
        return view('page/create');
    }
    public function store(PageFormRequest $request)
    {
        $page = Page::create($request->all());

        alert()->success('Page has been added.');

        return redirect()->route('page.edit', $page->id);
    }
    public function show(Page $page)
    {
        return view('page/show', compact('page'));
    }
    public function edit(Page $page)
    {
        return view('page/edit', compact('page'));
    }

    public function update(PageFormRequest $request, Page $page)
    {
        $page->update($request->all());

        alert()->success('Page has been updated.');

        return back();
    }

    public function destroy($id)
    {
        Page::destroy($id);

        alert()->success('Page has been deleted.');

        return redirect('/page');
    }
}

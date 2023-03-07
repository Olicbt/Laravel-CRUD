<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Target;

class TargetController extends Controller
{
    public function index()
    {
        $targets = Target::orderBy('ranking', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return view('index', compact('targets'));
    }

    public function create()
    {
        $targets = Target::orderBy('ranking', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return view('create', compact('targets'));
    }

    public function store()
    {
        // 1. validate the data
        $this->validate(request(),
        [
            'target'=>'required|string',
            'ranking'=>'max:2',
        ],
        [
           'target.required'=>'target must say something',
           'ranking.max'=>'ranking must be less than 100',
        ]);

        // 2. insert the data into the database
        Target::create
        ([
            'target'=>request('target'),
            'ranking'=>request('ranking'),
        ]);

        // 3. redirect the url
        return redirect('/create');
    }

    public function edit(Target $target)
    {
        $targets = Target::orderBy('ranking', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return view('edit', compact('targets', 'target'));
    }

    public function update(Target $target)
    {
        // 1. validate the data
        $this->validate(request(),
        [
            'target'=>'required|string',
            'ranking'=>'max:2',
        ],
        [
           'target.required'=>'target must say something',
           'ranking.max'=>'ranking must be less than 100',
        ]);

        // 2. insert the data into the database
        Target::where ('id', $target->id)->update
        ([
            'target'=>request('target'),
            'ranking'=>request('ranking'),
        ]);

        // 3. redirect the url
        return redirect('/');
    }

    public function delete(Target $target)
    {
        $target->delete();

        return back();
    }
}

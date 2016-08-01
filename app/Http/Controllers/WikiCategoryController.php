<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Request as RequestMerge;

use App\WikiRole;
use App\WikiCategory;
use App\WikiCategoryUser;
use App\User;
use App\Role;


class WikiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wikiCategories = WikiCategory::all();
        $wikiRoles = WikiRole::all();
        $users = User::all();
        $roles = Role::where('wiki_role',1)->get();
        $roleSelect = '';
        $userSelect = '';
        
        return view('wiki.categories', compact('wikiCategories', 'wikiRoles','users','roles') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wikiCat = WikiCategory::create($request->all());
        session()->flash('message',trans('wiki.wikiCategoryCreateSuccess'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $wikiCat = WikiCategory::find($id);
        if( !$request->has('top_category') )
            RequestMerge::merge(['top_category' => 0] );
        
        $wikiCat->fill($request->all());
        $wikiCat->save();
        $wkuArray = array();
        $rolesArray = array();
        if( $request->has('user_id') ){
            foreach($request->get('user_id') as $uid){
                $wku= WikiCategoryUser::where('user_id',$uid)->where('wiki_category_id',$id)->first();
                if( $wku == null ){
                    $nWku = new WikiCategoryUser();
                    $nWku->user_id = $uid;
                    $nWku->wiki_category_id = $id;
                    $nWku->save();
                }
                    $wkuArray[] = $uid;
            }
        }
        else
            $allWikiUsers = WikiCategoryUser::where('wiki_category_id',$id)->delete(); 
            //finish tihs part
            
        if( $request->has('role_id') ){
            foreach($request->get('role_id') as $gid){
                $wikiRole= WikiRole::where('role_id',$gid)->where('wiki_category_id',$id)->first();
                if( $wikiRole == null ){
                    $wikiRole = new WikiRole();
                    $wikiRole->role_id = $gid;
                    $wikiRole->wiki_category_id = $id;
                    $wikiRole->save();
                }
                    $wkuArray[] = $gid;
            }
        }
        else
             WikiRole::where('wiki_category_id',$id)->delete(); 
            
        session()->flash('message',trans('wiki.wikiCategoryCreateSuccess'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $destory = WikiCategory::destroy($id);
        return redirect()->back();
    }
}
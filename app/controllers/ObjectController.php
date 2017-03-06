<?php
class ObjectController extends PublicController {
    function getIndex ($id) {
        $object = Object::findOrFail($id);
        if ( !(Auth::check()) || !in_array(Auth::user()->type_id, array(1, 2)) ){
            if (!$object->is_active || !$object->is_open)
                return App::abort(404);
        }

        $object->view_total++;
        $object->save();

        $other_objects = Object::where('company_id', $object->company_id)->where(array('is_active'=>1, 'is_open'=>1))->lists('role_id', 'id');

        $ar = array();
        $ar['title'] = $object->name;
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['standart_data'] = $object->relStandartData;
        $ar['special_data'] = $object->relSpecialData()->orderBy('sort_index', 'asc')->get();
        $ar['tag'] = $object->relTag;
        $ar['location'] = $object->relLocation;
        $ar['reserve'] = $object->relReserve;
        $ar['score'] = $object->relScore;
        $ar['sliders'] = $object->relSliders()->get();
        $ar['slider_1'] = $object->relSliders()->first();

        $ar['role'] = $object->relRole;
        $ar['news'] = News::where('object_id', $object->id)->orderBy('id', 'desc')->take(3)->get();

        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['simular_objects'] = Object::where('role_id', $object->role_id)
                                        ->where(array('is_active'=>1, 'is_open'=>1))
                                        ->with('relLocation', 'relStandartData', 'relSpecialData')
                                        ->orderBy('sort_index', 'desc')->take(12)->get();

        $ar['comments_first'] = Comment::where('object_id', $object->id)
                                    ->where('is_publish', 1)
                                    ->where('is_answer', 0)
                                    ->orderBy('id', 'desc')->take(3)->get();

        $ar['comments'] = Comment::where('object_id', $object->id)
                                    ->where('is_publish', 1)
                                    ->where('is_answer', 0)
                                    ->orderBy('id', 'desc')->take(100)->skip(3)->get();

        $ar['translator'] = $this->translator;

        return View::make('front.object.index', $ar);
    }

    function postIndex($id){
        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $ar_user = json_decode($s, true);
        if (!isset($ar_user['network']) || !isset($ar_user['uid']))
            return App::abort(404);

        $visitor = Visitor::where(array('from'=>$ar_user['network'], 'external_id'=>$ar_user['uid']))->first();
        if ($visitor){
            Auth::loginUsingId($visitor->user_id);

            return Redirect::action('ObjectController@getIndex', $id);
        }

        $user = new User();
        $user->type_id = 4;
        $user->can_enter = 1;
        $user->save();

        $visitor = new Visitor();
        if (isset($ar_user['last_name']))
            $visitor->name = $ar_user['last_name'];
        if (isset($ar_user['email']))
            $visitor->email = $ar_user['email'];
        if (isset($ar_user['network']))
            $visitor->from = $ar_user['network'];
        if (isset($ar_user['uid']))
            $visitor->external_id = $ar_user['uid'];
        $visitor->user_id = $user->id;
        $visitor->save();

        Auth::loginUsingId($visitor->user_id);

        return Redirect::action('ObjectController@getIndex', $id);
    }

    function postReserve($object_id){
        $object = Object::findOrFail($object_id);
        if ( !(Auth::check()) || !in_array(Auth::user()->type_id, array(1, 2)) ){
            if (!$object->is_active || !$object->is_open)
                return App::abort(404);
        }

        $role = $object->relRole;

        if (!$role->is_reserve || !$object->is_reserve)
            return App::abort(404);

        $reserve = new Reserve();
        $reserve->object_id = $object->id;
        $reserve->is_accept = 0;
        $reserve->created_unix = time();
        $reserve->name = Input::get('name');
        $reserve->phone = Input::get('phone');
        $reserve->email = Input::get('email');
        $reserve->note = Input::get('note');
        $reserve->enter_date = Input::get('enter_date');
        $reserve->enter_time = Input::get('enter_time');
        $reserve->save();

        return Redirect::back()->with('success', $this->translator->getTransNameByKey('success_bron'));
    }

    function getNews($object_id, $id){
        $object = Object::findOrFail($object_id);
        if ( !(Auth::check()) || !in_array(Auth::user()->type_id, array(1, 2)) ){
            if (!$object->is_active || !$object->is_open)
                return App::abort(404);
        }


        $company = Company::findOrFail($object->company_id);

        $other_objects = Object::where('company_id', $company->id)->where(array('is_active'=>1, 'is_open'=>1))->lists('role_id', 'id');
        $news = News::findOrFail($id);

        $ar = array();
        $ar['title'] = $news->title;
        $ar['news'] = $news;

        $ar['standart_data'] = $object->relStandartData;
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['simular_objects'] = Object::where('role_id', $object->role_id)
                                        ->where(array('is_active'=>1, 'is_open'=>1))
                                        ->with('relLocation', 'relStandartData', 'relSpecialData')
                                        ->orderBy('sort_index', 'desc')->take(12)->get();

        return View::make('front.object.news', $ar);
    }

    function postComment($object_id){
        if (!Auth::check())
            return App::abort(404);

        $object = Object::findOrFail($object_id);
        if ( !(Auth::check()) || !in_array(Auth::user()->type_id, array(1, 2)) ){
            if (!$object->is_active || !$object->is_open)
                return App::abort(404);
        }

        $user = Auth::user();

        if (Comment::where(array('object_id'=>$object->id, 'user_id'=>$user->id))->count() > 0)
            return Redirect::back()->with('info', $this->translator->getTransNameByKey('info_review_has'));

        $comment = new Comment();
        $comment->is_answer = 0;
        $comment->parent_id = 0;
        $comment->is_publish = 1;
        $comment->object_id = $object->id;
        $comment->user_id = $user->id;
        $comment->title = Input::get('title');
        $comment->note = Input::get('note');
        if (Input::get('score') > 5)
            $comment->score = 5;
        else
            $comment->score = Input::get('score');
        $comment->save();

        $score = ObjectScore::where('object_id', $object->id)->first();
        if (!$score){
            $score = new ObjectScore();
            $score->object_id = $object->id;
        }
        $score->score_sum = $score->score_sum + $comment->score;
        $score->score_count = $score->score_count + 1;
        $score->score_avg = $score->score_sum / $score->score_count;
        $score->save();

        return Redirect::back()->with('success', $this->translator->getTransNameByKey('success_review') );
    }

}

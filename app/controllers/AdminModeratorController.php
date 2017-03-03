<?php
class AdminModeratorController extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = Moderator::where('id', '>', 0);

        // filter items
        $filter_names = Moderator::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = Moderator::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Справочник модераторов';
        $ar['items'] = $items->with('relUser')->paginate(25);

        return View::make('admin.moderators.index', $ar);
    }

    function getItem ($id = 0) {
        $item = Moderator::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать модератора';
            $ar['action'] = action('AdminModeratorController@postItem');
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить данные модератора';
            $ar['action'] = action('AdminModeratorController@postItem', $item->id);
            $ar['item'] = $item;
            $ar['user'] = User::findOrFail($item->user_id);
        }

        return View::make('admin.moderators.item', $ar);
    }

    function postItem($id = 0){
        DB::beginTransaction();

        $item = Moderator::find($id);
        if (!$item){
            $item = new Moderator();
            $user = new User();
            $user->type_id = 2;
        }
        else
            $user = User::findOrFail($item->user_id);

        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        $item->name = Input::get('name');
        $item->address = Input::get('address');
        $item->phone = Input::get('phone');
        $item->mobile = Input::get('mobile');
        $item->note = Input::get('note');
        $item->password = Input::get('password');

        if (!$item->user_id)
            $item->user_id = $user->id;

        $item->save();

        DB::commit();

        return Redirect::action('AdminModeratorController@getIndex')->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($id) {
        $item = Moderator::findOrFail($id);

        $user_id = $item->user_id;
        $item->delete();

        User::findOrFail($user_id)->delete();

        return Redirect::action('AdminModeratorController@getIndex')->with('success', 'Данные успешно удалены');
    }
}

<?php
class AdminTransKeyContrroller extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = TransKey::where('id', '>', 0);

        // filter items
        $filter_names = TransKey::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = TransKey::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Ключи для перевода';

        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);

        return View::make('admin.directory.trans_key.index', $ar);
    }

    function getItem ( $id = 0) {
        $item = TransKey::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать ключ';
            $ar['action'] = action('AdminTransKeyContrroller@postItem', array());
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить ключ';
            $ar['action'] = action('AdminTransKeyContrroller@postItem', array( $item->id));
            $ar['item'] = $item;
        }

        return View::make('admin.directory.trans_key.item', $ar);
    }

    function postItem($id = 0){
        $check = TransKey::where('key', Input::get('key'));

        $item = TransKey::find($id);
        if (!$item)
            $item = new TransKey();
        else
            $check = $check->where('id', '<>', $item->id);

        if ($check->count() > 0)
            return Redirect::back()->with('error', 'Указанный ключ уже существует');

        $item->key = Input::get('key');
        $item->name = Input::get('name');

        DB::beginTransaction();
        $item->save();

        DB::commit();

        return Redirect::action('AdminTransKeyContrroller@getIndex')->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($id) {
        $item = TransKey::findOrFail($id);
        $item->delete();

        return Redirect::action('AdminTransKeyContrroller@getIndex' )->with('success', 'Данные успешно удалены');
    }
}

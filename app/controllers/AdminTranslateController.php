<?php
class AdminTranslateController extends AdminBaseController {
    function getIndex ($lang_id) {
        $lang = SysDirectory::findLang($lang_id);

        $data = $this->trimData(Input::all());
        $items = TransLib::where('lang_id', $lang_id);

        // filter items
        $filter_names = TransLib::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = TransLib::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        if (Input::has('russion_text') && Input::get('russion_text')){
            $items = $items->whereHas('relKey', function($q) use ($data){
                $q->where('name', 'like', '%'.$data['russion_text'].'%');
            });
        }

        $ar = array();
        $ar['title'] = 'Переводы с русского на "'.$lang->name.'"';

        $ar['items'] = $items->with('relKey')->orderBy('id', 'desc')->paginate(25);
        $ar['is_have_ar'] = TransLib::getIsHaveAr();
        $ar['lang'] = $lang;

        return View::make('admin.directory.trans_lib.index', $ar);
    }

    function getItem ($lang_id, $id) {
        $lang = SysDirectory::findLang($lang_id);
        $item = TransLib::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Вставить перевод';
        $ar['action'] = action('AdminTranslateController@postItem', array($lang->id, $item->id));
        $ar['item'] = $item;
        $ar['lang'] = $lang;

        return View::make('admin.directory.trans_lib.item', $ar);
    }

    function postItem($lang_id, $id = 0){
        $lang = SysDirectory::findLang($lang_id);
        DB::beginTransaction();

        $item = TransLib::findOrFail($id);
        $item->trans_name = Input::get('trans_name');
        $item->save();

        Translator::destroiArCache();

        DB::commit();

        return Redirect::action('AdminTranslateController@getIndex', $lang->id)->with('success', 'Данные успешно сохранены');
    }
}

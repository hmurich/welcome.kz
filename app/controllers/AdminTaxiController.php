<?php
class AdminTaxiController extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = Taxi::where('id', '>', 0);

        // filter items
        $filter_names = Taxi::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = Taxi::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Такси';
        $ar['items'] = $items->paginate(25);


        return View::make('admin.taxi.index', $ar);
    }

    function getItem ($id = 0) {
        $item = Taxi::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать такси';
            $ar['action'] = action('AdminTaxiController@postItem');
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить такси';
            $ar['action'] = action('AdminTaxiController@postItem', $item->id);
            $ar['item'] = $item;
        }

        return View::make('admin.taxi.item', $ar);
    }

    function postItem($id = 0){
        DB::beginTransaction();

        $item = Taxi::find($id);
        if (!$item)
            $item = new Taxi();

        $item->name = Input::get('name');
        $item->phone = Input::get('phone');
        $item->save();

        DB::commit();

        return Redirect::action('AdminTaxiController@getIndex')->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($id) {
        $item = Taxi::findOrFail($id);
        $item->delete();

        return Redirect::action('AdminTaxiController@getIndex')->with('success', 'Данные успешно удалены');
    }
}

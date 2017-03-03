<?php
class AdminEventController extends AdminBaseController {
    function getIndex ($is_active = 0) {
        $data = $this->trimData(Input::all());
        if ($is_active)
            $items = ObjectEvent::where('is_active', 1);
        else
            $items = ObjectEvent::where('is_active', 0);

        // filter items
        $filter_names = ObjectEvent::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = ObjectEvent::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        if ($is_active)
            $ar['title'] = 'События. На модерации';
        else
            $ar['title'] = 'События. Одобренные';
        $ar['items'] = $items->orderBy('id', 'desc')->with('relObject')->paginate(25);

        $ar['ar_type'] = SysFilter::getTypeAr();

        return View::make('admin.event.index', $ar);
    }

    function getIsActive($event_id){
        $event = ObjectEvent::findOrFail($event_id);
        $event->is_active = ($event->is_active ? 0 : 1);
        $event->save();

        return Redirect::back()->with('success', 'Активность события успешна изменена');
    }

    function getDelete($event_id){
        $event = ObjectEvent::findOrFail($event_id);
        $event->delete();

        return Redirect::back()->with('success', 'Событие успешно удалено');
    }

}

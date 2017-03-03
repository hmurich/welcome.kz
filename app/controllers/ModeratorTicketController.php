<?php
class ModeratorTicketController extends AdminBaseController {
    function getIndex ($status_id) {
        $status = Ticket::findStatus($status_id);
        if (!$status)
            return App::abort(404);

        $data = $this->trimData(Input::all());
        $items = Ticket::where('status_id', $status_id);

        // filter items
        $filter_names = Ticket::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = Ticket::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Заявки в статусе "'.$status->name.'"';

        $ar['items'] = $items->with('relUser')->orderBy('id', 'desc')->paginate(25);
        $ar['status'] = $status;
        $ar['ar_topic'] = Ticket::getTopicAr();
        $ar['ar_status'] = Ticket::getStatusAr();

        return View::make('moderators.ticket.index', $ar);
    }

    function getHistory($status_id, $id){
        $status = Ticket::findStatus($status_id);
        if (!$status)
            return App::abort(404);

        $item = Ticket::findOrFail($id);
        $items = TicketAnswer::where('ticket_id', $item->id);

        $ar = array();
        $ar['title'] = 'История ответов заявки "'.$item->title.'"';

        $ar['items'] = $items->with('relUser')->orderBy('id', 'desc')->paginate(25);
        $ar['status'] = $status;
        $ar['ar_topic'] = Ticket::getTopicAr();
        $ar['ar_status'] = Ticket::getStatusAr();

        return View::make('moderators.ticket.history', $ar);
    }

    function getItem ($status_id, $id) {
        $status = Ticket::findStatus($status_id);
        if (!$status)
            return App::abort(404);

        $item = Ticket::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Ответить на заявку "'.$item->title.'"';
        $ar['action'] = action('ModeratorTicketController@postItem', array($status->id, $item->id));
        $ar['item'] = $item;

        $ar['ar_topic'] = Ticket::getTopicAr();
        $ar['ar_status'] = Ticket::getStatusAr();

        return View::make('moderators.ticket.item', $ar);
    }

    function postItem($status_id, $id){
        $status = Ticket::findStatus($status_id);
        if (!$status)
            return App::abort(404);

        $item = Ticket::findOrFail($id);
        $answer =  new TicketAnswer();


        DB::beginTransaction();
        $answer->ticket_id = $item->id;
        $answer->before_status_id = $item->status_id;

        $item->status_id = Input::get('status_id');
        $item->save();

        $answer->note = Input::get('note');
        $answer->user_id = Auth::user()->id;
        $answer->after_status_id = $item->status_id;
        $answer->save();

        DB::commit();

        return Redirect::action('ModeratorTicketController@getIndex', $item->status_id)->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($status_id, $id) {
        $status = Ticket::findStatus($status_id);
        if (!$status)
            return App::abort(404);

        $item = Ticket::findOrFail($id);
        $item->delete();

        return Redirect::action('ModeratorTicketController@getIndex', $status->id)->with('success', 'Данные успешно удалены');
    }
}

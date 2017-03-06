<?php
class TicketController extends PublicController {
    function getIndex () {
        $user = Auth::user();
        $company = $user->relCompany;
        $objects = $company->relObjects;
        $tickets = Ticket::where('user_id', $user->id)->get();
        if (!$company->relObjects()->count())
            return Redirect::action('TicketController@getNewRole')->with('info', $this->translator->getTransNameByKey('acces_cabinet_denied'));

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('ticket_index_title');
        $ar['items'] = Ticket::where('user_id', $user->id)
                                ->orderBy('id', 'desc')->get();
        $ar['ar_cats'] = Ticket::getTopicAr();
        $ar['ar_status'] = Ticket::getStatusAr();

        $ar['translator'] = $this->translator;

        return View::make('front.ticket.index', $ar);
    }

    function getAdd(){
        $user = Auth::user();

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('ticket_add_title');
        $ar['ar_cats'] = Ticket::getTopicAr();

        if (isset($ar['ar_cats'][Ticket::new_role_cat_id]))
            unset($ar['ar_cats'][Ticket::new_role_cat_id]);
        if (isset($ar['ar_cats'][Ticket::new_event_cat_id]))
            unset($ar['ar_cats'][Ticket::new_event_cat_id]);

        $ar['translator'] = $this->translator;

        return View::make('front.ticket.add', $ar);
    }

    function postAdd(){
        $user = Auth::user();

        $ticket = new Ticket();
        $ticket->title = Input::get('title');
        $ticket->note = Input::get('note');
        $ticket->status_id = Ticket::begin_status_id;
        $ticket->cat_id = Input::get('cat_id');
        $ticket->user_id = $user->id;
        $ticket->save();

        return Redirect::action('TicketController@getIndex')->with('success', $this->translator->getTransNameByKey('ticket_add_true_msg'));
    }

    function getHistory($ticket_id){
        $user = Auth::user();
        $ticket = Ticket::where(array('user_id'=>$user->id, 'id'=>$ticket_id))->first();
        if (!$ticket)
            return App::abort(404);

        $answers = TicketAnswer::where('ticket_id', $ticket->id)->orderBy('id', 'desc')->get();

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('ticket_history_title').' "'.$ticket->title.'"';
        $ar['ar_status'] = Ticket::getStatusAr();
        $ar['ticket'] = $ticket;
        $ar['items'] = $answers;
        $ar['translator'] = $this->translator;

        return View::make('front.ticket.history', $ar);
    }

    function getNewRole(){
        $user = Auth::user();
        $company = $user->relCompany;
        $objects = $company->relObjects;
        $user_roles = $company->relObjects()->lists('role_id');

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('ticket_new_role_title');
        $ar['ar_roles'] = SysCompanyRole::lists('name', 'id');
        $ar['company'] = $company;

        $ar['ar_city'] = SysCity::getAr();

        $ar['translator'] = $this->translator;

        return View::make('front.ticket.new_role', $ar);
    }

    function postNewRole(){
        if (count(Input::get('role')) == 0)
            return Redirect::back()->with('error',  $this->translator->getTransNameByKey('need_role_msg'));

        $user = Auth::user();
        $company = $user->relCompany;
        $ar_role = SysCompanyRole::lists('name', 'id');
        $user_roles = $company->relObjects()->lists('role_id');

        $data = Input::all();

        DB::beginTransaction();
        foreach ($data['role'] as $k=>$role_id) {
            if (in_array($role_id, $user_roles))
                continue;

            $ticket = new Ticket();
            $ticket->title = 'Запрос на получение новой роли';
            $ticket->note = 'Запрос на получение роли "'.$ar_role[$role_id].'"';
            $ticket->status_id = Ticket::begin_status_id;
            $ticket->cat_id = Ticket::new_role_cat_id;
            $ticket->user_id = $user->id;
            $ticket->save();

            Object::generateNew($company, $role_id, $data);
        }

        DB::commit();

        return Redirect::action('CabinetController@getIndex')->with('success', $this->translator->getTransNameByKey('need_role_success_msg'));
    }

    function getNewEvent($object_id){
        $user = Auth::user();
        $company = $user->relCompany;
        $objects = $company->relObjects;
        $object = $company->relObjects()->where('id', $object_id)->first();

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('ticket_new_event_title');
        $ar['company'] = $company;

        $ar['objects'] = $objects;

        $ar['translator'] = $this->translator;

        return View::make('front.ticket.new_event', $ar);
    }

    function postNewEvent(){
        $user = Auth::user();
        $object = Object::findOrFail(Input::get('object_id'));

        $data = Input::all();

        DB::beginTransaction();

        $ticket = new Ticket();
        $ticket->title = 'Запрос на получение нового события';
        $ticket->note = 'Запрос на получение нового события ';
        $ticket->status_id = Ticket::begin_status_id;
        $ticket->cat_id = Ticket::new_event_cat_id;
        $ticket->user_id = $user->id;
        $ticket->save();

        if (Input::hasFile('image'))
            $data['image_link'] = ModelSnipet::setImage(Input::file('image'), 'logo', 400, 230);

        $event = ObjectEvent::generateNew($object, $data);
        if (!$event){
            DB::rollback();
        }

        DB::commit();

        return Redirect::action('CabinetEventController@getIndex', $event->object_id)->with('success', $this->translator->getTransNameByKey('ticket_new_event_msg'));
    }

}

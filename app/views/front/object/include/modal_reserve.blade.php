<div class='m_reserve_modal '>
    <div class='m_reserve_body'>
        <span class="m_reserve_close js_call_reserve_modal">X</span>
        {{ Form::open(array('url'=>action('ObjectController@postReserve', $object->id), 'method' => 'post')) }}
            <span class="m_reserve_title">Форма бронирования</span>
            <div class='m_reserve_row'>
                <div class="m_reserve_row__title">Введите Ваше имя</div>
                <Input type='text' class='m_reserve_row__input'  name='name' required='required'/>
            </div>
            <div class='m_reserve_row'>
                <div class="m_reserve_row__title">Телефон</div>
                <Input type='tel' class='m_reserve_row__input' name='phone' required='required'/>
            </div>
            <div class='m_reserve_row'>
                <div class="m_reserve_row__title">Email</div>
                <Input type='email' class='m_reserve_row__input' name='email' required='required'/>
            </div>
            <div class='m_reserve_row'>
                <div class="m_reserve_row__title">Дата заезда</div>
                <Input type='date' class='m_reserve_row__input'  name='enter_date' required='required'/>
            </div>
            <div class='m_reserve_row'>
                <div class="m_reserve_row__title">Время заезда</div>
                <Input type='time' class='m_reserve_row__input'  name='enter_time' required='required'/>
            </div>
            <div class='m_reserve_row'>
                <div class="m_reserve_row__title">Заметка</div>
                <textarea class='m_reserve_row__input' name='note'></textarea>
            </div>
            <button type="submit" class="m_reserve_submit">Send</button>
        {{ Form::close() }}
    </div>
</div>

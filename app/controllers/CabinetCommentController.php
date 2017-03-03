<?php
class CabinetCommentController extends PublicController {
    function getIndex ($object_id ) {
        $user = Auth::user();
        $company = $user->relCompany;
        $ar_objects = $company->relObjects()->lists('id');
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $comments = Comment::where('object_id', $object->id)->with('relObject')->orderBy('id', 'desc')->get();

        $ar = array();
        $ar['title'] = 'Отзывы';
        $ar['object'] = $object;

        $ar['comments'] = $comments;

        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        return View::make('front.cabinet.comment.index', $ar);
    }

    function getIsPublish ($object_id, $comment_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $ar_objects = $company->relObjects()->lists('id');
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $comment = Comment::where('object_id', $object->id)->where('id', $comment_id)->first();
        if (!$comment)
            return App::abort(404);

        $comment->is_publish = ($comment->is_publish ? 0 : 1);
        $comment->save();

        return Redirect::back()->with('success', 'Данные сохранены успешна');
    }
}

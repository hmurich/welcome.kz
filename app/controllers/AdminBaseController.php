<?php
class AdminBaseController extends BaseController {
    protected function filterItems($items, $data, $filter_names){
        if (isset($data['filter'])){
            foreach ($data['filter'] as $name=>$val) {
                if (!isset($filter_names[$name]) ||  !$val)
                    continue;

                if ($filter_names[$name] == 'text')
                    $items = $items->where($name, 'like', '%'.$val.'%');
                else if ($filter_names[$name] == 'number')
                    $items = $items->where($name, $val);
            }
        }

        return $items;
    }

    protected function sortItems ($items, $data, $sort_names) {
        if (isset($data['sort']) && is_array($data['sort']) && count($data['sort']) > 0){
            $has_sort = false;
            foreach ($data['sort'] as $name=>$val) {
                if (!in_array($name, $sort_names))
                    continue;
                if ($has_sort)
                    break;

                if ($val)
                    $items->orderBy($name, 'desc');
                else
                    $items->orderBy($name, 'asc');

                $has_sort = true;
            }
        }
        else
            $items->orderBy('id', 'asc');

        return $items;
    }

    static function generateDetailSortUral($name){
        $data = static::trimData(Input::all());

        $url = '?';
        if (isset($data['page']))
            unset($data['page']);

        if (isset($data['sort']))
            unset($data['sort']);

        if (is_array($data) && count($data) > 0){
            foreach ($data as $k=>$v) {
                if (!is_array($v))
                    $url .= $k.'='.$v.'&';
                else {
                    foreach ($v as $sub_k=>$sub_v) {
                        if (!is_array($sub_v))
                            $url .= $k.'%5B'.$sub_k.'%5D='.$sub_v.'&';
                        else {
                            foreach ($sub_v as $sub_k2=>$sub_v2) {
                                $url .= $k.'%5B'.$sub_k.'%5D%5B'.$sub_k2.'%5D='.$sub_v2.'&';
                            }
                        }
                    }
                }
            }
        }

        if (Input::has('sort.'.$name) && Input::get('sort.'.$name))
            $url .= 'sort%5B'.$name.'%5D=0';
        else
            $url .= 'sort%5B'.$name.'%5D=1';

        return $url;
    }
}

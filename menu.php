<?php

$items = [
[
    'id' => '1',
    'parent_id' => '0',
    'title' => 'Menu 1',
],
[
    'id' => '2',
    'parent_id' => '0',
    'title' => 'Menu 2',
],
[
    'id' => '3',
    'parent_id' => '2',
    'title' => 'Menu 2 1',
],
[
    'id' => '4',
    'parent_id' => '0',
    'title' => 'Menu 3',
],
[
    'id' => '5',
    'parent_id' => '4',
    'title' => 'Menu 3 1',
],
[
    'id' => '6',
    'parent_id' => '5',
    'title' => 'Menu 3 1 1',
],
[
    'id' => '7',
    'parent_id' => '5',
    'title' => 'Menu 3 1 2',
],
[
    'id' => '8',
    'parent_id' => '7',
    'title' => 'Menu 3 1 2 1',
],
[
    'id' => '9',
    'parent_id' => '4',
    'title' => 'Menu 3 2',
],
[
    'id' => '10',
    'parent_id' => '1',
    'title' => 'Menu 4',
],
[
    'id' => '11',
    'parent_id' => '0',
    'title' => 'Menu 5',
],
];




 function menuNested($items, $parentId = "0") {
    // Controla os menus pai
    $isParentItem = false;
    foreach ($items as $item) {
        if ($item['parent_id'] === $parentId) {
            $isParentItem = true;
            break;
        }
    }

    // Prepara os filhos
  $menu = "";
    if ($isParentItem) {
        $menu .= "<ul>";
        foreach ($items as $item) {
            if ($item['parent_id'] === $parentId) {
                $menu .= "<li>" . $item['title'] . "</li>";
                $menu .= menuNested($items, $item['id']);
            }
        }
        $menu .= "</ul>";
    }
    return $menu;
}

echo menuNested($items);
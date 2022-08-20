<?php
function splits($name, $split)
{
    $arr = explode($split, $name);

    if ($arr) {
        return $arr[count($arr) - 1];
    }

    return $name;
    if (File::exists(__DIR__ . '\app\helpers.php')) {
        require __DIR__ . '\app\helpers.php';
    }
}

function generate_table($data, $all)
{
    $head = '';
    $body = '';
    foreach ($data as $item => $index) {
        $head .= "<th>" . $index[0] . "</th>\n";
    }

    $body .= '@foreach ($all as $element)\\n
               <tr>\\n';
    foreach ($data as $item2 => $index) {
        $body .= '<td>{{ $element->' . $index[0] . "}}</td>\n";
    }

    $body .= "</tr>\n@endforeach\n";

    $table = "      <table>\n
                <thead>\n
                    <tr>" . $head . "</tr>\n
                </thead>\n
                <tbody>
                " . $body . "
                </tbody>\n
            </table>\n";

    return $table;

}
function generate_create($data)
{
    $text = '<form action="" method="POST">
                @csrf';
    foreach ($data as $item) {
        // dd($item);
        $text = '<input class="form-control" name=' . $item[0] . ' ' . '/>';
    }

}

function trans($type, $name)
{
    switch ($type) {
        case ('textarea'):
            {
                return '<textarea name="' . $name . '"></textarea>';
            }
        case ('text'): {
                return '<input type="text" name="' . $name . '"/>';
            }
        case ('number'): {
                return '<input type="number" name="' . $name . '"/>';
            }
    }
}

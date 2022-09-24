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
        
        $text .= input_Render($item[1],$item[0])."\n";
    }
    $text .=  '</form>';
    
    return $text;

}

function input_Render($type, $name , $value="")
{
    switch ($type) {
        case ('textarea'):
            {
                return '<textarea name="' . $name . '" value="old('.$name.') ?? '.$value.'"></textarea>';
            }
        case ('text'): {
                return '<input type="text"  name="' . $name . '" value="old('.$name.') ?? '.$value.'"/>';
            }
        case ('number'): {
                return '<input type="number" name="' . $name . '" value="old('.$name.') ?? '.$value.'"/>';
            }

        case ('date'): {
                return '<input type="date" name="' . $name . '" value="old('.$name.') ?? '.$value.'"/>';
            }
    }
}

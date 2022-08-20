<?php
function splits($name,$split){
    $arr = explode($split,$name);
    if($arr)
        return $arr[count($arr)-1];
    return $name;
    if (File::exists(__DIR__ . '\app\helpers.php')) {
        require __DIR__ . '\app\helpers.php';
    }
}
 function generate_table($data,$models)
{
    dd($models);
    $head = '';
    $body = '';
    foreach ($data as $item => $index) {
        $head .= '<th>' . $index[0] . '</th>';
    }
    $table = "<table> 
                <thead>
                    <tr>" . $head . "</tr>
                </thead>
                <tbody>
                ".$body."
                </tbody>
            </table>";

}

?>
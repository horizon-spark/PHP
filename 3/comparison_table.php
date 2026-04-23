<?php 
    $zero_int = 0;
    $zero_str = "0";
    $false_val = false;
    $null_val = null;
    $empty_str = "";
    $empty_arr = [];

    function pretty($val) {
    if (is_null($val)) return 'null';
    if (is_bool($val)) return $val ? 'true' : 'false';
    if (is_string($val)) return "'$val'";
    if ($val === "") return '""';
    if (is_array($val)) return '[]';
    return $val;
    }

    function result($bool) {
        return $bool ? 'true' : 'false';
    }
?>
<table>
    <tr>
        <th>Значение 1</th>
        <th>Значение 2</th>
        <th>==</th>
        <th>===</th>
    <tr>
        <td><?= pretty($zero_int) ?></td>
        <td><?= pretty($zero_str) ?></td>
        <td><?= result($zero_int == $zero_str) ?></td>
        <td><?= result($zero_int === $zero_str) ?></td>
    <tr>
        <td><?=pretty($zero_int)?></td>
        <td><?=pretty($false_val)?></td>
        <td><?=result($zero_int == $false_val)?></td>
        <td><?=result($zero_int === $false_val)?></td>
    </tr>
    <tr>
        <td><?=pretty($zero_int)?></td>
        <td><?=pretty($null_val)?></td>
        <td><?=result($zero_int == $null_val)?></td>
        <td><?=result($zero_int === $null_val)?></td>
    </tr>
    <tr>
        <td><?=pretty($zero_int)?></td>
        <td><?=pretty($empty_str)?></td>
        <td><?=result($zero_int == $empty_str)?></td>
        <td><?=result($zero_int === $empty_str)?></td>
    </tr>
    <tr>
        <td><?=pretty($zero_int)?></td>
        <td><?=pretty($empty_arr)?></td>
        <td><?=result($zero_int == $empty_arr)?></td>
        <td><?=result($zero_int === $empty_arr)?></td>
    </tr>
    <tr>
        <td><?=pretty($zero_str)?></td>
        <td><?=pretty($false_val)?></td>
        <td><?=result($zero_str == $false_val)?></td>
        <td><?=result($zero_str === $false_val)?></td>
    </tr>
    <tr>
        <td><?=pretty($zero_str)?></td>
        <td><?=pretty($null_val)?></td>
        <td><?=result($zero_str == $null_val)?></td>
        <td><?=result($zero_str === $null_val)?></td>
    </tr>
    <tr>
        <td><?=pretty($zero_str)?></td>
        <td><?=pretty($empty_str)?></td>
        <td><?=result($zero_str == $empty_str)?></td>
        <td><?=result($zero_str === $empty_str)?></td>
    </tr>
    <tr>
        <td><?=pretty($zero_str)?></td>
        <td><?=pretty($empty_arr)?></td>
        <td><?=result($zero_str == $empty_arr)?></td>
        <td><?=result($zero_str === $empty_arr)?></td>
    </tr>
    <tr>
        <td><?=pretty($false_val)?></td>
        <td><?=pretty($null_val) ?></td>
        <td><?=result($false_val == $null_val)?></td>
        <td><?=result($false_val === $null_val)?></td>
    </tr>
    <tr>
        <td><?=pretty($false_val)?></td>
        <td><?=pretty($empty_str)?></td>
        <td><?=result($false_val == $empty_str)?></td>
        <td><?=result($false_val === $empty_str)?></td>
    </tr>
    <tr>
        <td><?=pretty($false_val)?></td>
        <td><?=pretty($empty_arr)?></td>
        <td><?=result($false_val == $empty_arr)?></td>
        <td><?=result($false_val === $empty_arr)?></td>
    </tr>     
    <tr>
        <td><?=pretty($null_val)?></td>
        <td><?=pretty($empty_str)?></td>
        <td><?=result($null_val == $empty_str)?></td>
        <td><?=result($null_val === $empty_str)?></td>
    </tr>   
    <tr>
        <td><?=pretty($null_val)?></td>
        <td><?=pretty($empty_arr)?></td>
        <td><?=result($null_val == $empty_arr)?></td>
        <td><?=result($null_val === $empty_arr)?></td>
    </tr>   
    <tr>
        <td><?=pretty($empty_str)?></td>
        <td><?=pretty($empty_arr)?></td>
        <td><?=result($empty_str == $empty_arr)?></td>
        <td><?=result($empty_str === $empty_arr)?></td>
    </tr>   
</table>
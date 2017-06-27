<!DOCTYPE html>
<html lang="{{  \Lang::getLocale() }}">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="wallet padding-top-bot">
            <table>
                <tr></tr>
                <tr></tr>
                <tr><td></td><td><b style="font-size: 40px;"><?php echo  trans('money_lover.excel_month').' '.$month ?></b></td></tr>
                <tr></tr>
                <tr>
                    <th ></th>
                    <th style="background-color: #E33C18; border: 1px solid #000000;">STT</th>
                    <th style="background-color: #E33C18; border: 1px solid #000000;"><?php echo  trans('money_lover.trans_name') ?></th>
                    <th style="background-color: #E33C18; border: 1px solid #000000;"><?php echo  trans('money_lover.trans_money') ?></th>
                    <th style="background-color: #E33C18; border: 1px solid #000000;"><?php echo  trans('money_lover.note') ?></th>
                </tr>
                <?php foreach($transmoneys as $key=>$var) { ?>
                <tr>
                    <td ></td>
                    <td style="border: 1px solid #000000;text-align: center;"><?php echo  $key ?></td>
                    <td style="border: 1px solid #000000;text-align: center;"><?php echo  $var->name ?></td>
                    <td style="border: 1px solid #000000;text-align: center;"><?php echo  $var->money.'('.$var->type_money.')' ?></td>
                    <td style="border: 1px solid #000000;"><?php echo  $var->note ?></td>
                </tr>
                <?php } ?>
                <tr></tr>
                <tr></tr>
                <tr><td></td><td></td><td></td><td></td><td style="text-align: center;"><b><i>From rikkeisoft</i></b></td></tr>                
                <tr><td></td><td></td><td></td><td></td><td style="text-align: center;"><i>NhuongPH</i></td></tr>
                <tr></tr>
            </table>              
    </body>
</html>
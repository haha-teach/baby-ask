@extends('layout/default')

@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <h5>用python語言，如何找最小值(minimum value)的索引(index)</h5>
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            <div>
如下的指令即可：
<br /><br />
# mysqldump -q -u $username -p $dbname
<br /><br />
因為 -q 選項會讓mysqldump不啟動記憶體的緩存，直接將取得的資料寫到檔案中，減少記憶體的使用。
<br /><br />
 --quick, -q
<br /><br />
This option is useful for dumping large tables. It forces mysqldump to
retrieve rows for a table from the server a row at a time rather than
retrieving the entire row set and buffering it in memory before writing it
out.
            </div>
            <br />
            <div class="time">發問時間：2016-8-3 12:31</div>
            <div style="clear: both;"></div>
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
        </div>
        <div class="four columns">
            <div>
                <h5>發問注意事項</h5>
                <ul>
                    <li>請盡量清楚描述您的問題</li>
                    <li>請描述您做過哪些嘗試、試過哪些方法</li>
                    <li>請盡可能地提供細節，幫回答者節省時間</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    .time {
        float: right;
        color: #757575;
    }
</style>
@stop
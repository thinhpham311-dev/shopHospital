<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>In Hóa Đơn</title>
    <style>
        body
        {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <div style="width: 100%; margin:auto; border: 3px groove black;">
    	 <h1 style="text-align: center;font-weight: bold;">Bill Millet</h1>
        <table style="width: 90%; margin:auto;border: thin solid black; margin-top: 20px;">
            <tr >
                <th style="border: thin solid black; text-align: center; width: 10%">STT</th>
                <th style="border: thin solid black;text-align: center; width:40%" >Name Customer</th>
                <th style="border: thin solid black;text-align: center; width:15%">Date Create Bill</th>
                <th style="border: thin solid black;text-align: center; width: 25%"> Price</th>
                <th style="border: thin solid black;text-align: center;width: width:10%;">Amount</th>
            </tr>
            @foreach ($bill as $list)
            <tr>
                <td style="border: thin solid black;text-align: center;">{{$count++ }}</td>
                <td style="border: thin solid black;text-align: center;">{{$list->customer->users->name}}</td>
                <td style="border: thin solid black;text-align: center;">{{$list->date_order}}</td>
                <td style="border: thin solid black;text-align: center;">{{number_format($list->total)}} vnd</td>
                <td style="border: thin solid black;text-align: center;">{{$list->payment}}</td>
            </tr>
            
            @endforeach

        </table>
        <br/>
        <div style="width: 90%; margin:auto; height:80px;">
            <div style="width: 50%; float: left;">
               <p><b>Total Bill:&nbsp;&nbsp;&nbsp;</b>{{count($bill)}} </p>
            </div>
            
            <div style="width: 50%; float: left;">
                  <p><b>Total Price:&nbsp;&nbsp;&nbsp;</b>
                  {{number_format($total)}} vnd
              </p>
            </div>
          
        </div>
    </div>
</body>
</html>


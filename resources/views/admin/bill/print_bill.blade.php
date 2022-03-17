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
    <div style="width: 80%; margin:auto; border: 3px groove black;background-color:pink;">
         <div style="width: 90%; margin:auto; height: 200px;">
            <h1 style="text-align: center;font-weight: bold;">Detail Products</h1>
            <div style="width: 50%; float: left;">
                <p><b>Code Bill</b>:&nbsp;&nbsp;&nbsp;{{ $bill->id}}</p>
                <p style="font-family: Arial;"><b>Name Customer</b>:&nbsp;&nbsp;&nbsp;{{$bill->customer->users->name  }}</p>
                <p style="font-family: Arial;"><b>Address Customer</b>:&nbsp;&nbsp;&nbsp;{{$bill->customer->users->address  }}</p>
            </div>
            <div style="width: 50%; float: left; margin-left: 90px;">
                <p><b>Order day</b>:&nbsp;&nbsp;&nbsp;{{ $bill->date_order }}</p>
                <p><b>Payment</b>:&nbsp;&nbsp;&nbsp;{{ $bill->payment }}</p>
                 <p><b>ship</b>:&nbsp;&nbsp;&nbsp;{{ number_format($ship) }} vnd</p>
            </div>
        </div>

        <table style="width: 90%; margin:auto;border: thin solid black;">
            <tr >
                <th style="border: thin solid black; text-align: center; width: 10%">STT</th>
                <th style="border: thin solid black;text-align: center; width: 15%" >Image</th>
                <th style="border: thin solid black;text-align: center; width: 40%">Product Name</th>
                <th style="border: thin solid black;text-align: center; width: 25%">Price</th>
                <th style="border: thin solid black;text-align: center;width: width:10%;">Amount</th>
            </tr>
            @foreach ($list_billdetail as $product)

            <tr>
                <td style="border: thin solid black;text-align: center;">{{$count++ }}</td>
                <td style="border: thin solid black;text-align: center;"><img src="{{url("./public/img/admin/product",$product->products->image)  }}" width="50" height="50"></td>
                <td style="border: thin solid black;">{{$product->products->name  }}</td>
                <td style="border: thin solid black">{{number_format($product->price)  }} d</td>
                <td style="border: thin solid black;text-align: center;">{{$product->quantity  }}</td>
            </tr>

            @endforeach

        </table>
        <br/>

        <div style="width: 90%; margin:auto; height:80px;">
            <div style="width: 50%; float: left;">
               <p><b>Total products:&nbsp;&nbsp;&nbsp;</b>{{count($list_billdetail)}} </p>
            </div>
            
            <div style="width: 50%; float: left;">
                 <p><b>Total bill:&nbsp;&nbsp;&nbsp;</b>{{number_format($bill->total + $ship)  }} vnd</p>
            </div>
        </div>
    </div>
</body>
</html>


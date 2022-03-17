<?php

namespace App\Http\Controllers\Admin;
use App\bill_detail;
use App\bill;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getBillDetail($id_bill)
    {
    	$bill_detail=bill_detail::where('id_bill',$id_bill)->get();
    	$bill=bill::Find($id_bill);
    	$count=1;
    	/*foreach ($bill_detail as $product) {*/
    		echo"
    			<hr/>
    			<div class='row'>
    				<div class='col-6'>
    					<div class='row'>
    						<div class='col-md-6'><b>Mã đơn hàng</b></div>
    						<div class='col-md-6'>".$bill->id."</div>
    					</div>
    					<div class='row'>
    						<div class='col-md-6'><b>Ngày đặt hàng</b></div>
    						<div class='col-md-6'>".$bill->date_order."</div>
    					</div>
    					<div class='row'>
    						<div class='col-md-6'><b>Cách thanh toán</b></div>
    						<div class='col-md-6'>".$bill->payment."</div>
    					</div>
    				</div>
    				<div class='col-6'>
    					<div class='row'>
    						<div class='col-6'><b>Hình khách</b></div>
    						<div class='col-6'>
    							<img src='".url('./public/img/admin/customer',$bill->customer->users->image)."' width='80' height='80' class='rounded border'> 
    						</div>
    					</div>
    					<div class='row'>
    						<div class='col-md-6'><b>Tên khách hàng</b></div>
    						<div class='col-md-6'>".$bill->customer->users->name."</div>
    					</div>
    				</div>
    			</div>
    			
    			<div class='row'>
    				<div class='col-3'><p><b>Ghi chú</b><p></div>
    				<div class='col-9'>
    					<p class=' border p-3'>".$bill->note."</p>
    				</div>
    			</div>
    			<hr/>";

    			echo"<table class='table table-dark'>
                        <tr>
                            <th class='text-center'>STT</th>
                            <th class='text-center'>Hình ảnh</th>
                            <th class='text-center'>Tên sản phẩm</th>
                            <th class='text-center'>Giá bán</th>
                            <th class='text-center'>Số lượng</th>
                        </tr>";
                    foreach ($bill_detail as $product) {
                  echo "<tr>
                            <td class='text-center'>".$count++."</td>
                            <td class='text-center'><img src='".url('./public/img/admin/product',$product->products->image)."' width='70' height='70'></td>
                            <td class='text-center'><p class='name_product_reduce text-left'>".$product->products->name."</p></td>
                            <td class='text-center'>".number_format($product->price)." đồng</td>
                            <td class='text-center'>".$product->quantity."</td>
                        </tr>";
                    }
                    
                echo"</table>
                    <hr/>
                    <div class='row'>
                        <div class='col-5'>Tổng số sản phẩm:</div>
                        <div class='col-7'>".count($bill_detail)."</div>
                    </div>
                    <div class='row'>
                        <div class='col-5'>Tổng tiền hóa đơn:</div>
                        <div class='col-7'>".number_format($bill->total)." đồng</div>
                    </div>
                    <hr/>
                ";


    }
}

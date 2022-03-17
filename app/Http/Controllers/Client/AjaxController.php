<?php

namespace App\Http\Controllers\Client;
use App\Answer_Comment;
use App\Comment;
use Illuminate\Http\Request;
use App\Bill;
use App\Bill_Detail;

class AjaxController extends Controller
{
    public function getAnswerComment($id_comment)
    {
		$list_answercomment_comment=Answer_Comment::where('id_comment',$id_comment)->get();
        if(count($list_answercomment_comment)==0)
        {
            echo"<p class='text-center'> Chưa có câu trả lời</p>";
        }
        else
        {
            foreach($list_answercomment_comment as $list)
            {
                echo"
                    <div class='w-100 '>";
                        if($list->accounts->right==1)
                        {
                            if($list->accounts->users->image=="")
                            {
                                echo"<img src='".url('./public/img/logo/logo2.png') ."'  style='width:30px;height: 30px; margin-left:20px;' class='rounded-circle border mr-2'>".$list->accounts->users->name."(Quản Trị)";
                            }
                            else
                            {
                                echo"<img src='". url('./public/img/admin/accounts',$list->accounts->users->image) ."' style='width:30px;height: 30px; margin-left:50px;' class='rounded-circle border mr-2'>".$list->accounts->users->name."(Quản Trị)";
                            }
                        }else{
                             if($list->accounts->users->image=="")
                            {
                                echo"<img src='".url('./public/img/logo/logo2.png') ."'  style='width:30px;height: 30px; margin-left:20px;' class='rounded-circle border mr-2'>".$list->accounts->users->name."(Nhân viên)";
                            }
                            else
                            {
                                echo"<img src='". url('./public/img/admin/accounts',$list->accounts->users->image) ."' style='width:30px;height: 30px; margin-left:50px;' class='rounded-circle border mr-2'>".$list->accounts->users->name."(Nhân viên)";
                            }
                        }

                            echo"
                                <div class=' rounded p-3 ml-5 border ' style='background-color:white; margin-left:80px;' >
                                      ".$list->content."
                                </div>
                                <div style='float:right;'><a href='{{url('')}}'>xóa</a></div>

                    </div>";
            }
        }





    }
    public function getBillDetail_Me($id_bill)
    {
        $bill_detail=bill_detail::where('id_bill',$id_bill)->get();
        $bill=bill::Find($id_bill);
        $count=1;
        /*foreach ($bill_detail as $product) {*/
            echo"
                <hr/>
                <div class='row'>
                    <div class='col-md-6'>
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
                    <div class='col-md-6'>
                        <div class='row'>
                            <div class='col-md-6'><b>Hình khách</b></div>
                            <div class='col-md-6'>";
                                if($bill->customer->users->image=="")
                                {
                                    echo" <img src='".url('./public/img/logo/logo2.png')."' width='80' height='80' class='rounded border'>";
                                }
                                else
                                {
                                    echo" <img src='".url('./public/img/admin/customer',$bill->customer->users->image)."' width='80' height='80' class='rounded border'>";
                                }
                            echo"</div>
                        </div>
                        <div class='row'>
                            <div class='col-md-6'><b>Tên khách hàng</b></div>
                            <div class='col-md-6'>".$bill->customer->users->name."</div>
                        </div>
                    </div>
                </div>
                 <div class='row'>
                    <div class='col-md-3'><p><b>Địa chỉ:</b><p></div>
                    <div class='col-md-9'>
                        <p class=' border p-3'>".$bill->customer->users->address."</p>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-3'><p><b>Ghi chú</b><p></div>
                    <div class='col-md-9'>
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
                        <div class='col-md-5'>Tổng số sản phẩm:</div>
                        <div class='col-md-7'>".count($bill_detail)."</div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>Tổng tiền hóa đơn:</div>
                        <div class='col-md-7'>".number_format($bill->total)." đồng</div>
                    </div>
                    <hr/>
                ";


    }
}

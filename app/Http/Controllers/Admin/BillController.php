<?php

namespace App\Http\Controllers\Admin;

use App\Bill_Detail;
use App\Bill;
use PDF;
use DB;
use Illuminate\Http\Request;

class BillController extends Controller
{
  
     public function getList_All_Bil_NotPayment()
    {
       $number_order=0;
       $list_all_bill=Bill::Where('status','0')->get();
        $list_all_bills=Bill::Where('status','0')->orderby('id','desc')->paginate(4);
        return view('admin.bill.list_all_bill_notpayment', compact('number_order','list_all_bill','list_all_bills'));
    }
    public function getList_All_Bil_Transport()
    {
       $number_order=0;
        $list_all_bill=Bill::Where('status','1')->get();
        $list_all_bills=Bill::Where('status','1')->orderby('id','desc')->paginate(4);
        return view('admin.bill.list_all_bill_transport', compact('number_order','list_all_bill','list_all_bills'));
    }
    public function getList_All_Bil_Payment()
    {
       $number_order=0;
         $list_all_bill=Bill::Where('status','2')->get();
        $list_all_bills=Bill::Where('status','2')->orderby('id','desc')->paginate(4);
        return view('admin.bill.list_all_bill_payment', compact('number_order','list_all_bill','list_all_bills'));
    }
    public function getDelete($id)
    {
        $bill=Bill::Find($id);
        //start delete bill detail
        $bill_all_detail=Bill_Detail::where('id_bill',$bill->id)->get();
        if(count($bill_all_detail)>0)
        {
            foreach ($bill_all_detail as $list)
            {
               if($bill->id==$list->id_bill)
               {

                  $bil_detail=Bill_Detail::Find($list->id);
                  $bil_detail->delete();
               }
            }
        }
         //end delete bill detail
         $bill->delete();
         return redirect()->back()->with('notification','Đơn đặt hàng' .$id.' đã được hủy');
    }
     public function getEdit_Status($id)
    {
        $bill=Bill::Find($id);
        $bill->status=$bill->status+1;
        $bill->save();
        if($bill->status==1)
        {
            return redirect('admin/bills/list_all_bill_transport')->with('notification','Đơn đặt hàng'.'' .$id.''.' đã được chuyển sang giai đoạn vận chuyển');
        }
        elseif($bill->status==2)
        {
            return redirect('admin/bills/list_all_bill_payment')->with('notification','Đơn đặt hàng'.'' .$id.''.'đã hoàn tất quá trình mua hàng cho khách hàng');;
        }
    }
    public function getPrint_Bill($id_bill,$type = 'stream')
    {

        $count=1;
        $ship=30000;
        $list_billdetail=Bill_Detail::where('id_bill',$id_bill)->get();
        $bill=Bill::Find($id_bill);
       /* return View('admin.bill.print_bill',compact('list_billdetail','bill','count'));*/
        /*$pdf = PDF::loadView('admin.bill.print_bill',compact('list_billdetail','bill','count'));
            return $pdf->download('Hoadon.pdf');*/

            $pdf = app('dompdf.wrapper')->loadView('admin.bill.print_bill', compact('ship','list_billdetail','bill','count'));

            if ($type == 'stream') {
                //$pdf->load_html($bill, 'UTF-8');
                return $pdf->stream('invoice.pdf');
            }

            if ($type == 'download') {
                //$pdf->load_html($bill, 'UTF-8');
                return $pdf->download('invoice.pdf');
            }

    }
   
    public function getPrint_millet($type = 'stream')
    {

        $count=1;
         $bill=Bill::Where('status','2')->take(30)->latest()->get();
         $bills=Bill::Where('status','2')->select(DB::Raw('SUM(bill.total)'))->get();

        $total=0;
         foreach ($bill as  $value) {
           $total=$total+$value->total;
         }
    
       /* return View('admin.bill.print_bill',compact('list_billdetail','bill','count'));*/
        /*$pdf = PDF::loadView('admin.bill.print_bill',compact('list_billdetail','bill','count'));
            return $pdf->download('Hoadon.pdf');*/

            $pdf = app('dompdf.wrapper')->loadView('admin.bill.print_millet', compact('bill','count','bills','total'));

            if ($type == 'stream') {
                //$pdf->load_html($bill, 'UTF-8');
                return $pdf->stream('invoice.pdf');
            }

            if ($type == 'download') {
                //$pdf->load_html($bill, 'UTF-8');
                return $pdf->download('invoice.pdf');
            }

    }
}

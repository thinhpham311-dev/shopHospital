<?php

namespace App\Http\Controllers\Staff;

use App\Bill_Detail;
use App\Bill;
use PDF;
use DB;
use Illuminate\Http\Request;

class BillController extends Controller
{
      public function getList_All_Bil_NotPayment()
    {
        $list_all_bill=Bill::Where('status','0')->get();
        return view('staff.bill.list_all_bill_notpayment', compact('list_all_bill'));
    }
    public function getList_All_Bil_Transport()
    {
        $list_all_bill=Bill::Where('status','1')->get();
        return view('staff.bill.list_all_bill_transport', compact('list_all_bill'));
    }
    public function getList_All_Bil_Payment()
    {
         $list_all_bill=Bill::Where('status','2')->get();
        return view('staff.bill.list_all_bill_payment', compact('list_all_bill'));
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
            return redirect('manage/bills/list_all_bill_transport')->with('notification','Đơn đặt hàng' .$id.' đã được chuyển sang giai đoạn vận chuyển');
        }
        elseif($bill->status==2)
        {
            return redirect('manage/bills/list_all_bill_payment')->with('notification','Đơn đặt hàng' .$id.'đã hoàn tất quá trình mua hàng cho khách hàng');;
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

            $pdf = app('dompdf.wrapper')->loadView('staff.bill.print_bill', compact('ship','list_billdetail','bill','count'));

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

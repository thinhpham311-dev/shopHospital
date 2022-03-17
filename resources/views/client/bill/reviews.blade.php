@extends('client.layout.master')
@section('cssheader')
<style >
    #reviews div.stars {
      width: 270px;
      display: inline-block;
    }

    #reviews input.star { display: none; }

    #reviews label.star {
      float: right;
      padding: 10px;
      font-size: 36px;
      color: #444;
      transition: all .2s;
    }

    #reviews input.star:checked ~ label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    #reviews input.star-5:checked ~ label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px #952;
    }

    #reviews input.star-1:checked ~ label.star:before { color: #F62; }

    #reviews label.star:hover { transform: rotate(-15deg) scale(1.3); }

    #reviews label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-center font-weight-bold">Đánh Giá Các Sản Phẩm Trong Hóa Đơn</h2>
            </div>
            <div class="card-body">
                 @if(Session::has('notification'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong> {{Session::get('notification')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                  <!--end notification -->
               

                <form action="{{ url('client/products/reviews_products',$id_bill)}}"  method="post">
                @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%;">STT</th>
                                <th class="text-center" style="width:15%;">Hinh Ảnh</th>
                                <th class="text-center" style="width: 30%;">SanPham</th>
                                <th class="text-center" style="width: 50%">Đánh Giá Sản Phẩm</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center" style="width: 5%;">STT</th>
                                <th class="text-center" style="width:15%;">Hinh Ảnh</th>
                                <th class="text-center" style="width: 30%;">san pham</th>
                                <th class="text-center" style="width: 30%">Đánh Giá Sản Phẩm</th>
                              
                            </tr>
                        </tfoot>
                        <tbody>

                        @foreach($list_detailbill as $value)

                         <tr>
                         	<label>Ghi chú đánh giá sản phẩm
                               @if($errors->has('note'))
                                                      <div class="error-text" style="color: red;">
                                                          {{$errors->first('note')}}
                                                      </div>
                                                      @endif
                          </label>
                            	<textarea name="note" ></textarea>
                            </tr>
                            <tr>
                                <td class="text-center">{{$number_order=$number_order+1}}</td>
                                <td class="text-center"><img src="{{url('public/img/admin/product/',$value->products->image) }}" style="width: 50px; height: 50px;"></td>
                                <td class="text-center">{{$value->products->name }}</td>
                                <td class="text-center">
                                    <div id="reviews"  >
                                        <input name="bill_id" type="hidden" value="{{$value->bill_id}}">
                                        <input class="star star-5" id="star-5-{{$value->id_product }}" type="radio"  name="Evaluate[{{$value->id_product}}]" value="5" />
                                        <label class="star star-5" for="star-5-{{$value->id_product }}"></label>
                                        <input class="star star-4" id="star-4-{{$value->id_product }}" type="radio" name="Evaluate[{{$value->id_product }}]" value="4" />
                                        <label class="star star-4" for="star-4-{{$value->id_product }}"></label>
                                        <input class="star star-3" id="star-3-{{$value->id_product }}" type="radio" name="Evaluate[{{$value->id_product }}]" value="3" />
                                        <label class="star star-3" for="star-3-{{$value->id_product }}"></label>
                                        <input class="star star-2" id="star-2-{{$value->id_product }}" type="radio" name="Evaluate[{{$value->id_product }}]" value="2" />
                                        <label class="star star-2" for="star-2-{{$value->id_product }}"></label>
                                        <input class="star star-1" id="star-1-{{$value->id_product }}" type="radio" checked name="Evaluate[{{$value->id_product }}]" value="1" />
                                        <label class="star star-1" for="star-1-{{$value->id_product }}"></label>
                                    </div>
                                </td>
                            </tr>
                           
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary float-right">Đánh Giá</button>
                </form>
            </div>
        </div>
    </div>

@endsection

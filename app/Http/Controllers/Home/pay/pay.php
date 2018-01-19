<?php

namespace App\Http\Controllers\Home\pay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class pay extends Controller
{
    /**
     * 支付前
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function prepay(Request $request)
    {
        if ($request->isMethod('get')) {
            $data = session('user_info');
            return view('Home/pay/vip_prepay')->with($data);
        }

        if ($request->isMethod('post')) {
            // $input= $request->all();
            if (empty(session('user_info'))) {
                return ['status' => 2, 'info' => '亲,您还没有登录,请先登录!'];
            }
            $input = $request->all();

            if ($input['agreed'] == '不同意') {
                return ['status' => 0, 'info' => '请先选择同意该协议'];
            }
//            todo 创建订单
            //生成订单
            $order_id_main = date('YmdHis') . rand(10000000, 99999999);
            $order_id_len = strlen($order_id_main);
            $order_id_sum = 0;
            for ($i = 0; $i < $order_id_len; $i++) {
                $order_id_sum += (int)(substr($order_id_main, $i, 1));
            }
            $order_num = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100, 2, '0', STR_PAD_LEFT);
//            return ['status'=>0,'info'=>'请先选择同意该协议','data'=>$order_num];
            $data = [];
            $data['order_id'] = $order_num;
            $data['user_id'] = session('user_info')['user_id'];
            $data['time'] = $input['time'];
            $data['total'] = $input['total'];
            $data['payway'] = $input['payway'];
            $data['desc'] = '用户' . $data['user_id'] . '申请开通' . $input['time'] . '个月的会员,共付款' . $input['total'] . '元';
            $res = DB::table('order')->insert($data);
            if (!$res) {
                return ['status' => 0, 'info' => '创建订单失败'];
//                return ['status' => 1, 'info'=>'成功创建订单','msg'=>$order_num];
            } else {
                return ['status' => 1, 'info' => '成功创建订单', 'data' => $data['order_id']];
            }
        }
    }

    /**
     *
     */
    public function pay($id)
    {
//        dump($id);
        $res = DB::table('order')->where('order_id', '=', $id)->select('*')->get()[0];
        if ($res->payway == 0) {
            //支付宝支付
            if ($res->status == 0) {
                $alipay = app('alipay.web');
                $alipay->setOutTradeNo($res->order_id);
                //支付金额
                $alipay->setTotalFee($res->total);
//                $alipay->setTotalFee(0.01);
                //商品信息
                $alipay->setSubject('kandle书城' . $res->time . '个月会员');
                // 商品描述
                $alipay->setBody($res->desc);
                $alipay->setQrPayMode('2'); //该设置为可选，添加该参数设置，支持二维码支付。
                // 跳转到支付页面。
                return redirect()->to($alipay->getPayLink());
            } else {
                echo '您已支付过,无须再次支付';
            }
        }
        if ($res->payway == 1) {
            //todo 微信支付
        }
    }

    /**
     * 异步通知
     */
    public function webNotify(Request $request)
    {
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay notify post data verification fail.', [
                'data' => Request::instance()->getContent()
            ]);
            return 'fail';
        }

        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => Input::get('out_trade_no'),
                    'trade_no' => Input::get('trade_no')
                ]);
//            File::put('data.php', '');
                break;
        }
        return 'success';
    }
    /**
     * 同步通知
     */
    public function webReturn(Request $request)
    {
        $data = [];
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay return query data verification fail.', [
                'data' => Request::getQueryString()
            ]);
            return view('error')->with([' error' => '支付失败', 'url' => 'prepay']);
        }

        // 判断通知类型。

        switch (Input::get('trade_status')) {
            case 'TRADE_FINISHED':
            case 'TRADE_SUCCESS':
                $data = $request->all();
                DB::table('order')
                    ->where('order_id', '=', $data['out_trade_no'])
                    ->update(['status' => $data['payment_type'], 'buyer_email' => $data['buyer_email'], 'trade_no' => $data['trade_no'], 'notify_time' => $data['notify_time']]);
                break;
        }
        return view('success')->with(['success' => '支付成功', 'url' => 'index']);
    }


}

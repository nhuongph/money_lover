<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\TransMoney;
use App\Category;
use App\Wallet;
use DateTime;
use DB;
use Validator;
use Session;
use Excel;

class TransMoneysController extends Controller {

    public function __construct() {
        $lang = Session::get('language');
        if ($lang != null)
            \App::setLocale($lang);
    }

    public function getTransactions() {
        $transmoneys = TransMoney::paginate(5);
        $categories = ['' => '--- ' . trans('money_lover.select') . ' ---'] + Category::lists('name', 'id')->all();
        return view('TransMoney.index')->with(['transmoneys' => $transmoneys, 'categories' => $categories]);
    }

    public function getAddTransaction() {
        $categories = ['' => '--- ' . trans('money_lover.select') . ' ---'] + Category::lists('name', 'id')->all();
        $wallets = ['' => '--- ' . trans('money_lover.select') . ' ---'] + Wallet::where('user_id', Auth::user()->id)->lists('name', 'id')->all();
        return view('TransMoney.add')->with(['categories' => $categories, 'wallets' => $wallets]);
    }

    public function postAddTransaction(Request $request) {
        $validator = Validator::make($request->all(), [
                    'category_id' => 'required|numeric',
                    'wallet_id' => 'required|numeric',
                    'money' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator);
        }
        $money = $request->money;
        $wallet = Wallet::where('id', $request->wallet_id)->first();
        if (($wallet->money + $money) < 0) {
            return redirect()
                            ->back()
                            ->withErrors(trans('money_lover.trans_err_1'));
        }

        $category = Category::where('id', $request->category_id)->first();
        $wallet = Wallet::where('id', $request->wallet_id)->first();
//        dump($wallet);
//        exit(0);
        if (!isset($category) || !isset($wallet)) {
            return redirect()->back()->withErrors(trans('money_lover.trans_err_2'));
        } else {
            TransMoney::insert([
                'name' => $category->name,
                'note' => $request->note,
                'image' => $category->image,
                'category_id' => $category->id,
                'wallet_id' => $wallet->id,
                'money' => $request->money,
                'type_money' => $wallet->type_money,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $wallet->money = $wallet->money + $request->money;
            Wallet::where('id', $wallet->id)->update([
                'money' => $wallet->money,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Session::flash('message', trans('money_lover.trans_mes_1'));
            return redirect('transactions');
        }
    }

    public function getUpdateTransaction($id = null) {
        $transaction = TransMoney::where('id', $id)->first();
        $categories = ['' => '--- ' . trans('money_lover.select') . ' ---'] + Category::lists('name', 'id')->all();
        $wallets = ['' => '--- ' . trans('money_lover.select') . ' ---'] + Wallet::where('user_id', Auth::user()->id)->lists('name', 'id')->all();
        return view('TransMoney.update')->with(['transaction' => $transaction, 'categories' => $categories, 'wallets' => $wallets]);
    }

    public function postUpdateTransaction(Request $request) {
        $validator = Validator::make($request->all(), [
                    'category_id' => 'required|numeric',
                    'wallet_id' => 'required|numeric',
                    'money' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator);
        }

        $id = $request->id;
        $money = $request->money;
        $transaction = TransMoney::where('id', $id)->first();
        $old_wallet = Wallet::where('id', $transaction->wallet_id)->first();
        if (isset($old_wallet)) {
            $old_wallet->money = $old_wallet->money - $transaction->money;
            Wallet::where('id', $old_wallet->id)->update([
                'money' => $old_wallet->money,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        $category = Category::where('id', $request->category_id)->first();
        $wallet = Wallet::where('id', $request->wallet_id)->first();
        if (!isset($category) || !isset($wallet) || !isset($transaction)) {
            return redirect()->back()->withErrors(trans('money_lover.trans_err_3'));
        } else {
            if (($wallet->money + $money) < 0) {
                return redirect()
                                ->back()
                                ->withErrors(trans('money_lover.trans_err_1'));
            }
            TransMoney::where('id', $id)->update([
                'name' => $category->name,
                'note' => $request->note,
                'image' => $category->image,
                'category_id' => $category->id,
                'wallet_id' => $wallet->id,
                'money' => $money,
                'type_money' => $wallet->type_money,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $wallet->money = $wallet->money + $money;
            Wallet::where('id', $wallet->id)->update([
                'money' => $wallet->money,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Session::flash('message', trans('money_lover.trans_mes_2'));
            return redirect('transactions');
        }
    }

    public function getDeleteTransaction($id = null) {
        if (!isset($id) || $id == "") {
            return redirect()->back();
        } else {
            if (TransMoney::where('id', $id)->delete()) {
                Session::flash('message', trans('money_lover.trans_mes_3'));
                return redirect('transactions');
            } else {
                return redirect()->back();
            }
        }
    }

    public function getSearchReport() {
        $transmoneys = TransMoney::all();
        $categories = ['' => '--- ' . trans('money_lover.select') . ' ---'] + Category::lists('name', 'id')->all();
        return view('TransMoney.search')->with(['transmoneys' => $transmoneys, 'categories' => $categories]);
    }

    public function postSearchReport(Request $request) {
        $validator = Validator::make($request->all(), [
                    'date_search' => 'date_format:d/m/Y',
                    'category_id' => 'numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator);
        }
        $category = $request->category_id;
        if (isset($request->date_search) && $request->date_search != "") {
            $date = DateTime::createFromFormat('d/m/Y', $request->date_search);
            $date = $date->format('Y-m-d');
//            dump($date);
//            exit(0);
        }

        if (isset($date) && ($date != "") && isset($category) && ($category != "")) {
            $transmoneys = TransMoney::where(DB::raw('DATE(updated_at)'), '=', $date)->where('category_id', $category)->paginate(5);
        } elseif (isset($date) && ($date != "")) {
            $transmoneys = TransMoney::where(DB::raw('DATE(updated_at)'), '=', $date)->paginate(5);
        } elseif (isset($category) && ($category != "")) {
            $transmoneys = TransMoney::where('category_id', $category)->paginate(5);
        } else {
            $transmoneys = TransMoney::paginate(5);
        }
        $categories = ['' => '--- ' . trans('money_lover.select') . ' ---'] + Category::lists('name', 'id')->all();
        return view('TransMoney.index')->with(['transmoneys' => $transmoneys, 'categories' => $categories]);
    }

    public function getReportMonth() {
        $date = new DateTime();
        $m = $date->format('m');
        $y = $date->format('Y');
        $transmoneys = TransMoney::whereMonth('updated_at', '=', $m)->whereYear('updated_at', '=', $y)->paginate(5);
        $categories = Category::lists('name', 'id')->all();
        return view('TransMoney.report')->with(['transmoneys' => $transmoneys, 'categories' => $categories]);
    }

    public function postReportMonth(Request $request) {
        $validator = Validator::make($request->all(), [
                    'month' => 'date_format:m/Y',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator);
        }
        $month = $request->month;

        if (isset($month) && ($month != "")) {
            list($m, $y) = explode("/", $request->month);
            $transmoneys = TransMoney::whereMonth('updated_at', '=', $m)->whereYear('updated_at', '=', $y)->paginate(5);
        } else {
            $transmoneys = TransMoney::paginate(5);
        }
        $categories = Category::lists('name', 'id')->all();
        return view('TransMoney.report')->with(['transmoneys' => $transmoneys, 'categories' => $categories]);
    }

    public function getExcel() {
        ob_end_clean();
        ob_start();
        $date = new DateTime();
        $month = $date->format("m-Y");
        list($m, $y) = explode("-", $month);
        $transmoneys = TransMoney::whereMonth('updated_at', '=', $m)->whereYear('updated_at', '=', $y)->get();
        Excel::create('Report ' . time(''), function($excel) use($transmoneys,$month) {
            $excel->sheet($month, function ($sheet) use ($transmoneys,$month) {

                // Set all margins
                $sheet->loadView('admin.excel')->with(['transmoneys'=>$transmoneys,'month'=>$month]);
                $sheet->setWidth('A', 5);
                $sheet->setWidth('B', 5);
                $sheet->setWidth('C', 20);
                $sheet->setWidth('D', 20);
                $sheet->setWidth('E', 50);
                $sheet->setWidth('F', 5);
                $sheet->setWidth('G', 5);
                $sheet->setWidth('H', 5);
                $sheet->setWidth('I', 5);                
                $sheet->setWidth('J', 5);
                $sheet->setWidth('K', 5);
                $sheet->setWidth('L', 5);
                $sheet->setWidth('M', 5);
                $sheet->setWidth('N', 5);
                $sheet->setWidth('O', 5);
                $sheet->setWidth('P', 5);

                // Freeze first row
                $sheet->freezeFirstRow();
                $sheet->cell('A1:F1', function ($cell) {
                    
                });
            });
        })->store('xlsx')->download('xlsx');
        ob_flush();
    }

}
